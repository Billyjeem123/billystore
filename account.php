<?php include("admin/includes/init.php"); // session_destroy() 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>My Account</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body class="animsition">

	<!-- Header -->
	<?php include("includes/header.php") ?>

	<!-- Cart -->

	<?php include("includes/sidecart.php") ?>




	<!-- Shoping Cart -->
	<form class="bg0 p-t-120 p-b-85" action="" method="POST">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Payment Status</th>
									<th class="column-1">Reference Number</th>
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

								<?php

								$total = 0;

								$UserId = $_SESSION['userid'];
								$UserPurchasedId = Product::FetchtTransactionById($UserId);
								foreach ($UserPurchasedId as $CartItems) {
									$id = $CartItems['quantity'];
									$Img = $CartItems['images'];
									$Images = explode(',', $Img);
									$sub = $CartItems['price'] * $id;
									// $_SESSION['item_total'] = $total += $sub;
								?>

									<tr class="table_row">

									<td class="column-1">
												<?php	echo $CartItems['status']  ?>
									</td>

									<td class="column-1">
												<?php	echo $CartItems['reference']  ?>
									</td>


										<td class="column-1">
											<div class="how-itemcart1">
												<img src="admin/upload/<?php echo $Images[0]   ?>" alt="IMG">
											</div>
										</td>
										<td class="column-2"><?php echo $CartItems['title']   ?></td>
										<td class="column-3">&#8358  <?php echo $CartItems['price']   ?></td>
										<td class="column-5">   <?php echo $CartItems['quantity']    ?></td>
										<td class="column-5">   <?php echo $sub  ?></td>

									</tr>

								<?php }

								?>

							</table>
						</div>


					</div>
				</div>


			</div>
		</div>
	</form>

	<?php include('modal.php')  ?>

	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-132">
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

					<?php  }   ?>

					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="javascript:void(0)" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="javascript:void(0)" class="stext-107 cl7 hov-cl1 trans-04">
								Returns
							</a>
						</li>

						<li class="p-b-10">
							<a href="javascript:void(0)" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="javascript:void(0)" class="stext-107 cl7 hov-cl1 trans-04">
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
						<a href="javascript:void(0)" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="javascript:void(0)" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="javascript:void(0)" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
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
					<a href="javascript:void(0)" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="javascript:void(0)" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="javascript:void(0)" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="javascript:void(0)" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="javascript:void(0)" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
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


	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<!--===============================================================================================-->
	<script>
		$("#ProceedToPaypal").click(function() {
			if (!$(this).hasClass('login')) {
				$('#loginModal').modal('show');
			} else {
				(window.location.href = 'payment.php');
				// alert('online')
			}
		});
	</script>

	<script>
		$("#MyAccout").click(function() {
			if (!$(this).hasClass('login')) {
				$('#loginModal').modal('show');
			} else {
				(window.location.href = 'account.php');
			}
		});
	</script>


	<?php
	if (isset($_SESSION['msg'])) {
	?>

		<script>
			swal({
				title: "<?php display_msg(); ?>",
				icon: "success",
				button: "Ok",


			});
		</script>
	<?php

		unset($_SESSION['msg']);
	}
	?>

	<script>
		$(document).ready(function() {

			setInterval(function() {

				load_cart_data();

			}, 1000);

		});

		function load_cart_data() {

			var action = "SideCart";
			$.ajax({
				url: "/ecommerce/includes/codes.php",
				method: "POST",
				data: {
					action: action
				},
				cache: false,
				success: function(data) {
					$('#CartSideBar').html(data);
				}
			});
		}
	</script>

	<!-- 

<script>
	setInterval(function() {
			loadDoc();
		}, 1000);

		function loadDoc() {
			var action = "ReFreshCartCount"
			$.ajax({
				url: "includes/codes.php",
				type: "POST",
				data: {
					action: action
				},
				success: function(data) {

					
					$(".ReFreshCartCount").html(data)

				},
				error: function() {

					alert('Error While Processing')
				}
			});
		}
</script> -->

<script>
	$(document).ready(function() {

		$("#SubscibeForm").on('submit', function(e) {

			e.preventDefault();

			var email = $("#email").val();
			var action =  "SubscribeInput";
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
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
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
	<script src="js/main.js"></script>

</body>

</html>