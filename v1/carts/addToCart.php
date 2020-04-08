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
// includes
include("../../objects/posts.php");
include("../../objects/users.php");
include("../../objects/carts.php");

// calling function add to cart 

$cart_handler = new Carts($databaseHandler);



// checking if we got token and ID
if(!empty($_POST['token'])) {


 echo $_POST['token'];
 echo "<br>";

    if(!empty($_POST['id'])) { 

       
echo $cart_handler->addToCart( $_POST['token'], $_POST['id']);

    } else {
        
        echo "Invalid id!";
     

      
    }

} else {
    
    echo "No token found!";
    

    
}







?>