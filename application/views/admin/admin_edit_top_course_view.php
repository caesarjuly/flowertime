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
	 <form name = "form2" action="<?php echo site_url();?>admin/Admin_course/edit_top_course/<?php echo $contents['course_id']?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" >
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
       
        <tr>
      <td class="left_title_2">课程名：</td>
      <td><input type="text" class="txt" name='title' value = "<?php echo $contents['title']?>"/></td>
    <tr>
      <td class="left_title_2">课程置顶图：（留空即不修改）</td>
      <td>		<input type="file" name="userfile" value=""  /></td>
      </tr>
      <tr>
      <td class="left_title_2">置顶简介：</td>
      <td>	 <textarea style="width:300px;" name="top_course" rows="10" cols="110"><?php echo $contents['top_content']?></textarea><?php echo form_error('top_course')?></td>
      <tr>
      <td class="left_title_2">课程内容：</td>
      <td> <textarea id="content2" name="content2"  style="visibility:hidden; "><?php echo $contents['content']?></textarea>
     
              
<input type="submit" name="upload" value="确定"  />
		<input type="reset" value="取消"/>
		</p>

	</td>
    </tr>
    </table>
    </form>
	</div>