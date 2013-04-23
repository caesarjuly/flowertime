<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Customer_new.php
#         Desc: 实现工作室最新活动的控制器
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-12-5 
#      History: none
=============================================================================*/

class Customer_activity extends CI_Controller {
	
	/**
	* @brief	构造函数，一般可以在里面load一些库、辅助函数以及所用到的model，也可以在autoload配置文件里默认添加
	*
	* @return	void
	*/
	function __construct() 
	{
		parent::__construct();
		$this->load->library('session');
			$this->form_validation->set_error_delimiters('<p align="center" style= "font-size: 12px;color:red;" class="error">', '</p>');
		
	}
	/**
	* @brief	权限判断，为了防止用户不登陆直接进行某些操作
	*
	* @return	void
	*/
	function is_logged_in($activity_id)
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_logged_in != true)
		{
			$name = $this->input->post('untop_activity_message_hidden');
			redirect('customer/Customer_index/login0/index.php?' . 'widget_name=' . $name . '&' . 'activity_id=' . $activity_id);
			die();
		}
	}
	/**
	* @brief	权限判断，为了防止用户不登陆直接进行某些操作
	*
	* @return	void
	*/
	function is_logged_in1($activity_id)
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_logged_in != true)
		{
			$name = $this->input->post('top_activity_message_hidden');
			redirect('customer/Customer_index/login0/index.php?' . 'widget_name=' . $name . '&' . 'activity_id=' . $activity_id);
			die();
		}
	}
	/**
	* @brief	默认函数，跳转到news·活动页面
	*
	*/
	function index($offset = '')
	{

		$limit = 5;
		$config['base_url'] = site_url('customer/Customer_activity/index');
		$config['total_rows'] = $this->Activity_model->row_count();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['display_pages'] = FALSE; 
		$config['uri_segment'] = 4;
		$config['full_tag_open'] = '<div class="newspagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		$data['main_content'] = 'news';
		$data['images'] = $this->Activity_model->get_news($limit, $offset);
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	跳转到置顶的news·活动详细介绍页面
	*
	*/
	function show_activity_detail($activity_id)
	{
		$data['main_content'] = 'detail';
		$data['images'] = $this->Activity_model->get_activity($activity_id);
		$data['contents'] = $this->Message_activity_model->get_activity_message($activity_id);
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	跳转到未置顶的news·活动详细介绍页面
	*
	*/
	function detail($activity_id)
	{
		$data['main_content'] = 'untop_detail';
		$data['images'] = $this->Activity_model->get_activity($activity_id);
		$data['contents'] = $this->Message_activity_model->get_activity_message($activity_id);
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	用户top_ activity_message 留言
	*
	*/
	function create_top_activity_message($activity_id)
	{
		$this->is_logged_in1($activity_id);
		$this->form_validation->set_rules('top_activity_message','活动留言内容','trim|required|max_length[128]');
		if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'detail';
			$data['images'] = $this->Activity_model->get_activity($activity_id);
			$data['contents'] = $this->Message_activity_model->get_activity_message($activity_id);
			$this->load->view('customer/include/template',$data);
		}
		else 
		{
			$this->Message_activity_model->add_top($activity_id);
			$data['images'] = $this->Activity_model->get_activity($activity_id);
			$data['conte'] = $this->Message_activity_model->get_activity_message($activity_id);
			$this->load->view('customer/detail1' , $data);
		}
	}
	/**
	* @brief	用户untop_activity_message 留言
	*
	*/
	function create_untop_activity_message($activity_id)
	{
		$this->is_logged_in($activity_id);
		$this->form_validation->set_rules('untop_activity_message','活动留言内容','trim|required|max_length[128]');
		if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'untop_detail';
			$data['images'] = $this->Activity_model->get_activity($activity_id);
			$data['contents'] = $this->Message_activity_model->get_activity_message($activity_id);
			$this->load->view('customer/include/template',$data);
		}
		else 
		{
			$this->Message_activity_model->add_untop($activity_id);
			$data['images'] = $this->Activity_model->get_activity($activity_id);
			$data['conte'] = $this->Message_activity_model->get_activity_message($activity_id);
			$this->load->view('customer/untop_detail1' , $data);
		}
	}
	
	
}