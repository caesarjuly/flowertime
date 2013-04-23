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
		
<script type="text/javascript">
 function check(){
  if(form2.userfile.value==""){
   alert("请您先选择要上传的本地图片");
   return false;
  }
 }
</script>
	<div id="main_zone">
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
        <tr>
      <td class="left_title_1">您可以在下面添加新的活动：</td>
      <td>&nbsp;</td>
    <tr>
      <td class="left_title_2">活动内容：</td>
      <td>
      <form name = "form2" action="<?php echo site_url();?>admin/Admin_activity/add_activity " method="post" accept-charset="utf-8" enctype="multipart/form-data" onsubmit = "return check()">
               <p> 活动标题:&nbsp;&nbsp;&nbsp;<input type="text" class="txt" name='title' value="<?php echo set_value('title'); ?>"/></p><font color="red"><?php echo form_error('title');?></font>
               
               <p> 活动图片:&nbsp;&nbsp;&nbsp;<input type="file" name="userfile" value=""  /></p><font color="red"><?php echo form_error('userfile');?></font>
	                                        活动详情： <textarea id="content2" name="content2"  style="visibility:hidden; " ></textarea>

	 <?php echo form_submit('upload','确定'); echo form_reset('reset','重置');?>
	</form>
	</td>
    </tr>
    </table>
	</div>