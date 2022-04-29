<?php include("includes/header.php") ?>
<style>
    .error {
        font-size: 15px;
        width: 100%;
        color: red;
        padding-top: 10px
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

                    <h3 class="page-header pb-4">Upload Products <button style="float:right;" type="button" class="btn btn-dark px-4" data-toggle="modal" data-target="#myModal">
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



                                    <form style="width :100% !important;" class="form-horizontal" method="post" id="productForm" enctype="multipart/form-data" onsubmit="return Submit()">

                                        <fieldset>
                                            <div class="container" style="width:100%">


                                                <div class="form-group">
                                                    <!-- <label for="date" class=" control-label ">Product-Title</label> -->
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <input type="text" id="tittle" placeholder="Product Title" name="tittle" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date" class="  control-label ">Product-Price</label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <input type="text" id="price" placeholder="Product Price" name="price" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="date" class=" control-label ">Product-Quantity</label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <input type="text" id="quantity" placeholder="Product Quantity" name="quantity" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="date" class=" control-label ">Product-Image</label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <input type="file" id="files" name="files[]" class="" multiple>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="date" class="control-label ">Select Category</label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <select class="songs form-control  form-select" name="cat_id" id="cat_id" style="width:100%">
                                                                <option value="">Select Category</option>
                                                                <?php
                                                                $category = Category::find_all_query();
                                                                foreach ($category as $value) :
                                                                ?>
                                                                    <option value="<?php echo $value->cat_id  ?>"><?php echo $value->cat_name  ?></option>
                                                                <?php endforeach; ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="date" class=" control-label ">Product-Color</label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <input type="text" id="color" placeholder="Product Color" name="color" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="date" class=" control-label ">Product-Material</label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <input type="text" id="material" placeholder="Product Material" name="material" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label for="date" class=" control-label ">Product-Description</label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="">
                                                            <textarea name="editor" class="form-control editor" id="editor" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <input type="text" name="action" id="action" value="UploadProduct" /> -->




                                            </div>


                                </div>
                                </fieldset>



                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-icon-split" id="addProduct">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Upload Product</span>
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
                                            <th>Product-Name</th>
                                            <th>Product-Quantity</th>
                                            <th>Product-Price</th>
                                            <th>Product-Category</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Product-Name</th>
                                            <th>Product-Quantity</th>
                                            <th>Product-Price</th>
                                            <th>Product-Category</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        echo "<tr>";

                                        $Product = Product::Fetch_Product();
                                        foreach ($Product as $row) {
                                            echo "<td> $row[title]</td>";
                                            echo "<td> $row[quantity] </td>";
                                            echo "<td> $row[price] </td>";
                                            echo "<td> $row[cat_name] </td>";
                                            echo "<td> <a href='editProduct.php?id=$row[hide]'  class='btn btn-success btn-sm'>Edit</></td>";
                                            echo "<td> <button type='button' onclick='deleteProduct(this)' id=' $row[hide] ' class='btn btn-danger btn-sm'>Delete</button></td>";

                                            echo "</tr>";
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

    <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, inventore. Consectetur dicta ipsa voluptas consequatur. -->
    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#productForm").validate({
                errorClass: "error fail-alert",
                validClass: "valid success-alert",
                rules: {
                    tittle: {
                        required: true,
                    },
                    price: {
                        required: true,
                        number: true,
                        // min: 18
                    },
                    quantity: {
                        required: true,
                        number: true,
                        // min: 10
                    },
                    // "files[]": {
                    //     required: true
                    // },
                    // cat_id: {
                    //     required: true
                    // },
                    editor: {
                        required: true
                    },

                    color: {
                        required: true
                    },
                    material: {
                        required: true
                    },



                },
                messages: {
                    tittle: {

                        required: "Enter Product title",
                    },
                    quantity: {
                        required: "Enter  Product Quantity",
                        number: "Enter  your Product Quantity as a numerical value",
                    },
                    price: {
                        required: "Enter  Product Quantity",
                        number: "Enter  your Product Price as a numerical value",
                    },

                    color: {
                        required: "Enter  Product Color",
                    },

                    material: {
                        required: "Enter  Product Texture",
                    },
              
                    editor: {

                        required: "Enter  Product Description",
                    },
                },
            });
        });
        // ******************************CkEDitor*************************
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        // ******************************CkEDitor*************************

        // ======================+++BEGINNING OF UPLOADING PRODUCTS=====================================
        // Submit();
        // $(document).ready(function(e) {
            // e.preventDefault();
            Submit()
        // })
        function Submit() {
            var form_data = new FormData();
            var ins = document.getElementById('files').files.length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('files').files[x]);
                form_data.append("tittle", document.getElementById('tittle').value);
                form_data.append("price", document.getElementById('price').value);
                form_data.append("quantity", document.getElementById('quantity').value);
                form_data.append("editor", document.getElementById('editor').value);
                form_data.append("cat_id", document.getElementById('cat_id').value);
                form_data.append("color", document.getElementById('color').value);
                form_data.append("material", document.getElementById('material').value);
            }

            $.ajax({
                    url: 'include/product.php', // point to server-side PHP script 
                    type: 'post',
                    dataType: "JSON", // what to expect back from the PHP script
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    encode: true,

                })
                .done(function(data) {

                    if (data == "Product_Uploaded") {

                        swal({
						title: "Prouct Uploaded",
						icon: "success",
						button: "Ok",


					        });
                        document.getElementById("productForm").reset();

                        $("#dataTable").load('product.php #dataTable');

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


        // ======================+++ENDING OF UPLOADING PRODUCTS=====================================


        // ======================+++BEGINNING OF DELETE   CATEGORY=====================================

        function deleteProduct(obj) {
            var id = obj.id;
            bootbox.confirm("Do you really want to delete record?", function(result) {
                if (result == true) {
                    // AJAX Request
                    $.ajax({
                        url: "include/delete.php?id=" + id + "&&type=deleteProduct",
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

        // ======================+++ENDING OF DELETE   CATEGORY=====================================
    </script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="asset/js/sweetalert.min.js"></script>
    <script src="asset/js/bootstrap-confirmation/bootbox.min.js"></script>
    /* <!-- Core plugin JavaScript--> */
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    /* <!-- Custom scripts for all pages--> */
    <script type="text/javascript">
        $(document).ready(function() {
            $('.songs').select2();
        });
    </script>



    <!-- Page level plugins -->
    <script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    /* <!-- Page level custom scripts --> */
    <script src="asset/js/demo/datatables-demo.js"></script>

</body>

</html>