<?php
    
    require_once "eventclass.php";
    if (isset($_POST["submitBT"])) {
    if(
        isset($_POST["eventTitle"]) && isset($_POST["eventDetails"])
        &&  isset($_POST["eventDate"]) && 
        (isset($_POST["mobileUserEventTime"]) || (isset($_POST["selectHour"]) && isset($_POST["selectMinute"])) )
        && isset($_POST["eventThumbnail"]) && isset($_POST["eventLocation"])       
    ){
        $title = trim($_POST["eventTitle"]);
        $details = trim($_POST["eventDetails"]);
        $date = $_POST["eventDate"];
        $startingTime = "";
        if(isset($_POST["mobileUserEventTime"])){
            $startingTime = $_POST["mobileUserEventTime"];
        }
        else {
            $startingTime = $_POST["selectHour"] . $_POST["selectMinute"];
        }
        $thumbnail = $_POST["eventThumbnail"];
        $location = trim($_POST["eventLocation"]);

        $event = new Event($title, $details, $date, $startingTime, $thumbnail, $location);
        print_r($event);

    }}

?>