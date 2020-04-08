<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

include("../../objects/posts.php");
include("../../objects/carts.php");
include("../../objects/users.php");
$user_handler = new User($databaseHandler);
$carts_object = new Carts($databaseHandler);


$token =(isset($_GET['token']) ? $_GET['token'] : '');





if(!empty($_GET['token'])) {

    
        $token = $_GET['token'];

        if($user_handler->validateToken($token) === false) {
            $return_object = new stdClass;
            $return_object->error = "Token is invalid";
            $return_object->errorCode = 1338;
            echo json_encode($return_object);
            die();
        }
        echo $carts_object->CheckOut($token);

} else {
    $return_object = new stdClass;
    $return_object->error = "No token found!";
    $return_object->errorCode = 1337;

    echo json_encode($return_object);
}

  // header("location:../../index.php");
   

?>
    
</body>
</html>