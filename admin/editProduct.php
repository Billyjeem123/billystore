                    <?php include("includes/header.php") ?>
                    <style>
                        .flex-container {

                            display: flex;
                            /* flex-direction: row; */
                            /* flex-wrap: wrap; */

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

                                        <h3 class="page-header pb-4"><button style="float:right;" type="button" class="btn btn-dark px-4" data-toggle="modal" data-target="#myModal">
                                                <i class="glyphicon glyphicon-plus"></i>View Images</button></h3>

                                        <div class="" id="eee"></div>
                                        <!-- //Start Modal -->
                                        <!-- ********Image Modal******************************* -->

                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog modal-lg">


                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">Upload Product</h6>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form style="width :100% !important;" action="" class="form-horizontal" method="post" id="ImageForm" action="" enctype="multipart/form-data">

                                                            <fieldset>
                                                                <div class="" id="ImageUploaded"></div>

                                                                <div class="container" style="width:100%">
                                                                    <?php
                                                                    $Product = Product::editProduct($_GET['id']);
                                                                    foreach ($Product as $Products) {
                                                                        $CatId =  $Products['cat_id'];
                                                                    ?>
                                                                        <div class="form-group">
                                                                            <label for="date" class=" col-md-6 control-label ">Product-Images</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" name="files[]" id="files" multiple required>

                                                                                <div class="">
                                                                                    <div class="row">
                                                                                        <?php
                                                                                        $FetchImage = Product::Fetch_Image($Products['id']);
                                                                                        foreach ($FetchImage as $rows) {
                                                                                            $ImagesFetchedId =  $rows['id'];
                                                                                            $ImagesFetched =  $rows['photo']; ?>
                                                                                            <div class="col-lg-4 col-md-3 col-sm-4 col-6 mt-lg-0 pt-4 mt-4">
                                                                                                <div class="">
                                                                                                    <a href="javascript:void(0)" id="Refresh">

                                                                                                        <img onclick="deletimage(this)" src="upload/<?php echo $ImagesFetched ?>" id="<?php echo $ImagesFetchedId    ?>" alt="Lights" class="img-fluid">

                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        <?php  } ?>
                                                                                    </div>



                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>

                                                    </div>
                                                    </fieldset>


                                                    <div class="modal-footer">
                                                        <input type="text" name="id" id="id" value="<?php echo $Products['id'] ?>" />

                                                        <button type=" button" class="btn btn-success btn-icon-split" id="UploadImages">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-check"></i>
                                                            </span>
                                                            <span class="text">Upload Image</span>
                                                        </button>


                                                        <button type="button" class="  px-4  btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                                </form>

                                            </div>
                                        </div>


                                        <!-- ********Image Modal******************************* -->

                                        <form action="" method="post" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Price <span style="color:red">*</span></label>
                                                <div class="col-sm-12 col-md-12">
                                                    <input type="text" name="price" class="form-control" id="price" value="<?php echo $Products['price'] ?>" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
                                                <div class="col-sm-12 col-md-12">
                                                    <input type="text" name="title" class="form-control" id="title" value="<?php echo $Products['title'] ?>" required="required" autocomplete="off">
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Quantity <span style="color:red">*</span></label>
                                                <div class="col-sm-12 col-md-12">
                                                    <input type="text" name="Quantity" class="form-control" id="Quantity" value="<?php echo $Products['quantity'] ?>" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Select Category <span style="color:red">*</span></label>
                                                <div class="col-sm-12 col-md-12">
                                                    <select class=form-control " name=" cat_id" id="cat_id" style="width:100%">
                                                        <?php $CatProduct = Category::find_all_query();
                                                                        foreach ($CatProduct as $rows) {

                                                                            $databaseCatId =   $rows->cat_id;

                                                                            if ($databaseCatId ==   $Products['cat_id']) {

                                                                                echo "<option selected value='{$rows->cat_id}'>{$rows->cat_name}</option>";
                                                                            } else {
                                                                                echo "<option  value='{$rows->cat_id}'>{$rows->cat_name}</option>";
                                                                            }
                                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Product Color <span style="color:red">*</span></label>
                                                <div class="col-sm-12 col-md-12">
                                                    <input type="text" name="color" class="form-control" id="color" value="<?php echo $Products['color'] ?>" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Product Material <span style="color:red">*</span></label>
                                                <div class="col-sm-12 col-md-12">
                                                    <input type="text" name="material" class="form-control" id="material" value="<?php echo $Products['material'] ?>" required="required" autocomplete="off">
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Product Description <span style="color:red">*</span></label>
                                                <div class="col-sm-12 col-md-12">
                                                    <textarea name="editor" class="form-control" id="editor"><?php echo $Products['description'] ?></textarea>
                                                </div>
                                            </div>

                                            <input type="hidden" id="action" id="action">

                                            <div class="modal-footer">
                                                <input type="text" name="id" id="id" value="<?php echo $Products['id']  ?>">

                                                <button type="button" class="btn btn-success btn-icon-split" id="uploadProducts">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Upload Product</span>
                                                </button>


                                                <a href="product.php" class=" px-4  btn btn-danger" data-dismiss="modal">Back</a>
                                            </div>


                                        <?php     } ?>

                                        </form>

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
                        <!-- Custom scripts for all pages-->


                        <!-- Bootstrap core JavaScript-->
                        <script src="asset/vendor/jquery/jquery.min.js"></script>
                        <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                        <script src="asset/js/sweetalert.min.js"></script>
                        <script src="asset/js/bootstrap-confirmation/bootbox.min.js"></script>
                        <script src="asset/js/script.js"></script>
                        <script>
                            //=============================================BEGINNING OF UPDATING PRODUCTS******************************==

                            $(document).ready(function(e) {
                                $("#uploadProducts").on("click", function(e) {
                                    e.preventDefault()
                                    var form_data = new FormData();
                                    form_data.append("title", document.getElementById("title").value);
                                    form_data.append("price", document.getElementById("price").value);
                                    form_data.append("Quantity", document.getElementById("Quantity").value);

                                    form_data.append("cat_id", document.getElementById("cat_id").value);
                                    form_data.append("color", document.getElementById("color").value);
                                    form_data.append("material", document.getElementById("material").value);
                                    form_data.append("id", document.getElementById("id").value);
                                    form_data.append(
                                        "editor",
                                        document.getElementById("editor").value
                                    );
                                    $.ajax({
                                        url: "include/UpdateProducts.php", // point to server-side PHP script
                                        dataType: "text", // what to expect back from the PHP script
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        data: form_data,
                                        type: "post",
                                        success: function(response) {
                                            $("#eee").html(
                                                '<div class="alert alert-success text-center " style="font-size:20px"> ' +
                                                response +
                                                " </div>"
                                            );
                                        },
                                        error: function() {
                                            alert(response);
                                        },
                                    });
                                });
                            });

                            ClassicEditor
                                .create(document.querySelector('#editor'))
                                .then(editor => {
                                    console.log(editor);
                                })
                                .catch(error => {
                                    console.error(error);
                                });

                            //=============================================BEGINNING OF UPDATING PRODUCTS******************************==


                            // *********************===BEGINNING OF UPDATING PRODUCTS IMAGES *************************

                            $(document).ready(function(e) {
                                $("#UploadImages").on("click", function(e) {
                                    e.preventDefault()
                                    var form_data = new FormData();
                                    var ins = document.getElementById("files").files.length;
                                    for (var x = 0; x < ins; x++) {
                                        form_data.append("files[]", document.getElementById("files").files[x]);
                                        form_data.append("id", document.getElementById("id").value);
                                    }

                                    $.ajax({
                                            url: "include/UpdateProducts.php", // point to server-side PHP script
                                            type: "post",
                                            dataType: "text", // what to expect back from the PHP script
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            data: form_data,
                                            encode: true,
                                        })
                                        .done(function(response) {
                                            $("#ImageUploaded").html(
                                                '<div class="alert alert-success text-center " style="font-size:20px"> ' +
                                                response +
                                                " </div>"
                                            );

                                            document.getElementById("ImageForm").reset();

                                            $("#Refresh").load("editProduct.php #Refresh");
                                        })

                                        .fail(function(response) {
                                            $("#eee").html(
                                                '<div class="alert alert-danger"> Error Connecting To Server  </div>'
                                            );
                                        });
                                    //    });
                                });
                            });

                            // *********************===BEGINNING OF UPDATING PRODUCTS IMAGES *************************
                        </script>


                        <!-- Core plugin JavaScript-->
                        <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('.songs').select2();
                            });
                        </script>
                        <!-- Custom scripts for all pages-->

                        <!-- Page level plugins -->
                        <script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
                        <script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

                        <!-- Page level custom scripts -->
                        <script src="asset/js/demo/datatables-demo.js"></script>

                    </body>

                    </html>