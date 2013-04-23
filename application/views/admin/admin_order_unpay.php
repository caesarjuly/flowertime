	<?php $this->load->view('admin/include/order_nav.php'); ?>
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
    <p class="title">您可以管理最新订单：</p>
	<ul class="notice">
		<li>点击下边的分类可以查看已支付和未支付的订单</li>
		<li>已经确认支付成功的订单会自动从最新订单消失，请到订单列表里查看</li>
	</ul>
	<ul class="sorttype">
		<li></li>
		<li><?php echo anchor('admin/Admin_order/test','待确认已支付的订单')?></li>
		<li><?php echo anchor('admin/Admin_order/show_unpay_order','未支付订单')?></li>
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
		<td><?php echo $content['customer_name'] ?></td>
		<td><?php echo $content['kid_name'] ?></td>
		<td><?php echo $content['birthday'] ?></td>
		<td><?php echo $content['email'] ?></td>
		<td><?php echo $content['series_name'] ?></td>
		<td><?php echo $content['telephone1'] ?></td>
		<td><?php echo $content['telephone2'] ?></td>
		<td><?php echo anchor('admin/Admin_order/show_detail/' . $content['order_id'],'查看详情')?></td>
	</tr>
	<?php }
		}
		?>
	</table>
	<p align="center" class="sort"><?php echo $pagination;?></p>
	</div>
