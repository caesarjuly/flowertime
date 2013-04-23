<?php $this->load->view('admin/include/active_nav.php'); ?>
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
	            <?php echo form_open('admin/Admin_course/edit_course/' . $contents['course_id']);?>
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
 
        <tr>
      <td class="left_title_1">课程名：</td>
      <td><input type="text" class="txt" name='title' value = "<?php echo $contents['title']?>"/><font color="red"><?php echo form_error('title');?></font></td>
    <tr>
      <td class="left_title_2">课程内容：</td>
      <td>
<textarea id="content2" name="content2"  style="visibility:hidden; "><?php echo $contents['content']?></textarea><font color="red"><?php echo form_error('content2');?></font>
	 <?php echo form_submit('submit','确定'); echo form_reset('reset','重置');?>

	</td>
    </tr>
    </table>
    	 <?php echo form_close();?>
	</div>