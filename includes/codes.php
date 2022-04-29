<?php include("../admin/includes/init.php")  ?>


<?php
if ($_POST['action'] == "SubscribeInput") {

    $Subscriber->email = $_POST['email'];

    if ($Subscriber->Insert()) {

        echo "Subscribed";
        exit();
    } else {

        echo "Error While Processing";
        exit();
    }
}



if ($_POST['action'] == "FilterCat") {

    $id = $database->escape_string($_POST['catFilter']);

    $Product = Product::FilterCat($id);
    $totalResult = Database::rows($Product);
    if ($totalResult > 0) {
        foreach ($Product as $Products) {
            $img = $Products['images'];
            $images = explode(',', $Products['images']);
?>
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">

                        <img src="admin/upload/<?php echo $images[0] ?>" alt="IMG-PRODUCT" style="height:300px;object-fit:cover;">


                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="product-detail/<?php echo php_slug($Products['ProductId']) ?>/<?php echo php_slug($Products['title'])   ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                <?php echo $Products['title'] ?>
                            </a>


                            <a class="stext-105 cl3" href="product-detail/<?php echo php_slug($Products['ProductId']) ?>/<?php echo php_slug($Products['title'])   ?>">
                                 &#8358 <?php echo $Products['price'] ?>
                            </a>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a type="button" href="javascript:void(0)" id="<?php echo   $Products['ProductId'] ?>" class="add_to_cart CartId icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </a>

                        </div>

                        
                    </div>
                </div>
            </div>






        <?php  }
    } else {


        echo "<b class='text-center ltext-103 cl5'>Nothing Found</b>";
        exit();
    }
}



