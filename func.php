<?php

function random_session_id(){
    $time = time();
    $id = random_salt(40-strlen($time)).$time;
    return $id;
}

function random_salt($len){
    return random_text($len);
}


function random_text($len){
    $base = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';
    $max = strlen($base)-1;
    $randomString = '';
    mt_srand((double)microtime()*1000000);
    while (strlen($randomString)<$len)
        $randomString.=$base[mt_rand(0,$max)];
    return $randomString;

}