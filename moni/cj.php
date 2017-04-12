<?php
include dirname(__FILE__).'/../config.php';
include dirname(__FILE__).'/xiaobai.php';
function sendmassage($token,$tofakeid,$contant,$cookie,$cookies)
	{
		$siurl = $_SERVER['HTTP_HOST'];
		    $url = "http://xbsslcurl.sinaapp.com/cjreplay.php?siurl=$siurl&token=$token";
	$post_data= "tofakeid=$tofakeid&contant=$contant&cookie=$cookie&cookies=$cookies";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
	$output = curl_exec($ch);
 //var_dump($output);//全部消息
	curl_close($ch);
	return $output;
}
?>