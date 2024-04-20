<?php
session_start();
$currentUser = $_SESSION["username"];


if(isset($_FILES["profilePicture"])){

//    $newPFP = $_FILES["profilePicture"];
      // csak JPG, JPEG, WEBP és PNG kiterjesztésű képeket szeretnénk engedélyezni a feltöltéskor
      $validFileExtensions = ["jpg", "jpeg", "png", "webp"];
      $fileToFetch;
        // a feltöltött fájl kiterjesztésének lekérdezése
       $extension = strtolower(pathinfo($_FILES["profilePicture"]["name"], PATHINFO_EXTENSION));
      if(in_array($extension, $validFileExtensions)){

          if($_FILES["profilePicture"]["error"] === 0){

              if($_FILES["profilePicture"]["size"] < 10000000){ //approx. 10 MB.
                   // a cél útvonal összeállítása
                   $originalPath = $_FILES["profilePicture"]["name"];
                   $targetPath = "../images/" . $currentUser . "." . $extension;
                     // ha már létezik ilyen nevű fájl a cél útvonalon, figyelmeztetést írunk ki
                  if (file_exists($targetPath)) {
                     
                      $targetPath = "../images/" . $currentUser . rand(0,1000000). "." . $extension;
                  }

                 // echo $targetPath;
                   // a fájl átmozgatása a cél útvonalra
                  if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetPath)) {
                      echo "Successful upload! <br/>";
                      $fileToFetch = $targetPath;
                  } else {
                      echo "<strong>ERROR:</strong> An error occured while trying to upload the file <br/>";
                  }

              }
          }
      }
     
      $fetchPath = $fileToFetch;
      echo $fetchPath;
      
    
  

    $usersjsondata = file_get_contents("../json/users.json");
    $usersdecoded = json_decode($usersjsondata,true);

   // $foundUser = false;
   // $currentSignedUps = [];
   foreach($usersdecoded as &$key) {
     //  var_dump($key);
       //var_dump($key["signedUpEvents"]);
       foreach($key as &$key2) {
      //   var_dump($key2);
         if($key2 === $currentUser) {
       //   echo "BINGO";
            echo "<br><br>" . $key2 . "<br><br>";
            $key["image"] = $fetchPath;
           // $foundUser = true;
         }
       }
   


   }
   $jsondata = json_encode($usersdecoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
   file_put_contents("../json/users.json",$jsondata);

   header("Location: ../html/profile.php");

}

?>