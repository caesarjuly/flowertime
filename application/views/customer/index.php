

  <div class="splash">
    <!-- header -->
    <div id="header">
      <div class="row-1">
      	<div class="container1">
        	<div class="wrapper">
               <div id="logo"><a style="" href="<?php echo base_url();?>customer/Customer_index">花·时间儿童摄影</a></div>
          	<!-- .nav -->
		<ul class="nav">
            	<li><a href="<?php echo base_url();?>customer/Customer_index"  class="current"><span>首页</span>Home</a></li>
              <li><a href="<?php echo base_url();?>customer/Customer_static" ><span>关于我们</span>About</a></li>
              <li><a href="<?php echo base_url();?>customer/Customer_active"><span>作品展示</span>Gallery</a></li>
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
        <div class="slider">
		<?php $this->load->view('customer/include/contact')?>

          <div id="slides">

            <div class="slides_container" style="position: relative; cursor: pointer;">

         <?php if(isset($images) && count($images))
		{ 
			foreach ($images as $image)
			{		
			?>
			<div>
				<img style = "" src="<?php echo $image['url'];?>"/>
				</div>
			<?php 
			}
		}
		?>

          <!-- /.logo -->
            </div>
          </div>

        </div>
        <!-- /.slider -->
        <div class="clear"></div>

      </div>
    </div>
    <!-- content -->
    <div id="content">
    	<div class="container">
        <div class="row-1">
        	<!-- .box -->
          <div class="box">
          	<div class="inner">
            	  <div class="wrapper">
            	    <div class="news">
						<ul>
		<?php if(isset($news) && count($news))
		{
			foreach ($news as $new)
			{
				?>
			<li>
			<?php echo anchor('customer/Customer_activity/detail/' . $new['activity_id'],$new['title'], 'target="_blank"');?>
			</li>
			<?php 
			}
		}?>
						</ul>
					</div>
					<div class="newsthumb">
						<ul>
			<?php if(isset($news) && count($news))
			{
			for ($i = 0; $i<3; $i++)
			{
				if( $i<count($news))
				{
			?>
			<li>
				<a href="<?php echo base_url();?>customer/Customer_activity/detail/<?php echo $news[$i]['activity_id'];?>" target="_blank"><img src="<?php echo $news[$i]['url'];?>" alt="<?php echo $news[$i]['title'];?>" /></a>
			</li>
			<?php 
				}
			}
			}
			?>
						</ul>
					</div>
            	  </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <div class="row-2 inside">
        	<div class="wrapper ">
        	  <div class="col-1">
            	<div class="indent">
                <div class="wrapper">
					<div class="teacher">
						<img src="<?php echo base_url();?>img/01-HOME/05.png" alt="" />
						<p>吕老师讲摄影 
						<a href="http://weibo.com/u/2289653685" target="_blank"><img src="<?php echo base_url();?>img/01-HOME/06.png"/></a></p>
					</div>
					<?php if(isset($normal) && count($normal))
			{
	
			?>
			<ul class="list1">
				<?php for($j = 0; $j<5; $j++)
				{
					if($j<count($normal))
					{
				?>
					 
                    <li> <?php echo anchor('customer/Customer_course/show_detail/'.$normal[$j]['id'], $normal[$j]['title'], 'target="_blank"')?></li>
                  <?php }}?>
                       </ul>
                   <ul class="list2">
                   <?php 
                  	for($k = 5; $k<10; $k++)
                  	{
                  		if($k<count($normal))
                  		{
                  	?>
                  			<li> <?php echo anchor('customer/Customer_course/show_detail/'.$normal[$k]['id'], $normal[$k]['title'], 'target="_blank"')?></li>
                  		
                  	<?php 
                  		}
                  	}	
                  ?>
			
				</ul>

				<?php };?>

                </div>
                <div style="margin-left:680px;"><a  href="<?php echo base_url();?>customer/Customer_course" target="_blank"><img src="<?php echo base_url();?>img/more.png"></a></div>
              </div>
		  </div>
			<div style="float:left;">
        	  <div class="class">
				  <div class="indent" >
					<div class="wrapper" >
					<?php if(isset($normal) && count($normal))
					{
						
						foreach($normal as $top)
						{
							if($top['top']==1)
							{?>
					  <div class="classimg"><img src="<?php echo base_url();?><?php echo $top['top_url'];?>" alt="" /></div>				  
						<div class="abstract"><p><?php echo $top['top_content']?></p>
						<a href="<?php echo base_url();?>customer/Customer_course/show_detail/<?php echo $top['id']?> " target="_blank"><img style="float:right;margin:30px 0px 0px 0px" src="<?php echo base_url();?>img/01-HOME/09.png" alt="" /></a>
						<?php }}};?>

					</div>
				</div>
				</div>
			</div>
			<div class="cooperator">
				<img src="<?php echo base_url();?>img/01-HOME/11.png" alt="" />
			</div>
		</div>
			<div class="address">
		  	<img  src="<?php echo base_url();?>img/01-HOME/18.png" alt="" />
			<a href="http://map.baidu.com/" target="_blank"><img  style="margin-left:30px;" src="<?php echo base_url();?>img/01-HOME/15.png" alt="" /></a>

			</div>
		</div>
        </div>
      </div>
    </div>
