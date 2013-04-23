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
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
        <tr>
      <td class="left_title_1">在下面添加超市分类：</td>
      <td>&nbsp;</td>
    <tr>
      <td class="left_title_2">分类内容：</td>
      <td>
      <form name = "form2" action="<?php echo site_url();?>admin/Admin_market/edit_market/<?php echo $contents['market_id']?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" >
               <p> 分类标题:&nbsp;&nbsp;&nbsp;<input type="text" class="txt" name='title' value="<?php echo $contents['title']; ?>"/></p><font color="red"><?php echo form_error('title');?></font>
               
               <p> 分类标题图:&nbsp;&nbsp;&nbsp;<input type="file" name="titleurlfile" value=""  /></p><font color="red"><?php echo form_error('titleurlfile');?></font>
               <p> 分类介绍图:&nbsp;&nbsp;&nbsp;<input type="file" name="urlfile" value=""  /></p><font color="red"><?php echo form_error('urlfile');?></font>
	                                        自选须知： <textarea id="content2" name="content2"  style="visibility:hidden; " ><?php echo $contents['notice']?></textarea>

	 <?php echo form_submit('upload','确定'); echo form_reset('reset','重置');?>
	</form>
	</td>
    </tr>
    </table>
	</div>