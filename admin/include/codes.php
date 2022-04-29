<?php include('../includes/init.php') ?>

<?php

if ($_POST['action'] == 'Insert') {
   $Category = new Category();


   $Category->cat_name = $_POST['cat_name'];

   if (empty($Category->cat_name)) {

      echo "Fill Space To count";
      exit();
   }

   if ($Category->Insert()) {

      echo "Added Sucessfully";
      exit();
   } else {

      echo "Error While Processing";
      exit();
   }
   exit();
}

?>

<?php

if ($_POST['action'] == 'FindCategoryById') {

   $Category = new Category();

   $id =  $database->escape_string($_POST['id']);


   $Category = Category::find_category_id($_POST['id']);
   foreach ($Category as $customCategory) {
      # code...
      $edit_category_id = $customCategory->cat_id;
      $edit_category_name = $customCategory->cat_name;
?>
      <div class="row">

         <div class="col-sm-12 col-md-12">
            <label for="">Category-Name</label>
            <input type="text" name="cat_name" id="cat_name" class="form-control cat_name" value="<?php echo $customCategory->cat_name   ?>" data-emp-id="<?php echo $edit_category_name   ?>">

            <input type="hidden" id='action' name="action" value="UpdatecCat">
            <div class="modal-footer">
               <input type="hidden" name="id" class="id" value="<?php echo $edit_category_id ?>" id="<?php echo $edit_category_id ?>">

               <button type="submit" name="update" class=" update btn btn-success px-4  "> Update </button>
               </form>
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
<?php  }

   // exit();
}    ?>



<?php




if (isset($_POST['action']) && $_POST['action'] == "UpdatecCat") {



   $Category = new Category();

   $Category->cat_name = $_POST['cat_name'];
   $Category->cat_id = $_POST['id'];




   $result_set =  $database->query("UPDATE tblcategory SET cat_name ='$Category->cat_name' WHERE cat_id='$Category->cat_id' ");
   // 
   if ($result_set == true) {

      echo "Updated";
      exit();
   } else {

      echo "Error While Processing";
      exit();
   }
}






if (isset($_POST['action']) && $_POST['action'] == "UpdateUser") {



   $User = new Users();

   $User->id = $database->escape_string($_POST['id']);
   $User->email = $database->escape_string($_POST['email']);
   //    $User->password = $database->escape_string($_POST['password']);
   $User->role = $database->escape_string($_POST['role']);
   $User->gender = $database->escape_string($_POST['gender']);




   $result_set =  $database->query("UPDATE tblusers SET email ='$User->email', role='$User->role', gender='$User->gender'   WHERE id='$User->id' ");
   // 
   if ($result_set == true) {

      echo "Updated";
      exit();
   } else {

      echo "Error While Processing";
      exit();
   }
}

if ($_POST['action'] == "ReviewCountTotal") {

   echo "ok";
}



if ($_POST['action'] == "UploadBanner") {

   $database = new Database();
   $BannerTittle = trim($_POST['BannerTittle']);
   $BannerImg = ($_FILES['BannerImg']['name']);
   $fileSize = ($_FILES['BannerImg']['size']);
   $filetmp = ($_FILES['BannerImg']['tmp_name']);
   $file_store = "../upload/$BannerImg";
   move_uploaded_file($filetmp, $file_store);

   $toConfirm =   $database->query(" INSERT INTO tblbanner(image, content) VALUES('$BannerImg', '$BannerTittle') ");
   if ($toConfirm == true) {

      $msg = "Uploaded-Sucessfully";
   }
   echo json_encode($msg);
}


if ($_POST['action'] == "LoadData") {

   $database = new Database();
   $SelectAll  =   $database->query("SELECT * FROM  tblbanner");
   foreach ($SelectAll as $Sleetected) {
      echo "<tr>";
      echo  "<td> <img src='upload/$Sleetected[image]' alt='gg' width='100px' height='70px'> </td>";
      echo  "<td>  $Sleetected[content]</td>";
      echo "<td> <a href=''  class='btn btn-success btn-sm'>Edit</></td>";
      echo "<td> <button type='button' onclick='deleteBanner(this)' id=' $Sleetected[id] ' class='btn btn-danger btn-sm'>Delete</button></td>";
      echo "<tr>";
   }
}



if ($_POST['action'] == "FindPurchasedById") {

   $id =  $_POST['id'];


   $FindPurchasedItem = Product::FindPurchasedItem($_POST['id']);
   foreach ($FindPurchasedItem as $FindPurchasedItems) {
      $Img = $FindPurchasedItems['images'];
      $Images = explode(',', $Img);
      $sub = (int)($FindPurchasedItems['price']) * (int)($id);
?>

      <div class="container">
         <div class="row">
            <div class="col-12" style="border:2px solid black">
               <div class="m-l-25 m-r--38 m-lr-0-xl">
                  <div class="wrap-table-shopping-cart">
                     <table class="table-shopping-cart">
                        <tr class="table_head">
                           <th class="column-1">Product</th>
                           <th class="column-2"></th>
                           <th class="column-3">Price</th>
                           <th class="column-4">Quantity</th>
                           <th class="column-5">Total</th>
                        </tr>

                        <tr class="table_row">
                           <td class="column-1">
                              <div class="how-itemcart1">
                                 <img src="upload/<?php echo $Images[0]   ?>" alt="IMG" height='100px'>
                              </div>
                           </td>


                           <td class="column-2"><?php echo $FindPurchasedItems['title']   ?></td>
                           <td class="column-3">&#8358  <?php echo $FindPurchasedItems['price']   ?></td>
                           <td class="column-4">  <?php echo $FindPurchasedItems['quantity']   ?></td>
                           <td class="column-5">  <?php echo $sub   ?></td>
                        </tr>


                     </table>
                  </div>


               </div>
            </div>


         </div>
      </div>



<?php }
}
