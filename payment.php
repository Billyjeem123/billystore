<?php session_start()  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/payment.css">
  <link rel="stylesheet" type="text/css" href="/ecommerce/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">


</head>

<body style="background-color: #152733;">

  <div class="container p-0">
    <div class="card px-4">
      <p class="h8 py-3">Payment Details</p>
      <form id="paymentForm">
        <div class="row gx-3">
          <div class="col-12">
            <div class="d-flex flex-column">
              <p class="text mb-1">Email Address</p> <input class="form-control mb-3" type="email" id="email-address" placeholder="Email Adddress" value="<?php echo $_SESSION['userid']; ?>">
            </div>
          </div>
          <!-- <div class="col-12">
            <div class="d-flex flex-column">
              <p class="text mb-1">Card Number</p> <input class="form-control mb-3" type="text" placeholder="1234 5678 435678">
            </div>
          </div> -->
          <div class="col-12">
            <div class="d-flex flex-column">
              <p class="text mb-1">Amount</p> <input class="form-control mb-3" type="tel" id="amount" value=" <?php echo ($_SESSION['item_total'])  ?>">
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex flex-column">
              <p class="text mb-1">Name</p> <input class="form-control mb-3" id="first-name" type="text">
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex flex-column">
              <p class="text mb-1">Phone Number</p> <input class="form-control mb-3 pt-2 " id="last-name" type="tel">
            </div>
          </div>
          <div class="col-12">

            <!-- <div class="btn btn-primary mb-3"> <span class="ps-3">Pay $243</span> <span class="fas fa-arrow-right"></span> </div> -->
            <div class="form-submit">
              <button class="btn btn-primary mb-3" type="submit" onclick="payWithPaystack()">Pay <span class="fas fa-arrow-right"></span> </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
      e.preventDefault();
      let handler = PaystackPop.setup({
        key: 'pk_test_41542043f72482b6dfad6fc342c062ed6088f84c', // Replace with your public key
        email: document.getElementById("email-address").value,
        amount: document.getElementById("amount").value * 100,
         firstname: document.getElementById("first-name").value,
         lastname: document.getElementById("last-name").value,

        ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function() {
          window.location='https://sites.local/ecommerce/index.php'
          alert('Window closed.');
        },
        callback: function(response) {
          let message = 'Payment complete! Reference: ' + response.reference;
          alert(message);
          window.location = "https://sites.local/ecommerce/verify_transaction.php?reference=" + response.reference; 
        }
      });
      handler.openIframe();
    }
  </script>

</body>

</html>