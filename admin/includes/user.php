<?php

class Users extends Db_object
{
  protected static $db_users = 'tblusers';

  //personalised info fr propperties
  protected static $preferred_properties = array('email, password, role,  gender');

  public $id;
  public $image;
  public $gender;
  public $email;
  public $password;
  public $role;
  public $upload_directory = "../upload";
  public $tmp_path;
  public $user_id;
  public $pass;
  public $formpassword;
  public $errors = array();



  public function InsertUsers($row1, $row2, $row3)
  {

      global $database;

      $result_set = $database->query(" INSERT INTO tblusers (email, password, role ) VALUES('$row1', '$row2', '$row3')");
      return $result_set; 
  }



  public  function verify_user($email)
  {
    $database = new Database();
    $result_set = $database->query("SELECT * FROM  tblusers  WHERE email = '{$email}'   ");
    return $result_set;

  }
  
  // public static function verify_user($email)
  // {

  //   $result_set = self::universal_query("SELECT * FROM " . self::$db_users . "  WHERE email = '{$email}' ");
  //   return $result_set;
  // }


  public static function find_by_id($user_id)
  {


    $result_set =  self::universal_query("SELECT * FROM " . self::$db_users . " WHERE user_id = '{$user_id}'  ");
    // return $result_set;
    //foreach in the makiing
    return !empty($result_set) ? array_shift($result_set) : false;
  }

  public  function find_by_email($email)
  {

    global $database;

    $result_set =  $database->query("SELECT * FROM " . self::$db_users . " WHERE email = '{$email}'  ");

     return $result_set;

  }



  public function set_file($file)
  {
      ///this is what we need


      $this->image =  basename($file['name']);
      $this->tmp_path = $file['tmp_name'];
      $this->type     = $file['type'];
      $this->size     = $file['size'];
  }

  public function save_user_and_image()
  {


    $target_path = $this->upload_directory . DS . $this->image;

    if (move_uploaded_file($this->tmp_path, $target_path)) {

      if ($this->Insert()) {

        unset($this->tmp_path);

        return true;
      } else {


        return false;
      }
    }
  }


  public static function  fetchUser ()
  {
      ///this is what we need


      global $database;

     $result_set =   $database->query("SELECT * FROM tblusers");

    return $result_set;
  }


  public static  function editUser($unknowColumn)
  {

      global $database;

      $result_set = $database->query(" SELECT * FROM tblusers WHERE id = ($unknowColumn)");
      return $result_set;

  }

 
}



$User = new Users();
