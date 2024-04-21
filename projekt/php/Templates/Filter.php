<?php

class Filter{
    private $eventList;


    public static function filter($time,$place,$type,$music,$search){
        $content=file_get_contents(__DIR__.'/../../json/events.json');
        $arr=json_decode($content,true)??[];

        if($time!=="anytime"){
            switch ($time){
                case "today":
                    $currentDate=date("Y-m-d");
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===2){
                                if(strtotime($d)!==strtotime($currentDate)){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;

                case "tomorrow":
                    $tomorrow = date("Y-m-d", strtotime("+1 day"));
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===2){

                                if(strtotime($d)!==strtotime($tomorrow)){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
                case "week":
                    $currentWeek = date("W");
                    $currentYear = date("Y");
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===2){
                                $targetWeek = date("W", strtotime($d));
                                $targetYear = date("Y", strtotime($d));
                                if(($targetWeek !== $currentWeek || $targetYear !== $currentYear)|| $d<date("Y-m-d")){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
                case "month":
                    $currentMonth = date("m");
                    $currentYear = date("Y");
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===2){
                                $targetMonth = date("m", strtotime($d));
                                $targetYear = date("Y", strtotime($d));
                                if($targetMonth !== $currentMonth || $targetYear !== $currentYear || $d<date("Y-m-d")){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
            }
        }
        if($place!=="any"){
            switch ($place){
                case "szeged":
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===5){
                                if(strpos(strtolower($d),"szeged")===false){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
                case "debrecen":
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===5){
                                if(strpos(strtolower($d),"debrecen")===false){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
                case "budapest":
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===5){
                                if(strpos(strtolower($d),"budapest")===false){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
                case "pécs":
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===5){
                                if(strpos(strtolower($d),"pécs")===false){

                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
            }
        }
        if($type!=="any"){
            switch ($type){
                case "sport":
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===1){
                                if(strpos(strtolower($d),"sport")===false){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
                case "festival":
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===1){
                                if(strpos(strtolower($d),"festival")===false){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
                case "concert":
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===1){
                                if(strpos(strtolower($d),"concert")===false){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
                case "theatre":
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===1){
                                if(strpos(strtolower($d),"theatre")===false){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
            }

        }
        if($music!=="any"){
            switch ($music){
                case "techno":
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===1){
                                if(strpos(strtolower($d),"techno")===false){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
                case "disco":
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===1){
                                if(strpos(strtolower($d),"disco")===false){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
                case "classical":
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===1){
                                if(strpos(strtolower($d),"classical")===false){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
                case "rock":
                    foreach ($arr["events"] as $data){
                        $i=0;
                        foreach ($data as $d){
                            if($i===1){
                                if(strpos(strtolower($d),"rock")===false){
                                    $key=array_search($data,$arr["events"]);
                                    unset($arr["events"][$key]);
                                }
                            }
                            $i++;
                        }
                    }
                    break;
            }
        }
        if(trim($search)!==""){
            foreach ($arr["events"] as $data){

                $i=0;
                $foundInTitle=true;
                $foundInDetails=true;
                foreach ($data as $d){
                    if($i===0){
                        if(strpos(strtolower($d),$search)===false){
                            $foundInTitle=false;
                        }
                    }
                    if($i===1){
                        if(strpos(strtolower($d),$search)===false){
                            $foundInDetails=false;
                        }
                    }

                    $i++;
                }
                if(!$foundInDetails && !$foundInTitle){
                    $key=array_search($data,$arr["events"]);
                    unset($arr["events"][$key]);
                }
            }
        }

        return $arr;
    }

    /**
     * @param $time
     * @param $place
     * @param $type
     * @param $music
     */
    public function __construct($time,$place,$type,$music)
    {
        $this->eventList []= array("time"=>$time,"place"=>$place,"type"=>$type,"music"=>$music);
    }
}
