	<?php $this->load->view('admin/include/static_nav.php'); ?>
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
        <tr>
      <td class="left_title_1">您可以在下面修改拍摄流程的介绍信息：</td>
      <td>&nbsp;</td>
    <tr>
      <td class="left_title_2">拍摄流程简介：</td>
      <td>
	   <?php echo form_open('admin/Admin_static/update_process');?>
	  <textarea id="content2" name="process" style="visibility:hidden;"><?php echo $process->row()->content;?></textarea>
	  <?php echo form_submit('submit','确定'); echo form_reset('reset','重置');?>
	  <?php echo form_close();?>
	</td>
    </tr>

    </table>
	</div>
