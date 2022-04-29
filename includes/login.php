
<?php include("../admin/includes/init.php")  ?>

<?php

if ($_POST) {

$msg = [];
    $database = new Database();
    $user = new Users();
    $email = ($_POST['Email']);
    $password = $database->escape_string($_POST['password']);
    $user_found = $user->verify_user($email);
   
    foreach ($user_found as $key) {

        if (password_verify($password, $key['password'])) {

            $_SESSION['userid'] =  $email;
            $_SESSION['email'] =  $email;
            $msg = 1;
        } else {

            $msg =  2;
        }
    }

    echo json_encode($msg);
}
