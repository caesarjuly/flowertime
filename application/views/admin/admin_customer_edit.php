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
	<?php echo form_open('admin/Admin_customer/update_customer/' . $query->row()->customer_id)?>
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
    <tr>
      <td class="left_title_2">用户名：</td>
      <td><?php echo $query->row()->name?></td>
    </tr>
    <tr>
      <td class="left_title_1">电话：</td>
      <td><input type="text" name="phone" value="<?php echo $query->row()->phone?>"/><?php echo form_error('phone');?></td>
    </tr>
    <tr>
      <td class="left_title_2">地址：</td>
      <td><input type="text" name="address" value="<?php echo $query->row()->address?>"/><?php echo form_error('address');?></td>
    </tr>
    <tr>
      <td class="left_title_1">Email：</td>
      <td><input type="text" name="email" value="<?php echo $query->row()->email?>"/><?php echo form_error('email');?></td>
    </tr>
  	</table>
  	<br>
  	<p  align="center">
  	<input type="submit" value="确定"/>
  	<input type="reset" value="取消"/>
  	</p>
  	<?php echo form_close()?>
	</div>

