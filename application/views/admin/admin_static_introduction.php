	<?php $this->load->view('admin/include/static_nav.php'); ?>
		<script>
			KindEditor.ready(function(K) {
				K.create('#content2', {
					themeType : 'simple',
					width : '700px',
					height : '450px'
				});
			});
		</script>
	<div id="main_zone">
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
        <tr>
      <td class="left_title_1">您可以在下面修改站点的介绍信息：</td>
      <td>&nbsp;</td>
    <tr>
      <td class="left_title_2">工作室简介：</td>
      <td>
      <?php echo form_open('admin/Admin_static/update_introduction');?>
	  <textarea id="content2" name="introduction" style="visibility:hidden;"><?php echo $introduction->row()->content;?></textarea>
	  <?php echo form_submit('submit','确定'); echo form_reset('reset','重置');?>
	  <?php echo form_close();?>
	</td>
    </tr>
    </table>
	</div>
