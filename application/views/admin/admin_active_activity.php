<?php $this->load->view('admin/include/active_nav.php'); ?>



	<div id="main_zone">
    <p class="title">您可以管理活动文章的发布与更新：</p>
	<ul class="notice">
		<li>写活动的时候多注意些排版哦！</li>
	</ul>
	
	<table class="sort">
	<tr>
	<th> 活动标题</th>
	<th >缩略图</th>
	<th >创建时间</th>
	<th >最新更改时间</th>
	
	<th>操作</th>
	</tr>
	<?php if(isset($images) && count($images))
		{
			foreach ($images as $image)
			{		
		?>
	<tr>
			<td><?php echo $image['title']?></td>
			<TD ><IMG 
			onmouseover='showInfo(this,"<?php echo $image['title']?>")'
			onmouseout=closeInfo()
			src="<?php echo $image['thumb_url'];?>" 
			/></TD>
			<td><?php echo date('Y年m月d日  H:i:s',$image['create_date']);?></td>
			<?php if($image['change_date'] == NULL)
			{?>
			<td>未曾更改</td>
			<?php }
			else
			{?>
			<td><?php echo date('Y年m月d日  H:i:s ',$image['change_date']);?></td>
			<?php }?>
			<td><?php echo anchor('admin/Admin_activity/edit_activity_view/' . $image['activity_id'],'编辑');?>|<?php echo anchor('admin/Admin_activity/delete_activity/' . $image['activity_id'],'删除')?></td>
				
	</tr>
	<?php   }
		}?>

	<tr>
		<td><a href="<?php echo site_url()?>admin/Admin_activity/add_activity_view"><input type="BUTTON" value="添加新活动"></a></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	</table>
	<p align="center" class="sort"><?php echo $pagination;?></p>
	<DIV id=box_k style="DISPLAY: none; LEFT: 0px; POSITION: absolute; TOP: 0px">
<TABLE cellSpacing=0 cellPadding=0 border=0>
 	 <TBODY>
  		<TR>
    		<TD class=box>&nbsp;</TD>
    	</TR>
    </TBODY>
</TABLE>
</DIV>
	</div>
