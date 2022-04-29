<?php include("includes/header.php") ?>
<style>
    .wrap-table-shopping-cart {
  overflow: auto;
  border-left: 1px solid #e6e6e6;
  border-right: 1px solid #e6e6e6;
}

.table-shopping-cart {
  border-collapse: collapse;
  width: 100%;
  min-width: 680px;
}

.table-shopping-cart tr {
  border-top: 1px solid #e6e6e6;
  border-bottom: 1px solid #e6e6e6;
}

.table-shopping-cart .column-1 {
  width: 133px;
  padding-left: 50px;
}

.table-shopping-cart .column-2 {
  width: 220px;
  font-size: 15px;
}

.table-shopping-cart .column-3 {
  width: 120px;
  font-size: 16px;
}

.table-shopping-cart .column-4 {
  width: 145px;
  text-align: right;
}

.table-shopping-cart .column-5 {
  width: 172px;
  padding-right: 50px;
  text-align: right;
  font-size: 16px;
}

.table-shopping-cart .table_row {
  height: 185px;
}

.table-shopping-cart .table_row td {
  padding-bottom: 20px;
}

.table-shopping-cart .table_row td.column-1 {
  padding-bottom: 30px;
}

.table-shopping-cart .table_head th {
  font-family: Poppins-Bold;
  font-size: 13px;
  color: #555;
  text-transform: uppercase;
  line-height: 1.6;
  padding-top: 15px;
  padding-bottom: 15px;
}

.table-shopping-cart td {
  font-family: Poppins-Regular;
  color: #555;
  line-height: 1.6;
}
</style>
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
                                            <th>Transaction Status</th>
                                            <th>Reference Number</th>
                                            <th>Full Name</th>
                                            <th>Date</th>
                                            <th>Buyer's Email</th>
                                             <th>View Ordered roduct</th>
                                            <!-- <th>Edit</th> -->
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Transaction Status</th>
                                        <th>Reference Number</th>
                                        <th>Full Name</th>
                                        <th>Date</th>
                                        <th>Buyer's Email</th>
                                            <th>View Ordered roduct</th>
                                        <!-- <th>Edit</th> -->
                                        <th>Delete</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        echo "<tr>";
                                        
                                        $FetchtTransaction = Product::FetchtTransaction();
                                        while ($row = $database->fetch($FetchtTransaction)) {
                                            // echo $row['id'];
                                            echo "<td> $row[status]</td>";
                                            echo "<td> $row[reference] </td>";
                                            echo "<td> $row[fullname] </td>";
                                            echo "<td> $row[date] </td>";
                                            echo "<td> $row[email] </td>";
                                             echo "<td><a data-toggle='modal' data-target='#edit_user'   data-id=' $row[id] '  class='btn btn-dark btn-sm px-4'   id='getUser'>View Product</a></td>";
                                            echo "<td> <button type='submit' onclick='deleteUser(this)'  id=' $row[id] ' class='btn btn-danger btn-sm'>Delete</button></td>";

                                            echo "</tr>";
                                        }


                                        // SELECT  tbltransaction.id,  FROM tbltransaction INNER JOIN tblorder WHERE tbltransaction.id = tblorder.orderid


                                        ?>


                                    </tbody>
                                </table>

                                <!-- *********************  BEGINNING OF EDIT-MODAL************************* -->

                                <div class="modal fade" id="edit_user" role="dialog">
                                    <div class="modal-dialog modal-lg ">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">Purchased Items</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form class="form-group" method="POST" action="" id="catFoUserFormrm">
                                                <div class="modal-body">
                                                    <div class="" style="width :100% !important;">
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

    <!-- ===============================BEGIINNING   OF VIEWING Purchased Product ==================================== -->


    <script>
        $(document).ready(function() {
            $(document).on("click", "#getUser", function(e) {
                e.preventDefault();

                var id = $(this).data("id");
                var action = "FindPurchasedById";
                // alert(id)

                $.ajax({
                    url: "include/codes.php",
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