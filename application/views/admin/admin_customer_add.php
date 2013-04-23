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
      <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
       <?php echo form_open('admin/Admin_customer/add_customer')?>
        <tr>
      <td class="left_title_1">用户名：</td>
      <td><input type="TEXT" name="name" value="<?php echo set_value('name');?>"><?php echo form_error('name');?></td>
      
    </tr>
    <tr>
      <td class="left_title_2">密码：</td>
      <td><input type="PASSWORD" name="password"><?php echo form_error('password');?></td>
    </tr>
    <tr>
      <td class="left_title_1">手机号：</td>
      <td><input type="TEXT" name="phone" value="<?php echo set_value('phone');?>"><?php echo form_error('phone');?></td>
    </tr>
     <tr>
      <td class="left_title_2">Email：</td>
      <td><input type="TEXT" name="email" value="<?php echo set_value('email');?>"><?php echo form_error('email');?></td>
    </tr>
    <tr>
      <td class="left_title_2">地址：</td>
      <td><input type="TEXT" name="address" value="<?php echo set_value('address');?>"><?php echo form_error('address');?></td>
    </tr>
	<tr>
      <td class="left_title_1">&nbsp;</td>
      <td><input type="SUBMIT" value="确定"><input type="RESET"></td>
    </tr>
    <?php echo form_close()?>
   

  	</table>
	</div>
