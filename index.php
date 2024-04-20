<?php
session_start();
include ("projekt/php/Templates/Filter.php");
$arr=Filter::filter("anytime","any","any","any","");
if(isset($_SESSION["started"])&&$_SESSION["started"]===true){
   // echo $_SESSION["started"];
}

if(isset($_POST["search"])){

    $time=$_POST["time"];
    $location=$_POST["location"];
    $type=$_POST["type"];
    $music=$_POST["music"];
    $search=$_POST["searched"];
    $arr=Filter::filter($time,$location,$type,$music,$search);
   // print_r($arr);

}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Homepage</title>

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
        <meta property="og:image" content="projekt/images/brandimage.png">
        <meta property="og:url" content="index.php">
        <!--EXTRA OG TAGS-->
        <meta property="og:description" content="Create your own events, or attend other people's events">
        <meta property="og:locale" content="en_US">
        <meta property="og:site_name" content="Events">
       
        <link rel="stylesheet" href="projekt/css/homepage.css">
        <link rel="stylesheet" href="projekt/css/navbarstyle.css">
        <link rel="stylesheet" href="projekt/css/footerstyle.css">
        <link rel="stylesheet" href="projekt/css/upcomingevents.css">
        <link rel="stylesheet" href="projekt/css/upcomingeventsNEW.css">
        

    </head>
    <body id="homepage">
        <header>
            <nav>
                <ul class="nav-container">
                    <li data-page="homepage"><a href="index.php">Home</a></li>
                    <li data-page="upcomingEvents"><a href="projekt/html/upcomingevent.php">Upcoming Events</a></li>
                    <?php
                    if(isset($_SESSION["started"])&&$_SESSION["started"]===true){
                       echo '<li data-page="createEvent"><a href="projekt/html/createevent.php">Create Event</a></li>';
                    }
                    ?>


                    <li class="search-bar-li">

                            
                        <a class="search-anchor" href="index.php">Search for an Event</a>
                       

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
                        echo '<li class="loginLi"><a href="projekt/html/logout.php">Log out</a></li>';
                    }
                    ?>
                    <?php
                    if(isset($_SESSION["started"])&&$_SESSION["started"]===true){
                        echo '<li class="registerLi"><a href="projekt/html/profile.php">Profile</a></li>';
                    }
                    ?>
                    <?php
                    if(!isset($_SESSION["started"])){
                        echo '<li class="loginLi"><a href="projekt/html/login.php">Log In</a></li>';
                    }
                    ?>
                    <?php
                    if(!isset($_SESSION["started"])){
                        echo '<li class="registerLi"><a href="projekt/html/register.php">Register</a></li>';
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
                                <li>  <a class="search-anchor" href="index.php">Search for an Event</a>
                                </li>
                                <li data-page="upcomingEvents"><a href="projekt/html/upcomingevent.php">Upcoming Events</a></li>
                                <?php
                                if(isset($_SESSION["started"])&&$_SESSION["started"]===true){
                                    echo ' <li data-page="createEvent"><a href="projekt/html/createevent.php">Create Event</a></li>';
                                }
                                ?>



                                <?php
                                if(isset($_SESSION["started"])&&$_SESSION["started"]===true){
                                    echo '<li class="loginLi"><a href="projekt/html/logout.php">Log out</a></li>';
                                }
                                ?>
                                <?php
                                if(isset($_SESSION["started"])&&$_SESSION["started"]===true){
                                    echo '<li class="loginLi"><a href="projekt/html/profile.php">Profile</a></li>';
                                }
                                ?>
                                <?php
                                if(!isset($_SESSION["started"])){
                                    echo '<li class="loginLi"><a href="projekt/html/login.php">Log In</a></li>';
                                }
                                ?>
                                <?php
                                if(!isset($_SESSION["started"])){
                                    echo '<li class="registerLi"><a href="projekt/html/register.php">Register</a></li>';
                                }
                                ?>



                            
                            </ul>
                        
                        </div>
                    </li>
                </ul>
    
            </nav>
            </header>
        <main>
           
            <!--section for the main search bar and filters-->
            <section class="main-search-section">
            <h1 class="caption">Welcome!</h1>
            <div class="container">
                <form method="post" >
                    <div class="search-bar1">
                        <input type="text" placeholder="Search event" name="searched">
                        <button type="submit" name="search"><img src="projekt/images/search.png" alt="search icon"></button>
                    </div>

                <div class="break"></div>
                <div class="filters">
                    <select class="filter" name="time">
                        <option value="today">Today</option>
                        <option value="tomorrow">Tomorrow</option>
                        <option value="week">This week</option>
                        <option value="month">This month</option>
                        <option value="anytime" selected>Anytime</option>
                      </select>
                    <select class="filter" name="location">
                        <option value="szeged">Szeged</option>
                        <option value="debrecen">Debrecen</option>
                        <option value="budapest">Budapest</option>
                        <option value="pécs">Pécs</option>
                        <option value="any" selected>Any</option>
                      </select>
                    <select class="filter" name="type">
                        <option value="sport">Sport events</option>
                        <option value="festival">Festivals</option>
                        <option value="concert">Concerts</option>
                        <option value="theatre">Theatre & Comedy</option>
                        <option value="any" selected>Any</option>
                      </select>
                    <select class="filter" name="music">
                        <option value="techno">Techno</option>
                        <option value="disco">Disco</option>
                        <option value="classical">Classical</option>
                        <option value="rock">Rock</option>
                        <option value="any" selected>Any</option>
                      </select>
                </div>
                </form>
                <div class="break"></div>
            </div>
            </section>

         

            
            <section class="upcoming-events-new-section">
                <?php

                require_once "projekt/php/eventclass.php";
  

                if(empty($arr["events"])){
                    echo '<h2 class="upcoming-events-header">There are no events that match your filters.</h2>';
                }else{
                    echo '<h2 class="upcoming-events-header">Listed Events</h2>';

                    echo '<div class="event-article-container">';
                   //print_r($arr["events"]);
                    foreach ($arr["events"] as $key => $value){

                        $eventId = $key;
                        $i = 0;
                        $numberedArrayForAttributes=[];
                    // echo $key . "<br>";
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
                       // print_r($event);
                      //  $event->setEventId($eventId);
                        echo $event->generateEventArticleFromIndex();

                    //     $src="";
                    //     $title="";
                    //     $details="";
                    //     $i=0;
                    //     foreach ($data as $d){

                    //         if($i===0){
                    //             $title=$d;
                    //         }
                    //         if($i===1){
                    //             $details=$d;
                    //         }
                    //         if($i===4){
                    //             $src=$d;
                    //         }
                    //         $i++;
                    //     }
                    //     $title=str_replace("'"," ",$title);
                    //     $details=str_replace("'"," ",$details);
                    //     $src=explode("/",$src);
                    //     $src[0]="projekt";
                    //     $src[1]="/images/";
                    //     $src = implode("", $src);

                    //     echo '<article class="event-showcase-article-new">
                    //     <img src="'.$src.'" class="event-thumbnail-display-new" alt="event thumnbail">
                    //     <div class="event-sneak-peek-new">
                    //         <h2 class="event-title-new">'.$title.'</h2>
                    //         <p class="event-short-description-new">'.$details.'</p>
                    //         <p class="instructions-to-view-details-new">Click on the double arrow to see more details</p>
                    //     </div>
                    //     <a href="projekt/html/eventdetails.php" class="event-details-link-new" title="Event Details"></a>
                    // </article>';
                    }
                }



                    echo '</div>';


                ?>

                
               
               

            </section>

            <!--
>>>>>>> 3d0c652cb63e244f1411116f9308048d1fc8a16d
            <section class="event-showcase-section">               
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
               

            </section>
            -->
            <script src="projekt/js/paneldisplay.js"></script>
        </main>
         <!--footer starts here-->
        <footer>
            <div class="footer-container">
                <div class="footer-brand-image-div">
                    <img src="projekt/images/brandimage.png" alt="Brand logo">
                    <p>Copyright &COPY; 2024</p>
                </div>
                <div class="horizontal-divide"></div>
                <div class="footer-links-div">
                    <h2>Useful Links</h2>
                    <ul>
                        <li data-page="homepage"><a href="index.php">Home</a></li>
                        <li data-page="upcomingEvents"><a href="projekt/html/upcomingevent.php">Upcoming Events</a></li>
                        <li data-page="contact"><a href="projekt/html/contact.php">Contact Us</a></li>

                    </ul>
                </div>
                <div class="horizontal-divide"></div>
                <div class="footer-address-div">
                    <h2>Address</h2>
                    <address>
                        <div>
                            <img src="projekt/images/mappin.png" alt="Location pin">
                            <p>Szeged, Hungary, 6724 Sample Street 24.</p>
                        </div>
                        <div>
                            <img src="projekt/images/emailicon.png" alt="Email icon">
                            <p>sample@sample.com</p>
                        </div>
                        <div>
                            <img src="projekt/images/phoneicon.png" alt="Phone icon">
                            <p>+36 12 345 6789</p>
                        </div>
                    </address>
                </div>
            </div>
            
        </footer>
        <!--footer ends here-->
    </body>
</html>