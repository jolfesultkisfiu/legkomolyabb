<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Upcoming Events</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Event advertising website. Create your own events, or attend other people's events">
        <meta name="author" content="Gergo Toth, Robert Nagy">
        <meta name="robots" content="index, follow">
        <meta name="googlebot" content="notranslate">
        <meta name="language" content="english">
        <meta http-equiv="refresh" content="300"> <!--refresh the document every 30 seconds-->
        <!--MANDATORY OG TAGS-->
        <meta property="og:title" content="Events">
        <meta property="og:type" content="website">
        <meta property="og:image" content="../images/brandimage.png">
        <meta property="og:url" content="../../index.php">
        <!--EXTRA OG TAGS-->
        <meta property="og:description" content="Create your own events, or attend other people's events">
        <meta property="og:locale" content="en_US">
        <meta property="og:site_name" content="Events">
        
      
        <link rel="stylesheet" href="../css/navbarstyle.css">
        <link rel="stylesheet" href="../css/footerstyle.css">
        <link rel="stylesheet" href="../css/upcomingevents.css">
        <link rel="stylesheet" href="../css/upcomingeventsNEW.css">
    </head>
    <body id="upcomingEvents">
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

                if (isset($_SESSION["started"]) && $_SESSION["started"] === true) {
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

            
            <!--NEW VERSION-->

            <section class="upcoming-events-new-section">
                <h2 class="upcoming-events-header">Events You've Signed Up For</h2>
                <div class="event-article-container">
               
               <?php
                // upcoming_events.php
                require_once "../php/eventclass.php";



                   // Custom comparison function for sorting events by date and starting time
        function compareEvents($event1, $event2)
        {
            $date1 = $event1->getDate();
            $date2 = $event2->getDate();
            $startingTime1 = $event1->getStartingTime();
            $startingTime2 = $event2->getStartingTime();

            // Compare dates first
            if ($date1 < $date2) {
                return -1; // $event1 comes before $event2
            } elseif ($date1 > $date2) {
                return 1; // $event1 comes after $event2
            } else {
                // Dates are the same, compare starting times
                if ($startingTime1 < $startingTime2) {
                    return -1; // $event1 comes before $event2
                } elseif ($startingTime1 > $startingTime2) {
                    return 1; // $event1 comes after $event2
                } else {
                    return 0; // $event1 and $event2 are the same
                }
            }
        }

  
                // Retrieve and display all upcoming events
                // Example: Fetch events from database
               // $events = []; // Retrieve events from database or storage
              
                $numberedArrayForAttributes = [];
                
                $currentUser = $_SESSION["username"];

                $jsondata = file_get_contents("../json/events.json");
                $decoded = json_decode($jsondata,true);
       
       
                $usersjsondata = file_get_contents("../json/users.json");
                $usersdecoded = json_decode($usersjsondata,true);
       
                $foundUser = false;
                $signedUpEventsList = [];
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
                      
                    $signedUpEventsList = $key["signedUpEvents"];
                    break;
                   }
       
       
               }


                $events = [];

                foreach($decoded["events"] as $key => $value) {
                    $i = 0;
                   // echo $key . "<br>";
                   if($signedUpEventsList !== null && in_array($key, $signedUpEventsList))
                   {    
                        foreach($value as $key1 => $value1) {
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
                        $events[] = $event;

                   }
                   
                   // echo $event->generateEventArticle();
                }   
                // Sort the events array using the custom comparison function
                usort($events, 'compareEvents');
                foreach($events as $event) {
                    echo $event->generateEventArticle();
                }
                ?>

                    <!-- <article class="event-showcase-article-new">
                        <img src="../images/streetsoccer.jpg" class="event-thumbnail-display-new" alt="event thumnbail">
                        <div class="event-sneak-peek-new">
                            <h2 class="event-title-new">Street Soccer Match</h2>
                            <p class="event-short-description-new">Dive into the excitement of a friendly soccer tournament! Join us for an action-packed day of thrilling matches, delicious food, and vibrant community spirit. Don't miss out on the fun!</p>
                            <p class="instructions-to-view-details-new">Click on the double arrow to see more details</p>
                        
                        </div>
                        <a href="eventdetails.php" class="event-details-link-new" title="Event Details"></a>
                    </article>
                    <article class="event-showcase-article-new">
                        <img src="../images/gig.jpg" class="event-thumbnail-display-new" alt="event thumnbail">
                        <div class="event-sneak-peek-new">
                            <h2 class="event-title-new">22nd Youth Music Festival</h2>
                            <p class="event-short-description-new">Get ready to groove at our electrifying music festival! Experience a day filled with live performances from talented artists, delicious food trucks, and unforgettable moments with friends. Let the music carry you away!</p>
                            <p class="instructions-to-view-details-new">Click on the double arrow to see more details</p>
                        
                        </div>
                        <a href="eventdetails.php" class="event-details-link-new" title="Event Details"></a>
                    </article>
                    <article class="event-showcase-article-new">
                        <img src="../images/conference.jpg" class="event-thumbnail-display-new" alt="event thumnbail">
                        <div class="event-sneak-peek-new">
                            <h2 class="event-title-new">Investment Seminar</h2>
                            <p class="event-short-description-new">Unlock the secrets to financial success at our investment seminar! Join industry experts for insightful talks, practical tips, and valuable strategies to grow your wealth and secure your future. Don't miss this opportunity to take control of your financial destiny!</p>
                            <p class="instructions-to-view-details-new">Click on the double arrow to see more details</p>
                        
                        </div>
                        <a href="eventdetails.php" class="event-details-link-new" title="Event Details"></a>
                    </article>
                    <article class="event-showcase-article-new">
                        <img src="../images/artexhibition.jpg" class="event-thumbnail-display-new" alt="event thumnbail">
                        <div class="event-sneak-peek-new">
                            <h2 class="event-title-new">Local Art Exhibition</h2>
                            <p class="event-short-description-new">Step into a world of creativity and wonder at our art exhibition! Discover captivating works by talented artists, from vibrant paintings to intricate sculptures. Immerse yourself in the beauty of expression and be inspired by the power of art.</p>
                            <p class="instructions-to-view-details-new">Click on the double arrow to see more details</p>
                        
                        </div>
                        <a href="eventdetails.php" class="event-details-link-new" title="Event Details"></a>
                    </article>
                    <article class="event-showcase-article-new">
                        <img src="../images/party.jpg" class="event-thumbnail-display-new" alt="event thumnbail">
                        <div class="event-sneak-peek-new">
                            <h2 class="event-title-new">18th Birthday Party</h2>
                            <p class="event-short-description-new">Prepare for the ultimate celebration! Join us for a night of non-stop fun, music, and dancing at our extravagant party. With delicious drinks, exciting entertainment, and a vibrant atmosphere, it's the event of the year you won't want to miss!</p>
                            <p class="instructions-to-view-details-new">Click on the double arrow to see more details</p>
                        
                        </div>
                        <a href="eventdetails.php" class="event-details-link-new" title="Event Details"></a>
                    </article>
                    <article class="event-showcase-article-new">
                        <img src="../images/hiking.jpg" class="event-thumbnail-display-new" alt="event thumnbail">
                        <div class="event-sneak-peek-new">
                            <h2 class="event-title-new">Hiking Trip</h2>
                            <p class="event-short-description-new">Embark on an unforgettable adventure with our hiking trip! Explore breathtaking trails, majestic landscapes, and connect with nature. Whether you're a seasoned trekker or a novice explorer, join us for an exhilarating journey filled with breathtaking views and unforgettable experiences.</p>
                            <p class="instructions-to-view-details-new">Click on the double arrow to see more details</p>
                        
                        </div>
                        <a href="eventdetails.php" class="event-details-link-new" title="Event Details"></a>
                    </article> -->
                   
                </div>
               
               

            </section>



            <!-- OLD VERSION


            <section class="event-showcase-section">
                <h2>Upcoming Events</h2>
                <article class="event-showcase-article">
                    <img src="../images/party.jpg" class="event-thumbnail-display" alt="event thumnbail">
                    <div class="event-sneak-peek">
                        <h2 class="event-title">Event Title</h2>
                        <p class="event-short-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, autem fugit porro aliquid, ipsum enim placeat illo eaque asperiores veritatis deserunt. Excepturi corrupti molestias nostrum soluta asperiores qui, laboriosam debitis.</p>
                        <p class="instructions-to-view-details">Click on the double arrow to see more details</p>
                    
                    </div>
                    <a href="eventdetails.php" class="event-details-link" title="Event Details"></a>
                </article>
                <article class="event-showcase-article">
                    <img src="../images/hiking.jpg" class="event-thumbnail-display" alt="event thumnbail">
                    <div class="event-sneak-peek">
                        <h2 class="event-title">Event Title</h2>
                        <p class="event-short-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, autem fugit porro aliquid, ipsum enim placeat illo eaque asperiores veritatis deserunt. Excepturi corrupti molestias nostrum soluta asperiores qui, laboriosam debitis.</p>
                        <p class="instructions-to-view-details">Click on the double arrow to see more details</p>
                    
                    </div>
                    <a href="eventdetails.php" class="event-details-link" title="Event Details"></a>
                </article>
                <article class="event-showcase-article">
                    <img src="../images/conference.jpg" class="event-thumbnail-display" alt="event thumnbail">
                    <div class="event-sneak-peek">
                        <h2 class="event-title">Event Title</h2>
                        <p class="event-short-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, autem fugit porro aliquid, ipsum enim placeat illo eaque asperiores veritatis deserunt. Excepturi corrupti molestias nostrum soluta asperiores qui, laboriosam debitis.</p>
                        <p class="instructions-to-view-details">Click on the double arrow to see more details</p>
                        
                    </div>
                    <a href="eventdetails.php" class="event-details-link" title="Event Details"></a>
                </article>
               

            </section>   -->

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