<?php
// includes

    include("../../objects/users.php");

    $user_handler = new User($databaseHandler);
// register user 
    echo $user_handler->addUser($_POST['username'], $_POST['password'], $_POST['email']);
    echo "<hr>";
    echo "Du är nu registrerad!";
    echo "<br>";
    echo "<a href='../../index.php'>Back to login site</a>";
?>