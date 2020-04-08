<?php
//connect to database
include("../../config/database_handler.php");

//class
class Carts {
    private $database_handler;
    private $cart_id;

    public function __construct( $database_handler_IN ) {

        $this->database_handler = $database_handler_IN;

    }

    public function setCartId($cart_id_IN) {

        $this->cart_id = $cart_id_IN;

    }   
//fetching out every product what the user have in the cart
     public function fetchUsersCart($token){

     $query_string= "SELECT * FROM carts Join posts on posts.id = carts.post_ID where token =:token";
     $statementHandler = $this->database_handler->prepare($query_string);

    

        if($statementHandler !== false) {

            $statementHandler->bindParam(":token", $token);
            $statementHandler->execute();
            return $statementHandler->fetchAll();

        } else {
            echo "Could not create database statement!";
            die();
        }
        
    } 
// add product to cart
    public function addToCart($token_param, $post_ID_param) {

        $query_string = "INSERT INTO carts (token, post_ID) VALUES(:token, :post_ID)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":token", $token_param);
            $statementHandler->bindParam(":post_ID", $post_ID_param);
            $success = $statementHandler->execute();

            if($success === true) {
               
                header("location:../../productAdded.php");
            } else {
                echo "Error while trying to insert post to database!";
            }

        } else {
            echo "Could not create database statement!";
            die();
        }
    }
//delet product from cart
    public function deleteCart($cartID) {

        $query_string = "Delete FROM carts WHERE cartID=:cartID";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":cartID", $cartID);
        
            $success = $statementHandler->execute();

            if($success === true) {
                echo "$cartID has been deleted!";
                echo "<a href='../../index.php'>Back to the index</a>";
            } else {
                echo "Error while trying to insert post to database!";
            }

        } else {
            echo "Could not create database statement!";
            die();
        }
    }
    //check out 
    public function CheckOut($token) {

        $query_string = "INSERT INTO checkouts SELECT * FROM carts WHERE token=:token";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":token", $token);
           
            $success = $statementHandler->execute();

            if($success === true) {
                echo " Thank you for your order!";
                echo "<br>";
                echo "<a href='../../index.php'>Back to the start</a>";
            } else {
                echo "Error while trying to insert post to database!";
            }

        } else {
            echo "Could not create database statement!";
            die();
        }
    }

    
} 


?>

