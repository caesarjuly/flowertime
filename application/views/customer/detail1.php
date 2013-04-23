	<!DOCTYPE HTML>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<?php $this->load->helper('url');?>
	<link media="all" rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.slidy.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/animate.js"></script>
	
	<link rel="stylesheet" href="<?php echo base_url();?>themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>themes/pascal/pascal.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>themes/orman/orman.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/nivo-slider.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.nivo.slider.pack.js"></script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/dialog.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/linkbutton.css">
	
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.draggable.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.resizable.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.linkbutton.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.shadow.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.dialog.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.messager.js"></script>
	
	
	
	<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
    
     <script>
		
		function alert1(){
			$.messager.alert('提示信息：','活动留言成功，等待管理员审核!');
		}
	</script>
</head>
<body onload="alert1()">
	<div id="container">
	<div id="header">
		<div id="blog">
			<img class="line" src="<?php echo base_url();?>img/line.jpg" alt="" />
			<img class="quan" src="<?php echo base_url();?>img/quan.png" alt="" />
			<img class="quan1" src="<?php echo base_url();?>img/quan1.png" alt="" />
			<p class="link">BLOG<span style="font-size:15px;"> 最新博文</span></p>
		</div>	
		<div id="logo">
			<img class="logo" src="<?php echo base_url();?>img/logo.jpg" alt="" />
			<img class="bg_logo" src="<?php echo base_url();?>img/bg_logo.png" alt=""/>	
			<img class="bg_logo1" src="<?php echo base_url();?>img/bg_logo1.png" alt=""/>	
		</div>
		<div id="qq">
			<img class="line1" src="<?php echo base_url();?>img/line.jpg" alt="" />
			<img class="quan3" src="<?php echo base_url();?>img/quan.png" alt="" />
			<img class="quan4" src="<?php echo base_url();?>img/quan1.png" alt="" />
			<img class="weibo" src="<?php echo base_url();?>img/weibo.png" alt=""/>
			<p class="link1">65619738</p>
		</div>
	</div>
	<div id="navigation">
		<ul id="nav">
			<li class="outernav"><?php echo anchor('customer/Customer_index','Home 首页')?></li>
			<li class="outernav">
				<?php echo anchor('customer/Customer_static','About 花·时间')?>
				<ul class="innernav">
					<li>
						<?php echo anchor('customer/Customer_static','工作室简介')?>
					</li>
					<li>
						<?php echo anchor('customer/Customer_static/customer_process','摄影流程介绍')?>
					</li>
				</ul>
			</li>
			<li class="outernav">
			<?php 
			echo anchor('customer/Customer_active/','Gallery 作品')?>
				
				<?php $contents = $this->Album_model->get_album_in_use();?>
				<?php if(isset($contents) && count($contents))
				{
					
					?>
					<ul class="innernav1">
					<?php 
					foreach ($contents as $content)
					{
							?>
							<li>
								<?php echo anchor('customer/Customer_active/swift/' . $content['album_id'],$content['name']);?>
							</li>
							<?php
					}?>
					</ul>
					<?php 
				}
				?>
					
					
				
			</li>
			<li class="outernav"><?php echo anchor('customer/Customer_activity','News 活动')?></li>
			<li class="outernav"><?php echo anchor('customer/Customer_course','Classroom 摄影课堂')?></li>
			<li class="outernav"><?php echo anchor('customer/Customer_charge','Charge 费用')?></li>
			<li class="outernav"><?php echo anchor('customer/Customer_message','Message 留言')?></li>
			<?php 
			$name = "name";
			$is_logged_in = $this->session->userdata('is_logged_in');
			$widget_name = "header_login";
			$id = -1;
			if(!isset($is_logged_in)||$is_logged_in != true)
			{
				?>
			<li class="outernav">
			<?php echo anchor('customer/Customer_index/login0/index.php?' . 'widget_name=' . $widget_name . '&' . 'activity_id=' . $id,'Login 登录')?></li>
			<?php 
			}
			else{
			$name = $this->session->userdata('name');
			?>
			<li class="outernav"><?php echo anchor('customer/Customer_index/logout/' . $widget_name,'Logout 注销')?>
				<ul class="innernav2">
					<li>
						<?php echo anchor('customer/Customer_index/change_info','个人信息管理')?>
					</li>
					<li>
						<?php echo anchor('customer/Customer_message/message_list','留言管理')?>
					</li>
					<li>
						<?php echo anchor('customer/Customer_charge/order_list','订单管理')?>
					</li>
					<li>
						<?php echo anchor('customer/Customer_notice','查看通知')?>
					</li>
					</ul>
			</li>
			<?php }?>
		</ul>
	</div>
	
	<div id="top">
		<p id="top_title"><?php echo $images['title']?></p>
	</div>
	<div id="main">
	<div id="content">
		<div id="detail">
			<?php echo $images['content'];?>
		</div>
	</div>
	<div id="message">
		<p id="message_title">留言板</p>
		<div id="message_textarea">
		<?php echo form_open('customer/Customer_activity/create_top_activity_message/' . $images['activity_id'])?>
		<textarea  name="top_activity_message" rows="10" cols="100"></textarea><?php echo form_error('top_activity_message')?>
		<p>
			<span >
			<input type="hidden" name="top_activity_message_hidden" value="top_activity_message_hidden"/>
			<input class="redbutton" type="submit" value = "留言">
			</span>
			<div class="clear"></div>
		</p>
		<?php echo form_close()?>
		</div>
		<hr>
		<div id="message_box">
			<?php 
			if(isset($conte) && count($conte))
			{
				?>
			<?php 
				foreach ($conte as $content)
				{		
			?>	<div class="message_content">
				<p style="color:#ed1b24;"><?php echo $content['name']?>：     <?php echo $content['content']?></p><p align="right" style= "font-size: 14px;color: #0099CC"><?php echo date('Y年m月d日  H:i:s ',$content['date'])?></p>
				<p>
					【花·时间儿童摄影】：<?php echo $content['reply'];?>
				</p>
				<p align="right" style= "font-size: 14px;color: #0099CC"><?php echo date('Y年m月d日  H:i:s ',$content['reply_date'])?></p>
				<br>
					<p></p>
			<div class="clear"></div>
			</div>
			<br>
				<?php 
				}?>
			
			<?php }?>
		</div>
	</div>

	</div>

	<div id="footer">
		<!--<p class="Ename">FlOWERTIME <span style="font-weight:bolder;">PHOTOGRAPHY</span></p>-->
		<p class="Ename">
		<img style="width:500px;" src="<?php echo base_url();?>img/ename.png" alt="" />
		</p>	
		<p class="Cname">【 花·时间儿童摄影 】</p>
		<p class="dottedline"></p>	
		<p class="contact">- 527 Guanghualu SOHO , Chaoyang District , Beijing , China 朝阳光华路SOHO五层527 <br><br>
		- 86 10 6561 9738</p>

	</div>
	</div>


</body>
</html>