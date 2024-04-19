<?php 

    class Event { //default class visibility is public, you do not have to specify it
        
        private $title;
        private $details;
        private $date;
        private $startingTime;
        private $thumbnail;
        private $location;
        private $numberOfPeopleSignedUp;
        public static $totalNumberOfEvents = 0;

        public function __construct($title, $details, $date, $startingTime, $thumbnail, $location, $signedup=0) {
            $this->title = $title;
            $this->details = $details;
            $this->date = $date;
            $this->startingTime = $startingTime;
            $this->thumbnail = $thumbnail;
            $this->location = $location;
            self::$totalNumberOfEvents++;
            $this->numberOfPeopleSignedUp = $signedup;

        }


        // Method to generate HTML for event details
    public function generateEventDetailsHTML()
    {
        // Format starting time (e.g., convert "12:30" to hour and minute integers)
        $startingTime = $this->getStartingTime();
       // list($hour, $minute) = explode(':', $startingTime);
       $eventId = $this->getEventId();

        // Prepare HTML string with event attributes
        $html = '
            <div class="event-details-container">
                <img src="%s" alt="Event thumbnail">
                <h2>%s</h2>
                <div class="event-info">
                    <p class="detailed-info-paragraph">%s</p>
                    <p class="starting-time-paragraph">Starting time: %s</p>
                    <p class="starting-date-paragraph">Event Date (mm/dd/yyyy): %s</p>
                    <p class="event-location-paragraph">Location: %s</p>
                </div>
                <form action="../php/signupforevent.php" id="eventSignupForm">
                    <input type="hidden" name="eventId" value="%s">
                    <input type="submit" value="Sign up for this event">
                </form>
            </div>
        ';

        // Replace placeholders in HTML string with event attributes
        $formattedHtml = sprintf(
            $html,
            $this->getThumbnail(),
            $this->getTitle(),
            $this->getDetails(),
            $startingTime,
            date('m/d/Y', strtotime($this->getDate())),
            $this->getLocation(),
            $eventId // Assuming you have a method getId() to retrieve event ID
        );

        return $formattedHtml;
    }



          // Method to generate HTML for event details
          public function generateEventDetailsHTMLSignedUp()
          {
              // Format starting time (e.g., convert "12:30" to hour and minute integers)
              $startingTime = $this->getStartingTime();
             // list($hour, $minute) = explode(':', $startingTime);
             $eventId = $this->getEventId();
      
              // Prepare HTML string with event attributes
              $html = '
                  <div class="event-details-container">
                      <img src="%s" alt="Event thumbnail">
                      <h2>%s</h2>
                      <div class="event-info">
                          <p class="detailed-info-paragraph">%s</p>
                          <p class="starting-time-paragraph">Starting time: %s</p>
                          <p class="starting-date-paragraph">Event Date (mm/dd/yyyy): %s</p>
                          <p class="event-location-paragraph">Location: %s</p>
                      </div>
                      <form action="../php/unsubfromevent.php" id="eventSignupForm">
                          <input type="hidden" name="eventId" value="%s">
                          <input type="submit" value="Unsubscribe From This Event">
                      </form>
                  </div>
              ';
      
              // Replace placeholders in HTML string with event attributes
              $formattedHtml = sprintf(
                  $html,
                  $this->getThumbnail(),
                  $this->getTitle(),
                  $this->getDetails(),
                  $startingTime,
                  date('m/d/Y', strtotime($this->getDate())),
                  $this->getLocation(),
                  $eventId // Assuming you have a method getId() to retrieve event ID
              );
      
              return $formattedHtml;
          }

      
          // Generate HTML article for the event
    public function generateEventArticle()
    {
        $eventId = $this->getEventId();
       
        $html = '
            <article class="event-showcase-article-new">
                <img src="%s" class="event-thumbnail-display-new" alt="event thumbnail">
                <div class="event-sneak-peek-new">
                    <h2 class="event-title-new" title="Event Title">%s</h2>
                    <p class="event-short-description-new">%s</p>
                    <p class="instructions-to-view-details-new">Date: %s, Time: %s. <br><br> <em>Number of people attending: %s</em> <br><br>
                    Click on the double arrow to see more details!</p>
                </div>
                <a href="eventdetails.php?id=%s" class="event-details-link-new" title="Event Details"></a>
            </article>
        ';
        $displayDetailLength = 160;
        if (strlen($this->getDetails()) > $displayDetailLength) {
            return sprintf(
                $html,
                $this->getThumbnail(),
                $this->getTitle(),
                $small = substr($this->getDetails(), 0, 160) . "...",
                $this->getDate(),
                $this->getStartingTime(),
                $this->getNumberOfPeopleSignedUp(),
                $eventId
                //$this->getLocation()
            );
        }
        return sprintf(
            $html,
            $this->getThumbnail(),
            $this->getTitle(),
            $small = substr($this->getDetails(), 0, 160) ,
            $this->getDate(),
            $this->getStartingTime(),
            $this->getNumberOfPeopleSignedUp(),
            $eventId
            //$this->getLocation()
        );
    }

           // Generate HTML article for the event
           public function generateEventArticleFromIndex()
           {
               $eventId = $this->getEventIdFromIndex();
              
               $html = '
                   <article class="event-showcase-article-new">
                       <img src="%s" class="event-thumbnail-display-new" alt="event thumbnail">
                       <div class="event-sneak-peek-new">
                           <h2 class="event-title-new" title="Event Title">%s</h2>
                           <p class="event-short-description-new">%s</p>
                           <p class="instructions-to-view-details-new">Date: %s, Time: %s. <br><br> <em>Number of people attending: %s</em> <br><br>
                           Click on the double arrow to see more details!</p>
                       </div>
                       <a href="projekt/html/eventdetails.php?id=%s" class="event-details-link-new" title="Event Details"></a>
                   </article>
               ';
               $displayDetailLength = 160;

               $explodedThumbnail = explode("/", $this->getThumbnail());

               $fileName = end($explodedThumbnail);
               $thumbnailFromIndex = "projekt/images/" . $fileName;
               if (strlen($this->getDetails()) > $displayDetailLength) {
                   return sprintf(
                       $html,
                       $thumbnailFromIndex,
                       $this->getTitle(),
                       $small = substr($this->getDetails(), 0, 160) . "...",
                       $this->getDate(),
                       $this->getStartingTime(),
                       $this->getNumberOfPeopleSignedUp(),
                       $eventId
                       //$this->getLocation()
                   );
               }



               return sprintf(
                   $html,
                   $thumbnailFromIndex,
                   $this->getTitle(),
                   $small = substr($this->getDetails(), 0, 160) ,
                   $this->getDate(),
                   $this->getStartingTime(),
                   $this->getNumberOfPeopleSignedUp(),
                   $eventId
                   //$this->getLocation()
               );
           }
       

        public function getNumberOfPeopleSignedUp(){
            return $this->numberOfPeopleSignedUp;
        }
    
        public function getTitle(){
            return $this->title;
        }

        public function getEventId() {
            $jsondata = file_get_contents("../json/events.json");
        
            $decoded = json_decode($jsondata,true);
    
            $eventId = 0;
    
            foreach($decoded["events"] as $key => $value){
                $i = 0;
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
                if ($event == $this) {
                    $eventId = $key;
                    break;
                }
            }
            return $eventId;
    
        }

        public function getEventIdFromIndex() {
            $jsondata = file_get_contents("projekt/json/events.json");
        
            $decoded = json_decode($jsondata,true);
    
            $eventId = 0;
    
            foreach($decoded["events"] as $key => $value){
                $i = 0;
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
                if ($event == $this) {
                    $eventId = $key;
                    break;
                }
            }
            return $eventId;
    
        }

        public function getDetails() {
            return $this->details;
        }
        public function getDate(){
            return $this->date;
        }
        public function getStartingTime(){
            return $this->startingTime;
        }
        public function getThumbnail(){
            return $this->thumbnail;
        }
        public function getLocation(){
            return $this->location;
        }


            // Setter for 'title'
        public function setTitle($title)
        {
            $this->title = $title;
        }

        // Setter for 'details'
        public function setDetails($details)
        {
            $this->details = $details;
        }

        // Setter for 'date'
        public function setDate($date)
        {
            $this->date = $date;
        }

        // Setter for 'startingTime'
        public function setStartingTime($startingTime)
        {
            $this->startingTime = $startingTime;
        }

        // Setter for 'thumbnail'
        public function setThumbnail($thumbnail)
        {
            $this->thumbnail = $thumbnail;
        }

        // Setter for 'location'
        public function setLocation($location)
        {
            $this->location = $location;
        }

        // Setter for 'numberOfPeopleSignedUp'
        public function setNumberOfPeopleSignedUp($numberOfPeopleSignedUp)
        {
            $this->numberOfPeopleSignedUp = $numberOfPeopleSignedUp;
        }

        
    }
?>