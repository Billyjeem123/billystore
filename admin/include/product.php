
<?php include('../includes/init.php') ?>
<?php
$array = [];
if (isset($_FILES['files']) && !empty($_FILES['files'])) {

    $Product = new Product();
    $database = new Database();

    $Product->product_title = trim($_POST['tittle']);
    $Product->product_price =  $database->escape_string($_POST['price']);
    $Product->product_quantity =  $database->escape_string($_POST['quantity']);
    $Product->cat_id =  $database->escape_string($_POST['cat_id']);
    $Product->product_color =  $database->escape_string($_POST['color']);
    $Product->product_material =  $database->escape_string($_POST['material']);
    $Product->product_description =  $database->escape_string($_POST['editor']);
    $Product->product_image = ($_FILES['files']['name']);
    $fileSize = ($_FILES['files']['size']);
    $upload = '../upload';

    $database->query(" INSERT INTO tblproduct(title, price, quantity,  cat_id,  color, material,  description) VALUES(' $Product->product_title ', '$Product->product_price', '$Product->product_quantity', '$Product->cat_id', '$Product->product_color', '$Product->product_material', '$Product->product_description') ");

    $Product->id = $database->the_insert_id();

    $countfiles = count($_FILES['files']['name']);


    for ($i = 0; $i < $countfiles; $i++) {

        $Product->product_image = $_FILES['files']['name'][$i];

        // $cat_id = $_POST['cat_id'][$i];

        $target_path = $upload . DS . $Product->product_image;

        move_uploaded_file($_FILES['files']['tmp_name'][$i],  $target_path);


        $Product_Confirm = ($database->query(" INSERT INTO tblimages(product_image_id, photo) VALUES('" . $Product->id . "', '" . $Product->product_image . "')  "));
    }

    if ($Product_Confirm == true) {


        $array =  "Product_Uploaded";
        // exit();
    } else {


        $array =  "error";
        // exit();
    }
    echo json_encode($array);
}

?>



































