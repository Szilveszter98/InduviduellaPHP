<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product</title>
</head>
<body>
<center>
<?php
// update product form 
$postID = ( !empty($_GET['id'] ) ? $_GET['id'] : -1 );

$token=(!empty($_GET['token']) ? $_GET['token'] : "");
 echo $token;
 echo $postID;
?>
<h1> Update product product </h1>
<form class="form" method="POST" action="v1/posts/updatePost.php?action=update&id=<?php echo $postID;?>&token=<?php echo $token;?> ">
            <input type="hidden" name="id" ID="id" value=<?php echo $postID ?> />
        Product name: <input type="text" name="title"  placeholder="Product Title" /><br />
          Content:  <textarea name="content" placeholder="content" rows="5" cols="30"></textarea><br />
            Price: <input type="number" name="price" placeholder="Price"><br />
           
            <hr>
            <input type="submit" name="Add" value="update" />
        </form>
</center>
</body>
</html>