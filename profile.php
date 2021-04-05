<?php
session_start();
if(!$_SESSION["register"]){
    header("location: index.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>

<h1>Howdy <?= "{$_SESSION['first_name']} {$_SESSION['last_name']} " ?></h1>
<p>Your Birthday is <?= $_SESSION["date"] ?></p>
<p>Your Email Address is <?= $_SESSION["email"] ?></p>
<p>I also know your password it is <?= $_SESSION["password"]?></p>

</body>
</html>