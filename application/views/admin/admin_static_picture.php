	<?php $this->load->view('admin/include/static_nav.php'); ?>

<script type="text/javascript">
 function check(){
  if(form2.userfile.value==""){
   alert("请您先选择要上传的本地图片");
   return false;
  }
 }
</script>
	<div id="main_zone">
    <p class="title">您可以添加和删除首页图片：<p>
	<ul class="notice">
		<li>请注意图片的统一大小</li>
		<li>上传图片时请注意命名等要求</li>
	</ul>
	<table class="sort">
	<tr>
	<th >图片名</th>
	<th >图片格式</th>
	<th >图片大小</th>
	<th>操作</th>
	</tr>
		<?php if(isset($images) && count($images))
		{
			foreach ($images as $image)
			{		
		?>
		<tr>
		<td>
		<a href = "<?php echo $image['url']; ?>">
			<img src="<?php echo $image['thumb_url']; ?>" />
		</a>
		</td>
		<td><?php echo $image['file_type'] ?></td>
		<td><?php echo $image['file_size'] ?>KB</td>
		<?php $a = ('admin/Admin_static/delete_picture'). '/' . $image['id']?>
		<td><?php echo anchor($a,'删除')?></td>
		</tr>
		<?php }
		}
		?>
		</table>
		<table class="sort">
	<tr>
		<td>
		<form name = "form2" action="<?php echo site_url();?>admin/Admin_static/add" method="post" accept-charset="utf-8" enctype="multipart/form-data" onsubmit = "return check()">		
		<input type="file" name="userfile" value=""  />
		<input type="submit" name="upload" value="添加新图片"  />		
		</form>
		</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	</table>
