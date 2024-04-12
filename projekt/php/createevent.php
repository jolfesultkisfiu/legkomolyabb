<?php
    
    require_once "eventclass.php";
  

    
    if (isset($_POST["submitBT"])) {
      // print_r( $_FILES["eventThumbnail"]);
      
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
        echo $_POST["mobileUserEventTime"] . "<br>";
        // echo $_POST["selectHour"] . "<br>";
        // echo $_POST["selectMinute"] . "<br>";

        if( isset($_POST["selectHour"]) && isset($_POST["selectMinute"])) {
            //echo "EYESYESY<br>";
            $startingTime = $_POST["selectHour"]. ":" . $_POST["selectMinute"];
           // echo $startingTime;
        }
        if( isset($_POST["mobileUserEventTime"]) && !empty($_POST["mobileUserEventTime"])){
            echo "NIGGER:" . $_POST["mobileUserEventTime"] . "<br>";
          
            $startingTime = $_POST["mobileUserEventTime"];
        }
       
        echo $startingTime;
        $thumbnail = $_FILES["eventThumbnail"];
        $location = trim($_POST["eventLocation"]);

        $event = new Event($title, $details, $date, $startingTime, $thumbnail, $location);
      //  print_r($event);
       
      /* $aExtraInfo = getimagesize($_FILES['eventThumbnail']['tmp_name']);
       $sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['eventThumbnail']['tmp_name']));
       echo '<p>The image has been uploaded successfully</p><p>Preview:</p><img src="' . $sImage . '" alt="Your Image" />';
      */
        
       $assocArr["events"][$event::$totalNumberOfEvents] = (array) $event;
        $jsondata = json_encode($assocArr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
       file_put_contents("../json/events.json",$jsondata);
       $jsondata = file_get_contents("../json/events.json");
   
       $decoded = json_decode($jsondata,true);
       print_r($decoded);

    }
}

?>