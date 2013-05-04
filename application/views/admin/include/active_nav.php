
		<dt class="list_title">
			<span>动态信息维护</span>
		</dt>
	   	<dd class="list_detail">
	 		<ul>
	 	<li>
	 		<?php echo anchor('admin/Admin_active/test','作品分类管理')?></li>
		<li>
			<?php $album_id = $this->Album_model->get_first_id();
			?>
	 		<?php echo anchor('admin/Admin_active/show_work_byseries/' . $album_id,'作品管理')?></li>
		<li>
	 		<?php echo anchor('admin/Admin_activity','活动管理')?></li>
		<li>
	 		<?php echo anchor('admin/Admin_course','摄影课堂管理')?></li>
		<li>
			<?php echo anchor('admin/Admin_series','套系管理')?>
		</li>
		<!--<li>
			<?php echo anchor('admin/Admin_market','超市分类管理')?>
		</li>
		<li>
			<?php $market_id = $this->Market_model->get_first_id();
			?>
			<?php echo anchor('admin/Admin_market_work/index/' . $market_id,'超市内容管理')?>
		</li>-->
		<?php $this->load->view('admin/include/nav.php'); ?>
		<span id="show_text">欢迎您来到动态信息维护页面!</span>
	</div>