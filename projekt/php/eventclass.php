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

        public function __construct($title, $details, $date, $startingTime, $thumbnail, $location) {
            $this->title = $title;
            $this->details = $details;
            $this->date = $date;
            $this->startingTime = $startingTime;
            $this->thumbnail = $thumbnail;
            $this->location = $location;
            self::$totalNumberOfEvents++;
            $this->numberOfPeopleSignedUp = 0;

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