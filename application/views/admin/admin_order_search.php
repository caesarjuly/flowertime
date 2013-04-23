<script type="text/javascript">
 function check(){
  if(form1.name.value==""){
   alert("请输入订购者姓名");
   return false;
  }
 }
</script>
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
<?php $this->load->view('admin/include/order_nav.php'); ?>
	<div id="main_zone">
    <p class="title">您可以直接搜索订单订单：</p>
	<ul class="notice">
		<li>这里可以搜索到所有的订单</li>
	</ul>
	<ul class="sorttype">
	<li>输入订购者姓名：</li>
	<form name = "form1" action = "search_order" method = "post" onsubmit = "return check()">
	<li><input type="TEXT" name='name'></li>
	<li><input type="submit" value="提交"></li>
	</form>
	</ul>

	<table class="sort">
	<tr>
	<th >订购者姓名</th>
	<th >孩子姓名</th>
	<th >生日</th>
	<th>Email</th>
	<th>套系</th>
	<th>手机号</th>
	<th>备用手机号</th>
	<th>操作</th>
	</tr>
	<?php if(isset($contents) && count($contents))
		{
			foreach ($contents as $content)
			{		
		?>
	<tr> 
		<td><?php echo preg_replace("/($name)/i","<font color='red'><b>\\1</b></font>", $content['customer_name'])?></td>
		<td><?php echo $content['kid_name'] ?></td>
		<td><?php echo $content['birthday'] ?></td>
		<td><?php echo $content['email'] ?></td>
		<td><?php echo $content['series_name'] ?></td>
		<td><?php echo $content['telephone1'] ?></td>
		<td><?php echo $content['telephone2'] ?></td>
		<td><?php echo anchor('admin/Admin_order/show_detail/' . $content['order_id'],'查看详情')?></td>
	</tr>
	<?php  }
		}
	?>
	</table>
	</div>
