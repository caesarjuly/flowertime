<?php $this->load->view('admin/include/active_nav.php'); ?>

	<div id="main_zone">
    <p class="title">您可以管理课程文章的发布与更新：</p>
	<ul class="notice">
		<li>写课程的时候多注意些排版哦！</li>
	</ul>
<ul class="sorttype">
		<li></li>
		<li><?php echo anchor('admin/Admin_course/test','用户问题')?></li>
		<li><?php echo anchor('admin/Admin_course/get_course_answer','吕老师答疑')?></li>
	</ul>
	
	<table class="sort">
	<tr>
	<th >标题</th>
	<th >创建时间</th>
	<th >最新更改时间</th>
	<th>是否置顶</th>
	<th>操作</th>
	</tr>
<?php if(isset($contents) && count($contents))
	{
		foreach ($contents as $content)
		{
			?>
	<tr>
		<td><?php echo $content['title']?></td>
		<td><?php echo date('Y年m月d日  H:i:s ',$content['create_date']);?></td>
		<?php if($content['change_date'] == NULL)
			{?>
			<td>未曾更改</td>
			<?php }
			else
			{?>
			<td><?php echo date('Y年m月d日  H:i:s ',$content['change_date']);?></td>
			<?php }?>
			<?php if($content['top'] == 0)
			{?>
			<td>否</td>
			<td><?php echo anchor('admin/Admin_course/edit_course_answer_view/' . $content['course_id'],'编辑');?>|<?php echo anchor('admin/Admin_course/top_course_answer/' . $content['course_id'],'置顶');?>|<?php echo anchor('admin/Admin_course/delete_course_answer/' . $content['course_id'],'删除')?></td>
			<?php }
			else
			{?>
			<td>是</td>
			<td><?php echo anchor('admin/Admin_course/edit_course_answer_view/' . $content['course_id'],'编辑');?>|<?php echo anchor('admin/Admin_course/untop_course_answer/' . $content['course_id'],'取消置顶');?>|<?php echo anchor('admin/Admin_course/delete_course_answer/' . $content['course_id'],'删除')?></td>
			<?php }?>
	</tr>
			<?php 
		}
	}?>
	<tr>
		<td><input type="BUTTON" value="添加新课堂" onclick="window.location.href('<?php echo site_url();?>admin/Admin_course/add_course_answer_view')"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	</table>
	<p align="center" class="sort"><?php echo $pagination;?></p>
	</div>