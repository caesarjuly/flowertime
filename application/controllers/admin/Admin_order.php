<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_order extends MY_Controller{
	
	/**
	* @brief	构造函数，一般可以在里面load一些库、辅助函数以及所用到的model，也可以在autoload配置文件里默认添加
	*
	* @return	void
	*/
	function __construct() 
	{
		parent::__construct();
	}
	/**
	* @brief	默认函数，跳转到admin_order.view页面
	*
	*/
	function index($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_order/index');
		$config['total_rows'] = $this->Order_model->count_pay();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_order';
		$data['contents'] = $this->Order_model->get_pay1($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	与上面的函数一样
	*
	*/
	function test($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_order/index');
		$config['total_rows'] = $this->Order_model->count_pay();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_order';
		$data['contents'] = $this->Order_model->get_pay1($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到admin_order_list.view页面
	*
	*/
	function show_order_list($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_order/show_order_list');
		$config['total_rows'] = $this->Order_model->count_check();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_order_list';
		$data['contents'] = $this->Order_model->get_checked_order1($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到admin_order_search.view页面
	*
	*/
	function search_order()
	{
		$data['main_content'] = 'admin_order_search';
		$name = $this->input->post('name');
		$data['contents'] = $this->Order_model->search($name);
		$data['name'] = $name;
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到admin_order_closed.view页面
	*
	*/
	function show_closed_order($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_order/show_closed_order');
		$config['total_rows'] = $this->Order_model->count_closed_order();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_order_closed';
		$data['contents'] = $this->Order_model->get_closed1($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	获得已付款的订单，跳转到admin_order_unpay.view页面
	*
	*/
	function show_unpay_order($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_order/show_unpay_order');
		$config['total_rows'] = $this->Order_model->count_unpay();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_order_unpay';
		$data['contents'] = $this->Order_model->get_unpay1($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	
	/**
	* @brief	确认支付
	*
	*/
	function check($order_id)
	{
		
		if($this->Order_model->check($order_id))
		{
			$this->Notice_model->add_order_check($order_id);
			$this->test();
		}
		else 
		{
			$data = array('message' => '确认支付失败，将于2秒后跳转至待确认支付页面！', 'main_content' => 'message','url' => 'admin/Admin_index/check_pay');
			$this->load->view('admin/include/template',$data);
		}
	}
	/**
	* @brief	显示待确认支付页面内容
	*
	*/
	function check_pay($order_id)
	{
		$data['main_content'] = 'admin_order_check';
		$data['contents'] = $this->Order_model->get_detail($order_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	显示订单详情
	*
	*/
	function show_detail($order_id)
	{
		$data['main_content'] = 'admin_order_check';
		$data['contents'] = $this->Order_model->get_detail($order_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	关闭订单
	*
	*/
	function close_order($order_id)
	{
		if($this->Order_model->close($order_id))
		{
			$this->Notice_model->add_order_closed($order_id);
			redirect('admin/Admin_order/show_order_list');
		}
		else 
		{
			$data = array('message' => '关闭订单失败，将于2秒后跳转至关闭订单页面！', 'main_content' => 'message','url' => 'admin/Admin_index/get_close');
			$this->load->view('admin/include/template',$data);
		}
	}
	
}
