<?php include("includes/header.php")  ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include("includes/sidebar.php")  ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include("includes/topbar.php")  ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <h3 class="page-header pb-4">Add/Edit/Delete<button style="float:right;" type="button" class="btn btn-dark px-4" data-toggle="modal" data-target="#myModal">
                            <i class="glyphicon glyphicon-plus"></i> New Entry</button></h3>


                    <!-- //Start Modal -->

                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">


                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Upload Product</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">


                                    <div class="" id="eee"></div>

                                    <form style="width :100% !important;" class="form-horizontal" method="post" id="CatFormAdd" >

                                        <fieldset>
                                            <div class="container" style="width:100%">

                                                <div class="form-group">
                                                    <label for="date" class=" control-label ">Category-Name</label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <input id="cat_name" type="text" placeholder="Category Name" name="category" class="form-control" require>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- </div> -->


                                </div>
                                </fieldset>



                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-icon-split" id="addCategory">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Add Category</span>
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
                            <h6 class="m-0 font-weight-bold text-primary">List Of Categories</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>CategoryName</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>CategoryName</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

                                        $category = new Category();

                                        $category = Category::find_all_query();
                                        foreach ($category as $categories) {


                                            echo "<tr data-id=' $categories->cat_id'>";
                                            echo " <td> <p>  $categories->cat_name   </p> </td> ";
                                            echo " <td><a data-toggle='modal' data-target='#edit_user'   data-id=' $categories->cat_id '  class='btn btn-dark btn-sm px-4'  id='getUser'>Edit</a></td>";
                                            echo " <td><a  onclick='deleteCategory(this)' id=' $categories->cat_id '  class='btn btn-danger px-4 btn-sm'  >Delete</a></td>";
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
                                            <form class="form-group" method="POST" action="include/tes.php" id="catForm">
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
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="asset/js/sweetalert.min.js"></script>
    <script src="asset/js/bootstrap-confirmation/bootbox.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script>
        $(document).on("submit", "#catForm", function(e) {
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
                    $("#dataTable").load('category.php #dataTable');


                }
            }
        });
    });
    </script>
    <!-- Custom scripts for all pages-->
    <script src="asset/js/script.js"></script>

    <!-- Page level plugins -->
    <script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="asset/js/demo/datatables-demo.js"></script>

</body>

</html>