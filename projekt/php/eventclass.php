<?php 

    class Event { //default class visibility is public, you do not have to specify it

        private $title;
        private $details;
        private $date;
        private $startingTime;
        private $thumbnail;
        private $location;
        public static $totalNumberOfEvents = 0;

        public function __construct($title, $details, $date, $startingTime, $thumbnail, $location) {
            $this->title = $title;
            $this->details = $details;
            $this->date = $date;
            $this->startingTime = $startingTime;
            $this->thumbnail = $thumbnail;
            $this->location = $location;
            self::$totalNumberOfEvents++;

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


        
    }
?>