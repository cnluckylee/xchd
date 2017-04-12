<?php
include_once('../../config.php'); //连接数据库 
include('../biaoqing.php');
$action = $_GET['action'];
include('../dbs.php');
set_time_limit(100);
if($action=="reset"){
	   $sqll = "update weixin_flag set status=2 where status=1"; 
       $queryy = mysql_query($sqll);
		if($queryy)
       	 echo '2'; 
}else if($action=="ready"){
    $pid = 1374;

    $one = $db->fetOne('weixin_flag','*','PID='.$pid);

    $data = array();
    if(!$one)
    {
        $file = file_get_contents("http://sh.loco-app.com:8000//pcshare/partyusers?pid=".$pid);
        $webp = strpos($_SERVER['HTTP_ACCEPT'], 'image/webp');
        $iswebp = $webp === false? 0 : 1;
        $pageArray = json_decode($file,true);
        $pageArray['data'] = $pageArray['users'];
        unset($pageArray['users']);
        $sql = "delete from  weixin_flag where pid=$pid";
        $query = mysql_query($sql);
        foreach($pageArray['data'] as $k=>$v)
        {
            $v['avatar'] = '/res/file.php?r='.urlencode($v['avatar'].'&frompc=1&type=s&webp='.$iswebp);
            $data[] = $v;
            $v['PID'] = $pid;
            $v['cjstatu'] = 0;
            $v['shady'] = 0;
            $v['openid'] = '';
            $v['status'] = 2;
            $v['fakeid'] = 1;
            $v['nickname'] = addslashes($v['nickname']);
            try{
                $db->add('weixin_flag',$v);
            }catch(Exception $e)
            {
                print_r($e);exit;
            }
        }
    }else{
        $sql = "select * from weixin_flag where (status=2 or status=3) and fakeid>0 and PID=".$pid;
        $sqlData = $db->getAll($sql);
        foreach($sqlData as $k=>$row1)
        {
            $data[] = array(
                'id' => $row1['id'],
                'avatar' => $row1['avatar'],
                'nickname' => $row1['nickname'],
                'code' => $row1['code'],
            );
        }
    }
    $pageArray['data'] = $data;
    echo json_encode($pageArray);exit;
}else if($action=="ok"){ //标识中奖号码 
    $id = $_POST['id']; 
    $sql = "update weixin_flag set status=1,cjstatu=0 where id=$id"; 
    $query = mysql_query($sql); 
	if($xuanzezu[10]){ 
    $query2 = mysql_query("select * from weixin_flag where id = $id"); 
	$row2=mysql_fetch_array($query2);
	include("../../moni/cj.php");
		$contant = '恭喜恭喜！您已中奖，请按照主持人的提示，到指定地点领取您的奖品！您的获奖验证码是：【'.$row2['fakeid'].'】';
		sendmassage($token,$row2['fakeid'],$contant,$cookie,$cookies);
	}
    if($query){ 
        echo '1'; 
    } 
} 

?>