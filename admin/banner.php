<?php include("includes/header.php")  ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    

        <!-- Sidebar -->
        <?php include("includes/sidebar.php")  ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("includes/topbar.php")  ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h3 class="page-header pb-4">Banner<button style="float:right;" type="button" class="btn btn-dark px-4" data-toggle="modal" data-target="#myModal">
                            <i class="glyphicon glyphicon-plus"></i> New Entry</button></h3>
                    <!-- //Start Modal -->

                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">


                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Upload Banner</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">


                                    <div class="" id="SuccessMsg"></div>

                                    <form style="width :100% !important;" class="form-horizontal" method="post" id="BannerForm" enctype="multipart/form-data" onsubmit="return Submit()">

                                        <fieldset>
                                            <div class="container" style="width:100%">

                                                <div class="form-group">
                                                    <label for="date" class=" control-label ">Banner Tiltle</label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <input id="BannerTittle" type="text" placeholder="Banner Title" name="BannerTittle" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="action" value="UploadBanner" id="action">


                                                <div class="form-group">
                                                    <label for="date" class=" control-label ">Banner Images</label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <input type="file" name="BannerImg" id="BannerImg" required>
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
                                        <span class="text">Upload Banner</span>
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
                            <h6 class="m-0 font-weight-bold text-primary">List Of Banner</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Content</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Image</th>
                                            <th>Content</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="LoadData">




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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="asset/js/sweetalert.min.js"></script>
    <script src="asset/js/bootstrap-confirmation/bootbox.min.js"></script>
    /*
    <!-- Core plugin JavaScript--> */
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script>
        // $(document).ready(function() {
        // e.preventDefault()
        // Submit();
        // });

        function Submit() {
            var form_data = new FormData();
            form_data.append("BannerImg", document.getElementById('BannerImg').files[0]);
            form_data.append("BannerTittle", document.getElementById('BannerTittle').value);
            form_data.append("action", document.getElementById('action').value);

            $.ajax({
                    url: 'include/codes.php', // point to server-side PHP script 
                    type: 'post',
                    dataType: "JSON", // what to expect back from the PHP script
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    encode: true,

                })
                .done(function(data) {

                    if (data == "Uploaded-Sucessfully") {

                        $("#SuccessMsg").html(
                            '<div class=" alert text-white alert-dismissibler align-items-center w-100 justify-content-center d-flex " style=" height:60px; background-color: #222;">  ' + data + '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> </div>'
                        );
                        document.getElementById("BannerForm").reset();

                        // $("#dataTable").load('banner.php #dataTable');

                    }

                    if (data == "error") {

                        $("#eee").html(
                            '<div class="alert alert-success text-center" style="font-size:20px"> Error While Uploading Product </div>'
                        );


                    }
                })




            return false;
        }
        // });
    </script>

    <script>
        setInterval(function() {
            loadData()
        }, 1000);

        function loadData() {
            var action = "LoadData";
            $.ajax({
                url: 'include/codes.php',
                // dataType:'JSON',
                type: 'POST',
                data: {
                    action: action
                },
                success: function(data) {
                    $("#LoadData").html(data);
                },
            })
        }
    </script>

    <script>
        function deleteBanner(obj) {
            var id = obj.id;
            bootbox.confirm("Do you really want to delete record?", function(result) {
                if (result == true) {
                    // AJAX Request
                    $.ajax({
                        url: "include/delete.php?id=" + id + "&&type=deleteBanner",
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

    <!-- Core plugin JavaScript-->
    <!-- Page level plugins -->
    <script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    /*
    <!-- Page level custom scripts --> */
    <script src="asset/js/demo/datatables-demo.js"></script>

</body>

</html>