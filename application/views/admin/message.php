	<div class="list_title">
			<span>提示页面</span>
		</div>
		<div class="list_detail">
		<ul>
	
		
	<?php $this->load->view('admin/include/nav.php'); ?>
	

	<div id="main_zone">
    <div id="message">
    	<meta http-equiv="Refresh" content="2;url=<?php echo site_url($url)?>">
    	<p>
    	<?php echo $message;?>
    	</p>
    	<p>
    	<?php echo anchor($url,'点此立即返回！');?>
    	</p>
    </div>
	</div>

