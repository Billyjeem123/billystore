
<?php

class Session{


            private $signed_in = false;
            public $id;
            public $email;
            public $userid;

    function __construct(){

        session_start();
        $this->check_the_login();
        $this->check_message();
    }



    public function is_signed_in(){


        return $this->signed_in;
    }

    
    public function logout() {

        unset($_SESSION['userid']);
        unset($_SESSION['email']);
        // unset($this->userid);
        // unset($this->email);
        $this->signed_in = false;
    
    
        }

        public  function Login($user_found){

            global   $User;
    
         if($user_found){
    
            $this->email  = $_SESSION['userid'] = $User->email;
         }

         }
        

    private function check_the_login(){

        if(isset($_SESSION['userid'])){

            $this->userid = $_SESSION['userid'];
            
           $this->signed_in = true;
        }


    }


    public function message($msg="") {

		if(!empty($msg)) {

			$_SESSION['message'] = $msg;



		} else {

			return $this->message;
		}


	   }





		private function check_message(){

	 	if(isset($_SESSION['message'])) {

	 	$this->message = $_SESSION['message'];
	 	unset($_SESSION['message']);

	 	} else {

	 		$this->message = "";
	 	}


	 }
}

$session = new Session();
$message = $session->message();


?>