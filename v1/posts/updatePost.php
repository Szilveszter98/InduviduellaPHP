
<?php
include("../../objects/posts.php");
include("../../objects/users.php");

$post_handler = new Posts($databaseHandler);
$user_handler = new User($databaseHandler);

$postID = ( !empty($_GET['id'] ) ? $_GET['id'] : -1 );

$token=(!empty($_GET['token']) ? $_GET['token'] : "");



if(!empty($_GET['token'])) {

    if(!empty($_GET['id'])) { 

        $token = $_GET['token'];


        
    
  

        if($user_handler->validateToken($token) === false) {
            $retObject = new stdClass;
            $retObject->error = "Token is invalid";
            $retObject->errorCode = 1338;
            echo json_encode($retObject);
            die();
        }

        $post_handler->updatePost($_POST);


    } else {
        $retObject = new stdClass;
        $retObject->error = "Invalid id!";
        $retObject->errorCode = 1336;

        echo json_encode($retObject);
    }

} else {
    $retObject = new stdClass;
    $retObject->error = "No token found!";
    $retObject->errorCode = 1337;

    echo json_encode($retObject);
}
echo "The product has been updated";
echo "<a href='../../index.php?'> back to index </a>";


?>