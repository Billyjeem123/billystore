
<?php include("../admin/includes/init.php")  ?>

<?php 

if ($_POST) {

    $msg = [];

    $database = new Database();
    $user = new Users();
    $user->email = ($_POST['email']);
    $user->password = $database->escape_string($_POST['password']);
    $user->passhash =  password_hash($user->password, PASSWORD_BCRYPT, [12]) ;
    $user->role = $database->escape_string("Subscriber");


    if($user){

        $user->InsertUsers($user->email, $user->passhash, $user->role);
        $msg = 1;
    }else{

        $msg = 2;


    }

    
    echo json_encode($msg);
}

