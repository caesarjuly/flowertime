
		<dt class="list_title">
			<span>订单管理</span>
		</dt>
		<dd class="list_detail">
		<ul>
			<li><?php echo anchor('admin/Admin_order/test','最新订单')?></li>
			<li><?php echo anchor('admin/Admin_order/show_order_list','订单列表')?></li>
			<li><?php echo anchor('admin/Admin_order/search_order','订单搜索')?></li>
			<li><?php echo anchor('admin/Admin_order/show_closed_order','已完成订单')?></li>
		<?php $this->load->view('admin/include/nav.php'); ?>
		<span id="show_text">欢迎您来到订单管理页面!</span>
	</div>