if ($_POST['action'] == "newnessless") {

    $Product = Product::Fetch_Product_Image();
    foreach ($Product as $Products) {
        $img = $Products['images'];
        $images = explode(',', $Products['images']);
        ?>

        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">

                    <img src="admin/upload/<?php echo $images[0] ?>" alt="IMG-PRODUCT" style="height:300px;object-fit:cover;">


                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="product-detail/<?php echo php_slug($Products['ProductId']) ?>/<?php echo php_slug($Products['title'])   ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            <?php echo $Products['title'] ?>
                        </a>


                        <a class="stext-105 cl3" href="product-detail/<?php echo php_slug($Products['ProductId']) ?>/<?php echo php_slug($Products['title'])   ?>">
                        &#8358  <?php echo $Products['price'] ?>
                        </a>
                    </div>

                    <div class="block2-txt-child2 flex-r p-t-3">


                        <a type="button" href="javascript:void(0)" id="<?php echo   $Products['ProductId'] ?>" class="add_to_cart CartId icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    <?php  }
}







if ($_POST['action'] == "LowToHighAction") {

    $Product = Product::FilterLowToHigh();
    foreach ($Product as $Products) {
        $img = $Products['images'];
        $images = explode(',', $Products['images']);
    ?>

        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">

                    <img src="admin/upload/<?php echo $images[0] ?>" alt="IMG-PRODUCT" style="height:300px;object-fit:cover;">


                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="product-detail/<?php echo php_slug($Products['ProductId']) ?>/<?php echo php_slug($Products['title'])   ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            <?php echo $Products['title'] ?>
                        </a>


                        <a class="stext-105 cl3" href="product-detail/<?php echo php_slug($Products['ProductId']) ?>/<?php echo php_slug($Products['title'])   ?>">
                        &#8358  <?php echo $Products['price'] ?>
                        </a>
                    </div>

                    <div class="block2-txt-child2 flex-r p-t-3">


                        <a type="button" href="javascript:void(0)" id="<?php echo   $Products['ProductId'] ?>" class="add_to_cart CartId icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    <?php  }
}



if ($_POST['action'] == "HighToLowAction") {

    $Product = Product::FilterHighToLow();
    foreach ($Product as $Products) {
        $img = $Products['images'];
        $images = explode(',', $Products['images']);
    ?>

        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">

                    <img src="admin/upload/<?php echo $images[0] ?>" alt="IMG-PRODUCT" style="height:300px;object-fit:cover;">


                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="product-detail/<?php echo php_slug($Products['ProductId']) ?>/<?php echo php_slug($Products['title'])   ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            <?php echo $Products['title'] ?>
                        </a>


                        <a class="stext-105 cl3" href="product-detail/<?php echo php_slug($Products['ProductId']) ?>/<?php echo php_slug($Products['title'])   ?>">
                        &#8358  <?php echo $Products['price'] ?>
                        </a>
                    </div>

                    <div class="block2-txt-child2 flex-r p-t-3">


                        <a type="button" href="javascript:void(0)" id="<?php echo   $Products['ProductId'] ?>" class="add_to_cart CartId icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    <?php  }
}


if ($_POST['action'] == "ReviewForm") {


    $Review = new Review();

    $Review->rating =  htmlspecialchars($_POST['rating']);
    $Review->ProductId =   htmlspecialchars($_POST['id']);
    $Review->review =  htmlspecialchars($_POST['review']);
    $Review->email =  htmlspecialchars($_POST['email']);

    $Review = Review::InsertReview($Review->rating, $Review->ProductId,  $Review->review,  $Review->email);

    if ($Review == true) {

        echo " Review Uploaded ";
    } else {
        echo " Error While Processing ";
    }
}



if ($_POST['action'] == "Fetch_Cmt") {

    $Review = Review::FilterReview($database->escape_string($_POST['id']));
    foreach ($Review as $Reviews) { ?>
        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
            <img src="/ecommerce/images/avatar-01.jpg" alt="AVATAR">
        </div>
        <hr style='color:black'>



        <div class="size-207">
            <div class="flex-w flex-sb-m p-b-17">
                <span class="mtext-107 cl2 p-r-20">
                    <?php echo $Reviews['email']   ?>
                </span>

                <span class="fs-18 cl11">
                    <?php

                    if ($Reviews['rating'] == '5') { ?>

                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                    <?php    }   ?>
                    <?php
                    if ($Reviews['rating'] == '4') { ?>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <?php    }   ?>
                    <?php
                    if ($Reviews['rating'] == '3') { ?>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>

                    <?php    }   ?>
                    <?php
                    if ($Reviews['rating'] == '2') { ?>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>

                    <?php    }   ?>
                    <?php

                    if ($Reviews['rating'] == '1') { ?>
                        <i class="zmdi zmdi-star"></i>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>

                    <?php    }   ?>
                    <!-- <input  type="text" class="dis-none" value="// echo $Reviews['rating']   ?>" id="rating" type="number" name="rating"> -->
                </span>
            </div>

            <p class="stext-102 cl6">
                <?php echo $Reviews['review']   ?>
            </p>
        </div>
    <?php  }
}


if ($_POST['action'] == "RefreshHomePage") {



    $Product = Product::Fetch_Product_Image();
    foreach ($Product as $Products) {
        $img = $Products['images'];
        $images = explode(',', $Products['images']);
    ?>
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">

                    <img src="admin/upload/<?php echo $images[0] ?>" alt="IMG-PRODUCT" style="height:300px;object-fit:cover;">


                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="product-detail/<?php echo php_slug($Products['ProductId']) ?>/<?php echo php_slug($Products['title'])   ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            <?php echo $Products['title'] ?>
                        </a>


                        <a class="stext-105 cl3" href="product-detail/<?php echo php_slug($Products['ProductId']) ?>/<?php echo php_slug($Products['title'])   ?>">
                        &#8358  <?php echo $Products['price'] ?>
                        </a>
                    </div>

                    <div class="block2-txt-child2 flex-r p-t-3">


                        <a type="button" href="javascript:void(0)" id="<?php echo   $Products['ProductId'] ?>" class="add_to_cart CartId icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    <?php }
}


if ($_POST['action'] == "ReFreshRating") {


    $Review = Review::FilterReview($database->escape_string($_POST['ReviewId']));
    $ttotalRows = $database->rows($Review);
    echo ($ttotalRows);
}


if ($_POST['action'] == "ReFreshCartCount") {


    $ttotalRowsCart =  isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'];
    return ($ttotalRowsCart);
}



if ($_POST['action'] == "Pagination") {

    $database = new Database();

    echo $row = $_POST['row'];
    $rowperpage = 8;
    $GetData = $database->query('SELECT tblproduct.id as ProductId, product_image_id, title, price, GROUP_CONCAT(photo) AS images FROM tblimages INNER JOIN tblproduct on tblproduct.id = tblimages.product_image_id GROUP BY product_image_id   ORDER BY tblproduct.id ASC limit ' . $row . ',' . $rowperpage);

    $html = '';


    foreach ($GetData as $Products) {
        $img = $Products['images'];
        $images = explode(',', $Products['images']);
        $PoductId = php_slug($Products['ProductId']);
        $Title = php_slug($Products['title']); ?>

        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">

                    <img src="admin/upload/<?php echo $images[0] ?>" alt="IMG-PRODUCT" style="height:300px;object-fit:cover;">


                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="product-detail/<?php echo php_slug($Products['ProductId']) ?>/<?php echo php_slug($Products['title'])   ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            <?php echo $Products['title'] ?>
                        </a>


                        <a class="stext-105 cl3" href="product-detail/<?php echo php_slug($Products['ProductId']) ?>/<?php echo php_slug($Products['title'])   ?>">
                        &#8358  <?php echo $Products['price'] ?>
                        </a>
                    </div>

                    <div class="block2-txt-child2 flex-r p-t-3">


                        <a type="button" href="javascript:void(0)" id="<?php echo   $Products['ProductId'] ?>" class="add_to_cart CartId icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
<?php   }
}


?>
<?php
// php_slug($string);
function php_slug($string)
{
    $slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($string)));
    return $slug;
}





if ($_POST['action'] == "LoadData") {
    $Product = Product::Fetch_Product_Image();
    foreach ($Product as $Products) {
        $img = $Products['images'];
        $images = explode(',', $Products['images']);
        $PoductId = php_slug($Products['ProductId']);
        $Title = php_slug($Products['title']);
?>

        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item lastItem">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">

                    <img src="admin/upload/<?php echo $images[0] ?>" alt="IMG-PRODUCT" style="height:330px;object-fit:cover;">


                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="product-detail/<?php echo php_slug($Products['ProductId']) ?>/<?php echo php_slug($Products['title'])   ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            <?php echo $Products['title'] ?>
                        </a>


                        <a class="stext-105 cl3" href="product-detail/<?php echo php_slug($Products['ProductId']) ?>/<?php echo php_slug($Products['title'])   ?>">
                        &#8358  <?php echo $Products['price'] ?>
                        </a>
                    </div>

                    <div class="block2-txt-child2 flex-r p-t-3">

                        	<!-- <a type="button" id="<?php // echo $Products["ProductId"]   ?>" class=" add_to_cart CartId btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<!-- <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON"> -->
								<!-- </a> -->


                        <a type="button" id="<?php  echo $Products["ProductId"]   ?>" class="add_to_cart CartId icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </a>


                    </div>
                </div>
            </div>
        </div>
        <?php   }
}






if ($_POST['action'] == "SideCart") {

    $output = '';
    $total = 0;
    foreach ($_SESSION as $name => $value) {

        if (substr($name, 0, 8) == "product_") {

            $length = strlen($name);

            $CartId = substr($name, 8, $length);

            $Cart = Cart::FilterCart($CartId);
            foreach ($Cart as $CartItems) {
                $Img = $CartItems['images'];
                $Images = explode(',', $Img);
                $sub = $CartItems['price'] * $value;
                $_SESSION['item_total'] = $total += $sub

                
        ?>
                <div class="header-cart-content flex-w js-pscroll">
                    <ul class='header-cart-wrapitem w-full'>
                        <li class='header-cart-item flex-w flex-t m-b-12'>
                            <div class='header-cart-item-img'>
                                <img src="/ecommerce/admin/upload/<?php echo $Images[0]   ?>" alt="IMG">
                            </div>

                            <div class='header-cart-item-txt p-t-8'>
                                <a href='/ecommerce/shoping-cart.php' class='header-cart-item-name m-b-18 hov-cl1 trans-04'>
                                    <?php echo $CartItems['title'] ?>
                                </a>

                                <span class='header-cart-item-info'>
                                &#8358    <?php echo $sub ?>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>


    <?php  }
        }
    } ?>

    <div class="w-full">

        <div class="header-cart-total w-full p-tb-40">
            Total: &#8358  <?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?>
        </div>

        <div class="header-cart-buttons flex-w w-full">
            <a href="/ecommerce/shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                View Cart
            </a>

            <a href="/ecommerce/shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                Check Out
            </a>
        </div>
    </div>

<?php }




if($_POST['action'] == "AddOrder"){


$database = new Database();
$country = $database->escape_string($_POST['country']);
$userid = $database->escape_string($_POST['userid']);
$state = $database->escape_string($_POST['state']);
$number = $database->escape_string($_POST['number']);

$OrderInfo = Product::OrderInfo($country, $userid, $state, $number);

if($OrderInfo == true){

echo "ok";
}else{
    echo "rror";
}

}

