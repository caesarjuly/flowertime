
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
              <li><a href="<?php echo base_url();?>customer/Customer_active" class="current"><span>作品展示</span>Gallery</a></li>
              <li><a href="<?php echo base_url();?>customer/Customer_activity"><span>最新资讯</span>News</a></li>
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
			  <div id="Gallerytitle">
				  <ul >
				 <?php $contents = $this->Album_model->get_album_in_use();?>
				<?php if(isset($contents) && count($contents))
				{
					
					?>
					<?php 
					foreach ($contents as $content)
					{
							?>
							<li>
								<?php echo anchor('customer/Customer_active/swift/' . $content['album_id'],$content['name']);?>
							</li>
							<?php
					}?>
					<?php 
				}
				?>
				  </ul>
				</div>
				<div id="Gallery">
				<div class="Gallery_container">
			<?php 
			if(isset($works) && count($works))
			{
				foreach ($works as $work)
				{		
			?>
			<div>
                <img style="" src="<?php echo base_url() . $work['url'];?>" alt="" />
            </div>
                <?php 
				}
			}?>
				</div>
				</div>
				<div class="clear"></div>
            </div>
          </div>
        </div>
        <!-- /.slider -->
        <div class="clear"></div>
      </div>
    </div>
