<?php include('../includes/init.php') ?>




<?php

if (isset($_POST['email'])) {

    $User->email = $database->escape_string($_POST['email']);
    $User->password = $database->escape_string($_POST['password']);
    $User->role = $database->escape_string($_POST['role']);
    $User->gender = $database->escape_string($_POST['gender']);

    $see =  $database->query(" INSERT INTO tblusers(email, password, role,  gender) VALUES(' $User->email ', '$User->password', '$User->role', '$User->gender') ");


    if ($see == true) {


        echo "The user {$User->email} has been added";
        exit();
    } else {


        echo "Error While Processing";
        exit();
    }
}

if ($_POST['action'] == 'FindUserById') {

      $id =  $_POST['id'];


    $Users = Users::editUser($_POST['id']);
    foreach ($Users as $User) {

        $gndr = $User['gender'];
?>
        <div class="row">


            <div class="col-sm-12">
            <div class="form-group">
                <label for="default" class="control-label">Email <span style="color:red">*</span></label>
                    <input type="hidden" name="id" class="id" value="<?php echo $User['id'] ?>" id="<?php echo $User['id'] ?>">
                    <input type="text" name="email" id="email" class="form-control email" value="<?php echo $User['email']   ?>" data-emp-id="<?php echo $User['email']   ?>">
                </div>
            </div>


            <div class="col-sm-12">
            <div class="form-group">
                <label for="default" class="control-label">Gender <span style="color:red">*</span></label>
                <?php $gndr =$User['gender'];
                    if ($gndr == "Male") {
                    ?>
                        <input type="radio" name="gender" value="Male" required="required" checked>Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
                    <?php } ?>
                    <?php
                    if ($gndr == "Female") {
                    ?>
                        <input type="radio" name="gender" value="Male" required="required">Male <input type="radio" name="gender" value="Female" required="required" checked>Female <input type="radio" name="gender" value="Other" required="required">Other
                    <?php } ?>
                </div>
            </div>

            
            <div class="col-sm-12">
            <div class="form-group">
                <label for="default" class="control-label">Registered Date <span style="color:red">*</span></label>
                    <input type="text" name="id" class="form-control" value="<?php echo $User['date'] ?>" id="<?php echo $User['date'] ?>">

                </div>
            </div>

            <input type="hidden" name="action" id="action" value="UpdateUser" >


            <div class="col-sm-12">
            <div class="form-group">
                <label for="default" class="control-label">Role <span style="color:red">*</span></label>
                    <select class="songs form-control  form-select" name="role" id="role" style="width:100%">
                        <?php

                        if ($User['role'] == "ADMIN") {

                            echo "<option selected  value='ADMIN'>ADMIN</option>";
                        } else {

                            echo "<option value='SUBSCRIBER'>SUBSCRIBER</option>";
                        }


                        ?>


                    </select>

                </div>
            </div>




            <!-- 
                <div class="form-group">
                    <label for="default" class="control-label">Role <span style="color:red">*</span></label>
                    <div class="col-sm-12">
                            
                    </div>
                </div> -->





        </div>
        <div class="modal-footer">

            <button type="submit" name="update" class=" update btn btn-success px-4  "> Update </button>
            </form>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>



<?php  }
}    ?>






