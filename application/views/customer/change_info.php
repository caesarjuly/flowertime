	<div id="main">
	<div id="content">
		<br>
		<div id="login">
            <?php
			$name = $this->session->userdata('name');
			$this->db->where('name' , $name);
		    $query = $this->db->get('customer');
		    $phone = $query->row()->phone;
			$email = $query->row()->email;
			$address = $query->row()->address;
			echo form_open('customer/Customer_index/change_info0/index.php?' . 'name=' . $name);?>
			<p align="center" style="font-size:20px;padding:0 0 10px 30px;color:#c1262a;">个人信息管理</p>
			<table align="center">
			<tr>
			<td>用户名：</td>
			<td><input type="TEXT" name='name' disabled value=<?php echo $name?>><?php echo form_error('name'); ?></td>	
			</tr>
			<tr>
			<td>电话：</td>	
			<td><?php echo form_input('phone', $phone) ?><?php echo form_error('phone'); ?></td>
			</tr>
			<tr>
			<td>邮箱：</td>	
			<td><?php echo form_input('email', $email) ?><?php echo form_error('email'); ?></td>
			</tr>
			<tr>
			<td>地址：</td>	
			<td><?php echo form_input('address', $address) ?><?php echo form_error('address'); ?></td>
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
