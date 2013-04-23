		<?php $this->load->view('admin/include/message_nav.php'); ?>

	<div id="main_zone">
	 <p class="title">您可以管理查看所有待回复留言：</p>
	<ul class="notice">
		<li>您可以直接查看所有待回复留言</li>
	</ul>
	<ul class="sorttype">
		<li></li>
		<li><?php echo anchor('admin/Admin_message','用户留言')?></li>
		<li><?php echo anchor('admin/Admin_message/show_activity_message','活动留言')?></li>
		<li><?php echo anchor('admin/Admin_message/show_course_message','摄影课堂留言')?></li>
	</ul>

	<table class="sort">
	<tr>
	<th >用户</th>
	<th >内容</th>
	<th >时间</th>
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
		<td><?php echo anchor('admin/Admin_message/reply_message_view/' . $content['message_id'],'回复')?>|<?php echo anchor('admin/Admin_message/delete_message/' . $content['message_id'],'删除')?></td>
	</tr>
	<?php 
		}
	}
		?>
	</table>

   	</div>
