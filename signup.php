<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webbshop</title>
</head>
<body>
   <!-- Inputs to registeration -->

<center>
<h1> Please register an account!</h1>    

<form method="POST" action="v1/users/addUser.php">
Username:<br />
<input type="text" name="username" required>
<br />
First name:<br /> 
<input type="text" name="f.name" required>
<br />
Last name: <br />
<input type="text" name="l.name" required>
<br />

Password: <br />
<input type="password" name="password"required>
<br />
E-mail: <br />
<input type="email" name="email" required>
<br />
<hr>
<input  type="submit" value="Register" /></b>
</form>

</center>
</body>
</html>