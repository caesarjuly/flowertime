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
			$.messager.alert('提示信息：','留言成功，等待管理员审核!');
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
				
				<?php $conten = $this->Album_model->get_album_in_use();?>
				<?php if(isset($conten) && count($conten))
				{
					
					?>
					<ul class="innernav1">
					<?php 
					foreach ($conten as $content)
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
	
		<SCRIPT src="<?php echo base_url();?>js/niutuku.js" type=text/javascript></SCRIPT>
	<SCRIPT type=text/javascript>
	$(document).ready(function(){
		if ($('#testimonial_slideshow').length > 0) {
						$('#testimonial_slideshow').cycle({ 
							fx: 'scrollVert',
							speed: 600,
							width: 700,
							randomizeEffects: true, 
							timeout: 18000, 
							cleartype:  true,
	                        cleartypeNoBg:  true,
	                       	next:'#slideNext', 
							prev:'#slidePrev'
						});
					}
			}
	);			
		
</script>

    
	<div id="main">
	<div id="content">
		<br>
<DIV class=left_column id="messagebox">
	<DIV class=item>
		<DIV id=testimonial_slideshow >
		<?php if(isset($contents) && count($contents))
			{
			for($i=0;$i<count($contents);)
				{
					?>
					<DIV class=testiomonial_item>
						<p ><span style="color:#0071bc"><?php echo $contents[$i]['name']?>：</span><?php echo $contents[$i]['content']?></p>	
						<p ><span style="color:#c1262a">【花·时间儿童摄影】：</span><?php echo $contents[$i]['reply']?></p>
						<br>
						<?php 
						if(($i+1 < count($contents)))
						{
						?>
						<p ><span style="color:#0071bc"><?php echo $contents[$i+1]['name']?>：</span><?php echo $contents[$i+1]['content']?></p>	
						<p ><span style="color:#c1262a">【花·时间儿童摄影】：</span><?php echo $contents[$i+1]['reply']?></p>
						<br>
						<?php }?>
					</DIV>
					<?php
					$i = $i + 2;
				}
			}
			?>
		</DIV>
	</DIV>
</DIV>
		<img  id=slidePrev style='position:absolute;top:260px;left:890px;width:30px;' src='<?php echo base_url()?>/img/arrow_down.png' alt='back' />
		<img  id=slideNext style='position:absolute;top:230px;left:890px;width:30px;' src='<?php echo base_url()?>/img/arrow_up.png' alt='next' />	
		<img style="position:absolute;visible:hidden;width:130px;left:40px;top:380px;" src="<?php echo base_url()?>img/messagetip.png" alt="" />
		<div id="messagetype">
			<div style="float:left;width:400px;background-color:#fff;padding:45px 10px 20px 50px;">
			<?php echo form_open('customer/Customer_message/create_message')?>
			<textarea id="" name="customer_message" rows="5" cols="40"></textarea><?php echo form_error('customer_message')?>
			<input type="hidden" name="customer_message_hidden" value="customer_message_hidden"/>
			<input style="background-color:#fff;margin:10px 0px 0px 300px;" type="submit" value="留言" />
			<?php echo form_close()?>
			</div>
			<div style="float:right;">
				<p style="color:#000;font-size:20px;font-weight:550;line-height:150%;">欢迎致电并光临【花·时间】光华路店</p>
				<p style="color:#c02628;font-size:30px;line-height:150%;">010-6561 9738</p>
				<p style="line-height:150%;">光华路SOHO三单元5层527（世贸天阶南侧）</p>
			</div>
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