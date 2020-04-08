<?php


// includes
include("../../objects/users.php");

    $user_handler = new User($databaseHandler);

// login
   echo "<center>";
   echo "<h1> Welcome " . $_POST['username'] . "!</h1><br>";
   
    $token = json_decode($user_handler->loginUser($_POST['username'], $_POST['password']))->token;

    echo "<hr>";
    echo "<a href= '../posts/getAllPosts.php?id={$token}'>To the products</a>";
    echo "<br>";

// watching if user is admin
    
    $isAdmin = $user_handler->isAdmin($token);
    
    if($isAdmin === true) {
       
        echo "</br>";
        echo "<a href='../../createPost.php'> Add new product </a>";
        
        die;
    }
 echo "</center>";

 
?>