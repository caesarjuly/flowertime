<script type="text/javascript">
 function check(){
  if(form1.name.value==""){
   alert("请输入会员姓名");
   return false;
  }
 }
 </script>	
 
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
     <p class="title">您可以搜索所有会员：</p>
	<ul class="notice">
		<li>直接根据会员名搜索就可以了</li>
	</ul>
	<ul class="sorttype">
	<li>输入会员姓名：</li>
	<form name = "form1" action = "search_customer" method = "post" onsubmit = "return check()">
	<li><input type="TEXT" name='name'></li>
	<li><input type="submit" value="提交"></li>
	</form>
	</ul>

	<table class="sort">
	<tr>
	<th >用户名</th>
	<th >电话</th>
	<th >Email</th>
	<th>地址</th>
	<th>是否激活</th>
	<th>操作</th>
	</tr>
	<?php if(isset($contents) && count($contents))
		{
			foreach ($contents as $content)
			{		
		?>
		<tr>
		<td><?php echo preg_replace("/($name)/i","<font color='red'><b>\\1</b></font>", $content['name'])?></td>
		<td><?php echo $content['phone'] ?></td>
		<td><?php echo $content['email'] ?></td>
		<td><?php echo $content['address'] ?></td>
		<td>
		<?php 
		if($content['is_actived'] == 1)
		{
			echo '是';
		?>
		</td>
		<td><?php echo anchor('admin/Admin_customer/edit_customer/' . $content['customer_id'],'编辑')?>|<?php echo anchor('admin/Admin_customer/delete_actived_customer/' . $content['customer_id'],'删除')?></td>
		</tr>
		<?php 
		}
		else 
		{
			echo '否';
			?>
		</td>
		<td><?php echo anchor('admin/Admin_customer/edit_customer/' . $content['customer_id'],'编辑')?>|<?php echo anchor('admin/Admin_customer/delete_unactived_customer/' . $content['customer_id'],'删除')?></td>
		</tr>
		<?php }
		?>
		
	<?php 
			}
		}
	?>
	</table>
	</div>
