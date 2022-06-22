<?php

class userRequest{
    public $browser;
    public $ip;
    public $info;


    public function __construct(){
        $this->browser = $_SERVER["HTTP_USER_AGENT"];
        $this->ip = $_SERVER["REMOTE_ADDR"];
        $this->info = md5($this->browser.$this->ip."cxy420wba4");
    }

    public function getIp(){
        return $this->ip;
    }
    public function getBrowser(){
        $ag = substr($this->browser,0,128);
        return $ag;
    }
    public function getInfo(){
        return $this->info;
    }


}
?>