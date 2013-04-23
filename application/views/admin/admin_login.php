<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员登录</title>
	<?php $this->load->helper('url');?>
	<link media="all" rel="stylesheet" href="<?php echo base_url();?>css/admin_login.css" type="text/css" />
</head>

<body>
	<table class="logintb">
	<tr>
		<td class="login">
			<h1>花时间管理中心</h1>
		<p>
			<span class="studioname">FLOWERTIME <strong>PHOTOGRAPHY</strong></span>
		</p>
		</td>
		<td>		
			<font color='red'><?php if(isset($error)) echo $error;?></font>
			<?php echo form_open('admin/Admin_index/login')?>
			
			<p class="logintitle">用户名：</p>
			<p class="loginform"><input type="text" class="txt" name='name'/><?php echo form_error('name');?></p>
			
			<?php echo form_error('密码','<p class="error">', '</p>'); ?>
			<p class="logintitle">密   码：</p>
			<p class="loginform"><input type="password" class="txt" name='password'/><?php echo form_error('password'); ?></p>
			<p class="loginnofloat">
			<input type="submit" value="登录" class="btn" /></p>
			<?php echo form_close();?>
		    <!-- <?php echo validation_errors('<td class="error">','</td>'); ?> --> 
		</td>
	</tr>
	</table>
	<div class="footer">
	<p>- 527 Guanghualu SOHO , Chaoyang District , Beijing , China <a href="">朝阳光华路SOHO五层527</a></p>
	<p>- 86 10 6561 9738</p>
	</div>
</body>
</html>
