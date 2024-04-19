<?php 

    
    require_once "../php/eventclass.php";


    if (isset($_GET["eventId"])) {
         $eventId = $_GET["eventId"];
         //get the corresponding event
         $jsondata = file_get_contents("../json/events.json");
         $decoded = json_decode($jsondata,true);


         $i = 0;
         // echo $key . "<br>";
          foreach($decoded["events"][$eventId] as &$key1) {
              // echo $key . "->>". $value . "<br>";
              // $numberedArrayForAttributes[$i] = $value1;
              // 6 is index of the "Number of people signed up" attribute.
              if($i == 6){
                echo "Signed up people : " . $key1 . "<br>";
                $key1++;
              }
              echo "Signed up people : " . $key1 . "<br>";
               $i++;
           }
    
          $jsondata = json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
           file_put_contents("../json/events.json",$jsondata);
          
    }

?>