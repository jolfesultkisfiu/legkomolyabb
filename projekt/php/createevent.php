<?php
    
    require_once "eventclass.php";
  

    
    if (isset($_POST["submitBT"])) {
       print_r( $_FILES["eventThumbnail"]);
      
    if(
        isset($_POST["eventTitle"]) && isset($_POST["eventDetails"])
        &&  isset($_POST["eventDate"]) && 
        (isset($_POST["mobileUserEventTime"]) || (isset($_POST["selectHour"]) && isset($_POST["selectMinute"])) )
        && isset($_FILES["eventThumbnail"]) && isset($_POST["eventLocation"])       
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
        $thumbnail = $_FILES["eventThumbnail"];
        $location = trim($_POST["eventLocation"]);

        $event = new Event($title, $details, $date, $startingTime, $thumbnail, $location);
       // print_r($event);
       
       $aExtraInfo = getimagesize($_FILES['eventThumbnail']['tmp_name']);
       $sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['eventThumbnail']['tmp_name']));
       echo '<p>The image has been uploaded successfully</p><p>Preview:</p><img src="' . $sImage . '" alt="Your Image" />';

       $jsondata = json_encode($event, JSON_PRETTY_PRINT);
       file_put_contents("../json/events.json",$jsondata);

    }}

?>