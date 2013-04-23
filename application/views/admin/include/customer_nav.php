			<dt class="list_title">
			<span>会员管理</span>
		</dt>
		<dd class="list_detail">
		<ul>
			<li><?php echo anchor('admin/Admin_customer/test','会员列表')?></li>
			<li><?php echo anchor('admin/Admin_customer/search_customer','会员搜索')?></li>
			<li><?php echo anchor('admin/Admin_customer/show_add_customer','添加新会员')?></li>
		<?php $this->load->view('admin/include/nav.php'); ?>
		<span id="show_text">欢迎您来到动态信息维护页面!</span>
	</div>