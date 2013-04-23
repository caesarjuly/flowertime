	<div id="main">
	<div id="content">
		<br>
		<div id="message_list">
			<p style="font-size:20px;padding:0 0 10px 270px;color:#c1262a;">通知管理</p>
			<table class="sort">
			<tr>
			<th >标题</th>
			<th >内容</th>
			<th >通知时间</th>
			<th >操作</th>
			</tr>
			<?php 
			if(isset($contents) && count($contents))
			{
				foreach ($contents as $content)
				{		
			?>
					<tr>
					<td><?php echo $content['title'] ;?></td>
					<td><font color="red"><?php echo $content['message'] ;?></font></td>
					<td><?php echo date('Y年m月d日  H:i:s ',$content['date']);?></td>
					<td><?php echo anchor('customer/Customer_notice/delete/' . $content['notice_id'] , '删除');?></td>
					</tr>
					<?php 
				}
			}?>
			</table>

		</div>
		
	</div>
	</div>