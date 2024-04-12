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
                    <li data-page="createEvent"><a href="projekt/html/createevent.php">Create Event</a></li>
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
                 
    
                    <li id="loginLi"><a href="projekt/html/login.php">Log In</a></li>
                    <li id="registerLi"><a href="projekt/html/register.php">Register</a></li>
    
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
                                <li data-page="createEvent"><a href="projekt/html/createevent.php">Create Event</a></li>
                            
                            
            
                                <li><a href="projekt/html/login.php">Log In</a></li>
                                <li><a href="projekt/html/register.php">Register</a></li>
    
                            
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
                <form action="POST" class="search-bar1">
                    <input type="text" placeholder="Search event" name="searched">
                    <button type="submit"><img src="projekt/images/search.png" alt="search icon"></button>
                </form>
                <div class="break"></div>
                <div class="filters">
                    <select class="filter">
                        <option value="0">Today</option>
                        <option value="1">Tomorrow</option>
                        <option value="2">This weekend</option>
                        <option value="3">This week</option>
                        <option value="4">This month</option>
                        <option value="5">Anytime</option>
                      </select>
                    <select class="filter">
                        <option value="6">Szeged</option>
                        <option value="7">Debrecen</option>
                        <option value="8">Budapest</option>
                        <option value="9">Pécs</option>
                        <option value="10">Other city</option>
                      </select>
                    <select class="filter">
                        <option value="11">Sport events</option>
                        <option value="12">Festivals</option>
                        <option value="13">Concerts</option>
                        <option value="14">Club nights</option>
                        <option value="15">Theatre & Comedy</option>
                      </select>
                    <select class="filter">
                        <option value="16">Techno</option>
                        <option value="17">Blues</option>
                        <option value="18">Disco</option>
                        <option value="19">Classical</option>
                        <option value="20">Country</option>
                        <option value="21">Rock</option>
                        <option value="22">Drum and bass</option>
                      </select>
                </div>
                <div class="break"></div>
            </div>
            </section>

         

            
            <section class="upcoming-events-new-section">
                <h2 class="upcoming-events-header">Listed Events</h2>
                <div class="event-article-container">
                    <article class="event-showcase-article-new">
                        <img src="projekt/images/streetsoccer.jpg" class="event-thumbnail-display-new" alt="event thumnbail">
                        <div class="event-sneak-peek-new">
                            <h2 class="event-title-new">Street Soccer Match</h2>
                            <p class="event-short-description-new">Dive into the excitement of a friendly soccer tournament! Join us for an action-packed day of thrilling matches, delicious food, and vibrant community spirit. Don't miss out on the fun!</p>
                            <p class="instructions-to-view-details-new">Click on the double arrow to see more details</p>
                        
                        </div>
                        <a href="projekt/html/eventdetails.php" class="event-details-link-new" title="Event Details"></a>
                    </article>
                    <article class="event-showcase-article-new">
                        <img src="projekt/images/gig.jpg" class="event-thumbnail-display-new" alt="event thumnbail">
                        <div class="event-sneak-peek-new">
                            <h2 class="event-title-new">22nd Youth Music Festival</h2>
                            <p class="event-short-description-new">Get ready to groove at our electrifying music festival! Experience a day filled with live performances from talented artists, delicious food trucks, and unforgettable moments with friends. Let the music carry you away!</p>
                            <p class="instructions-to-view-details-new">Click on the double arrow to see more details</p>
                        
                        </div>
                        <a href="projekt/html/eventdetails.php" class="event-details-link-new" title="Event Details"></a>
                    </article>
                    <article class="event-showcase-article-new">
                        <img src="projekt/images/conference.jpg" class="event-thumbnail-display-new" alt="event thumnbail">
                        <div class="event-sneak-peek-new">
                            <h2 class="event-title-new">Investment Seminar</h2>
                            <p class="event-short-description-new">Unlock the secrets to financial success at our investment seminar! Join industry experts for insightful talks, practical tips, and valuable strategies to grow your wealth and secure your future. Don't miss this opportunity to take control of your financial destiny!</p>
                            <p class="instructions-to-view-details-new">Click on the double arrow to see more details</p>
                        
                        </div>
                        <a href="projekt/html/eventdetails.php" class="event-details-link-new" title="Event Details"></a>
                    </article>
                    <article class="event-showcase-article-new">
                        <img src="projekt/images/artexhibition.jpg" class="event-thumbnail-display-new" alt="event thumnbail">
                        <div class="event-sneak-peek-new">
                            <h2 class="event-title-new">Local Art Exhibition</h2>
                            <p class="event-short-description-new">Step into a world of creativity and wonder at our art exhibition! Discover captivating works by talented artists, from vibrant paintings to intricate sculptures. Immerse yourself in the beauty of expression and be inspired by the power of art.</p>
                            <p class="instructions-to-view-details-new">Click on the double arrow to see more details</p>
                        
                        </div>
                        <a href="projekt/html/eventdetails.php" class="event-details-link-new" title="Event Details"></a>
                    </article>
                    <article class="event-showcase-article-new">
                        <img src="projekt/images/party.jpg" class="event-thumbnail-display-new" alt="event thumnbail">
                        <div class="event-sneak-peek-new">
                            <h2 class="event-title-new">18th Birthday Party</h2>
                            <p class="event-short-description-new">Prepare for the ultimate celebration! Join us for a night of non-stop fun, music, and dancing at our extravagant party. With delicious drinks, exciting entertainment, and a vibrant atmosphere, it's the event of the year you won't want to miss!</p>
                            <p class="instructions-to-view-details-new">Click on the double arrow to see more details</p>
                        
                        </div>
                        <a href="projekt/html/eventdetails.php" class="event-details-link-new" title="Event Details"></a>
                    </article>
                    <article class="event-showcase-article-new">
                        <img src="projekt/images/hiking.jpg" class="event-thumbnail-display-new" alt="event thumnbail">
                        <div class="event-sneak-peek-new">
                            <h2 class="event-title-new">Hiking Trip</h2>
                            <p class="event-short-description-new">Embark on an unforgettable adventure with our hiking trip! Explore breathtaking trails, majestic landscapes, and connect with nature. Whether you're a seasoned trekker or a novice explorer, join us for an exhilarating journey filled with breathtaking views and unforgettable experiences.</p>
                            <p class="instructions-to-view-details-new">Click on the double arrow to see more details</p>
                        
                        </div>
                        <a href="projekt/html/eventdetails.php" class="event-details-link-new" title="Event Details"></a>
                    </article>
                   
                </div>
                
               
               

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