<?php
@header("Content-type: text/html; charset=utf-8");
 
defined("TOKEN") or define("TOKEN","xiaobai"); //配置API

defined("Web_ROOT") or define("Web_ROOT",'http://xb.com'); //改成你的域名地址，最后不要带/

$weixin_name='Yiz工作室';//这里可以配置你的微信公众账号名字，你也可以改下面的源码
$xiaobai_wxh = 'Yiz工作室';//微信帐号（wall前台显示）

/***采集微信公众平台密码配置***/
defined("USER") or define("USER", "m15216391312@163.com");//公众平台账号 不能带空格
defined("PASS") or define("PASS", "qdz654321");//公众平台密码  不能带空格
$screenpaw = "admin";//进入微信大屏幕的密码

defined("UR") or define("UR", Web_ROOT);
$url=Web_ROOT.'/moni/xiaobai.php';//不用修改
$weixin_wxq=Web_ROOT.'/wall/';//不用修改

/*设置数据库信息*/
$host = "www.yuxuantech.com";//数据库的服务器地址，一般无需更改
$port = "6603";//数据库的端口号
$user = "living";//数据库的用户名
$pwd = "loconopwd";//数据库的密码
$dbname = "sae_52codes";//数据库的名称





/* 下面不用改 */


/*接着调用mysql_connect()连接服务器*/
$link = @mysql_connect("{$host}:{$port}",$user,$pwd,true);
if(!$link) {
	   die("Connect Server Failed: " . mysql_error($link));
	  }
/*连接成功后立即调用mysql_select_db()选中需要连接的数据库*/
if(!mysql_select_db($dbname,$link)) {
	   die("Select Database Failed: " . mysql_error($link));
	  }
mysql_query("SET NAMES UTF8");
//以上连接数据库
$xuanze="SELECT * FROM  `weixin_wall_config`";
$chaxun=mysql_query($xuanze) or die(mysql_error());
$xuanzezu=mysql_fetch_row($chaxun);
$huati=$xuanzezu[0];//话题内容不用修改
$huanying1=$xuanzezu[1];
$huanying2=$xuanzezu[2];
?>