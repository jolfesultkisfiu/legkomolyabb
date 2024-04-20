<?php

class User{
    private  $jelszo;
    private $username;
    private $ownid;
    private $signedUpEvents; //array
    private $isSubscribed; //boolean
    private $imageSrc;
    private $email;

    /**
     * @return mixed
     */
    public static function getEmail($username)
    {
        $content=file_get_contents('C:\xampp\htdocs\legkomolyabb\projekt\json\users.json');
        $arr=json_decode($content,true)??[];
        foreach ($arr as $data){
            if($data["username"]===$username){
                return $data["email"];
            }
        }
        return null;
    }

    /**
     * @param mixed $email
     */
    public static function setEmail($email,$username)
    {
        $content=file_get_contents('C:\xampp\htdocs\legkomolyabb\projekt\json\users.json');
        $arr=json_decode($content,true)??[];
        foreach ($arr as $data){
            if($data["username"]===$username){
                $key=array_search($data,$arr);
                $arr [$key]["email"]=$email;
                $jsonString = json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                file_put_contents('C:\xampp\htdocs\legkomolyabb\projekt\json\users.json',$jsonString);
                return $data["email"];
            }
        }
        return null;
    }

    /**
     * @return mixed
     */
    public function getImageSrc()
    {
        return $this->imageSrc;
    }

    /**
     * @param mixed $imageSrc
     */
    public function setImageSrc($imageSrc): void
    {
        $this->imageSrc = $imageSrc;
    }


    



    /**
     * @return mixed
     */


    /**
     * @param $ownid
     * @param $jelszo
     * @param $username
     */

    public function __construct($id,$jelszo, $username)
    {

        $this->ownid=$id;
        $this->jelszo = $jelszo;
        $this->username = $username;
        $this->imageSrc="../images/profile.jpg";
        $signedUpEvents = array();
        $this->isSubscribed = false;
        $this->email="@";

    }

    /**
     * @return mixed
     */



    public function getOwnid()
    {
        return $this->ownid;
    }
    public static function login($username,$password): bool
    {
        $content=file_get_contents('C:\xampp\htdocs\legkomolyabb\projekt\json\users.json');
        $arr=json_decode($content,true)??[];
        foreach ($arr as $data){
            if($data["username"]===$username&&password_verify($password,$data["password"])){
                return true;
            }
        }
        return false;
    }
    public static function usernameTaken($username): bool
    {
        $content=file_get_contents('C:\xampp\htdocs\legkomolyabb\projekt\json\users.json');
        $arr=json_decode($content,true)??[];
        foreach ($arr as $data){

            if($data["username"]===$username){
                return true;
            }
        }
        return false;
    }

    public static function registerUser($name,$psw)
    {


        $content=file_get_contents('C:\xampp\htdocs\legkomolyabb\projekt\json\users.json');
        $arr=json_decode($content,true)??[];



        /*foreach ($arr as $data){
            print_r($data);
            print_r($data["username"]);
        }
        echo '<br>';

        print_r(end($arr)["id"]);*/
        if(isset(end($arr)["id"])){
            $id=end($arr)["id"];
        }else{
            $id=0;
        }

        $newUser=new User($id+1,$psw,$name);
        $arr[] = array("id"=>$newUser->ownid,"password"=>$psw,"username"=>$name,"signedUpEvents"=>$newUser->signedUpEvents,"subscribed"=>false,"image"=>$newUser->imageSrc,"email"=>$newUser->email);
        $jsonString = json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('C:\xampp\htdocs\legkomolyabb\projekt\json\users.json',$jsonString);

    }

    /**
     * @param mixed $jelszo
     */
    public function setJelszo($jelszo)
    {
        $this->jelszo = $jelszo;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getSignedUpEvents(){
        return $this->signedUpEvents;
    }


    public function setSignedUpEvents($signedUpEvents){
        $this->signedUpEvents = $signedUpEvents;
    }

    public static function getIsSubscribed($username){
        $content=file_get_contents('C:\xampp\htdocs\legkomolyabb\projekt\json\users.json');
        $arr=json_decode($content,true)??[];
        foreach ($arr as $data){
            if($data["username"]===$username){
                return $data["subscribed"];
            }
        }
        return null;
    }


    public static function setIsSubscribed($username){
        $content=file_get_contents('C:\xampp\htdocs\legkomolyabb\projekt\json\users.json');
        $arr=json_decode($content,true)??[];
        foreach ($arr as $data){
            if($data["username"]===$username){
                $key=array_search($data,$arr);
                $arr [$key]["subscribed"]=!$data["subscribed"];
                $jsonString = json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                file_put_contents('C:\xampp\htdocs\legkomolyabb\projekt\json\users.json',$jsonString);
                return $data["subscribed"];
            }
        }
        return null;
    }



}

?>
