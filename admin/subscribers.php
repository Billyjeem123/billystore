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

                    <h3 class="page-header pb-4">Subscribers <button style="float:right;display:none" type="button" class="btn btn-dark px-4" data-toggle="modal" data-target="#myModal">
                            <i class="glyphicon glyphicon-plus"></i> New Entry</button></h3>




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
                                            <th>Email</th>
                                            <th>Subscription Date</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Email</th>
                                            <th>Subscription Date</th>
                                            <th>Delete</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php


                                        $Subscriber = Subscriber::find_all_query();
                                        foreach ($Subscriber as $Subscribers) {


                                            echo "<tr data-id=' $Subscribers->id'>";
                                            echo " <td> <p>  $Subscribers->email   </p> </td> ";
                                            echo " <td> <p>  $Subscribers->date   </p> </td> ";
                                            echo " <td><a  onclick='deleteSubscribers(this)' id=' $Subscribers->id '  class='btn btn-danger px-4 btn-sm'  >Delete</a></td>";
                                        }

                                        ?>



                                    </tbody>
                                </table>


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

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="asset/js/sweetalert.min.js"></script>

    <script src="asset/js/bootstrap-confirmation/bootbox.min.js"></script>
    <!-- Core plugin JavaScript-->



    <!-- ===============================BEGIINNING   OF VIEWING USER==================================== -->


    <script>

        function deleteSubscribers(obj) {
            var id = obj.id;

            bootbox.confirm("Do you really want to delete record?", function(result) {
                if (result == true) {
                    // AJAX Request
                    $.ajax({
                        url: "include/delete.php?id=" + id + "&&type=DleteSub",
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