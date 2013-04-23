	<?php $this->load->view('admin/include/index_nav.php'); ?>

	<div id="main_zone">
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
    <tr>
      <td class="left_title_2">亲爱的管理员^_^!</td>
      <td></td>
    </tr>
    <tr>
      <td class="left_title_1">您还有如下信息需要处理：</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="left_title_2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="left_title_1">首页图片数：</td>
      <td><?php echo $index_picture_num?>张！</td>
    </tr>
    <tr>
      <td class="left_title_2">作品分类数：</td>
      <td><?php echo $album_num?>个！</td>
    </tr>
    
    <tr>
      <td class="left_title_2">留言条数：</td>
      <td><?php echo $message_num ?>条！</td>
    </tr>
    
    <tr bgcolor="#FFFFFF">
      <td class="left_title_2">您发布的活动数：</td>
      <td><?php echo $activity_num?>个！</td>
    </tr>
	
    <tr bgcolor="#FFFFFF">
      <td class="left_title_2">您共享的摄影课堂文章：</td>
      <td><?php echo $course_num?>篇！</td>
    </tr>

  	</table>
	</div>

