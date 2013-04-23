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
	<?php $this->load->view('admin/include/order_check_nav.php')?>
  	<p  align="center">
  	<?php if($contents['charge'] == 0)
  		{
  		?>
  		<input type="button" value="返回" onclick= "javascript:history.go(-1)"/>
  		<?php 
  		}
  		else if($contents['charge'] == 1 && $contents['check'] == 0)
  		{
  			echo anchor('admin/Admin_order/check/' . $contents['order_id'] , '<input type="submit" value="确认付款"/>');
  			?>
  			<input type="button" value="返回" onclick= "javascript:history.go(-1)"/>	
  		<?php }
  		else if($contents['charge'] == 1 && $contents['check'] == 1 && $contents['is_closed'] == 0)
  		{
  			echo anchor('admin/Admin_order/close_order/' . $contents['order_id'] , '<input type="submit" value="完成关闭订单"/>');
  			?>
  			<input type="button" value="返回" onclick= "javascript:history.go(-1)"/>	
  		<?php }
  		else 
  		{?>
  		<input type="button" value="返回" onclick= "javascript:history.go(-1)"/>	
  		<?php }?>
  	</p>
	</div>
