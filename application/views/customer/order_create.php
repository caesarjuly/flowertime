	<script language="javascript" type="text/javascript" src="<?php echo base_url();?>My97DatePicker/WdatePicker.js"></script>
	<div id="main">
	<div id="content">
		<br>
		<div id="login">
			<p style="font-size:20px;padding:0 0 10px 90px;color:#c1262a;">创建订单</p>
			<?php echo form_open('customer/Customer_pay/create_order')?>
			<table >
			<tr>
				<td style="text-align:right;">订单者姓名：</td>
				<td ><input type="text" name="customer_name" value="<?php echo set_value("customer_name");?>"><?php echo form_error('customer_name'); ?></td>
			</tr>
			<tr>
				<td style="text-align:right;">孩子姓名：</td>
				<td ><input type="text" name="kid_name" value="<?php echo set_value("kid_name");?>"><?php echo form_error('kid_name'); ?></td>
			</tr>
			<tr>
				<td style="text-align:right;">孩子生日：</td>
				<td ><input class="Wdate" type="text" onClick="WdatePicker()" name="birthday" value="<?php echo set_value("birthday");?>"><?php echo form_error('birthday'); ?></td>
				

				
			</tr>
			<tr>
				<td style="text-align:right;">联系电话①：</td>
				<td ><input type="text" name="telephone1" value="<?php echo set_value("telephone1");?>"><?php echo form_error('telephone1'); ?></td>
			</tr>
			<tr>
				<td style="text-align:right;">联系电话②：</td>
				<td ><input type="text" name="telephone2" value="<?php echo set_value("telephone2");?>"><?php echo form_error('telephone2'); ?></td>
			</tr>
			<tr>
				<td style="text-align:right;">邮箱：</td>
				<td ><input type="text" name="email" value="<?php echo set_value("email");?>"><?php echo form_error('email'); ?></td>
			</tr>
			<tr>
				<td style="text-align:right;">预订套系：</td>
				<td ><?php echo $series['name'];?><input type="hidden" name="series_name" value="<?php echo $series['name'];?>"></td>
			</tr>
			<tr>
				<td style="text-align:right;">订金额度：</td>
				<td ><?php echo $series['price'];?><input type="hidden" name="price" value="<?php echo $series['price'];?>"></td>
			</tr>
			<tr>
				<td ><input type="hidden" name="series_id" value="<?php echo $series_id;?>"></td>
				<td></td>
			</tr>
			</table>
			<p align="center" style= 'font-size: 15px;color:red;'>
			  <?php if(isset($error)) echo $error ?>
			 </p>
			 <p align="center">
			 <input type="submit" value="提交订单">
			<?php echo form_close();?>
			</p>
		</div>
		
	</div>
	</div>