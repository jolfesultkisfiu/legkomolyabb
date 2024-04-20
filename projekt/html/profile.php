<?php
include ("../php/Templates/User.php");
session_start();
$username=$_SESSION["username"];
$subbed=User::getIsSubscribed($username);
$errors=[];
if(isset($_POST["sub"])){
    $email=$_POST["email"];

    if(count($errors)===0){
        User::setEmail($email,$username);
        User::setIsSubscribed($username);
        $subbed=User::getIsSubscribed($username);
    }

}
if(isset($_POST["unsub"])){
    User::setIsSubscribed($username);
    $subbed=User::getIsSubscribed($username);
}


//echo $username;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
   <title>Profile</title>

   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="Event advertising website. Create your own events, or attend other people's events">
   <meta name="author" content="Gergo Toth, Robert Nagy">
   <meta name="robots" content="index, follow">
   <meta name="googlebot" content="notranslate">
   <meta name="language" content="english">
 
   <meta property="og:title" content="Events">
   <meta property="og:type" content="website">
   <meta property="og:image" content="../images/brandimage.png">
   <meta property="og:url" content="createevent.php">
   <!--EXTRA OG TAGS-->
   <meta property="og:description" content="Create your own events, or attend other people's events">
   <meta property="og:locale" content="en_US">
   <meta property="og:site_name" content="Events">
  
 
  
   <link rel="stylesheet" href="../css/profile.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  
</head>
<body>

    <section class="main-profile-hero">
        <h1 class="main-header">Your Profile</h1>
   
        <div class="wrapper">
            <div class="data-container">
                <div class="profile-pic-wrapper">
                   
                    <img src= <?php
                       // session_start();
                        $currentUser = $_SESSION["username"];

                        $usersjsondata = file_get_contents("../json/users.json");
                        $usersdecoded = json_decode($usersjsondata,true);
                    
                         $foundUser = false;
                        $currentPFPPath = "";
                       foreach($usersdecoded as &$key) {
                         //  var_dump($key);
                           //var_dump($key["signedUpEvents"]);
                           foreach($key as &$key2) {
                          //   var_dump($key2);
                             if($key2 === $currentUser) {
                           //   echo "BINGO";
                               // echo "<br><br>" . $key2 . "<br><br>";
                               // $key["image"] = $fetchPath;
                                $foundUser = true;
                             }
                           }
                           if($foundUser) {
                                $currentPFPPath = $key["image"];
                                echo $currentPFPPath;
                                //echo `<img src="$currentPFPPath" alt="Your profile picture" class="profile-pic-img">`;
                                break;
                             }
                       
                    
                    
                       }
                    ?> alt="Your profile picture" class="profile-pic-img">
                    <form action="../php/updateProfilePic.php" method="post"  enctype="multipart/form-data" >
                    
                        <div>
                            <label for="profilePicture">Choose Profile Picture:</label>
                            <input type="file" id="profilePicture" name="profilePicture" accept="image/*" required>
                        </div>
                        <div>
                            <button type="submit">Upload Picture</button>
                        </div>
                
                
                    </form>

                </div>
                <div class="vertical-divide"></div>
                <div class="profile-data">
                    <p class="name-paragraph">Your name</p>
                    <p class="inform">If you wish, you can change your password below:</p>
                    <form action="../php/changePassword.php" method="post">

                        <div>
                            <!-- <label for="oldPassword">Old Password:</label> -->
                            <div class="input-box">
                                <input type="password" placeholder="Old Password" name="password1" required>
                                <i class='bx bxs-lock-alt'></i>    
                            </div>
                        </div>
                        <div>
                            <!-- <label for="newPassword">New Password:</label> -->
                            <div class="input-box">
                                <input type="password" placeholder="New Password" name="password1" required>
                                <i class='bx bxs-lock-alt'></i>    
                            </div>
                        </div>
                        <div>
                            <!-- <label for="confirmPassword">Confirm New Password:</label> -->
                            <div class="input-box">
                                <input type="password" placeholder="Confirm Password" name="password1" required>
                                <i class='bx bxs-lock-alt'></i>    
                            </div>
                        </div>
                        <div>
                            <button type="submit">Change Password</button>
                        </div>
                    </form>
                </div>
               
            </div>
            <div class="horizontal-div"></div>
            <div class="delete-container">
                <h2>Delete Account</h2>
            
                <form id="deleteAccountForm" action="delete_account.php" method="post">
                    <p>Are you sure you want to delete your account? This action cannot be undone.</p>
                    <button type="button" class="delete-button" onclick="confirmDelete()">Delete My Account</button>
                </form>
            </div>
            <div class="horizontal-div"></div>
            <span class="view-events-span">
                <a href="usersignedevents.php" class="view-events-anchor">View My Events</a><br>
            </span>
            <span class="home-span">
                <a href="../../index.php" class="home-anchor">Go back to <b>Home</b></a>
           
            </span>
            <div class="home-span">
                <?php
                if($subbed===false&&!isset($_POST["change"])){
                    echo '<span class="home-anchor">You are currently <b>Not Subscribed</b> to our newsletter</span>';
                    echo '<form method="post"><button  type="submit" name="change">Click here to change that!</button></form>';
                }
                if(isset($_POST["change"])){
                    echo '<form method="post"><div class="input-box">
                                <input type="email" placeholder="Enter your email" name="email" required>                         
                            </div>
                            <button type="submit" name="sub">Subscribe</button>
                            </form>';


                }
                if($subbed===true){
                    echo '<span  class="home-anchor">You are currently <b>Subscribed</b> to our newsletter</span>';
                    echo '<form method="post"><button  type="submit" name="unsub">Click here to change that!</button></form>';
                }


                ?>


           
            </span>
            
            
            <script>
                function confirmDelete() {
                    if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
                        document.getElementById("deleteAccountForm").submit();
                    }
                }
            </script>
        </div>
    </section>
</body>
</html>