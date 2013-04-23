		<?php $this->load->view('admin/include/message_nav.php'); ?>

	<div id="main_zone">
	 <p class="title">您可以管理查看所有留言：</p>
	<ul class="notice">
		<li>您可以直接查看所有留言</li>
	</ul>
	<ul class="sorttype">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>

	<table class="sort" style="table-layout:fixed;">
	<tr>
	<th >用户姓名</th>
	<th >用户留言内容</th>
	<th >管理员回复内容</th>
	<th >创建时间</th>
	<th>操作</th>
	</tr>
	<?php if(isset($contents) && count($contents))
	{
		foreach ($contents as $content)
		{
	?>
	<tr>
		<td><?php echo $content['add_customer_name']?></td>
		<td ><div ><?php echo $content['add_customer_message']?></div></td>
		<td ><?php echo $content['content']?></td>
		<td><?php echo date('Y年m月d日  H:i:s ',$content['date'])?></td>
		<td><?php echo anchor('admin/Admin_message/edit_message_view/' . $content['message_id'],'编辑')?>|<?php echo anchor('admin/Admin_message/delete_message/' . $content['message_id'],'删除')?></td>
	</tr>
	
	<?php 
		}
	}
	
		?>
		<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td><a href="<?php echo base_url();?>admin/Admin_message/add_message_view/" ><input type="button" value="添加留言"></a></td>
	</tr>
	</table>
<p align="center" class="sort"><?php echo $pagination;?></p>
   	</div>
