<?php
$errors=[];
$success=false;
include ("../php/Templates/User.php");
if(isset($_POST["login"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    if(trim($username)===""){
        $errors[]="empty username";
    }
    if(trim($password)===""){
        $errors[]="empty password1";
    }
    if(!User::login($username,$password)){
        $errors[]="mismatch";
    }
    if(count($errors)===0){
        session_start();
        $_SESSION["started"]=true;
        header("Location: ../../index.php");
        die();
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COmpatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../css/loginstyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <div class="wrapper">
        <form method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="username" required>
                <i class='bx bxs-user'></i>
            </div>
            <?php
            if(in_array("empty username",$errors)){
                echo '<div class="error center">Üres felhasználó nevet adtál meg</div>';
            }
            ?>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required>
                <i class='bx bxs-lock-alt'></i>    
            </div>
            <?php
            if(in_array("empty password1",$errors)){
                echo '<div class="error center">Üres jelszót adtál meg</div>';
            }
            ?>
            <div class="remember-forgot">
                <p>Don't wanna login? <a href="../../index.php">Home</a></p>
            </div>
            <button type="submit" class="btn" name="login">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
            <?php
            if(in_array("mismatch",$errors)){
                echo '<div class="error center">Rossz jelszót vagy felhasználónevet adtál meg!</div>';
            }
            ?>

        </form>
    </div>
</body>
</html>