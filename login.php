<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Inputs to login -->

<center>
 
<h1>Please log in <h1> 

<h2 >Please enter your username and password</h2>
  
<form method="POST" action="v1/users/userLogin.php">
Username:<br>
<input type="text" name="username" required><br/>
Password:<br>
<input type="password" name="password" required><br />

<hr>

<input class="submit" type="submit" value="Log in" />

<p>Dont have an account?</p>
<b>
<a  href="signupForm.php">Sign up</a>
</b>


</form>
</center>
</body>
</html>