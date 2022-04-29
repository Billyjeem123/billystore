




<?php

class Product  extends  Db_object
{

    protected static $db_users = 'tblusers';
    protected static $preferred_properties = array('email, password, role, ');

    public $product_title;
    public $product_price;
    public $product_quantity;
    public $cat_id;
    public $product_description;
    public $upload_directory = "../upload";
    public $tmp_path;
    public $product_image_id;
    public $product_image;
    public $id;
    public $rowperpage = 4;
    public $image_placeholder = "http://placehold.it/400x400&text=image";

   

    public static  function Fetch_Product()
    {

        global $database;

        $result_set = $database->query(" SELECT  tblcategory.cat_id, tblcategory.cat_name, tblproduct.id AS hide, tblproduct.title, tblproduct.price, tblproduct.quantity, tblproduct.description, tblproduct.cat_id FROM tblproduct   JOIN tblcategory  ON  tblcategory.cat_id = tblproduct.cat_id ");
        return $result_set;
    }

    public static  function editProduct($unknowColumn)
    {

        global $database;

        $result_set = $database->query("  SELECT * FROM  tblproduct WHERE id = ($unknowColumn)");
        return $result_set;
    }




    public static  function FiterNewNess()
    {

        global $database;

        $result_set = $database->query(" SELECT id FROM tblproduct ORDER BY id  ASC");
        return $result_set;
    }

    public function  image_placeholder_path()
    {

        return (empty($this->product_image)) ? $this->image_placeholder : $this->upload_directory . DS . $this->product_image;
    }


    public static  function Fetch_Image($unknowColumn)
    {

        global $database;

        $result_set = $database->query(" SELECT * FROM tblimages WHERE product_image_id = ($unknowColumn)  ");
        return $result_set;
    }


    public static  function Fetch_Product_Image($rowperpage  = 8)
    {

        global $database;
        $result_set = $database->query("  SELECT tblproduct.id as ProductId, quantity, product_image_id, title, price, GROUP_CONCAT(photo) AS images FROM tblimages INNER JOIN tblproduct on tblproduct.id = tblimages.product_image_id GROUP BY product_image_id  ORDER BY tblproduct.id ASC  limit 0,$rowperpage  ");
        return $result_set;
    }

    public static  function CountProduct()
    {

        global $database;
        $result_set = $database->query("  SELECT tblproduct.id as ProductId, product_image_id, title, price, GROUP_CONCAT(photo) AS images FROM tblimages INNER JOIN tblproduct on tblproduct.id = tblimages.product_image_id GROUP BY product_image_id  ORDER BY tblproduct.id ASC ");
        return $result_set;
    }

    public static  function FilterCat($unknowncolumn)
    {

        global $database;

        $result_set =  $database->query(" SELECT tblcategory.cat_id, tblcategory.cat_name AS Categories, product_image_id as ProductId, product_image_id, title, price, GROUP_CONCAT(photo) AS images FROM tblimages INNER JOIN tblproduct on tblproduct.id = tblimages.product_image_id  INNER JOIN tblcategory ON tblcategory.cat_id = tblproduct.cat_id WHERE tblcategory.cat_id ='$unknowncolumn' GROUP BY product_image_id ");
        return $result_set;
    }


    public static  function FilterLowToHigh()
    {
        global $database;

        $result_set =  $database->query("SELECT   product_image_id as ProductId, title, price, GROUP_CONCAT(photo) AS images FROM tblimages INNER JOIN tblproduct on tblproduct.id = tblimages.product_image_id GROUP BY ProductId  ORDER BY tblproduct.price ASC ");
        return $result_set;
    }


    public static  function FilterHighToLow()
    {
        global $database;

        $result_set =  $database->query("SELECT  product_image_id as ProductId, title, price, GROUP_CONCAT(photo) AS images FROM tblimages INNER JOIN tblproduct on tblproduct.id = tblimages.product_image_id GROUP BY product_image_id  ORDER BY tblproduct.price DESC ");
        return $result_set;
    }

