	<?php $this->load->view('admin/include/message_nav.php'); ?>

	<div id="main_zone">
	<?php echo form_open('admin/Admin_message/edit_activity_message/' . $contents['message_id'])?>
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
    <tr>
      <td class="left_title_2">用户：</td>
      <td><?php echo $contents['name']?></td>
    </tr>
    <tr>
      <td class="left_title_1">内容：</td>
      <td><?php echo $contents['content']?></td>
    </tr>
    <tr>
      <td class="left_title_2">时间：</td>
      <td><?php echo date('Y年m月d日  H:i:s ',$contents['date'])?></td>
    </tr>
    <tr>
      <td class="left_title_1">回复：</td>
      <td><textarea name="reply"><?php echo $contents['reply']?></textarea><?php echo form_error('reply')?>
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

