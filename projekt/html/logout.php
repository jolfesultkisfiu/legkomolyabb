<?php
session_start();
if(isset($_SESSION["started"])){
    $_SESSION["started"]=false;
    session_destroy();
}

header("Location: login.php");
die();

?>