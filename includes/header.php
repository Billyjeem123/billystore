<header>

	<!-- <p id="ReviewCount"></p> -->
	<!-- Header desktop -->
	<div class="container-menu-desktop">
		<!-- Topbar -->
		<div class="top-bar">
			<div class="content-topbar flex-sb-m h-full container">
				<div class="left-top-bar">

				
				
				</div>

				<div class="right-top-bar flex-w h-full">
					<a href="javascript:void(0)" class="flex-c-m trans-04 p-lr-25">
						Help & FAQs
					</a>

					<a href="javascript:void(0)"  id="MyAccout" class="flex-c-m p-lr-10 trans-04 <?php   if (!empty($_SESSION['userid']) && $_SESSION['userid']) {  echo 'login';   }  ?>">
							My Account
						</a>

					<!-- <a id="MyAccout" href="javascript:void(0)" class="flex-c-m trans-04 p-lr-25 <?php //if (!empty($_SESSION['userid']) && $_SESSION['userid']) {
																									//echo 'login';
																							//	} ?>  ">
						My Account
					</a> -->

					<a href="javascript:void(0)" class="flex-c-m trans-04 p-lr-25">
						EN
					</a>

					<a href="javascript:void(0)" class="flex-c-m trans-04 p-lr-25">
						NGN
					</a>


					<?php if (!empty($_SESSION['userid']) && $_SESSION['userid']) { ?>
					<?php echo " <a href='logout.php' class='flex-c-m trans-04 p-lr-25'>
						Logout
					</a>  "; ?>
					<?php    } ?>
				</div>
			</div>
		</div>

		<div class="wrap-menu-desktop">
			<nav class="limiter-menu-desktop container">

				<!-- Logo desktop -->
				<a href="javascript:void(0)" class="logo">
					<img src="/ecommerce/images/icons/logo-01.png" alt="IMG-LOGO">
				</a>

				<!-- Menu desktop -->
				<div class="menu-desktop">
					<ul class="main-menu">
						<li class="active-menu">
							<a href="/ecommerce/">Home</a>
						</li>

						<li>
							<a href="/ecommerce/product.php">Shop</a>
						</li>



						<li>
							<a href="/ecommerce/about.php">About</a>
						</li>

						<li>
							<a href="/ecommerce/contact.php">Contact</a>
						</li>
					</ul>
				</div>

				<!-- Icon header -->
				<div class="wrap-icon-header flex-w flex-r-m">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
						<i class="zmdi zmdi-search"></i>
					</div>


					<div class=" Count icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" ="">

						<i class="zmdi zmdi-shopping-cart"></i>
					</div>

					<a href="javascript:void(0)" class=" d-none dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " ="">
						<i class="zmdi zmdi-favorite-outline"></i>
					</a>
				</div>
			</nav>
		</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap-header-mobile">
		<!-- Logo moblie -->
		<div class="logo-mobile">
			<a href="/ecommerce/index.php"><img src="/ecommerce/images/icons/logo-01.png" alt="IMG-LOGO"></a>
		</div>

		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m m-r-15">
			<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
				<i class="zmdi zmdi-search"></i>
			</div>

			<div class=" icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" >

				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<a href="javascript:void(0)" class=" d-none dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 " >
				<i class="zmdi zmdi-favorite-outline"></i>
			</a>
		</div>

		<!-- Button show menu -->
		<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>


	<!-- Menu Mobile -->
	<div class="menu-mobile">
		<ul class="topbar-mobile">
			<li>
				<div class="left-top-bar">
				
				</div>
			</li>

			<li>
				<div class="right-top-bar flex-w h-full">
					<a href="javascript:void(0)" class="flex-c-m p-lr-10 trans-04">
						Help & FAQs
					</a>


					<a href="javascript:void(0)" id="MyAccout2" class="flex-c-m p-lr-10 trans-04 <?php    if (!empty($_SESSION['userid']) && $_SESSION['userid']) {  echo 'login';   }  ?>">
							My Account
						</a>

					<a href="javascript:void(0)" class="flex-c-m p-lr-10 trans-04">
						EN
					</a>

					<a href="javascript:void(0)" class="flex-c-m p-lr-10 trans-04">
						NGN
					</a>
				</div>
			</li>
		</ul>

		<ul class="main-menu-m">

			<li class="active-menu">
				<a href="/ecommerce/">Home</a>
			</li>

			<li>
				<a href="/ecommerce/product.php">Shop</a>
			</li>



			<li>
				<a href="/ecommerce/about.php">About</a>
			</li>

			<li>
				<a href="/ecommerce/contact.php">Contact</a>
			</li>
		</ul>
	</div>

	<!-- Modal Search -->
	<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
		<div class="container-search-header">
			<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
				<img src="images/icons/icon-close2.png" alt="CLOSE">
			</button>

			<form class="wrap-search-header flex-w p-l-15">
				<button class="flex-c-m trans-04">
					<i class="zmdi zmdi-search"></i>
				</button>
				<input class="plh3" type="text" name="search" placeholder="Search...">
			</form>
		</div>
	</div>
</header>

