<?php include("admin/includes/init.php")  ?>

	<?php
	$database = new Database();

	$row = $_POST['row'];
	$rowperpage = 4;

	$GetData = Product::Paginate($row, $rowperpage);

	foreach ($GetData as $Products) {
		$img = $Products['images'];
		$images = explode(',', $Products['images']);
		$PoductId = php_slug($Products['ProductId']);
		$Title = php_slug($Products['title']);
		//     
	?>

		<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item lastItem">
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



	<?php }  ?>



	<?php
	// php_slug($string);
	function php_slug($string)
	{
		$slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($string)));
		return $slug;
	}

	?>

