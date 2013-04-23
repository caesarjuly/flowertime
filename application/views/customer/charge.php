
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
			  <li><a href="<?php echo base_url();?>customer/Customer_charge" class="current"><span>套系价格</span>Charge</a></li>
               <li><a href="<?php echo base_url();?>customer/Customer_message"><span>留言</span>Message</a></li>
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
			<div id="serieslist">
			 <div style="margin-bottom:30px;">
				 <div class="seriesname">
					自选超市
					<img src="<?php echo base_url();?>img/xiexian.png" alt="" />
				</div>
				<div class="series">
			<?php if(isset($market) && count($market))
		{
			for($j=0; $j<count($market); $j++)
			{
				?>
				<a href="<?php echo base_url();?>customer/Customer_market/index/<?php echo $market[$j]['market_id'];?>" target="_blank"><img src="<?php echo $market[$j]['url']?>" alt="" /></a>
				<?php }}?>
					</div>
					<div class="clear"></div>
			</div>
			<?php if(isset($contents) && count($contents))
		{
			 $i = "A";
			for($j=0; $j<count($contents); $j++)
			{
				?>
				 <div class="seriesname">
					<?php 
					if($j==0 || $contents[$j]['name']!=$contents[$j-1]['name'])
						{
							echo $contents[$j]['name'];
					
					?>
					<img src="<?php echo base_url();?>img/xiexian.png" alt="" />
					<?php }else {
					?>
					&nbsp;
					<?php }?>
				</div>
				<div class="series">

	<p style="font-size:13px"><span style="color:<?php echo $contents[$j]['color'];?>;font-weight:bold;">PACKAGE <?php echo $i;?><span style="text-decoration:underline;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
			<span style="font-size:13px;"><?php echo $contents[$j]['price'];?> RMB</span></p>
			<ul style="overflow:hidden;">
				<li style="float:left;width:200px;">
				<?php echo $contents[$j]['content'];?>
				</li>
				<li style="float:left;margin-left:30px;width:200px;">
				<?php echo $contents[$j]['english_content'];?>
				</li>
			</ul>
			</div>
		<?php
				 $i = substr($i, 0, strlen($i)-1). chr(ord(substr($i, -1, 1))+1);
			}
		}?>
			
			
						

		<div class="clear"></div>
			<div style="margin-top:40px;height:180px;">
				 <div class="seriesname">
					拍摄流程
					<img src="<?php echo base_url();?>img/xiexian.png" alt="" />
				</div>
				<div class="series">
						<img src="<?php echo base_url();?>img/06-CHARGE/02.png" alt="" />
					</div>
			</div>
		<div class="clear"></div>

			<div style="height:130px;">
				 <div class="seriesname">
					网上支付
					<img src="<?php echo base_url();?>img/xiexian.png" alt="" />
				</div>
				<div class="series">
				<a href="http://shop64456327.taobao.com/" target="_blank"><img src="<?php echo base_url()?>img/06-CHARGE/taobao.jpg" alt="" /></a>
					</div>
			</div>
		<div class="clear"></div>
			</div>
            </div>
          </div>
        </div>
        <!-- /.slider -->
        <div class="clear"></div>
      </div>
    </div>
