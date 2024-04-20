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
                    <img src="../images/RobertNagyImage.jpg" alt="Your profile picture" class="profile-pic-img">
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
            <span class="home-span">
                <a href="../php/newsletter" class="home-anchor">You are currently <b>Subscribed</b> to our newsletter</a>
           
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