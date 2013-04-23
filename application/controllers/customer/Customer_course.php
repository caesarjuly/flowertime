<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Customer_course.php
#         Desc: 实现工作室摄影课堂的控制器
#       Author: 杨帆
#      Version: 1.0
#   LastChange: 2011-12-19
#      History: none
=============================================================================*/

class Customer_course extends CI_Controller {
	
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
	function is_logged_in($id)
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_logged_in != true)
		{
			$name = $this->input->post('course');
			redirect('customer/Customer_index/login0/index.php?' . 'widget_name=' . $name . '&' . 'activity_id=' . $id);
			die();
		}
	}
	
	/**
	* @brief	默认函数，跳转到classroom·摄影课堂
	*
	*/
	function index()
	{
		$data['normal'] = $this->Course_model->get_normal();
		$data['qa'] = $this->Course_model->get_qa();
		$data['main_content'] = 'classroom';
		$this->load->view('customer/include/template',$data);
	}
	
	/**
	* @brief	跳转到课堂详细介绍页面
	*
	*/
	function show_detail($id)
	{
		$data['main_content'] = 'classroom_detail';
		$data['content'] = $this->Course_model->get_course($id);
		$data['contents'] = $this->Message_course_model->get_course_message($id);
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	用户留言
	*
	*/
	function create_message($id)
	{
		$this->is_logged_in($id);
		$this->form_validation->set_rules('message','课堂留言内容','trim|required|max_length[128]');
		if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'classroom_detail';
			$data['content'] = $this->Course_model->get_course($id);
			$data['contents'] = $this->Message_course_model->get_course_message($id);
			$this->load->view('customer/include/template',$data);
		}
		else 
		{
			$this->Message_course_model->add($id);
			$data['cont'] = $this->Course_model->get_course($id);
			$data['conte'] = $this->Message_course_model->get_course_message($id);
			$this->load->view('customer/classroom_detail1' , $data);
			
		}
	}
}