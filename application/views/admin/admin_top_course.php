<?php $this->load->view('admin/include/active_nav.php'); ?>

<script type="text/javascript">
 function check(){
  if(form2.userfile.value==""){
   alert("请您先选择要上传的置顶课堂的图片");
   return false;
  }
 }
</script>
	<div id="main_zone">
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
        <tr>
      <td class="left_title_2">置顶新的课程：</td>
      <td>&nbsp;</td>
      </tr>
      <tr>
      <td class="left_title_2">课程名：</td>
      <td><input type="text" class="txt" disabled name='title' value = "<?php echo $contents['title']?>"/></p></td>
      </tr>
        <tr>
       <form name = "form2" action="<?php echo site_url();?>admin/Admin_course/top_course/<?php echo $this->uri->segment(4);?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" onsubmit = "return check()">		
      <td class="left_title_2">置顶图片：</td>
      <td>	<input type="file" name="userfile" value=""  /></td>
      </tr>
    <tr>
      <td class="left_title_2">置顶课程简介：</td>
      <td>
     
    
		<textarea style="width:300px;" name="top_course" rows="10" cols="110"></textarea><?php echo form_error('top_course')?>
	
		
		<p><input type="submit" name="upload" value="置顶课堂"  />
		<input type="reset" value="取消"/>
		</p>	
		</form>
	</td>
    </tr>
    </table>
	</div>