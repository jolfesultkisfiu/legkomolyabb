<?php
$errors=[];
include ("../php/Templates/User.php");
if(isset($_POST["register"])){
    $username=$_POST["username"];
    $password1=$_POST["password1"];
    $password2=$_POST["password2"];
    if(trim($username)===""){
        $errors[]="empty username";
    }
    if(trim($password1)===""){
        $errors[]="empty password1";
    }
    if(trim($password2)===""){
        $errors[]="empty password2";
    }
    if($password1 !== "" && $password2!== "" &&$password1!==$password2){
        $errors[]="mismatch";
    }
    if(User::usernameTaken($username)){
        $errors[]="taken";
    }
    if(count($errors)===0){
        User::registerUser($username,password_hash($password1,PASSWORD_DEFAULT));
        header("Location: login.php");
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
    <title>Register Form</title>
    <link rel="stylesheet" href="../css/loginstyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <div class="wrapper">
        <form method="post">
            <h1>Register</h1>
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
                <input type="password" placeholder="Password" name="password1" required>
                <i class='bx bxs-lock-alt'></i>    
            </div>
            <?php
            if(in_array("empty password1",$errors)){
                echo '<div class="error center">Üres jelszót adtál meg</div>';
            }
            ?>
            <div class="input-box">
                <input type="password" placeholder="Password again" name="password2" required>
                <i class='bx bxs-lock-alt'></i>    
            </div>
            <?php
            if(in_array("empty password2",$errors)){
                echo '<div class="error center">Üres jelszót adtál meg</div>';
            }
            ?>
            <div class="remember-forgot">
                <p>Don't wanna register? <a href="../../index.php">Home</a></p>
            </div>
            <button type="submit" class="btn" name="register">Register</button>
            <?php
            if(in_array("mismatch",$errors)){
                echo '<div class="error center">Sikertelen regisztráció, nem egyezik a két jelszó!</div>';
            }
            ?>

            <div class="register-link">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
            <?php
            if(in_array("taken",$errors)){
                echo '<div class="error center">Sikertelen regisztráció, foglalt a felhasználónév!</div>';
            }
            ?>

        </form>
    </div>
</body>
</html>

