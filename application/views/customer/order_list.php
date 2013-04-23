	<div id="main">
	<div id="content">
		<br>
		<div id="message_list">
			<p style="font-size:20px;padding:0 0 10px 270px;color:#c1262a;">订单管理</p>
			<table class="sort">
			<tr>
			<th >套系名</th>
			<th >订单者姓名</th>
			<th >预定时间</th>
			<th >订单状态</th>
			<th>操作</th>
			</tr>
			<?php 
			if(isset($contents) && count($contents))
			{
				foreach ($contents as $content)
				{		
			?>
				<tr>
				<td><?php echo $content['series_name'] ?></td>
				<td><?php echo $content['customer_name'] ?></td>
				<td><?php echo date('Y年m月d日  H:i:s ',$content['date'])?></td>
				<?php 
				if($content['charge'] == 0)
				{?>
					<td>未付款</td>
					<td><?php echo anchor('customer/Customer_charge/confirm_order/' . $content['order_id'],'付款');?>|<?php echo anchor('customer/Customer_charge/delete_order/' . $content['order_id'],'删除');?></td>
				<?php }
				else if ($content['check'] == 0)
				{?>
				<td>已付款，等待确认</td>
				<td><?php echo anchor('customer/Customer_charge/show_order/' . $content['order_id'],'查看');?></td>
				<?php 
				}
				else if($content['is_closed'] == 0)
				{?>
				<td>订单已确认付款</td>
				<td><?php echo anchor('customer/Customer_charge/show_order/' . $content['order_id'],'查看');?></td>
				<?php 	
				}
				else 
				{?>
				<td>订单已关闭</td>
				<td><?php echo anchor('customer/Customer_charge/show_order/' . $content['order_id'],'查看');?></td>
				<?php 	
				}
				?>
				
				</tr>
				<?php 
				}
			}?>
			</table>

		</div>
		
	</div>
	</div>