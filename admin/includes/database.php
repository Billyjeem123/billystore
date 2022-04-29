<?php

class Database{


    public $connection;

    function __construct(){

        // automatically ths method will opendin
        $this->Open_method_db();
    }

    public function Open_method_db(){ 

        //   new mysqli  is assogned to $this->connection... and connect_errno is aproperty of new myqsqli
        
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        // $this->connection...connect_errno id a property of new mysqli
        if( $this->connection->connect_errno){

            die("Failed" .  $this->connection->connect_error);
        }
        


    }
   


 public function query($sql) {

	$result = $this->connection->query($sql);

	$this->confirm_query($result);

	return $result; 


	}

	private function confirm_query($result){


		if(!$result) {

			die("Query Failed" . $this->connection->error);

		}

	}


	public function the_insert_id() {

        return $this->connection->insert_id;
    
        }
    	public function fetch($string) {

            return  mysqli_fetch_assoc($string);
            }

   

    public function escape_string($string) {


        $escaped_string = $this->connection->real_escape_string($string);
   
        return $escaped_string;
   
   
       }
   
   
  

       public  static function rows($sql)
       {
          
        return mysqli_num_rows($sql);
       }

     
    

       
     
    }



$database  = new Database();
















?>