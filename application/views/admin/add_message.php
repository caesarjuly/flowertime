	<?php $this->load->view('admin/include/message_nav.php'); ?>

	<div id="main_zone">
	<?php echo form_open('admin/Admin_message/add_message/')?>
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
    
      <tr>
      <td class="left_title_2">用户姓名:</td>
      <td><p> &nbsp;&nbsp;&nbsp;<input type="text" class="txt" name='title' ><font color="red"><?php echo form_error('title');?></font>
        </td></tr>
        <tr>
        <td class="left_title_2">用户留言：</td>
      <td><textarea name="add_customer_message" rows="6" cols="95"></textarea><?php echo form_error('add_customer_message')?></td></tr>
      <tr><td class="left_title_2">管理员回复：</td>
      <td>
       <textarea name="add_message" rows="11" cols="95"></textarea><?php echo form_error('add_message')?>
		</td>
    </tr>
  	</table>
  	
  	<p  align="center">
  	<input type="submit" value="确定"/>
  	<input type="reset" value="取消"/>
  	</p>
  	<?php echo form_close()?>
	</div>

