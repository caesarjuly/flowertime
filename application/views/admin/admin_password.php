		<?php $this->load->view('admin/include/index_nav.php'); ?>

	<div id="main_zone">
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
    <tr>
      <td width="18%" class="left_title_1"><span class="left-title"></span></td>
      <td width="82%"></td>
    </tr>
    <tr>
      <td class="left_title_2">亲爱的管理员^_^!</td>
      <td></td>
    </tr>
    <tr>
      <td class="left_title_1">您可以在这里修改密码：</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="left_title_2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
<?php echo form_open('admin/Admin_index/change_password')?>
	<tr>
      <td class="left_title_1">原密码：</td>
      <td><input type="text" name="old_password"><?php echo form_error('name');?></td>
      
    </tr>
	<tr>
      <td class="left_title_2">新密码：</td>
      <td><input type="PASSWORD" name="new_password" value="<?php echo set_value('new_password');?>"><?php echo form_error('new_password','<p class="error">','</p>');?></td>
      
    </tr>
    <tr>
      <td class="left_title_1">再次输入新密码：</td>
      <td><input type="PASSWORD" name="again_password" value="<?php echo set_value('again_password');?>"><?php echo form_error('again_password','<p class="error">','</p>');?></td>
      
    </tr>
    
    <tr>
      <td class="left_title_2">&nbsp;</td>
      <td><?php if(isset($error)) echo $error?></td>
    </tr>
	<tr>
      <td class="left_title_1">&nbsp;</td>
      <td><input type="SUBMIT" value="确定"><input type="RESET"></td>
    </tr>
		 <?php form_close()?>
  	</table>
	</div>
