<?php $this->load->view('admin/include/active_nav.php'); ?>

	<div id="main_zone">
    <p class="title">您可以管理超市分类：</p>
	<ul class="notice">
		<li>标题图是显示在列表页面的标题</li>
		<li>介绍图是显示在外面的</li>
	</ul>
<ul class="sorttype">
		<li></li>
		
	</ul>
	
	<table class="sort">
	<tr>
	<th >分类名</th>
	<th >分类图</th>
	<th >介绍图</th>
	<th>操作</th>
	</tr>
<?php if(isset($contents) && count($contents))
	{
		foreach ($contents as $content)
		{
			?>
	<tr>
		<td><?php echo $content['title']?></td>
		<td><img src="<?php echo $content['title_url'];?>"></td>
		<td><img src="<?php echo $content['url'];?>"></td>
		<td><?php echo anchor('admin/Admin_market/edit_market_view/' . $content['market_id'],'编辑');?>|<?php echo anchor('admin/Admin_market/delete_market/' . $content['market_id'],'删除')?></td>

	</tr>
			<?php 
		}
	}?>
	<tr>
		<td><a href="<?php echo site_url()?>admin/Admin_market/add_market_view"><input type="BUTTON" value="添加新分类"></a></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	</table>
	</div>