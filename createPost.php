<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>
<center>
<h1> Creating a new product </h1>
<form method="GET" action="v1/posts/addPost.php">
            
            Title:<input type="text" name="title" placeholder="Product Title" /><br />
            Content:<textarea name="content" placeholder="Content" rows="1" cols="18"></textarea><br />
            Price:<input type="number" name="price" placeholder="Price"><br />
            <hr>
            <input type="submit" name="Add"/>
        </form>
</center>

<?php



?>
</body>
</html> 