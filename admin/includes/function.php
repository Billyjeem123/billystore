<?php






function redirect($location){


    header("Location: $location");
   
   
   }

   function set_msg($msg){

    if(!empty($msg)) {
    
    $_SESSION['msg'] = $msg;
    
    } else {
    
    $msg = "";
    
    
        }
    
    
    }
    
    
    function display_msg() {
    
        if(isset($_SESSION['msg'])) {
    
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
    

        }
        }
    
    
    
    


?>