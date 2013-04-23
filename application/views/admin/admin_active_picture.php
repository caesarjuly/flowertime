<?php $this->load->view('admin/include/active_nav.php'); ?>

<script type="text/javascript">
 function check(){
  if(form2.userfile.value==""){
   alert("请您先选择要上传的本地图片");
   return false;
  }
 }
</script>
	<div id="main_zone">
    <p class="title">您可以管理作品：</p>
	<ul class="notice">
		<li>点击下边的分类即可查看不同分类下的作品</li>
	</ul>
	<?php if(isset($contents) && count($contents))
	{
		?>
		<ul class="sorttype">
		<?php foreach ($contents as $content)
		{
			?>
		<li><?php echo anchor('admin/Admin_active/show_work_byseries/' . $content['album_id'],$content['name'])?></li>
			<?php 
		}?>
		</ul>
	<?php }?>
	

	<table class="sort">
	<tr>
	<th>文件名</th>
	
	<th>操作</th>
	</tr>
	<?php if(isset($works) && count($works))
	{
		foreach ($works as $work)
		{
			?>
	<tr>
		<td>
		<a href = "<?php echo base_url() . $work['url']; ?>">
			<img src="<?php echo base_url() . $work['thumbnail_url']; ?>" />
		</a>
		</td>
		
		<?php $a = ('admin/Admin_active/delete_work'). '/' . $work['work_id']?>
		<td><?php echo anchor($a,'删除')?></td>
	</tr>
	<?php }
		}?>
		</table>
		<table class="sort">
	<tr>
		<td><form name = "form2" action="<?php echo site_url();?>admin/Admin_active/add_work/<?php echo $this->uri->segment(4);?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" onsubmit = "return check()">		
		<input type="file" name="userfile" value=""  />
		<input type="submit" name="upload" value="添加新图片"  />		
		</form></td>
		<td></td>
		
		
		
	</tr>
	</table>
	</div>
