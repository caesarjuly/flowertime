	<div id="main">
	<div id="content">
		<br>
		<div id="message_list">
			<p style="font-size:20px;padding:0 0 10px 270px;color:#c1262a;">留言管理</p>     
            <center>
			<table class="sort">	
	<tr>
	
	<th>留言内容</th>
	<th>留言类型</th>
	<th >留言时间</th>
	<th>状态</th>
	<th>操作</th>
	</tr>
	<?php 
	    //$name = $this->session->userdata('name');
	    if(isset($contents) && count($contents))
		{
			foreach ($contents as $content)
			{		
		?>
		<tr>
		
		<td><?php echo $content['content'] ?></td>
		<td>用户留言</td>
		<td><?php echo date('Y年m月d日  H:i:s ',$content['date'])?></td>
		<?php if($content['reply'] == NULL)
		{
		?>
		<td><font color="red"><?php echo "审核中"?></font></td>
		<td><?php echo anchor('customer/Customer_message/delete_message/' . $content['message_id'],'删除')?></td>
		<?php
		}
		else 
		{
		?>
		<td><?php echo "已回复"?></td>
		<td><?php echo anchor('customer/Customer_message/look_message/' . $content['message_id'],'查看')?>|<?php echo anchor('customer/Customer_message/delete_message/' . $content['message_id'],'删除')?></td>
		<?php }?>
		</tr>
		<?php 
			}
		}
		?>
<?php 
	    //$name = $this->session->userdata('name');
	    if(isset($contents_activity) && count($contents_activity))
		{
			foreach ($contents_activity as $content)
			{		
		?>
		<tr>
		
		<td><?php echo $content['content'] ?></td>
		<td>活动留言</td>
		<td><?php echo date('Y年m月d日  H:i:s ',$content['date'])?></td>
		<?php if($content['reply'] == NULL)
		{
		?>
		<td><font color="red"><?php echo "审核中"?></font></td>
		<td><?php echo anchor('customer/Customer_message/delete_activity_message/' . $content['message_id'],'删除')?></td>
		<?php
		}
		else 
		{
		?>
		<td><?php echo "已回复"?></td>
		<td><?php echo anchor('customer/Customer_message/look_activity_message/' . $content['message_id'],'查看')?>|<?php echo anchor('customer/Customer_message/delete_activity_message/' . $content['message_id'],'删除')?></td>
		<?php }?>
        
		
		</tr>
		<?php 
			}
		}
		?>
		
		<?php 
	    //$name = $this->session->userdata('name');
	    if(isset($contents_course) && count($contents_course))
		{
			foreach ($contents_course as $content)
			{		
		?>
		<tr>
		
		<td><?php echo $content['content'] ?></td>
		<td>课堂留言</td>
		<td><?php echo date('Y年m月d日  H:i:s ',$content['date'])?></td>
		<?php if($content['reply'] == NULL)
		{
		?>
		<td><font color="red"><?php echo "审核中"?></font></td>
		<td><?php echo anchor('customer/Customer_message/delete_course_message/' . $content['message_id'],'删除')?></td>
		<?php
		}
		else 
		{
		?>
		<td><?php echo "已回复"?></td>
		<td><?php echo anchor('customer/Customer_message/look_course_message/' . $content['message_id'],'查看')?>|<?php echo anchor('customer/Customer_message/delete_course_message/' . $content['message_id'],'删除')?></td>
		<?php }?>
        
		
		</tr>
		<?php 
			}
		}
		?>
	</table>	</center>

		</div>
		
	</div>
	</div>