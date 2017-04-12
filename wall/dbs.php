<?php
/**
 * Created by PhpStorm.
 * User: living
 * Date: 2017/4/12
 * Time: 下午6:38
 */
$host = "www.yuxuantech.com";//数据库的服务器地址，一般无需更改
$port = "6603";//数据库的端口号
$user = "living";//数据库的用户名
$pwd = "loconopwd";//数据库的密码
$dbname = "sae_52codes";//数据库的名称
defined("root_path") or define('root_path', dirname(dirname(__FILE__)));
include_once (root_path."/libs/lib_mysql.php");
$db = new PdoMysql('10.0.0.2', $user, $pwd, $dbname,6603);
