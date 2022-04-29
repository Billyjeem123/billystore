

<?php
include("admin/includes/init.php");
$ref = $_GET['reference'];
if ($ref == "") {

  header('location: javascript://history.go(-1)');
}
$curl = curl_init();



curl_setopt_array($curl, array(

  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => "GET",

  CURLOPT_HTTPHEADER => array(

    "Authorization: Bearer sk_test_755a02d78f2777eb99ac6ba0b69d8a729b4e1992",

    "Cache-Control: no-cache",

  ),

));



$response = curl_exec($curl);

$err = curl_error($curl);

curl_close($curl);



if ($err) {

  echo "cURL Error #:" . $err;
} else {

  // echo $response;

  $result = json_decode($response);
}

if ($result->data->status == "success") {


  $total = 0;
  $database = new Database();

  $status = $result->data->status;
  $reference = $result->data->reference;
  $lname = $result->data->customer->last_name;
  $fname = $result->data->customer->first_name;
  $fullname = $lname .  '  ' .  $fname;
  date_default_timezone_set('Africa/Lagos');
  $time = date('m/d/y h:i:s a', time());
  $mail = $result->data->customer->email;

  $InsertTransaction = Product::InsertTransaction($status, $reference, $fullname, $time, $mail);
  $lastId = $database->the_insert_id();

  foreach ($_SESSION as $name => $value) {
    if (substr($name, 0, 8) == "product_") {

      $length = strlen($name);

      $CartId = substr($name, 8, $length);
      $Cart = Cart::FilterCart($CartId);

      // $InsertTransaction = Product::InsertTransaction($status, $reference, $fullname, $time, $mail);
      // $lastId = $database->the_insert_id();

      if ($lastId == true) {

        $Cart = Cart::FilterCart($CartId);
        foreach ($Cart as $CartItems) {
          $Img = $CartItems['images'];
           $title = $CartItems['title'];
          $Images = explode(',', $Img);
          $sub = $CartItems['price'] * $value;
          $_SESSION['item_total'] = $total += $sub;
          $_SESSION['item_quantity'] = $value;

          
          $EndTransaction = Product::EndTransaction($lastId, $CartId, $sub, $value, $title,  0);

          if($EndTransaction == true){

            header("location: thankyou.php?status=success");
            session_destroy();
          }else{

            echo "wrong";
          }

        }
      }
    }
  }
}




?>