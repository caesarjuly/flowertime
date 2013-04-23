<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Customer_message.php
#         Desc: 实现工作室摄影课堂的控制器
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-12-5 
#      History: none
=============================================================================*/

class Customer_message extends CI_Controller {
	
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
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_logged_in != true)
		{
			$widget_name = $this->input->post('customer_message_hidden');
			$id = -1;
			redirect('customer/Customer_index/login0/index.php?' . 'widget_name=' . $widget_name . '&' . 'activity_id='. $id);
			die();
		}
	}
	/**
	* @brief	默认函数，跳转到message 留言
	*
	*/
	function index()
	{
		$data['main_content'] = 'message';
		$data['contents'] = $this->Message_model->get_message();;
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	用户 message 留言
	*
	*/
	function create_message()
	{
		$this->is_logged_in();
		$this->form_validation->set_rules('customer_message','留言内容','trim|required|max_length[128]');
		if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'message';
			$data['contents'] = $this->Message_model->get_normal();
			$this->load->view('customer/include/template',$data);
		}
		else 
		{
			$this->Message_model->add();
			$data['contents'] = $this->Message_model->get_normal();
			$this->load->view('customer/message1' , $data);
		}
	}
	/**
	* @brief	用户管理留言界面
	*
	*/
	function message_list()
	{
		$this->is_logged_in();
		$data['main_content'] = 'message_list';
		$id = $this->session->userdata('id');
		$data['name'] = $this->session->userdata('name');
		$data['contents'] = $this->Message_model->get_message($id);
		$data['contents_activity'] = $this->Message_model->get_activity_message($id);
		$data['contents_course'] = $this->Message_model->get_course_message($id);
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	用户 删除message 留言
	*
	*/
	function delete_message($message_id)
	{
		$this->is_logged_in();
		if($this->Message_model->delete($message_id))
		{
			$this->message_list();
		}
		else
		{
			$data = array('message' => '删除失败，将于2秒后跳转至待回复留言页面！', 'main_content' => 'message_list','url' => 'customer/Customer_message');
			$this->load->view('customer/include/template',$data);
		}
		
	}
	/**
	* @brief	用户 删除activity_message 留言
	*
	*/
	function delete_activity_message($message_id)
	{
		$this->is_logged_in();
		if($this->Message_model->delete_activity($message_id))
		{
			$this->message_list();
		}
		else
		{
			$data = array('message' => '删除失败，将于2秒后跳转至待回复留言页面！', 'main_content' => 'message_list','url' => 'customer/Customer_message');
			$this->load->view('customer/include/template',$data);
		}
		
	}
	/**
	* @brief	用户 删除course_message 留言
	*
	*/
	function delete_course_message($message_id)
	{
		$this->is_logged_in();
		if($this->Message_model->delete_course($message_id))
		{
			$this->message_list();
		}
		else
		{
			$data = array('message' => '删除失败，将于2秒后跳转至待回复留言页面！', 'main_content' => 'message_list','url' => 'customer/Customer_message');
			$this->load->view('customer/include/template',$data);
		}
		
	}
	/**
	* @brief	用户 查看message 留言
	*
	*/
	function look_message($message_id)
	{
		$this->is_logged_in();
		$data['main_content'] = 'message_detail';
		$data['contents'] = $this->Message_model->get_customer_message($message_id);
		$data['type'] = "用户留言";
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	用户 查看activity_message 留言
	*
	*/
	function look_activity_message($message_id)
	{
		$this->is_logged_in();
		$data['main_content'] = 'message_detail';
		$data['contents'] = $this->Message_model->get_customer_activity_message($message_id);
		$data['type'] = "活动留言";
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	用户 查看course_message 留言
	*
	*/
	function look_course_message($message_id)
	{
		$this->is_logged_in();
		$data['main_content'] = 'message_detail';
		$data['contents'] = $this->Message_model->get_customer_course_message($message_id);
		$data['type'] = "课堂留言";
		$this->load->view('customer/include/template',$data);
	}
}