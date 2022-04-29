<?php include("admin/includes/init.php")  ?>


<?php

if(isset($_POST['action'])){

	if($_POST['action'] == "AddCart"){



	$Cart = Cart::FilterCart($_POST['product_id']);
	foreach($Cart as $CartItems){

		 if($CartItems['quantity'] != $_SESSION['product_' . $_POST['product_id']]) {

         $_SESSION['product_' . $_POST['product_id']]+=1;

      } else {


        echo  "We only have " . $CartItems['quantity'] . " " . "{$CartItems['title']}" . " available";
      }

	}


}
}


	if(isset($_GET['Increase'])) {

	$Cart = Cart::FilterCart($_GET['Increase']);
	foreach($Cart as $CartItems){

		 if($CartItems['quantity'] != $_SESSION['product_' . $_GET['Increase']]) {

          $_SESSION['product_' . $_GET['Increase']]+=1;
		redirect("shoping-cart.php");

      } else {

		set_msg ( "We only have " . $CartItems['quantity'] . " " . "{$CartItems['title']}" . " available" );
			redirect("shoping-cart.php");

      }


	}


}
	if(isset($_GET['remove'])) {

		$msg = $_SESSION['product_' . $_GET['remove']]--;
	
		if($_SESSION['product_' . $_GET['remove']] < 1) {
	
			unset($_SESSION['item_total']);
			unset($_SESSION['item_quantity']);
			unset($_SESSION['images']);
		redirect("shoping-cart.php");
	
		} else {
			unset($_SESSION['item_total']);
			unset($_SESSION['item_quantity']);
			unset($_SESSION['images']);
	
			redirect("shoping-cart.php");
			
	
		 }
	
	  }


	  if(isset($_GET['delete'])) { 

		$_SESSION['product_' . $_GET['delete']] = '0';
	  
		unset($_SESSION['item_total']);
		unset($_SESSION['item_quantity']);
		unset($_SESSION['images']);
		redirect("shoping-cart.php");
	  
	   }




	
	//    }
	   
	    //  ?>










