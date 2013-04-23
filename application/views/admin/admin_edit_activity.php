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
	 <form name = "form2" action="<?php echo site_url();?>admin/Admin_activity/edit_activity/<?php echo $images['activity_id'];?> " method="post" accept-charset="utf-8" enctype="multipart/form-data" >
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
        <tr>
      <td class="left_title_2">活动标题:</td>
      <td><input type="text" class="txt" name='title' value="<?php echo $images['title']?>"/></p><font color="red"><?php echo form_error('title');?></font></td>
      </tr>
    <tr>
      <td class="left_title_2">活动图片:（留空即不修改）</td>
      <td><input type="file" name="userfile"  value=""/></td>
      </tr>
      <tr>
      <td class="left_title_2">活动详情：</td>
      <td>
		<textarea id="content2" name="content2"  style="visibility:hidden; "><?php echo $images['content']?></textarea>
	 	<?php echo form_submit('upload','确定'); echo form_reset('reset','重置');?>

	</td>
	
	</tr>
    </table>
   </form>
	</div>