
<?php

class Review extends  Db_object
{

    protected static $db_users = 'tblrating';

    public $rating;
    public $email;
    public $review;
    public $ProductId;



    public static  function InsertReview($rating, $ProductId, $review, $email)
    {
       $database =  new Database();
        global $database;

        $result_set =  $database->query(" INSERT INTO  tblrating( rating,  product_id, review, email) VALUES('$rating', '$ProductId', '$review', '$email' )   ");
        return $result_set;
    }


    public static  function FilterReview($unknownColumn)
    {
       $database =  new Database();
        global $database;

        $result_set =  $database->query(" SELECT * FROM tblrating WHERE product_id = {$unknownColumn}");
        return $result_set;
        // $totalResult = $database->rows($result_set);
    }
}





$Review = new Review();







?>