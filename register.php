<?php include("admin/includes/init.php")  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/login.css"> -->
</head>
<style>
    .error {

        color: red;
    }
</style>

<body class="shadow-lg" style="border:1px solid black">

    <section class="vh-100 m-t-160">
        <div class="container h-100 shadow-lg">
            <div class="row d-flex justify-content-center align-items-center h-100 shadow-lg">
                <div class="col-lg-12 col-xl-11 shadow-lg">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 shadow-lg">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="    font-family: 'Poppins', sans-serif;">Sign up</p>

                                    <form method="POST" action="" class="mx-1 mx-md-4 RegisterUsers" style="padding:40px">



                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                                <input type="email" name="email" id="form3Example3c  email" class="form-control" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c  password" name="password" class="form-control" required />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>


                                            <input type="text " action="action"   value="INSERTUSER" id="action" name="action">


                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <input type="submit" name="login" class=" ToLogIn text-dark flex-c-m stext-101 cl0 size-116 bg3 hov-btn3 p-lr-15 d-block h-100 w-100 " value="Register" style='padding:20px'>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>




    <script>
        $(document).ready(function(e) {
            $(".RegisterUsers").on('submit', (function(e) {
                e.preventDefault();
                $.ajax({
                    url: "includes/reg.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    dataType: "json",
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data == 1) {
                            // session_start();
                            window.location.href='index.php'

                        } else {

                            alert("Error While Processing");
                        }
                    },
                    error: function() {}
                });
            }));
        });
        // });
    </script>








</body>

</html>