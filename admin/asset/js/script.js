// +++++++*****+++ADD-CATEGORY +++++++++++++++++++++++++++

$(document).ready(function () {
  $(document).on("click", "#addCategory", function (e) {
    e.preventDefault();
    var cat_name = $("#cat_name").val();
    var action = "Insert";
    $.ajax({
      type: "POST",
      url: "include/codes.php",
      data: {
        cat_name: cat_name,
        action: action,
      },
      encode: true,
    }).done(function (data) {
      swal({
        title: " " + data + " ",
        icon: "success",
        confirmButtonClass: "btn-success",
        closeModal: false,
      }),
        $("#cat_name").val("");
      $("#dataTable").load("category.php #dataTable");
    });
  });
});

// ***++++++++++++++ENDING OF ADD CATEGORY ++++++++++++******++++++++++++++

// **************************BEGIINIG OF DELETE CATEGORY ***********************

$(document).ready(function () {
  $(document).on("click", "#getUser", function (e) {
    e.preventDefault();

    var id = $(this).data("id");
    var action = "FindCategoryById";

    $.ajax({
      url: "include/codes.php",
      type: "POST",
      data: {
        id: id,
        action: action,
      },
      beforeSend: function () {
        $("#love").html("Working on Please wait ..");
      },
      success: function (data) {
        $("#love").html(data);
        // alert(data);
      },
    });
  });
});

// ======================+++BEGINNING OF DELETE   CATEGORY=====================================

function deleteCategory(obj) {
  var id = obj.id;
  bootbox.confirm("Do you really want to delete record?", function (result) {
    if (result == true) {
      // AJAX Request
      $.ajax({
        url: "include/delete.php?id=" + id + "&&type=deleteCatgory",
        type: "GET",
        data: {
          id: id,
        },
        success: function (response) {
          if (response == 1) {
            // Remove row from HTML Table
            $(obj).closest("tr").css("background", "tomato");
            $(obj)
              .closest("tr")
              .fadeOut(800, function () {
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

// ======================+++BEGINNING OF UPLOADING PRODUCTS=====================================
$(document).ready(function (e) {
  $("#addProduct").on("click", function () {
    var form_data = new FormData();
    var ins = document.getElementById("files").files.length;
    for (var x = 0; x < ins; x++) {
      form_data.append("files[]", document.getElementById("files").files[x]);
      form_data.append("tittle", document.getElementById("tittle").value);
      form_data.append("price", document.getElementById("price").value);
      form_data.append("quantity", document.getElementById("quantity").value);
      form_data.append(
        "description",
        document.getElementById("description").value
      );
      form_data.append("cat_id", document.getElementById("cat_id").value);
      form_data.append("action", document.getElementById("action").value);
    }

    $.ajax({
      url: "include/product.php", // point to server-side PHP script
      type: "post",
      dataType: "text", // what to expect back from the PHP script
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      encode: true,
    })
      .done(function (response) {
        $("#eee").html(
          '<div class="alert alert-success text-center" style="font-size:20px"> ' +
            response +
            " </div>"
        );
        document.getElementById("productForm").reset();

        $("#dataTable").load("product.php #dataTable");
      })

      .fail(function (response) {
        $("#eee").html(
          '<div class="alert alert-danger"> Error Connecting To Server  </div>'
        );
      });
    //    });
  });
});

// ======================+++ENDING OF UPLOADING PRODUCTS=====================================

// ======================+++Updating  OF CATEGORY=====================================

// ======================+++BEGINNING OF UPDATING PRODUCTS=====================================

// $(document).on("submit", "#catForm", function(e) {
//     e.preventDefault();
//     alert("g");
//     var formData = new FormData(this);
//     $.ajax({
//         url: "includes/tes.php",
//         type: "POST",
//         cache: false,
//         contentType: false, // you can also use multipart/form-data replace of false
//         processData: false,
//         data: formData,

//         success: function(response) {

//             if (response) {

//                 swal({
//                     title: "  '+response+' ",
//                     type: "success",
//                     confirmButtonClass: "btn-success",
//                     closeModal: false
//                 });
//                 // $("#dataTable").load('student.php #dataTable');

//             }
//         }
//     });
// });

// ======================+++ENDING OF UPDATING CATEGORY=====================================

// ======================+++BEGINNING OF DELETING  PRODUCTIMAGES=====================================
function deletimage(obj) {
  var id = obj.id;
  bootbox.confirm("Do you really want to delete image?", function (result) {
    if (result == true) {
      // AJAX Request
      $.ajax({
        url: "include/delete.php?id=" + id + "&&type=ProductImages",
        type: "GET",
        data: {
          id: id,
        },
        success: function (response) {
          // Remove row from HTML Table
          $(obj).css("background", "black");
          $(obj).fadeOut(200, function () {
            $(this).remove();
          });
        },
      });
    }
  });
}

// ======================+++ENDING OF DELETING  PRODUCTIMAGES=====================================




