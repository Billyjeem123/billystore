<style>
    .error {
        color: red;
    }

    .form-items {
        border: 3px solid #fff;
        transition: all 0.4s ease;
        -webkit-transition: all 0.4s ease;
        text-align: center
    }
</style>
<div class="modal fade m-t-150" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:10rem">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="font-family: Poppins-Regular;">
            <div class="modal-header">
                <h5 class="modal-title form-items" id="exampleModalLabel">Fill in the data below.</h5>
                <div class="" id="eee"></div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (empty($_SESSION['userid'])) { ?>
                    <p class='text-center' id='LogToProceed' style='color:red'>Log In To Countinue </p>
                <?php   } ?>
                <form class="form-horizontal" method="POST" id="ValidateLogin">
                    <div class="" id="eee"></div>
                    <div class="alert alert-danger text-center" id='loginError' style='display:none'> Invalalid Username or Password </div>
                    <div class="form-group">
                        <label for="recipient-name" class="">Email:</label>
                        <input type="text" name="Email" id="Email" placeholder="Email" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="">Password:</label>
                        <input type="text" name="password" id="password" placeholder="Password" required class="form-control">
                    </div>

                    <input type="hidden" name='action' id='action' value='LogUser'>

                    <input type="submit" name="login" class=" flex-c-m stext-101 cl0 size-116 bg3 hov-btn3 p-lr-15 d-block h-100 w-100 " value="Login" style='padding:20px'>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">Not a member yet? <a href="register.php" class="text-info"> Sign Up</a>.</div>
            </div>
        </div>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    // $(document).ready(function() {

    $("#ValidateLogin").validate({
        errorClass: "error fail-alert",
        validClass: "valid success-alert",
        rules: {
            Email: {
                required: true,
            },
            password: {
                required: true,
            },

        },
        messages: {
            Email: {
                required: " Email  field cannot be blank!",
            },
            password: {
                required: "Password  field cannot be blank!",
            },
        },
    })


        $(function() {
        $('#ValidateLogin').on('submit', function(e) {
            $.ajax({
                type: 'POST',
                url: "includes/login.php",
                dataType: "json",
                data: $(this).serialize(),
                success: function(response) {
                    if(response == "ok") {
                        $('#loginModal').modal('hide');
                         $('#LogToProceed').css("display", "none");
                        // $('#loggedUser').text(response.username);

                    }else{

                        alert("incorrect");
                    }

                    if(response.success == "notokay") {
                      

                            alert("incorrect");
                    } 

                    
                }
            });
            return false;
        });
    });
</script>