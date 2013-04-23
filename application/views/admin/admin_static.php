<?php $this->load->view('admin/include/static_nav.php'); ?>

	<div id="main_zone">
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
     <tr>
      <td class="left_title_2">亲爱的管理员^_^!</td>
      <td></td>
    </tr>
    <tr>
      <td class="left_title_1">您可以在下面修改站点的基本信息：</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="left_title_2"></td>
      <td>&nbsp;</td>
    </tr>
    <?php echo form_open('admin/Admin_static/update_info')?>
    <?php foreach ($info->result() as $row) {?>
    <tr>
      <td class="left_title_1"><?php echo $row->title;?></td>
      <td><?php echo form_input($row->name,$row->content);?></td>
    </tr>
    <?php }?>
    <tr>
      <td class="left_title_2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="left_title_2">&nbsp;</td>
      <td><?php echo form_submit('submit','确定'); echo form_reset('reset','重置');?></td>
    </tr>
    <?php echo form_close();?>
    <tr>
      <td class="left_title_2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td class="left_title_2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  	</table>
	</div>
