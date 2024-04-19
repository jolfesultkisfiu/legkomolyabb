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

      
          // Generate HTML article for the event
    public function generateEventArticle()
    {
        $html = '
            <article class="event-showcase-article-new">
                <img src="%s" class="event-thumbnail-display-new" alt="event thumbnail">
                <div class="event-sneak-peek-new">
                    <h2 class="event-title-new">%s</h2>
                    <p class="event-short-description-new">%s</p>
                    <p class="instructions-to-view-details-new">Date: %s, Time: %s. <br><br>
                    Click on the double arrow to see more details!</p>
                </div>
                <a href="eventdetails.php" class="event-details-link-new" title="Event Details"></a>
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
                $this->getStartingTime()
                //$this->getLocation()
            );
        }
        return sprintf(
            $html,
            $this->getThumbnail(),
            $this->getTitle(),
            $small = substr($this->getDetails(), 0, 160) ,
            $this->getDate(),
            $this->getStartingTime()
            //$this->getLocation()
        );
    }


        public function getNumberOfPeopleSignedUp(){
            return $this->numberOfPeopleSignedUp;
        }
    
        public function getTitle(){
            return $this->title;
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