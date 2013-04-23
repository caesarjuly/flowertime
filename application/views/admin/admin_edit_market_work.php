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
		

</script>
	<div id="main_zone">
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
        <tr>
      <td class="left_title_1">在下面编辑作品：</td>
      <td>&nbsp;</td>
    <tr>
      <td class="left_title_2">作品：</td>
      <td>
      <form name = "form2" action="<?php echo site_url();?>admin/Admin_market_work/edit_market_work/<?php echo $contents['market_work_id'] ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
               <p> 作品标题:&nbsp;&nbsp;&nbsp;<input type="text" class="txt" name='title' value="<?php echo $contents['title']?>"/></p><font color="red"><?php echo form_error('title');?></font>
               
               <p> 作品价格:&nbsp;&nbsp;&nbsp;<input type="text" name="price" value="<?php echo $contents['price']?>"  /></p><font color="red"><?php echo form_error('price');?></font>
               <p> 作品介绍图:&nbsp;&nbsp;&nbsp;<input type="file" name="userfile" value=""  /></p><font color="red"><?php echo form_error('userfile');?></font>
	                                        作品介绍： <textarea id="content2" name="content2"  style="visibility:hidden; " ><?php echo $contents['content']?></textarea>

	 <?php echo form_submit('upload','确定'); echo form_reset('reset','重置');?>
	</form>
	</td>
    </tr>
    </table>
	</div>