<?php $this->load->view('admin/include/active_nav.php'); ?>

	<div id="main_zone">
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
        <tr>
      <td class="left_title_1">您可以在下面添加新的课程：</td>
      <td>&nbsp;</td>
    <tr>
      <td class="left_title_2">新课程内容：</td>
      <td>
      <?php echo form_open('admin/Admin_course/edit_course_answer/' . $contents['course_id']);?>
               <p> 课程名：<input type="text" class="txt" name='title' value = "<?php echo $contents['title']?>"/></p>
           
	 课程内容： <textarea id="content2" name="content2"  style="visibility:hidden; "><?php echo $contents['content']?></textarea>
	 <?php echo form_submit('submit','确定'); echo form_reset('reset','重置');?>
	 <?php echo form_close();?>
	</td>
    </tr>
    </table>
	</div>