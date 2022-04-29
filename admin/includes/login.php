<?php
$array = [];
require('init.php');


if ($session->is_signed_in()) {

  redirect("index.php");
}

if(isset($_POST['email'])){


  $email = trim($_POST['email']);
  $password = trim($_POST['password']);


  $found_user = Users::verify_user($email);
  foreach ($found_user as $found_users) {
    # code...

    $found_users->user_id;
    $found_users->email;
    $found_users->password;
    $found_users->role;

    if (password_verify($password, $found_users->password)  ) {

      if ($found_users->role == "ADMINISTRATOR") {

       $array =   "ok";
        $_SESSION['user_id'] = $found_users->user_id;;
        $_SESSION['email'] = $found_users->email;
        $_SESSION['role'] = $found_users->role;

        
       $array =   "ok";
      }

    } else {


     $array =  "wrong";
    }
}
 echo json_encode($array);
}
