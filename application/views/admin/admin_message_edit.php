	<?php $this->load->view('admin/include/message_nav.php'); ?>

	<div id="main_zone">
	<?php echo form_open('admin/Admin_message/edit_message/' . $contents['message_id'])?>
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
    
    <tr>
      <td class="left_title_2">用户姓名:</td>
      <td><p> &nbsp;&nbsp;&nbsp;<input type="text" class="txt" name='name' value="<?php echo $contents['add_customer_name']?>"/></p><font color="red"><?php echo form_error('name');?></font>
        </td></tr>
        <tr>
        <td class="left_title_2">用户留言：</td>
      <td><textarea name="add_customer_message" rows="6" cols="95"><?php echo $contents['add_customer_message']?></textarea><?php echo form_error('add_customer_message')?></td></tr>
      <tr><td class="left_title_2">管理员回复：</td>
      <td>
       <textarea name="add_message_content" rows="11" cols="95"><?php echo $contents['content']?></textarea><?php echo form_error('add_message_content')?>
		</td>
    </tr>
  	</table>
  	<br>
  	<p  align="center">
  	<input type="submit" value="确定"/>
  	<input type="reset" value="取消"/>
  	</p>
  	<?php echo form_close()?>
	</div>

