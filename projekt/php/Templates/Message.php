<?php
class Message{
    private $id;
    private $name;
    private $email;
    private $message;

    /**
     * @param $name
     * @param $email
     * @param $message
     */
    public function __construct($name, $email, $message)
    {
        $content=file_get_contents(__DIR__.'/../../json/messages.json');
        $arr=json_decode($content,true)??[];

        if(isset(end($arr)["id"])){
            $idLast=end($arr)["id"];
        }else{
            $idLast=0;
        }

        $arr[] = array("id"=>$idLast+1,"name"=>$name,"email"=>$email,"message"=>$message);
        $jsonString = json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents(__DIR__.'/../../json/messages.json',$jsonString);
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }



}
