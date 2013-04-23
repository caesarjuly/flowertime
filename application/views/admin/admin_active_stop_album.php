<?php $this->load->view('admin/include/active_nav.php'); ?>

	<div id="main_zone">
    <p class="title">您可以查看和管理分类：<p>
	<ul class="notice">
		<li>删除分类请谨慎，只有停用的分类才可以删除！</li>
	</ul>
	<ul class="sorttype">
		<li></li>
		<li><?php echo anchor('admin/Admin_active/test','在使用的分类')?></li>
		<li><?php echo anchor('admin/Admin_active/show_stop_album','停用的分类')?></li>
	</ul>

	<table class="sort">
	<tr>
	<th >分类名</th>
	<th >操作</th>
	</tr>
	<?php if(isset($contents) && count($contents))
	{
		foreach ($contents as $content)
		{
			if($content['in_use'] == 0)
			{
			?>
	<tr>
		<td><?php echo $content['name']?></td>
		<td><?php echo anchor('admin/Admin_active/edit_stop_album_view/' . $content['album_id'],'编辑')?>|<?php echo anchor('admin/Admin_active/start_album/' . $content['album_id'],'开启')?>|<?php echo anchor('admin/Admin_active/delete_album/' . $content['album_id'],'删除')?></td>
	</tr>
	<?php 
			}
		}
	}?>

	<tr>
	
		<td></td>
		<td></td>
	</tr>
	</table>
	</div>
