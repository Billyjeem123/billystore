
<?php include("admin/includes/init.php")  ?>

<?php



    $database = new Database();
    $user = new Users();
    $user->email   = "billy@gmail.com";
    $user->pass =  "123456";
     $user_found = Users::verify_user($user->email, $user->pass);
    foreach ($user_found as  $value) {


     echo  $value->password;

      //  if (password_verify($user->pass, $value->password)) {

      //    echo  $value->password;

      //  }else{

      //    echo "nop";
      //  }
       
      //  else{



      //   echo "no";
      //  }

      # code...
    }

    // var_dump($user_found);
      //  if ($user_found) {

        //  echo  $user->['email'];
    //     $_SESSION['userid'] =  $user->email;
    //     $_SESSION['email'] =  $user->email;
    //     $msg = 1;
    // } else {
    //     $msg = 2;
    // }./
