
<?php

class Subscriber extends  Db_object{

    protected static $db_users = 'tblsubscribers';
    protected static $preferred_properties = array('email');

      public $email;
      public $id;
       public $date;



      
    }


    

   
    $Subscriber = new Subscriber();







?>