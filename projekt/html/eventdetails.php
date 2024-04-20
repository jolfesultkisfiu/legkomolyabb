<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Event Details</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Event advertising website. Create your own events, or attend other people's events">
        <meta name="author" content="Gergo Toth, Robert Nagy">
        <meta name="robots" content="index, follow">
        <meta name="googlebot" content="notranslate">
        <meta name="language" content="english">
        <meta http-equiv="refresh" content="3000"> <!--refresh the document every 30 seconds-->
        <!--MANDATORY OG TAGS-->
        <meta property="og:title" content="Events">
        <meta property="og:type" content="website">
        <meta property="og:image" content="../images/brandimage.png">
        <meta property="og:url" content="../../index.php">
        <!--EXTRA OG TAGS-->
        <meta property="og:description" content="Create your own events, or attend other people's events">
        <meta property="og:locale" content="en_US">
        <meta property="og:site_name" content="Events">
       
        <link rel="stylesheet" href="../css/eventdetails.css">
        <link rel="stylesheet" href="../css/navbarstyle.css">
        <link rel="stylesheet" href="../css/footerstyle.css">
    </head>
    <body>
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
                    echo '<li id="loginLi"><a href="logout.php">Log out</a></li>';
                }
                ?>
                <?php
                if(isset($_SESSION["started"])&&$_SESSION["started"]===true){
                    echo '<li id="registerLi"><a href="profile.php">Profile</a></li>';
                }
                ?>
                <?php
                if(!isset($_SESSION["started"])){
                    echo '<li id="loginLi"><a href="login.php">Log In</a></li>';
                }
                ?>
                <?php
                if(!isset($_SESSION["started"])){
                    echo '<li id="registerLi"><a href="register.php">Register</a></li>';
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
                                echo '<li id="loginLi"><a href="logout.php">Log out</a></li>';
                            }
                            ?>
                            <?php
                            if(isset($_SESSION["started"])&&$_SESSION["started"]===true){
                                echo '<li id="registerLi"><a href="profile.php">Profile</a></li>';
                            }
                            ?>
                            <?php
                            if(!isset($_SESSION["started"])){
                                echo '<li id="loginLi"><a href="login.php">Log In</a></li>';
                            }
                            ?>
                            <?php
                            if(!isset($_SESSION["started"])){
                                echo '<li id="registerLi"><a href="register.php">Register</a></li>';
                            }
                            ?>




                        </ul>

                    </div>
                </li>
            </ul>

        </nav>
    </header>
        <main>
        <?php
          
             // upcoming_events.php
             require_once "../php/eventclass.php";
            // Check if event ID is provided in the URL
            if (isset($_GET['id'])) {
                $eventId = $_GET['id'];

                $currentUser = $_SESSION["username"];

                $usersjsondata = file_get_contents("../json/users.json");
                $usersdecoded = json_decode($usersjsondata,true);
       
                $foundUser = false;
                $currentSignedUps = [];
               foreach($usersdecoded as &$key) {
                 //  var_dump($key);
                   //var_dump($key["signedUpEvents"]);
                   foreach($key as &$key2) {
                  //   var_dump($key2);
                     if($key2 === $currentUser) {
                   //   echo "BINGO";
                       $foundUser = true;
                     }
                   }
                   if($foundUser) {
                      
                     $currentSignedUps = $key["signedUpEvents"];
                   }
       
       
               }
              

                // Retrieve event details based on event ID (e.g., from database or storage)
               
                $jsondata = file_get_contents("../json/events.json");
        
                $decoded = json_decode($jsondata,true);
                $numberedArrayForAttributes = [];

                $event = null;
            //   print_r($decoded["events"][$eventId]); // Assuming a function to retrieve event details by ID
                $i = 0;
                foreach($decoded["events"][$eventId] as $key1 => $value1) {
                    // echo $key . "->>". $value . "<br>";
                    $numberedArrayForAttributes[$i] = $value1;
                    $i++;
                }
                $title = $numberedArrayForAttributes[0];
                $details = $numberedArrayForAttributes[1];
                $date = $numberedArrayForAttributes[2];
                $startingTime = $numberedArrayForAttributes[3];
                $thumbnail = $numberedArrayForAttributes[4];
                $location = $numberedArrayForAttributes[5];
                $numberOfPeopleSignedUp = $numberedArrayForAttributes[6];

            // Create Event object using extracted data
                $event = new Event($title, $details, $date, $startingTime, $thumbnail, $location, $numberOfPeopleSignedUp);
                
                    // Display event details
              //  print_r($event);

                if ($event) {

                    if($currentSignedUps !== null && in_array($eventId,$currentSignedUps)) {
                        echo $event->generateEventDetailsHTMLSignedUp();
                    }
                    else {
                        echo $event->generateEventDetailsHTML();
                    }
                    
                
                    // Display other event details as needed
                } else {
                    echo '<p>Event not found.</p>';
                }
            } else {
                echo '<p>Invalid request.</p>';
            }
        ?>

            <!-- <div class="event-details-container">
                <img src="../images/hiking.jpg" alt="Event thumbnail">
                <h2>Hiking Tour with friends at the local mountain</h2>
                <div class="event-info">
                    <p class="detailed-info-paragraph">
                        Discover the beauty of the great outdoors on our immersive hiking trip! Escape the hustle and bustle of daily life as we venture into the heart of nature's wonders. With expert guides leading the way, you'll traverse scenic trails, winding through lush forests, towering mountains, and serene lakeshores. Along the way, soak in the tranquility of pristine landscapes, breathe in the fresh mountain air, and marvel at panoramic vistas that stretch as far as the eye can see. Whether you're seeking a thrilling challenge or a peaceful retreat, there's something for everyone on this expedition. As the sun sets, gather around a crackling campfire to share stories, laughter, and a sense of camaraderie with fellow adventurers. With hearty meals cooked over an open flame and cozy nights spent under the stars, this hiking trip promises unforgettable memories that will last a lifetime. So lace up your boots, pack your sense of adventure, and join us for an unforgettable journey into the wilderness!
                 
                    </p>
                    <p class="starting-time-paragraph">Starting time: %d:%d</p>
                    <p class="starting-date-paragraph">Event Date: (mm/dd/yyyy) : 04/01/2024</p>
                    <p class="event-location-paragraph">Location: Example street, sample city 2423</p>
                   
                </div>
                <form action="../php/signupforevent.php" id="eventSignupForm">
                    <input type="submit" value="Sign up for this event">
                </form>
            </div> -->

            <script src="../js/paneldisplay.js"></script>
        </main>
         <!--footer starts here-->
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
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href="upcomingevent.php">Upcoming Events</a></li>
                        <li><a href="contact.php">Contact Us</a></li>

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