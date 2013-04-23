<?php $this->load->view('admin/include/active_nav.php'); ?>

	<?php echo form_open('admin/Admin_active/add_album')?>
	<div id="main_zone">
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
     <tr>
      <td class="left_title_1">您可以在下面添加新的分类：</td>
      <td>&nbsp;</td>
    <tr>
      <td class="left_title_2">分类名：</td>		
      <td><input type="text" class="txt" name='name'/><?php echo form_error('name')?></td>	
    </tr>
  	</table>
  	<p align="center">
  	<input type="submit" value="确定"/>
    <input type="button" value="取消"/>
    </p>
	</div>
	<?php echo form_close()?>

