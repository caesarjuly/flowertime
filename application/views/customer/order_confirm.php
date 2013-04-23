	<div id="main">
	<div id="content">
		<br>
		<div id="login">
			<p style="font-size:20px;padding:0 0 10px 90px;color:#c1262a;">支付订单</p>
			<table >
			<tr>
				<td >订单者姓名：</td>
				<td ><?php echo $contents['customer_name']?></td>
			</tr>
			<tr>
				<td>孩子姓名：</td>
				<td ><?php echo $contents['kid_name']?></td>
			</tr>
			<tr>
				<td>孩子生日：</td>
				<td ><?php echo $contents['birthday']?></td>
			</tr>
			<tr>
				<td>联系方式①：</td>
				<td ><?php echo $contents['telephone1']?></td>
			</tr>
			<tr>
				<td>联系方式②：</td>
				<td ><?php echo $contents['telephone2']?></td>
			</tr>
			<tr>
				<td>邮箱：</td>
				<td ><?php echo $contents['email']?></td>
			</tr>
			<tr>
				<td>套系名：</td>
				<td ><?php echo $contents['series_name']?></td>
			</tr>
			<tr>
				<td>预定时间：</td>
				<td ><?php echo date('Y年m月d日  H:i:s ',$contents['date'])?></td>
			</tr>
			<tr>
				<td>预订价格：</td>
				<td ><?php echo $contents['price']?>&nbsp;<font color = "red">RMB</font></td>
			</tr>
			<tr>
				<td >订单状态：</td>
				<?php 
				if($contents['charge'] == 0)
				{?>
					<td>未付款</td>
				<?php }
				else if ($contents['check'] == 0)
				{?>
				<td>已付款，等待确认</td>
				<?php 
				}
				else if($contents['is_closed'] == 0)
				{?>
				<td>订单已确认付款</td>
				<?php 	
				}
				else 
				{?>
				<td>订单已关闭</td>
				<?php 	
				}
				?>
			</tr>
			<tr>
				<td ></td>
				<td><?php echo $form;?></td>
			</tr>
			</table>
		</div>
		
	</div>
	</div>