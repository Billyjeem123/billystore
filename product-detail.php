<?php include("admin/includes/init.php")  ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Product Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="/ecommerce/images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ecommerce/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ecommerce/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ecommerce/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ecommerce/fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ecommerce/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ecommerce/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ecommerce/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ecommerce/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ecommerce/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ecommerce/vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ecommerce/vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ecommerce/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/ecommerce/css/util.css">
	<link rel="stylesheet" type="text/css" href="/ecommerce/css/main.css">
	<!--===============================================================================================-->
</head>

<body class="animsition">

	<!-- Header -->
	<?php include("includes/header.php")   ?>

	<!-- Cart -->
	<?php include("includes/sidecart.php")   ?>





	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">

					<?php
					$ProductId = htmlentities($_GET['id']);
					$Product = Product::QuickView($_GET['id']);
					foreach ($Product as $Products) {
						$img = $Products['images'];
						$images = explode(',', $Products['images']);

					?>
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="/ecommerce/admin/upload/<?php echo $images[0] ?>">
										<div class="wrap-pic-w pos-relative">

											<img src="/ecommerce/admin/upload/<?php echo $images[0] ?>" alt="IMG-PRODUCT" style="height:600px;object-fit:cover">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="/ecommerce/admin/upload/<?php echo $images[0] ?>">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<?php
									foreach ($images as $key) { ?>
										<div class="item-slick3" data-thumb="/ecommerce/admin/upload/<?php echo $key ?>">
											<div class="wrap-pic-w pos-relative">
												<img src="/ecommerce/admin/upload/<?php echo $key ?>" alt="IMG-PRODUCT" style="height:600px; object-fit:cover">

												<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="/ecommerce/admin/upload/<?php echo $key ?>">
													<i class="fa fa-expand"></i>
												</a>
											</div>
										</div>
									<?php    } ?>


								</div>
							</div>
						</div>
				</div>

				<!-- <div class=" text-white alert-dismissibler align-items-center w-100 justify-content-center d-flex " style="color:white ; height:45px; background-color: #222;font-size:20x">  ' + data + '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> </div> -->

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $Products['title'] ?>
						</h4>

						<span class="mtext-106 cl2">
							<?php echo $Products['price'] ?>
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?php echo $Products['description'] ?>
						</p>


						<div class="p-t-33">



							<form action="" method="POST">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">

										<a type="button" id="<?php echo $_GET["id"]   ?>" class="add_to_cart flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</a>
									</div>
								</div>
							</form>
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- p-t-43 p-b-40 -->

			<div class="bor10  m-t-50">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional
								information</a>
						</li>

						<input type="hidden" name="ReviewId" id="ReviewId" value=<?php echo $_GET['id']  ?>>

						<li class="nav-item p-b-10">

							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab"> Reviews (<span id="ReviewCount"></span>) </a>
						</li>



					</ul>



					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla
									sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit
									lectus interdum. Morbi elementum sapien rhoncus pretium maximus. Nulla lectus enim,
									cursus et elementum sed, sodales vitae eros. Ut ex quam, porta consequat interdum
									in, faucibus eu velit. Quisque rhoncus ex ac libero varius molestie. Aenean tempor
									sit amet orci nec iaculis. Cras sit amet nulla libero. Curabitur dignissim, nunc nec
									laoreet consequat, purus nunc porta lacus, vel efficitur tellus augue in ipsum. Cras
									in arcu sed metus rutrum iaculis. Nulla non tempor erat. Duis in egestas nunc.
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">



										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materials
											</span>

											<span class="stext-102 cl6 size-206">
												<?php echo $Products['material']   ?>
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>

											<span class="stext-102 cl6 size-206">
												<?php echo $Products['color']   ?>
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>

											<span class="stext-102 cl6 size-206">
												XL, L, M, S
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- <?php  //  } 
								?> -->
						<!-- - -->


						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row ">

								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto ">
									<div class="p-b-30 m-lr-15-sm ">
										<!-- Review -->


										<div class="flex-w flex-t p-b-70 ShowComment ">



											<input type="text" name="id" id="id" value="<?php echo $_GET['id'] ?>">

										</div>


										<!-- Add review -->
										<form class="w-full" id="ReviewForm" method="POST">
											<h5 class="mtext-108 cl2 p-b-7">
												Add a review
											</h5>

											<p class="stext-102 cl6">
												Your email address will not be published. Required fields are marked *
											</p>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" id="rating" type="number" name="rating" required="required">
												</span>
											</div>

											<input type="hidden" name="id" class="id" id="id" value="<?php echo $ProductId  ?>">

											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea name="review" class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" required="required"></textarea>
												</div>



												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="email" name="email" required>
												</div>
											</div>

											<button id="ReviewBtn" name="ReviewBtn" type="submit" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" type="submit">
												Submit
											</button>
										</form>
										<div class="stext-102 cl6" id="SuccessMsg"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="bg6 flex-c-m flex-w size-302 m-t-50">
			<span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: <?php echo trim($Products['Categories']) ?>
			</span>
		</div>
	</section>
	</div>
	<!-- <?php   } ?> -->

	<!-- Related Products -->
	<section class="sec-relate-product bg0 ">
		<div class="container">
			<div class="p-b-12">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="/ecommerce/images/product-01.jpg" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										Esprit Ruffle Shirt
									</a>

									<span class="stext-105 cl3">
										$16.64
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="/ecommerce/images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="/ecommerce/images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>





					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="/ecommerce/images/product-08.jpg" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										Pieces Metallic Printed
									</a>

									<span class="stext-105 cl3">
										$18.96
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include("modal.php") ?>
	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<?php
					$Category = Category::FetchLimitCategory();
					foreach ($Category as $Categories) { ?>
						<li class="p-b-10">
							<a href="javascript:void(0)" class="stext-107 cl7 hov-cl1 trans-04">
								<?php echo $Categories->cat_name  ?>
							</a>
						</li>

					<?php  }  ?>

					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us
						on (+1) 96 716 6879
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form method="post" action="" id="SubscibeForm">
						<div class="wrap-input1 w-full p-b-4">

							<input class="input1 bg-none plh1 stext-107 cl7" type="email" id="email" name="email" placeholder="email@example.com" required>
							<div class="focus-input1 trans-04"></div>
						</div>

						<input type="hidden" name="action" id="action" value="SubscribeInput">

						<div class="p-t-18">
							<button type="submit" id="SubscribeBtn" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="/ecommerce/images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="/ecommerce/images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="/ecommerce/images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="/ecommerce/images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="/ecommerce/images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								Lightweight Jacket
							</h4>

							<span class="mtext-106 cl2">
								$58.79
							</span>

							<p class="stext-102 cl3 p-t-23">
								Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat
								ornare feugiat.
							</p>

							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Size S</option>
												<option>Size M</option>
												<option>Size L</option>
												<option>Size XL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Red</option>
												<option>Blue</option>
												<option>White</option>
												<option>Grey</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<script src="/ecommerce/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="/ecommerce/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="/ecommerce/vendor/bootstrap/js/popper.js"></script>
	<script src="/ecommerce/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="/ecommerce/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="/ecommerce/vendor/daterangepicker/moment.min.js"></script>
	<script src="/ecommerce/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="/ecommerce/vendor/slick/slick.min.js"></script>
	<script src="/ecommerce/js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="/ecommerce/vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="/ecommerce/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="/ecommerce/vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="/ecommerce/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		setInterval(function() {
			loadDoc();
		}, 1000);

		function loadDoc() {
			var ReviewId = $("#ReviewId").val();
			// alert(ReviewId)
			var action = "ReFreshRating"
			$.ajax({
				url: "/ecommerce/includes/codes.php",
				type: "POST",
				data: {
					ReviewId: ReviewId,
					action: action
				},
				success: function(data) {

					$("#ReviewCount").html(data);
					// alert(data);

				},
				error: function() {

					// alert('Error While Processing')
				}
			});
		}
	</script>

	<script>
		$(document).ready(function() {
			setInterval(function() {
				RefreshCmt();
			}, 1000);

			function RefreshCmt() {
				var id = $("#id").val();
				// alert(id)
				var action = "Fetch_Cmt";
				$.ajax({
					url: "/ecommerce/includes/codes.php",
					type: "POST",
					data: {
						action: action,
						id: id
					},
					success: function(data) {
						$(".ShowComment").html(data);
					},
					error: function(data) {

						alert('Error While Processing')
					}
				});
			}
		})
	</script>

	<script>
		$("#MyAccout").click(function() {
			if (!$(this).hasClass('login')) {
				$('#loginModal').modal('show');
			} else {
				(window.location.href = '/ecommerce/account.php');
			}
		});
	</script>


	<script>
		$("#MyAccout2").click(function() {
			if (!$(this).hasClass('login')) {
				$('#loginModal').modal('show');
			} else {
				(window.location.href = '/ecommerce/account.php');
			}
		});
	</script>

	<script>
		$(document).on('click', '.add_to_cart', function() {
			var product_id = $(this).attr("id");
			var action = "AddCart";
			$.ajax({
				url: "/ecommerce/carts.php",
				method: "POST",
				data: {
					action: action,
					product_id: product_id
				},
				success: function(data) {
					load_cart_data();

					swal({
						title: "Item Added To Cart",
						icon: "success",
						button: "Ok",


					});


				}
			});

		});
	</script>


	<script>
		$(document).ready(function() {

			$("#ReviewForm").on('submit', function(e) {

				e.preventDefault();

				var email = $("#email").val();
				var review = $("#review").val();
				var rating = $("#rating").val();
				var id = $("#id").val();
				var action = "ReviewForm";
				// alert(rating);
				$.ajax({
					url: "/ecommerce/includes/codes.php",
					type: "POST",
					data: {

						email: email,
						review: review,
						rating: rating,
						id: id,
						action: action

					},
					// beforeSend: function() {
					// 	// setInterval(function(){
					// 	$("#ReviewBtn").text('Uploading <img id="" src="https://res.cloudinary.com/sivadass/image/upload/v1498134389/icons/loader.gif" alt="loading">');
					// 	// }, 2000);

					// },

					success: function(data) {

						// alert(data)

						$("#ReviewForm")[0].reset();
						$("#ReviewBtn").html('Submit');
						$("#SuccessMsg").html(
							'<div class=" alert text-white alert-dismissibler align-items-center w-100 justify-content-center d-flex " style=" height:45px; background-color: #222;">  ' + data + '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> </div>'
						);
					},
					error: function() {

						// alert('Error While Processing')
					}
				});

				return false

			})





		})
	</script>



	<script>
		$(document).ready(function() {

			$("#SubscibeForm").on('submit', function(e) {

				e.preventDefault();

				var email = $("#email").val();
				var action = "SubscribeInput";
				// alert(action);

				$.ajax({
					url: "includes/codes.php",
					type: "POST",
					data: {
						email: email,
						action: action

					},
					success: function(data) {


						swal('' + data + '');



						document.getElementById("SubscibeForm").reset();
					},
					error: function(data) {}
				});


			})


		})
	</script>

	<script>
		// $(document).ready(function() {

		setInterval(function() {

			load_cart_data();

		}, 1000);

		// });

		function load_cart_data() {

			var action = "SideCart";
			$.ajax({
				url: "/ecommerce/includes/codes.php",
				method: "POST",
				data: {
					action: action
				},
				success: function(data) {
					$('#CartSideBar').html(data);
				}
			});
		}
	</script>
	<!--===============================================================================================-->
	<script src="/ecommerce/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="/ecommerce/js/main.js"></script>

</body>

</html>