
	
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
			  <li><a href="<?php echo base_url();?>customer/Customer_charge"  class="current"><span>套系价格</span>Charge</a></li>
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
			  <div id="instructiontitle">
					
				</div>
				<div id="instruction">
					<img src="<?php echo $market['title_url'];?>">
					<div>
					<?php if(isset($contents) && count($contents))
					{
						for($j=0; $j<count($contents); $j++)
						{
							?>
						<a href="<?php echo base_url();?>customer/Customer_market/view/<?php echo $contents[$j]['market_work_id']?>"><img src="<?php echo base_url();?><?php echo $contents[$j]['url']?>"></a> 
						<?php 
						if(($j+1)%3==0)
						{
						?>
						</div><div style="margin-top:10px;">
						<?php 
						}
						}
					}
					 ?>
					 </div>
					 <div style="margin-top:50px;">
					 	<?php echo $market['notice'];?>
					 </div>
				</div>
            </div>
          </div>
        </div>
        <!-- /.slider -->
        <div class="clear"></div>
      </div>
    </div>
