	<?php $this->load->view('admin/include/active_nav.php'); ?>
 

	<div id="main_zone">
    <p class="title">您可以管理各种套系的费用说明：</p>
	<ul class="notice">
		<li>注意钱的准确性呢！</li>
	</ul>

	<table class="sort">
	<tr>
	<th >套系名</th>
	<th >价格（RMB）</th>
	<th >中文描述</th>
	<th>英文描述</th>
	<th>操作</th>
	</tr>
	<?php if(isset($contents) && count($contents))
	{
		foreach ($contents as $content)
		{
			?>
	<tr>
		<td><?php echo $content['name']?></td>
		<td><?php echo $content['price']?></td>
		<td><?php echo $content['content']?></td>
		<td><?php echo $content['english_content']?></td>
		<td><?php echo anchor('admin/Admin_series/edit_series_view/' . $content['series_id'],'编辑')?>|<?php echo anchor('admin/Admin_series/delete_series/' . $content['series_id'],'删除')?></td>
	</tr>
			<?php 
		}
	}?>
	
	
	<tr>
		<td><a href="<?php echo site_url()?>admin/Admin_series/add_series_view"><input type="BUTTON" value="添加新套系"></a></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	</table>
	</div>