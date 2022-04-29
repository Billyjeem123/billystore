
<?php include('../includes/init.php')  ?>


<?php


$type =  $_GET['type'];

if ($type == 'deleteCatgory') {

    $database  = new Database();

    $Category_to_delete = ($_GET['id']);

    if ($database->query(" DELETE FROM tblcategory WHERE  cat_id = '$Category_to_delete' ")) {
        echo 1;
        exit();
    } else {

        echo 0;
        exit();
    }

    exit();
}

?>


<?php


$type =  $_GET['type'];

if ($type == 'ProductImages') {

    $database  = new Database();

    $DeleteImAGES = ($_GET['id']);

    if ($database->query(" DELETE FROM tblimages WHERE  id = '$DeleteImAGES' ")) {
        echo 1;
        exit();
    } else {

        echo 0;
        exit();
    }

    exit();
}

?>


<?php


$type =  $_GET['type'];

if ($type == 'deleteUser') {

    $database  = new Database();

    $DeleteUsers = ($_GET['id']);

    if ($database->query(" DELETE FROM tblusers WHERE  id = '$DeleteUsers' ")) {
        echo 1;
        exit();
    } else {

        echo 0;
        exit();
    }

    exit();
}

?>

<?php


$type =  $_GET['type'];

if ($type == 'DleteSub') {

    $database  = new Database();

    $DleteSub = ($_GET['id']);

    if ($database->query(" DELETE FROM tblsubscribers WHERE  id = '$DleteSub' ")) {
        echo 1;
        exit();
    } else {

        echo 0;
        exit();
    }

    exit();
}

?>


<?php


$type =  $_GET['type'];

if ($type == 'deleteProduct') {

    $database  = new Database();

    $deleteProduct = ($_GET['id']);

    $dleeteProduct = ($database->query(" DELETE FROM tblproduct WHERE  id = '$deleteProduct' "));

       if($dleeteProduct == true){

         ($database->query(" DELETE FROM tblimages WHERE  product_image_id = '$deleteProduct' "))           ;

         echo 1;
        
       }else{

           echo 0;
       }
}

?>

<?php


$type =  $_GET['type'];

if ($type == 'deleteBanner') {

    $database  = new Database();

    $deleteBanner = ($_GET['id']);

    $deleteBanners = ($database->query(" DELETE FROM tblbanner WHERE  id = '$deleteBanner' "));

       if($deleteBanners == true){


         echo 1;
        
       }else{

           echo 0;
       }
}

?>