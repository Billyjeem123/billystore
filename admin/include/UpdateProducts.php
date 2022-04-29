

<?php include('../includes/init.php') ?>

<?php



if (isset($_POST['title'])) {




    $Product->id = $database->escape_string($_POST['id']);
    $Product->product_title = trim($_POST['title']);
    $Product->product_price =  $database->escape_string($_POST['price']);
    $Product->product_quantity =  $database->escape_string($_POST['Quantity']);
    $Product->cat_id =  $database->escape_string($_POST['cat_id']);
    $Product->product_color =  $database->escape_string($_POST['color']);
    $Product->product_material =  $database->escape_string($_POST['material']);
    $Product->product_description =  $database->escape_string($_POST['editor']);



//     $database->query(" SELECT * FROM tblproduct WHERE  price='$Product->product_price' and 
// title='$Product->product_title'  and  cat_id='$Product->cat_id', and 
// color='$Product->product_color', and  material='$Product->product_material', 
// and  quantity='$Product->product_quantity' and  description='$Product->product_description'  ");


    $confirmId =   $database->query(" 

    UPDATE tblproduct SET title = '$Product->product_title', price = '$Product->product_price', quantity='$Product->product_quantity', cat_id='$Product->cat_id', color='$Product->product_color' , material='$Product->product_material', description='$Product->product_description' WHERE id = '$Product->id'
      ");

    if ($confirmId == true) {

        echo "RECORD UPDATED";
        exit();
    } else {
        echo "Failed";
        exit();
    }
}



if (isset($_FILES['files']) && !empty($_FILES['files'])  && !empty($_POST['id'])) {

    $Product->id = $database->escape_string($_POST["id"]);
    $Product->product_image = ($_FILES['files']['name']);
    $upload = '../upload';
    if (empty($Product->product_image)) {
        $Product = Product::Fetch_Image($Product->id);
        while ($row = $database->fetch($Product)) {

            return  $row['photo'];
        }
    }

    $countfiles = count($_FILES['files']['name']);
    for ($i = 0; $i < $countfiles; $i++) {

        $Product->product_image = $_FILES['files']['name'][$i];

        // print_r($Product->product_image);

        $target_path = $upload . DS . $Product->product_image;

        move_uploaded_file($_FILES['files']['tmp_name'][$i],  $target_path);


        $Product_Confirm = ($database->query(" INSERT INTO tblimages(product_image_id, photo) VALUES('" . $Product->id . "', '" . $Product->product_image . "')  "));
    }

    if ($Product_Confirm == true) {


        echo "Image Uploaded";
    } else {


        echo "Error While Uploading";
    }
} else {


    echo "Field Cant Be Empty";
}







?>