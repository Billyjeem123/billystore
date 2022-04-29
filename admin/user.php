<?php include("includes/header.php") ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include("includes/sidebar.php") ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">


                <?php include("includes/topbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <h3 class="page-header pb-4">Add Users <button style="float:right;" type="button" class="btn btn-dark px-4" data-toggle="modal" data-target="#myModal">
                            <i class="glyphicon glyphicon-plus"></i> New Entry</button></h3>


                    <!-- //Start Modal -->

                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">


                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Add User</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">


                                    <div class="" id="eee"></div>



                                    <form style="width :100% !important;" action="" class="form-horizontal" method="post" id="UploadUser" action="" enctype="multipart/form-data">

                                        <fieldset>
                                            <div class="container" style="width:100%">



                                                <div class="form-group">
                                                    <label for="date" class=" control-label ">Email</label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <input type="text" id="email" placeholder="Email" name="email" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="date" class=" control-label ">Password</label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <input type="text" id="password" placeholder="Password" name="password" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="date" class=" control-label ">Select Role</label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <select name="role" id="role" class="form-control">
                                                                <option selected value="Select Role">Select Role</option>
                                                                <option  value='ADMIN'>ADMIN</option>
                                                                <option  value='SUBSCRIBER'>SUBSCRIBER</option>
                                                            </select>


                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="date" class=" control-label ">Gender</label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <input type="radio" name="gender" id="gender" value="Male" required="required" checked="">Male
                                                            <input type="radio" name="gender" id="gender" value="Female" required="required">Female

                                                        </div>
                                                    </div>
                                                </div>












                                                <!-- <input type="text" name="action" id="action" value="UploadProduct" /> -->




                                            </div>


                                </div>
                                </fieldset>



                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-icon-split" id="addUser">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Add User</span>
                                    </button>


                                    <button type="button" class=" px-4  btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>


                    <!-- End Modal -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Registered Date</th>
                                            <th>Gender</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Registered Date</th>
                                            <th>Gender</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        echo "<tr>";

                                        $User = Users::fetchUser();
                                        while ($row = $database->fetch($User)) {
                                            echo "<td> $row[email]</td>";
                                            echo "<td> $row[role] </td>";
                                            echo "<td> $row[date] </td>";
                                            echo "<td> $row[gender] </td>";
                                            // echo " <td><a data-toggle='modal' data-target='#edit_user'   data-id=' $categories->cat_id '  class='btn btn-dark btn-sm px-4'  >Edit</a></td>";
                                            echo "<td> <a  data-toggle='modal' data-target='#edit_user'   data-id=' $row[id] ' class='btn btn-success btn-sm' id='getUser'>Edit</></td>";
                                            echo "<td> <button type='submit' onclick='deleteUser(this)'  id=' $row[id] ' class='btn btn-danger btn-sm'>Delete</button></td>";

                                            echo "</tr>";
                                        }





                                        ?>


                                    </tbody>
                                </table>

                                <!-- *********************  BEGINNING OF EDIT-MODAL************************* -->

                                <div class="modal fade" id="edit_user" role="dialog">
                                    <div class="modal-dialog modal-lg ">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">Edit Record</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form class="form-group" method="POST" action="" id="catFoUserFormrm">
                                                <div class="modal-body">
                                                    <div class="container" style="width :100% !important;">
                                                        <div id="love">

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- </form> -->
                                        </div>
                                    </div>
                                </div>



                                <!-- *********************  ENDING OF EDIT-MODAL************************* -->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="asset/vendor/jquery/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="asset/js/sweetalert.min.js"></script>
    <script src="asset/js/bootstrap-confirmation/bootbox.min.js"></script>
    <!-- Core plugin JavaScript-->


    <!-- ===============================BEGINNING OF UPOADING USER==================================== -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('.songs').select2();
            $("#UploadUser").on('submit', (function(e) {
                e.preventDefault();
                $.ajax({
                    url: "include/user.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data) {

                            $("#eee").html(
                                '<div class="alert alert-success text-center"> ' + data + '</div>'
                            );

                            document.getElementById("UploadUser").reset();
                            $("#dataTable").load('user.php #dataTable');


                        }
                    },
                    error: function(data) {}
                });
            }));
        });
    </script>





    <!-- ===============================ENDING  OF UPOADING USER==================================== -->


    <!-- ===============================BEGIINNING   OF VIEWING USER==================================== -->


    <script>
        $(document).ready(function() {
            $(document).on("click", "#getUser", function(e) {
                e.preventDefault();

                var id = $(this).data("id");
                var action = "FindUserById";

                $.ajax({
                    url: "include/user.php",
                    type: "POST",
                    data: {
                        id: id,
                        action: action,
                    },
                    beforeSend: function() {
                        $("#love").html("Working on Please wait ..");
                    },
                    success: function(data) {
                        $("#love").html(data);
                        // alert(data);
                    },
                });
            });
        });







        function deleteUser(obj) {
            var id = obj.id;
            bootbox.confirm("Do you really want to delete record?", function(result) {
                if (result == true) {
                    // AJAX Request
                    $.ajax({
                        url: "include/delete.php?id=" + id + "&&type=deleteUser",
                        type: "GET",
                        data: {
                            id: id,
                        },
                        success: function(response) {
                            if (response == 1) {
                                // Remove row from HTML Table
                                $(obj).closest("tr").css("background", "tomato");
                                $(obj)
                                    .closest("tr")
                                    .fadeOut(800, function() {
                                        $(this).remove();
                                    });
                            } else {
                                // alert(response)
                                alert(response);
                            }
                        },
                    });
                }
            });
        }
    </script>








<script>
        $(document).on("submit", "#catFoUserFormrm", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "include/codes.php",
            type: "POST",
            cache: false,
            contentType: false, // you can also use multipart/form-data replace of false
            processData: false,
            data: formData,

            success: function(response) {
                if (response) {
                    swal({
                        title: ' ' +response+' ' ,
                        type: "success",
                        confirmButtonClass: "btn-success",
                        closeModal: false
                    });
                    $("#dataTable").load('user.php #dataTable');


                }
            }
        });
    });
    </script>



    <!-- ===============================ENDING   OF VIEWING USER==================================== -->

    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->



    <!-- Page level plugins -->
    <script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="asset/js/demo/datatables-demo.js"></script>

</body>

</html>