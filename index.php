<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>


<form action="process.php" method="post">
    <input type="hidden" name="register">
    <input type="email" name="email" placeholder="Email Address..." required>
    <input type="text" name="first_name" placeholder="First Name"  required>
    <input type="text" name="last_name" placeholder="Last Name"  required>
    <input type="password" name="password1" placeholder="Password"  required>
    <input type="password" name="password2" placeholder="Confirm Password"  required>
    <label>
       <p>Birthdate:</p><input type="date" name="date"  required>
    </label>
    <input type="submit">
</form>

<div class="errorlist">
    <?php
        if(isset($_SESSION["errList"]) && !empty($_SESSION["errList"])){
            foreach ($_SESSION["errList"] as $errVal){
                echo $errVal;
            }
            $_SESSION["errList"] = [];
        }
    ?>
</div>

</body>
</html>

<?php die();?>