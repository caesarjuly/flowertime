	<?php $this->load->view('admin/include/customer_nav.php'); ?>
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
     <p class="title">您可以管理查看所有会员：</p>
	<ul class="notice">
		<li>点击下边的列表可查看待激活会员</li>
	</ul>
	<ul class="sorttype">
		<li></li>
		<li><?php echo anchor('admin/Admin_customer/test','已激活的会员')?></li>
		<li><?php echo anchor('admin/Admin_customer/show_unactive_customer','待激活的会员')?></li>
	</ul>

	<table class="sort">
	<tr>
	<th >用户名</th>
	<th >电话</th>
	<th >Email</th>
	<th>地址</th>
	<th>操作</th>
	</tr>
	<?php if(isset($contents) && count($contents))
	{
		foreach ($contents as $content)
		{
			?>
	<tr>
		<td><?php echo $content['name']?></td>
		<td><?php 
		if($content['phone'] == NULL)
		{
			echo "无";
		}
		else
		{
			echo $content['phone'];
		}
		?></td>
		<td><?php if($content['email'] == NULL)
		{
			echo "无";
		}
		else
		{
			echo $content['email'];
		}
		?></td>
		<td><?php
		if($content['address'] == NULL)
		{
			echo "无";
		}
		else
		{
			echo $content['address'];
		}
		?></td>
		<td><?php echo anchor('admin/Admin_customer/edit_customer/' . $content['customer_id'],'编辑')?>|<?php echo anchor('admin/Admin_customer/delete_actived_customer/' . $content['customer_id'],'删除')?></td>
	</tr>
	<?php 
		}
	}
	?>
	</table>
	<p align="center" class="sort"><?php echo $pagination;?></p>
	</div>
