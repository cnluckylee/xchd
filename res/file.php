<?php

$file = isset($_GET['r'])?trim($_GET['r']):"";
if($file)
{
    $url = "http://sh.loco-app.com:8000/".$file;
    $p = curl_post_302($url);
    header("Location: ".$p);
    exit;
}


function  curl_post_302($url) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL,  $url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
    $data = curl_exec($ch);
    $Headers =  curl_getinfo($ch);
    curl_close($ch);
    if ($data != $Headers){
        return $Headers["redirect_url"];
    }else{
        return false;
    }
}