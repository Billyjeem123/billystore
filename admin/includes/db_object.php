<?php



class Db_object
{

    protected static $db_users = 'tblusers';
    // protected static $db_users = 'tblsuscribers';
    // protected static $preferred_properties = array('email', 'password', 'role');
    protected static $preferred_properties = array('email, password, role,  gender');

    public static function find_all_query()
    {


        $result_set = static::universal_query(" SELECT * FROM " . static::$db_users . " ");

        //   return !empty($result_set) ? array_shift($result_set) : false;
        return $result_set;
    }

    public static function find_by_id($id)
    {


        $result_set =  static::universal_query(" SELECT * FROM " . static::$db_users . " WHERE id = '{$id}'  ");
        //   return $result_set;
        //foreach in the makiing
        return !empty($result_set) ? array_shift($result_set) : false;
    }



    //universal_query + +  fetching
    public static function universal_query($sql)
    {

        global   $database;

        $the_array_method = array();

        $result_set =  $database->query($sql);



        while ($row = $database->fetch($result_set)) {

            // $cnt = 
            $the_array_method[] = static::Instanciate($row);
        }

        return $the_array_method;
    }
    //universal_query + +  fetching

    public static function Instanciate($the_record)
    {

        $called_class = get_called_class();

        $the_object = new $called_class;

        foreach ($the_record as $the_attribute => $value) {

            if ($the_object->has_the_attribute($the_attribute)) {


                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;
    }

    //create has_the_attribute   method

    public  function has_the_attribute($the_attribute)
    {


        //fetch all property
        $all_properties =  get_object_vars($this);

        return array_key_exists($the_attribute, $all_properties);
    }







    public function Escape_properties()
    {

        global $database;

        $escape_prop = array();

        foreach ($this->Abstract_properties() as   $escape_prop_keys =>  $values) {



            $escape_prop[$escape_prop_keys] =   $database->escape_string($values);
        }

        return $escape_prop;
    }


    function   Abstract_properties()
    {



        $properties = array();

        foreach (static::$preferred_properties as  $properties_keys) {

            if (property_exists($this, $properties_keys)) {


                $properties[$properties_keys] = $this->$properties_keys;
            }
        }
        # code...

        return $properties;
    }

    public   function Insert()
    {

        global $database;

        $Abstraction = $this->Escape_properties();

        $sql = " INSERT INTO " . static::$db_users .  "(" . implode(", ", array_keys($Abstraction)) . ") ";
        $sql .= "VALUES('" . implode("','", array_values($Abstraction)) . "')";
        if ($database->query($sql)) {

            $this->id = $database->the_insert_id();
            return true;
        } else {

            return false;
        }
    }


    public   function rewrite()
    {

        //   $this->insert()

        return isset($this->id) ? $this->update() : $this->Insert();
    }

    public   function Update()
    {

        global $database;

        $Abstraction = $this->Escape_properties();

        // speciaal procedure to seperate keys and vlaues  and to formate document

        $properties_pair = array();


        foreach ($Abstraction as $key => $value) {

            $properties_pair[] = "{$key}='{$value}'";

            $sql = " UPDATE   " . static::$db_users . " SET ";
            $sql .= implode(", ", $properties_pair);
            $sql .=  " WHERE id = " . $this->id;

            $database->query($sql);

            return (mysqli_affected_rows($database->connection) == 1) ? true : false;
        }
    }


    public   function Delete()
    {

        global $database;

        $sql = " DELETE  FROM  " . static::$db_users . " ";
        $sql .= "WHERE id=" . $database->escape_string($this->id);

        $checked =  $database->query($sql);
        if ($checked) {


            echo "yeah";
        }
    }




    public static function Count_All(){


        global $database;

        $sql = "SELECT COUNT(*) FROM " . static::$db_users;
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array($result_set);

        return array_shift($row);


    }
}

// $Db_object = new Db_object();
