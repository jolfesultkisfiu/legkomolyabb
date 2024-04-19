<?php 

    session_start();
    require_once "../php/eventclass.php";


    if (isset($_GET["eventId"])) {
         $eventId = $_GET["eventId"];
         //get the corresponding event
         $jsondata = file_get_contents("../json/events.json");
         $decoded = json_decode($jsondata,true);


         $usersjsondata = file_get_contents("../json/users.json");
         $usersdecoded = json_decode($usersjsondata,true);

         foreach($usersdecoded as $key) {
            
            foreach($key as $key2 => $value2) {
             // echo $value2;
            }
         }

         echo $_SESSION["username"];



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