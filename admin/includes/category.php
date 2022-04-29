
<?php

class Category extends  Db_object{

    protected static $db_users = 'tblcategory';
    protected static $preferred_properties = array('cat_name');

      public $cat_name;
      public $cat_id;



      public static function find_category_id($unknow_coloumn)
      {
    
    
          $result_set =  static::universal_query(" SELECT * FROM " . static::$db_users . " WHERE cat_id = '{$unknow_coloumn}'  ");
          return $result_set;
          //foreach in the makiing
          // return !empty($result_set) ? array_shift($result_set) : false;
      }


      public  function UpdateCat($unknow_coloumn1, $unknow_coloumn2)
      {
    
        global $database;
    
          $result_set =  $database->query(" UPDATE tblcategory SET cat_name = $unknow_coloumn1 WHERE cat_id = $unknow_coloumn2  ");
          return $result_set;
          
      }

        public static function FetchLimitCategory()
      {
    
          $result_set =  static::universal_query(" SELECT * FROM tblcategory  LIMIT 8  ");
          return $result_set;
         
      }



     
    }


    

   
    $Category = new Category();







?>