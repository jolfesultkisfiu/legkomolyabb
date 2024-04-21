<?php
session_start();

require_once "../php/eventclass.php";


if (isset($_GET["eventId"])) {
     $eventId = $_GET["eventId"];
     //get the corresponding event

     $currentUser = $_SESSION["username"];

     $jsondata = file_get_contents("../json/events.json");
     $decoded = json_decode($jsondata,true);


     $usersjsondata = file_get_contents("../json/users.json");
     $usersdecoded = json_decode($usersjsondata,true);

     $foundUser = false;
    foreach($usersdecoded as &$key) {
      //  var_dump($key);
        //var_dump($key["signedUpEvents"]);
        foreach($key as &$key2) {
       //   var_dump($key2);
          if($key2 === $currentUser) {
        //   echo "BINGO";
            $foundUser = true;
          }
        }
        if($foundUser) {
            
            $key45 = array_search($eventId,  $key["signedUpEvents"]);
            if($key45 !== FALSE) {
                unset($key["signedUpEvents"][$key45]);
            }
            break;
        //  $key["signedUpEvents"][] =  $eventId;
        }


    }

     $i = 0;
     // echo $key . "<br>";
      foreach($decoded["events"][$eventId] as &$key1) {
          // echo $key . "->>". $value . "<br>";
          // $numberedArrayForAttributes[$i] = $value1;
          // 6 is index of the "Number of people signed up" attribute.
          if($i == 6){
          //  echo "Signed up people : " . $key1 . "<br>";
            $key1--;
          }
         
           $i++;
       }

      $jsondata = json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
       file_put_contents("../json/events.json",$jsondata);

       $jsondata = json_encode($usersdecoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
       file_put_contents("../json/users.json",$jsondata);

       header("Location: ../html/usersignedevents.php");
      
}


?>