


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
              <li><a href="<?php echo base_url();?>customer/Customer_activity" class="current"><span>最新资讯</span>News</a></li>
              <li><a href="<?php echo base_url();?>customer/Customer_course"><span>摄影课堂</span> Classroom</a></li>
			  <li><a href="<?php echo base_url();?>customer/Customer_charge"><span>套系价格</span>Charge</a></li>
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
			  <div id="newslist">
				  <ul>

		<?php if(isset($images) && count($images))
		{
			foreach ($images as $image)
			{
				?>
			<li>
			<?php echo anchor('customer/Customer_activity/detail/' . $image['activity_id'], $image['title'], 'target="_blank"');?>
			</li>
			<?php 
			}
		}
		 ?>
				  </ul>

			  </div>
			  		  <?php echo $pagination;?>
			  </div>
			  <div class="clear"></div>
			  <div id="newsimg">
					<ul>

			<?php if(isset($images) && count($images))
			{
			foreach ($images as $image)
			{?>
			<li>
				<a href="<?php echo base_url();?>customer/Customer_activity/detail/<?php echo $image['activity_id'];?>" target="_blank"><img src="<?php echo $image['url'];?>" alt="<?php echo $image['title'];?>" /></a>
			</li>
			<?php 
				}
			}
			?>
					</ul>
			  </div>
          </div>
        </div>
        <!-- /.slider -->
        <div class="clear"></div>
      </div>
    </div>
