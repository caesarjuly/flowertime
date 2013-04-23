	<div id="main">
	<div id="content">
		<br>
		<div id="login">
			<p style="font-size:20px;padding:0 0 10px 90px;color:#c1262a;">查看留言</p>
			<table >
			<tr>
				<td >留言内容：</td>
				<td ><?php echo $contents['content']?></td>
			</tr>
			<tr>
				<td>留言日期：</td>
				<td ><?php echo date('Y年m月d日  H:i:s ',$contents['date'])?></td>
			</tr>
			<tr>
				<td>回复内容：</td>
				<td ><?php echo $contents['reply']?></td>
			</tr>
			<tr>
				<td>回复日期：</td>
				<td ><?php echo date('Y年m月d日  H:i:s ',$contents['reply_date'])?></td>
			</tr>
			<tr>
				<td>留言类型：</td>
				<td ><font color="red"><?php echo $type?></font></td>
			</tr>
			
			</table>
<p align="center">
			<input type="button" value="返回" onclick= "javascript:history.go(-1)"/>
</p>
		</div>
		
	</div>
	</div>