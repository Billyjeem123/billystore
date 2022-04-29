
<?php

class Cart extends  Db_object
{


    public static function FilterCart($unknownColumn){



        global $database;
        $result_set = $database->query("  SELECT tblproduct.id as ProductId, quantity, product_image_id, title, price, GROUP_CONCAT(photo) AS images FROM tblimages INNER JOIN tblproduct on tblproduct.id = tblimages.product_image_id   WHERE tblproduct.id = {$unknownColumn}  GROUP BY product_image_id  ");
        return $result_set;




    }

    public static function FilterCartRows($unknownColumn){



        global $database;
        $result_set = $database->query("  SELECT tblproduct.id as ProductId, quantity, product_image_id, title, price, GROUP_CONCAT(photo) AS images FROM tblimages INNER JOIN tblproduct on tblproduct.id = tblimages.product_image_id   WHERE tblproduct.id = {$unknownColumn}  GROUP BY product_image_id  ");
        return $result_set;




    }


    public static function FilterCartProduct(){



        global $database;
        $result_set = $database->query("  SELECT tblproduct.id as ProductId, quantity, product_image_id, title, price, GROUP_CONCAT(photo) AS images FROM tblimages INNER JOIN tblproduct on tblproduct.id = tblimages.product_image_id    GROUP BY product_image_id  ");
        return $result_set;




    }

   
}





$Cart = new Cart();







?>