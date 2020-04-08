<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php

include("../../objects/posts.php");
include("../../objects/users.php");
include("../../objects/carts.php");



$cart_handler = new Carts($databaseHandler);

echo $cart_handler->addToCart( $_POST['token'], $_POST['id']);


if(!empty($_POST['token'])) {


 echo $_POST['token'];
 echo "<br>";

    if(!empty($_POST['id'])) { 

       
echo $_POST['id'];
echo "<br>";

        


    } else {
        
        echo "Invalid id!";
     

      
    }

} else {
    
    echo "No token found!";
    

    
}
// create cart, add to cart function
//






?>