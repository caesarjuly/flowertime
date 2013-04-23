	<?php $this->load->view('admin/include/message_nav.php'); ?>
	<script type="text/javascript">
$(function(){
$(".toggle dl dt").click(function(){
$(".toggle dl dd").not($(this).next()).hide();
$(".toggle dl dt").not($(this).next()).removeClass("current");
$(this).next().slideToggle(500);
$(this).toggleClass("current");
});
});
</script>
	<div id="main_zone">
	 <p class="title">您可以管理查看所有已回复留言：</p>
	<ul class="notice">
		<li>您可以直接查看所有已回复留言</li>
		<li>删除此留言会一并删除回复</li>
	</ul>
	<ul class="sorttype">
		<li></li>
		<li><?php echo anchor('admin/Admin_message/show_normal_message','用户留言')?></li>
		<li><?php echo anchor('admin/Admin_message/show_normal_activity_message','活动留言')?></li>
		<li><?php echo anchor('admin/Admin_message/show_normal_course_message','摄影课堂留言')?></li>
	</ul>

	<table class="sort">
	<tr>
	<th >用户</th>
	<th >内容</th>
	<th >留言时间</th>
	<th>回复</th>
	<th>回复时间</th>
	<th>操作</th>
	</tr>
	<?php if(isset($contents) && count($contents))
	{
		foreach ($contents as $content)
		{
			?>
	<tr>
		<td><?php echo $content['name']?></td>
		<td><?php echo $content['content']?></td>
		<td><?php echo date('Y年m月d日  H:i:s ',$content['date'])?></td>
		<td><?php echo $content['reply']?></td>
		<td><?php echo date('Y年m月d日  H:i:s ',$content['reply_date']);?></td>
		<td><?php echo anchor('admin/Admin_message/edit_course_message_view/' . $content['message_id'],'编辑')?>|<?php echo anchor('admin/Admin_message/delete_course_reply_message/' . $content['message_id'],'删除')?></td>
	</tr>
	<?php 
		}
	}
	?>
	</table>
	<p align="center" class="sort"><?php echo $pagination;?></p>
   	</div>