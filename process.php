<?php
session_start();
$is_valid_date = explode("-",$_POST["date"]);
$_SESSION["errList"] = [];
if(isset($_POST["register"])){

    for($i=0;$i<strlen($_POST["first_name"]);$i++) {
        if (is_numeric($_POST["first_name"][$i])) {
            $_SESSION["errList"][] = "<p class='err_styled'>Invalid First Name</p>";
            break;
        }//first name
    }

    for($i=0;$i<strlen($_POST["last_name"]);$i++) {
        if( is_numeric($_POST["last_name"][$i])){
            $_SESSION["errList"][] = "<p class='err_styled'>Invalid Last Name</p>";
            break;
        }//Last name
    }

    if(strlen($_POST["password1"]) < 6){
        $_SESSION["errList"][] = "<p class='err_styled'>Password should be more than 6 character</p>";
    }//password

    if($_POST["password2"] !== $_POST["password1"]){
        $_SESSION["errList"][] = "<p class='err_styled'>Password should be similar</p>";
    }//password

    if(isset($_POST["date"]) && !checkdate($is_valid_date[1],$is_valid_date["2"],$is_valid_date[0]) ){
        $_SESSION["errList"][] = "<p class='err_styled'>Invalid Date</p>";
    }//date

    if(!empty($_SESSION["errList"])){
        header("location: index.php");
    }else{
        $_SESSION["register"] = true;
        $_SESSION["first_name"] = FILTER_VAR($_POST["first_name"],FILTER_SANITIZE_STRIPPED);
        $_SESSION["last_name"] = FILTER_VAR($_POST["last_name"],FILTER_SANITIZE_STRIPPED);
        $_SESSION["password"] = crypt($_POST["password1"],'$5$round=5000$somestringforSalt$');
        $_SESSION["date"] = FILTER_VAR($_POST["date"],FILTER_SANITIZE_STRIPPED);
        $_SESSION["email"] = FILTER_VAR($_POST["email"],FILTER_SANITIZE_EMAIL);
        header("location: profile.php");
    }

}
else{
    header("location: index.php");
}
die();