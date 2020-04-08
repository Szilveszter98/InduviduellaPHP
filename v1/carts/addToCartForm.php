<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to cart</title>
</head>
<body>
<?php

//form to add cart

$postID=(isset($_GET['id']) ? $_GET['id'] : "");

$token=(isset($_GET['token']) ? $_GET['token'] : "");
echo "<center>";
print_r($token);
echo "<br>";
print_r($postID);
echo "<center>";
?>

<center>
<h1> Please copy and paste token to token and product id to product id  </h1>
<form method="POST" action="addToCart.php">
            
            Token:<input type="text" name="token" placeholder="Token" /><br />
            Product ID:<input type="text" name="id" placeholder="Product ID" /><br />
            
            <hr>
            <input type="submit" name="Add"/>
        </form>
</center>



    
</body>
</html>