    public static  function QuickView($unknowColumn)
    {
       $database =  new Database();
        global $database;

        $result_set =  $database->query("    SELECT tblcategory.cat_id, tblcategory.cat_name AS Categories, tblproduct.color, tblproduct.material, tblproduct.description, product_image_id, title, price, GROUP_CONCAT(photo) AS images FROM tblimages INNER JOIN tblproduct on tblproduct.id = tblimages.product_image_id  INNER JOIN tblcategory ON tblcategory.cat_id = tblproduct.cat_id WHERE tblproduct.id = ($unknowColumn) GROUP BY product_image_id    ");
        return $result_set;
    }

   

    public static  function Paginate($row, $rowperpage)
    {
       $database =  new Database();
        global $database;

        $result_set = $database->query('SELECT tblproduct.id as ProductId, product_image_id, title, price, GROUP_CONCAT(photo) AS images FROM tblimages INNER JOIN tblproduct on tblproduct.id = tblimages.product_image_id GROUP BY product_image_id   ORDER BY tblproduct.id ASC limit '.$row.','.$rowperpage);
        return $result_set;
    }
   
     public static  function OrderInfo($row1, $row0, $row2, $row3)
    {
       $database =  new Database();
        global $database;

        $result_set = $database->query("INSERT INTO orderinfo (country, userid, state, number) VALUES('$row1',  '$row0', '$row2', '$row3')");
        return $result_set;
    }


    public static  function InsertTransaction($row1, $row2, $row3, $row4, $row5)
    {
       $database =  new Database();
        global $database;

        $result_set = $database->query("INSERT INTO tbltransaction (status, reference, fullname, date, email) VALUES('$row1',  '$row2', '$row3', '$row4', '$row5')");
        return $result_set;
    }


      public static  function orderedProduct($row1, $row2, $row3, $row4, $row5)
    {
       $database =  new Database();
        global $database;

        $result_set = $database->query("INSERT INTO tbltransaction (status, reference, fullname, date, email) VALUES('$row1',  '$row2', '$row3', '$row4', '$row5')");
        return $result_set;
    }

    public static  function  EndTransaction($row1, $row2, $row3, $row4, $row5, $row7)
    {
       $database =  new Database();
        global $database;

        $result_set = $database->query("INSERT INTO tblorder (orderid, productId, price, quantity, title,  process) VALUES('$row1',  '$row2', '$row3', '$row4','$row5','$row7' )");
        return $result_set;
    }


    public static  function  FetchtTransaction()
    {
       $database =  new Database();
        global $database;

        $result_set = $database->query("SELECT * FROM tbltransaction");
        return $result_set;
    }

    public static  function  FetchtTransactionById($unknownColumn)
    {
       $database =  new Database();
        global $database;

        $result_set = $database->query("SELECT  GROUP_CONCAT(photo) AS images, tblorder.price, tblorder.title, tblorder.quantity, tbltransaction.id, tbltransaction.status,  tbltransaction.reference, tbltransaction.email FROM tbltransaction  INNER JOIN tblorder ON tblorder.orderid = tbltransaction.id INNER JOIN  tblimages ON tblimages.product_image_id = tblorder.productId  WHERE tbltransaction.email = '{$unknownColumn}'  GROUP  BY tblimages.product_image_id");
        return $result_set;
    }


    public static  function  FindPurchasedItem($unknownColumn)
    {
       $database =  new Database();
        global $database;

        $result_set = $database->query("SELECT  GROUP_CONCAT(photo) AS images,  tblorder.orderid, tblorder.productId, tblorder.price, tblorder.quantity, tblorder.title, tblorder.process FROM tblorder  INNER JOIN tblimages on tblimages.product_image_id = tblorder.productId WHERE tblorder.orderid = '{$unknownColumn}' GROUP BY product_image_id");
        return $result_set;
    }
    
}





$Product = new Product();

?> 