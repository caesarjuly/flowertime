    

	
	
	
<div class="splash">
    <!-- header -->
    <div id="header">
      <div class="row-1">
      	<div class="container1">
        	<div class="wrapper">
               <div id="logo"><a style="" href="<?php echo base_url();?>customer/Customer_index">花·时间儿童摄影</a></div>
          	<!-- .nav -->
		<ul class="nav">
            	<li><a href="<?php echo base_url();?>customer/Customer_index" ><span>首页</span>Home</a></li>
              <li><a href="<?php echo base_url();?>customer/Customer_static" ><span>关于我们</span>About</a></li>
              <li><a href="<?php echo base_url();?>customer/Customer_active"><span>作品展示</span>Gallery</a></li>
              <li><a href="<?php echo base_url();?>customer/Customer_activity"><span>最新资讯</span>News</a></li>
              <li><a href="<?php echo base_url();?>customer/Customer_course"><span>摄影课堂</span> Classroom</a></li>
			  <li><a href="<?php echo base_url();?>customer/Customer_charge"><span>套系价格</span>Charge</a></li>
               <li><a href="<?php echo base_url();?>customer/Customer_message" class="current"><span>留言</span>Message</a></li>
            </ul>
          	<!-- /.nav -->

          </div>
        </div>
      </div>
      <div class="row-2">
        <!-- .slider -->
        <div class="main">
		<?php $this->load->view('customer/include/contact')?>
		<div id="center">
		<div id="messagebox">
			<DIV id=testimonial_slideshow >
		<?php if(isset($contents) && count($contents))
			{
			for($i=0;$i<count($contents);)
				{
					?>
					<DIV class=testiomonial_item>
						<p ><span style="color:#0071bc"><?php echo $contents[$i]['add_customer_name']?>：</span><?php echo $contents[$i]['add_customer_message']?></p>	
						<p ><span style="color:#c1262a">【花·时间儿童摄影】：</span><?php echo $contents[$i]['content']?></p>
						<br>
						<?php 
						if(($i+1 < count($contents)))
						{
						?>
						<p ><span style="color:#0071bc"><?php echo $contents[$i+1]['add_customer_name']?>：</span><?php echo $contents[$i+1]['add_customer_message']?></p>	
						<p ><span style="color:#c1262a">【花·时间儿童摄影】：</span><?php echo $contents[$i+1]['content']?></p>
						<br>
						<?php }?>
					</DIV>
					<?php
					$i = $i + 2;
				}
			}
			?>
		</DIV>
		</div>
            </div>
          </div>
        </div>
        <!-- /.slider -->
        <div class="clear"></div>
      </div>
    </div>
