	<div id="main">
	<div id="content">
		<br>
		<div id="login">
            <font color='red'><?php if(isset($error)) echo $error;?></font>
			<?php echo form_open('customer/customer_index/login/index.php?' . 'widget_name=' . $widget_name . '&' . 'activity_id=' . $id)?>
			<p style="font-size:20px;padding:0 0 10px 90px;color:#c1262a;">欢迎登录</p>
			<table >
			<tr>
			<td>用户名：</td>
			<td><input type="TEXT" name='name'/><?php echo form_error('name');?></td>	
			</tr>
			<tr>
			<td>密码：</td>
			<td><input type="PASSWORD" name='password' /><?php echo form_error('password');?></td>
			</tr>
			<tr>
			<td>
			</td>
			<td>
			<input type="SUBMIT"  value="登录"/>
			<?php $url = site_url() . "customer/Customer_index/signup";?>
			<a style="color:#0071bc;font-size:13px;" href="<?php echo $url?>">注册新用户</a>
			</td>
			</tr>
			</table>
		</div>
		
	</div>
	</div>
