	<div id="main">
	<div id="content">
		<br>
		<div id="login">
          
            <?php echo form_open('customer/Customer_index/sign') ?>
			<p style="font-size:20px;padding:0 0 10px 90px;color:#c1262a;">注册新用户</p>
			<table >
			<tr>
			<td>用户名：</td>
			<td><?php echo form_input('name', set_value('name')) ?><?php echo form_error('name'); ?></td>	
			</tr>
			<tr>
			<td>密码：</td>
			<td><?php echo form_password('password') ?><?php echo form_error('password'); ?></td>
			</tr>
			<tr>
			<td>
			确认密码：
			</td>	
			<td>
			<?php echo form_password('passwd2') ?><?php echo form_error('passwd2'); ?>
			</td>
			</tr>
			<tr>
			<td>
			电话：
			</td>	
			<td>
			<?php echo form_input('phone', set_value('phone')) ?><?php echo form_error('phone'); ?>
			</td>
			</tr>
			<tr>
			<td>
			邮箱：
			</td>	
			<td>
			<?php echo form_input('email', set_value('email')) ?><?php echo form_error('email'); ?>
			</td>
			</tr>
			<tr>
			<td>
			地址：
			</td>	
			<td>
			<?php echo form_input('address', set_value('address')) ?><?php echo form_error('address'); ?>
			</td>
			</tr>
			
			</table>
			<p align="center" style= 'font-size: 15px;color:red;'>
			  <?php if(isset($error)) echo $error ?>
			 </p>
			<p align="center">
			
			<?php echo form_submit('submit', '确定') ?>
			<input type="RESET"  value="重置"/>
			  <?php echo form_close() ?>
			 </p>
		</div>
		
	</div>
	</div>
