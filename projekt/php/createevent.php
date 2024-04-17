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
       // echo $_POST["mobileUserEventTime"] . "<br>";
        // echo $_POST["selectHour"] . "<br>";
        // echo $_POST["selectMinute"] . "<br>";

        if( isset($_POST["selectHour"]) && isset($_POST["selectMinute"])) {
            //echo "EYESYESY<br>";
            $startingTime = $_POST["selectHour"]. ":" . $_POST["selectMinute"];
           // echo $startingTime;
        }
        if( isset($_POST["mobileUserEventTime"]) && !empty($_POST["mobileUserEventTime"])){
           // echo "HERE:" . $_POST["mobileUserEventTime"] . "<br>";
          
            $startingTime = $_POST["mobileUserEventTime"];
        }
       
        //echo $startingTime;
        $thumbnail = $_FILES["eventThumbnail"];
        $location = trim($_POST["eventLocation"]);

        $event = new Event($title, $details, $date, $startingTime, $thumbnail, $location);
      //  print_r($event);
       
      /* $aExtraInfo = getimagesize($_FILES['eventThumbnail']['tmp_name']);
       $sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['eventThumbnail']['tmp_name']));
       echo '<p>The image has been uploaded successfully</p><p>Preview:</p><img src="' . $sImage . '" alt="Your Image" />';
      */
        
      

        // csak JPG, JPEG, WEBP és PNG kiterjesztésű képeket szeretnénk engedélyezni a feltöltéskor
        $validFileExtensions = ["jpg", "jpeg", "png", "webp"];
        $fileToFetch;
          // a feltöltött fájl kiterjesztésének lekérdezése
         $extension = strtolower(pathinfo($_FILES["eventThumbnail"]["name"], PATHINFO_EXTENSION));
        if(in_array($extension, $validFileExtensions)){

            if($_FILES["eventThumbnail"]["error"] === 0){

                if($_FILES["eventThumbnail"]["size"] < 10000000){ //approx. 10 MB.
                     // a cél útvonal összeállítása
                     $targetPath = "../images/" . $_FILES["eventThumbnail"]["name"];

                       // ha már létezik ilyen nevű fájl a cél útvonalon, figyelmeztetést írunk ki
                    if (file_exists($targetPath)) {
                       // echo "<strong>Figyelem:</strong> A régebbi fájl felülírásra kerül! <br/>";
                       $targetPath = "../images/" . Event::$totalNumberOfEvents . "." . $extension;
                    }
                     // a fájl átmozgatása a cél útvonalra
                    if (move_uploaded_file($_FILES["eventThumbnail"]["tmp_name"], $targetPath)) {
                        echo "Successful upload! <br/>";
                        $fileToFetch = $targetPath;
                    } else {
                        echo "<strong>Hiba:</strong> An error occured while trying to upload the file <br/>";
                    }

                }
            }
        }

        // try to generate the image from the json
        //GENERATES IMG TAG FROM THE JSON FILE
        // $jsondata = file_get_contents("../json/events.json");
        
        // $decoded = json_decode($jsondata,true);
        // print_r($decoded);
        // echo "<br><br>";
        // $index=Event::$totalNumberOfEvents;
        // $fileNameFromJson = $decoded["events"][$index];
        // $fileToFetch = "";
        // foreach($fileNameFromJson as $key => $value) {
        //     if(is_array($value)) {
        //         foreach($value as $key2 => $value2) {
        //             echo $key2 . " => " . $value2 . "<br>";
        //             if($key2 == "name") {
        //                 $fileToFetch = $value2; break;
        //             }
        //          }
        //     }
           
        // }
        echo $fileToFetch;
        echo "<br>";
        $fetchPath = $fileToFetch;
      
        $event->setThumbnail($fetchPath);

        $fp2 = $event->getThumbnail();

     

       // print_r($event);

        echo "<img src = " . "\"$fp2\"" . "alt = 'event cover photo'" . ">";

        $assocArr["events"][$event::$totalNumberOfEvents] = (array) $event;
        $jsondata = json_encode($assocArr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
       file_put_contents("../json/events.json",$jsondata);
       $jsondata = file_get_contents("../json/events.json");
        
       $decoded = json_decode($jsondata,true);
      // print_r($decoded);
       //var_dump($decoded);
      $eventData = $decoded["events"]["1"];
      //var_dump($newEvent); 
    //    foreach($decoded as $key => $value) {
    //        foreach($value as $key2 => $value2){
    //             foreach($value2 as $key3 => $value3){
    //                 echo  $key3 . "=>". $value3 . "<br>";
    //             }
    //        }
           
    //     }
          // Extract properties from event data
          $i = 0;
          $numberedArrayForAttributes = [];
        foreach($eventData as $key => $value) {
           // echo $key . "->>". $value . "<br>";
            $numberedArrayForAttributes[$i] = $value;
            $i++;
        }

        foreach($numberedArrayForAttributes as $key => $value) {
            echo $key . "->>". $value . "<br>";
        }
        $eventData = $numberedArrayForAttributes;
    $title = $eventData[0];
    $details = $eventData[1];
    $date = $eventData[2];
    $startingTime = $eventData[3];
    $thumbnail = $eventData[4];
    $location = $eventData[5];
    $numberOfPeopleSignedUp = $eventData[6];

    // Create Event object using extracted data
    $event = new Event($title, $details, $date, $startingTime, $thumbnail, $location, $numberOfPeopleSignedUp);
        var_dump($event);
    // // Now you have an Event object representing the decoded JSON data
    // // You can use $event object as needed (e.g., display details, manipulate, etc.)
    // // Example usage:
    // echo "Event Title: " . $event->getTitle() . "\n";
    // echo "Event Date: " . $event->getDate() . "\n";
    // // ...
    //   header("Location: ../html/upcomingevent.php");
      // echo $event->generateEventArticle();

    }
}

?>