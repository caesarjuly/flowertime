	<SCRIPT src="<?php echo base_url();?>js/niutuku.js" type=text/javascript></SCRIPT>
	<SCRIPT type=text/javascript>
	$(document).ready(function(){
		if ($('.classroom').length > 0) {
						$('.classroom').cycle({ 
							fx: 'scrollHorz',
							speed: 1000,
							randomizeEffects: true, 
							timeout: 5000, 
							cleartype:  true,
	                        cleartypeNoBg:  true,
	                       	next:'#slideNext', 
							prev:'#slidePrev'
						});
					}
	}
	);			
		
</script>


	
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
              <li><a href="<?php echo base_url();?>customer/Customer_course" class="current"><span>摄影课堂</span> Classroom</a></li>
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
			  <div id="classroom">
				  <div class="top">
				  	<?php if(isset($normal) && count($normal))
					{
						
						foreach($normal as $top)
						{
							if($top['top']==1)
							{?>
					  <div class="classimg"><img src="<?php echo base_url();?><?php echo $top['top_url'];?>" alt="" /></div>				  
						<p><?php echo $top['top_content']?></p>
						<a href="<?php echo base_url();?>customer/Customer_course/show_detail/<?php echo $top['id']?>" target="_blank"><img style="float:right;margin:30px 0px 0px 0px" src="<?php echo base_url();?>img/01-HOME/09.png" alt="" /></a>
						<?php }}};?>
		<div class="clear"></div>
					</div>
				<div class="art">
						<div class="artpicture">
							<img src="<?php echo base_url();?>img/05-CLASSROOM/06.png" alt="" />
							<p style="margin-top:20px;">吕国军<br><span style="font-size:10px;">艺术总监</span>&nbsp;&nbsp;
							<a href="http://weibo.com/u/2289653685" target="_blank"><span style="font-size:10px;color:#3196CB;">微博</span></a></p>
						</div>
						<div class="artinfo">
广告行业出身，从事专业摄影多年，拍摄题材涉及人物、建筑、汽车、服
装、食品等多领域。作为【花·时间】首席摄影师，曾应邀为许多政府机构
和商业机构 诸如《母子健康》杂志、SOHO中国、金宝贝、新东方、国际
顺义学校、金色摇篮等提供摄影服务， 并在清华大学美术学院、女子学院
等多家知名学府进行授课，受邀在爱家广播【宝贝计划】栏目做儿童摄影
专题访谈，拥有丰富的教学经验，其创办的【花·时间摄影俱乐部】，为广
大爱好摄影的父母们提供各方面的摄影问题指导和咨询。
							
						</div>
		<div class="clear"></div>
					</div>	
			<div class="classroom">
				<?php if(isset($normal) && count($normal))
			{
				for($i = 0; $i<count($normal); $i += 10)
				{		
			?>
		<div class="classroomlist">
			<ul class="classroomlist1">
				<?php for($j = $i; $j<$i+5; $j++)
				{
					if($j<count($normal))
					{
				?>
					 
                    <li> <?php echo anchor('customer/Customer_course/show_detail/'.$normal[$j]['id'], $normal[$j]['title'], 'target="_blank"')?></li>
                  <?php }}?>
                       </ul>
                   <ul class="classroomlist2">
                   <?php 
                  	for($k = $i+5; $k<$i+10; $k++)
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
			<div class="clear"></div>

			</div>
				<?php }};?>
			</div>
			<div style="float:right;">
		<span  style="cursor:pointer;" id='slidePrev' >上一页 </span>/
		<span  style="cursor:pointer;" id='slideNext' > 下一页</span>	
		</div>
			  </div>
			  
			  </div>
			 
          </div>
        </div>
        <!-- /.slider -->
        <div class="clear"></div>
      </div>
    </div>
	
