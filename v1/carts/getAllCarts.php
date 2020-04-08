

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
    <h1> Check out!</h1>
</center>
<hr>
</body>
</html>
<?php
include("../../objects/posts.php");
include("../../objects/users.php");
include("../../objects/carts.php");

$user_handler = new User($databaseHandler);
$cart_handler= new Carts($databaseHandler);
$post_handler= new Posts($databaseHandler);


$token =( !empty($_GET['token'] ) ? $_GET['token'] : "" );

if($user_handler->validateToken($token) === false){
    echo "<br>";
    echo "invalid token!";
    die;
} 


foreach($cart_handler->fetchUsersCart($token) as $cart){

     echo "<center>";

     
    
    echo "<span><h1>" . " " . $cart['title']. "</h1></br></span><br/>";
    echo "<span>  Description: </span>" . " " . $cart['content']. "<br/>";
    echo "<span><h3>  Description: </span>" . " " . $cart['price']. "  kr/st" . "</h3><br/>";
    echo "</br>";
    
    echo "</br>";
    echo "<a href='deleteCart.php?id={$cart['cartID']}&token={$token}'> Delete product from cart</a>";
    echo "<hr>";
    
     echo "</center>";


}
echo "<center>";
echo "<a href='checkout.php?token={$token}'>Checkout</a>";
echo "</center>";

?>