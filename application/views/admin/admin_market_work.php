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
    <p class="title">您可以管理各分类下的内容：</p>
	<ul class="notice">
		<li>点击下边的分类即可查看不同分类下的内容</li>
	</ul>
	<?php if(isset($contents) && count($contents))
	{
		?>
		<ul class="sorttype">
		<?php foreach ($contents as $content)
		{
			?>
		<li><?php echo anchor('admin/Admin_market_work/index/' . $content['market_id'],$content['title'])?></li>
			<?php 
		}?>
		</ul>
	<?php }?>
	

	<table class="sort">
	<tr>
	<th>名称</th>
	
	<th>价格</th>
	<th>图片</th>
	<th>操作</th>
	</tr>
	<?php if(isset($works) && count($works))
	{
		foreach ($works as $work)
		{
			?>
	<tr>
	<td><?php echo $work['title'];?></td>
	<td><?php echo $work['price'];?>
		<td>
			<img src="<?php echo base_url() . $work['url']; ?>" />
		</td>
		
		<td><?php echo anchor(base_url() . 'admin/Admin_market_work/edit_view/' . $work['market_work_id'], "编辑");?>|<?php echo anchor(base_url() . 'admin/Admin_market_work/delete_market_work/' . $work['market_work_id'], '删除');?></td>
	</tr>
	<?php }
		}?>
		</table>
		<table class="sort">
	<tr>
	<td>			<a href="<?php echo site_url()?>admin/Admin_market_work/add_view/<?php echo $this->uri->segment(4);?>"><input type="submit" name="upload" value="添加新作品"  /></a>
				
</td>
		<td></td>
		
		
		
	</tr>
	</table>
	</div>
