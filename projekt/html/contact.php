<?php

$errors=[];
$success=false;
if(isset($_POST["sub"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $message=$_POST["message"];

    if(trim($name)===""){
        $errors[]="empty name";
    }
    if(trim($email)===""){
        $errors[]="empty email";
    }
    if(trim($message)===""){
        $errors[]="empty message";
    }
    if(strpos($email,"@")===false){
        $errors[]="bad email";
    }

    if(count($errors)===0){
        include ("../php/Templates/Message.php");
        new Message($name,$email,$message);
        $success=true;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Contact us</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Event advertising website. Create your own events, or attend other people's events">
        <meta name="author" content="Gergo Toth, Robert Nagy">
        <meta name="robots" content="index, follow">
        <meta name="googlebot" content="notranslate">
        <meta name="language" content="english">
        <meta http-equiv="refresh" content="300"> <!--refresh the document every 300 seconds-->
        <!--MANDATORY OG TAGS-->
        <meta property="og:title" content="Events">
        <meta property="og:type" content="website">
        <meta property="og:image" content="../images/brandimage.png">
        
        <!--EXTRA OG TAGS-->
        <meta property="og:description" content="Create your own events, or attend other people's events">
        <meta property="og:locale" content="en_US">
        <meta property="og:site_name" content="Events">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../css/contact.css">
        <link rel="stylesheet" href="../css/navbarstyle.css">
        <link rel="stylesheet" href="../css/footerstyle.css">
        
        

    </head>
    <body id="contact">
    <header>
        <nav>
            <ul class="nav-container">
                <li data-page="homepage"><a href="../../index.php">Home</a></li>
                <li data-page="upcomingEvents"><a href="upcomingevent.php">Upcoming Events</a></li>
                <?php
                if(isset($_SESSION["started"])&&$_SESSION["started"]===true){
                    echo '<li data-page="createEvent"><a href="createevent.php">Create Event</a></li>';
                }
                ?>


                <li class="search-bar-li">


                    <a class="search-anchor" href="../../index.php">Search for an Event</a>


                    <div class="search-bar-container">
                        <div class="search-bar">
                            <div class="search-icon"></div>
                            <form action="../php/search.php" method="post" class="search-form">
                                <input class="search-box" type="search" name="search" placeholder="Search for an event...">
                                <button  class="search-button" type="submit" value="Search">Search</button>

                            </form>

                        </div>
                    </div>
                </li>
                <?php

                if(isset($_SESSION["started"])&&$_SESSION["started"]===true){
                    echo '<li class="loginLi"><a href="logout.php">Log out</a></li>';
                }
                ?>
                <?php
                if(isset($_SESSION["started"])&&$_SESSION["started"]===true){
                    echo '<li class="registerLi"><a href="profile.php">Profile</a></li>';
                }
                ?>
                <?php
                if(!isset($_SESSION["started"])){
                    echo '<li class="loginLi"><a href="login.php">Log In</a></li>';
                }
                ?>
                <?php
                if(!isset($_SESSION["started"])){
                    echo '<li class="registerLi"><a href="register.php">Register</a></li>';
                }
                ?>




                <li class="dropdown-li">
                    <div class="dropdown-menu" id="dropdownHamburger">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="dropdown-panel" id="dropdownPanelId">
                        <ul class="dropdown-panel-list" id="dropdownPanelList">

                            <li class="mobile-search-li">
                                <div class="search-bar-container" id="panelSearchBar">
                                    <div class="search-bar">
                                        <!--<div class="search-icon"></div>-->
                                        <form action="../php/search.php" method="post" class="search-form">
                                            <input class="search-box" type="search" name="search" placeholder="Search for an event...">
                                            <button  class="search-button" type="submit" value="Search"></button>

                                        </form>

                                    </div>
                                </div>
                            </li>
                            <li>  <a class="search-anchor" href="../../index.php">Search for an Event</a>
                            </li>
                            <li data-page="upcomingEvents"><a href="upcomingevent.php">Upcoming Events</a></li>
                            <?php
                            if(isset($_SESSION["started"])&&$_SESSION["started"]===true){
                                echo ' <li data-page="createEvent"><a href="createevent.php">Create Event</a></li>';
                            }
                            ?>



                            <?php

                            if(isset($_SESSION["started"])&&$_SESSION["started"]===true){
                                echo '<li class="loginLi"><a href="logout.php">Log out</a></li>';
                            }
                            ?>
                            <?php
                            if(isset($_SESSION["started"])&&$_SESSION["started"]===true){
                                echo '<li class="registerLi"><a href="profile.php">Profile</a></li>';
                            }
                            ?>
                            <?php
                            if(!isset($_SESSION["started"])){
                                echo '<li class="loginLi"><a href="login.php">Log In</a></li>';
                            }
                            ?>
                            <?php
                            if(!isset($_SESSION["started"])){
                                echo '<li class="registerLi"><a href="register.php">Register</a></li>';
                            }
                            ?>




                        </ul>

                    </div>
                </li>
            </ul>

        </nav>
    </header>
        <main>
            <section class="contact">
                <div class="content">
                    <h2>Contact Us</h2>
                    <p>We're delighted that you've reached out to us! Whether you have inquiries, feedback, or simply want to share your thoughts, please feel free to contact us using the following details:</p>
                </div>
                <div class="container1">
                    <div class="contactInfo">
                        <div class="box">
                            <div class="icon">
                                <i class='bx bxs-map'></i>
                            </div>
                            <div class="text">
                                <h3>Address</h3>
                                <p>Szeged, Hungary, 6724 Sample Street 24.</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon">
                                <i class='bx bx-phone' ></i>
                            </div>
                            <div class="text">
                                <h3>Phone</h3>
                                <p>+36 12 345 6789</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon">
                                <i class='bx bxs-envelope' ></i>
                            </div>
                            <div class="text">
                                <h3>Email</h3>
                                <p>sample@sample.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="contactForm">
                        <form method="post">
                            <h2>
                                Send Message
                            </h2>
                            <div class="inputBox">
                                <input type="text" name="name" required placeholder="Full name">
                            </div>
                            <?php
                            if(in_array("empty name",$errors)){
                                echo '<div class="error center">Üres nevet adtál meg</div>';
                            }
                            ?>
                            <div class="inputBox">
                                <input type="text" name="email" required placeholder="Email">
                                
                            </div>
                            <?php
                            if(in_array("empty email",$errors)){
                                echo '<div class="error center">Üres emailt adtál meg</div>';
                            }
                            ?>
                            <?php
                            if(in_array("bad email",$errors)){
                                echo '<div class="error center">Rossz az email formátuma!</div>';
                            }
                            ?>
                            <div class="inputBox">
                                <textarea  name="message" placeholder="Type your message" required></textarea>
                            </div>
                            <?php
                            if(in_array("empty message",$errors)){
                                echo '<div class="error center">Üres üzenetet nevet adtál meg</div>';
                            }
                            ?>
                            <div class="inputBox">
                                <input type="submit" name="sub" value="Send">
                            </div>
                            <?php
                            if($success){
                                echo '<div class="success center">Sikeres üzenetküldés!</div>';
                            }
                            ?>
                        </form>
                        
                    </div>
                </div>
            </section>
        <script src="../js/paneldisplay.js"></script>
        </main>
        <footer>
            <div class="footer-container">
                <div class="footer-brand-image-div">
                    <img src="../images/brandimage.png" alt="Brand logo">
                    <p>Copyright &COPY; 2024</p>
                </div>
                <div class="horizontal-divide"></div>
                <div class="footer-links-div">
                    <h2>Useful Links</h2>
                    <ul>
                        <li data-page="homepage"><a href="../../index.php">Home</a></li>
                        <li data-page="upcomingEvents"><a href="upcomingevent.php">Upcoming Events</a></li>
                        <li data-page="contact"><a href="contact.php">Contact Us</a></li>

                    </ul>
                </div>
                <div class="horizontal-divide"></div>
                <div class="footer-address-div">
                    <h2>Address</h2>
                    <address>
                        <div>
                            <img src="../images/mappin.png" alt="Location pin">
                            <p>Szeged, Hungary, 6724 Sample Street 24.</p>
                        </div>
                        <div>
                            <img src="../images/emailicon.png" alt="Email icon">
                            <p>sample@sample.com</p>
                        </div>
                        <div>
                            <img src="../images/phoneicon.png" alt="Phone icon">
                            <p>+36 12 345 6789</p>
                        </div>
                    </address>
                </div>
            </div>
            
        </footer>
        <!--footer ends here-->
    </body>
</html>