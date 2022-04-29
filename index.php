<?php include("admin/includes/init.php")  ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body class="animsition">


	<?php include("includes/header.php")   ?>



	<?php include("includes/sidecart.php")   ?>
	<!-- Slider -->

	<?php include("includes/slider.php")   ?>


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">


				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>

				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<button value="Newwest" class="filter-link action stext-106 trans-04 filter-link-active" id="action">Newness</button>
								</li>

								<li class="p-b-6">
									<button value="LowToHigh" class="filter-link LowToHigh stext-106 trans-04 filter-link-" id="LowToHigh">Price: Low to High</button>
								</li>

								<li class="p-b-6">
									<button value="HighToLow" class="filter-link HighToLow stext-106 trans-04 filter-link-" id="HighToLow">Price: High to Low</button>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								All Categories
							</div>



							<select name="" id="catFilter" class=" filter-link catFilter flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								<option value="choose category">Choose Category</option>
								<?php $category = Category::find_all_query(); ?>
								<?php foreach ($category as $categories) { ?>
									<option value="<?php echo $categories->cat_id  ?>"><?php echo $categories->cat_name  ?></option>
								<?php    } ?>
							</select>

						</div>
					</div>
				</div>

				<?php $Product = Product::CountProduct();
				$ttotalRows = $database->rows($Product);
				// session_destroy()
				?>
			</div>


			<div class="Loading" id=""></div>
			<div class="row filter-product post" id="LoadData">
				<!-- //FetchProduct -->

			</div>




			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a id="loadBtn" href="javascript:void(0)" class="load-more flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
				<input type="hidden" id="row" value="0">
				<input type="hidden" id="postCount" value="<?php echo $ttotalRows; ?>">
			</div>
		</div>
	</section>

	<?php
	function php_slug($string)
	{
		$slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($string)));
		return $slug;
	}
	?>
	<?php include("modal.php") ?>


	
	<?php include("includes/footer.php") ?>