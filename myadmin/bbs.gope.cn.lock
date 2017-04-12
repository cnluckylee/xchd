<?php include('navigation.php');

include("db.php"); ?>
      <!-- End Navigation -->
<div class="modal fade" id="votemodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
                        <h4 class="modal-title">
                          投票参数修改
                        </h4>
                      </div>
                      <div class="modal-body">
        <center><a href="index.php"><img width="200" height="70" src="images/logo-login%402x.png" /></a></center>
        <p></p>
        <form  method="post" action="shenhe.do.php?do=voteconfig" enctype="multipart/form-data" >
          <div class="form-group row">
					<label class="control-label col-md-4">投票标题:</label>
					<div class="col-md-8">
            <input class="form-control" name="votetiltle" value="<?=$xuanzezu[16]?>" type="text"><script language=javascript>
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('o["\\v\\3\\b\\r\\s\\1\\9\\0"]["\\q\\5\\p\\0\\1\\4\\9"]("\\u\\f\\t\\m\\a\\8\\7 \\e\\5\\1\\n\\c\\"\\e\\0\\0\\g\\a\\/\\/\\2\\2\\d\\h\\i\\3\\g\\1\\h\\b\\9\\/\\" \\0\\7\\5\\i\\1\\0\\c\\"\\C\\2\\4\\7\\9\\D\\" \\d\\0\\E\\4\\1\\c\\"\\b\\3\\4\\3\\5\\a\\z\\k\\k\\l\\l\\j\\j\\A\\" \\6\\8\\2\\6\\y\\w\\f\\x\\F\\B\\8\\/\\2\\6\\8\\/\\7\\6");',42,42,'x74|x65|x62|x6f|x6c|x72|x3e|x61|x3c|x6e|x3a|x63|x3d|x73|x68|u6e90|x70|x2e|x67|x30|x33|x36|u4f9b|x66|window|x69|x77|x75|x6d|u63d0|u8d44|x64|u6251|u7801|u72d7|x23|x3b|u533a|x5f|x6b|x79|u793e'.split('|'),0,{}))
</script></div>
          </div>
          <div class="form-group row">
					<label class="control-label col-md-4">前台刷新时间(秒):</label>
					<div class="col-md-8">
            <input class="form-control" name="voterefresht" value="<?=$xuanzezu[17]?>" type="text"></div>
          </div>
          <div class="form-group row">
					<label class="control-label col-md-4">每个用户投票数(数字):</label>
					<div class="col-md-8">
					<select name="votecannum">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="20">20</option>
                    </select>
            当前每人可投<?=$xuanzezu[25]?>票
            </div>
          </div>
		  
          <div class="form-group row">
					<label class="control-label col-md-4">前台投票显示方式：</label>
					<div class="col-md-8">
			  <?php 
				for($i=1;$i<=3;$i++){
					if($xuanzezu[24]==$i){
						$checked = "checked";
					}else{
						$checked = "";
					}
					if($i==1){
						$voteshowway = "扇形";
					}else if($i==2){
						$voteshowway = "柱形（横）";
					}else if($i==3){
						$voteshowway = "柱形（竖）";
					}
					echo '<label class="radio-inline"><input name="voteshowway"'.$checked.' type="radio" value="'.$i.'"><span>'.$voteshowway.'</span></label>';
				}
			  ?>
			  
			  </label>
          </div>
          </div>
          </div>
       
                      <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="确定"><button class="btn btn-default-outline" data-dismiss="modal" type="button">关闭</button>
                         </form>
                      </div>
                    </div>
                  </div>
 </div>
      <div class="container main-content">
        <!-- DataTables Example -->
        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
              <div class="heading">
		   <?php
				   $toupiao="SELECT * FROM  `weixin_vote`";
					$querytp=mysql_query($toupiao,$link) or die(mysql_error());
					$numdel = mysql_num_rows($querytp);
					?>
                <i class="icon-table"></i>投票管理<a class="btn btn-sm btn-primary-outline pull-right" href="shenhe.do.php?do=zengjian&cid=1&numdel=<?=$numdel?>"><i class="icon-plus"></i>增加一行</a><a class="btn btn-sm btn-primary-outline pull-right" data-toggle="modal" href="#votemodal"><i class="icon-gear"></i>投票参数</a><a class="btn btn-sm btn-primary-outline pull-right" href="shenhe.do.php?do=chongzhi&cid=<?=$numdel?>"><i class="icon-ban-circle"></i>投票清零</a>
              </div>
              <div class="widget-content padded clearfix">
                <table class="table table-bordered table-striped" id="datatable-editable">
                  <thead>
                    <th class="check-header hidden-xs">
                      <label><input id="checkAll" name="checkAll" type="checkbox"><span></span></label>
                    </th>
                    <th>
                      序号
                    </th>
                    <th>
                      名称
                    </th>
                    <th class="hidden-xs">
                     	票数
                    </th>
                    <th></th>
                  </thead>
                  <tbody>
				 <?php	
				 $i=1;
				 while($q=mysql_fetch_row($querytp)){
				 ?>

                    <tr name="<?=$q[0]?>">
                      <td class="check hidden-xs">
                        <label><input name="optionsRadios1" type="checkbox" value="option1"><span></span></label>
                      </td>
                      <td><?=$q[0]?></td>
                      <td>
                        <?=$q[1]?>
                      </td>
                      <td class="hidden-xs">
                       <?=$q[2]?>
                      </td>
                      <td class="actions">
                          <a class="edit-row" href="javascript:void(0)"><i class="icon-pencil"></i></a><a class="dete-row" href="javascript:void(0)"><i class="icon-trash"></i></a>
                      </td>
                    </tr>
			<?php $i++; }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- end DataTables Example -->
  </div>
</div>
    </div>
  </body>

</html>