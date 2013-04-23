<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Admin_index.php
#         Desc: 实现管理员登录修改密码退出和显示首页的控制器
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-11-20 
#      History: none
=============================================================================*/

class Admin_index extends CI_Controller {
	
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
	* @brief	权限判断，为了防止用户不登陆直接访问某些页面
	*
	* @return	void
	*/
	function is_logged()
	{
		$is_logged = $this->session->userdata('is_logged');
		if(!isset($is_logged)||$is_logged != true)
		{
			redirect('admin/Admin_index');
			die();
		}
	}
	
	/**
	* @brief	默认函数，跳转到admin_login.view页面
	*
	*/
	function index()
	{
		$this->load->view('admin/admin_login');
	}
	/**
	* @brief	登录函数，登录判断用户是否存在输入是否合法，最后跳转相应页面
	*
	*/
	function login()
	{
		$this->form_validation->set_rules('name','用户名','trim|required|min_length[2]');
		$this->form_validation->set_rules('password','密码','trim|required|min_length[4]|max_length[32]');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->index();
		}
		else 
		{
			if($this->Admin_model->check_in())
			{
				$dete = array(
				'name' => $this->input->post('name'),
				'is_logged' => true
				);
				$this->session->set_userdata($dete);
				redirect('admin/Admin_index/admin');
			}
			else
			{
				$data['error']='用户名或密码错误';
				$this->load->view('admin/admin_login',$data);
			}
		}
		
	}
	/**
	* @brief	登录进入后，跳转管理员首页	
	*
	*/	
	function admin()
	{
		$this->is_logged();
		$data['main_content'] = 'admin_index';
		$data['album_num'] = $this->Album_model->count();
		$data['index_picture_num'] = $this->Info_model->count();
		$data['activity_num'] = $this->Activity_model->count();
		$data['order_num'] = $this->Order_model->count();
		$data['customer_num'] = $this->Customer_model->count();
		$data['closed_order_num'] = $this->Order_model->count_closed_order();
		$data['message_activity_num']= $this->Message_activity_model->count();
		$data['message_course_num'] = $this->Message_course_model->count();
		$data['message_num'] = $this->Message_model->count();
		$data['course_num'] = $this->Course_model->count();
		
		$this->load->view('admin/include/template',$data);
	}
/**
	* @brief	跳转到密码管理页面
	*
	*/
	function manage_password()
	{
		$this->is_logged();
		$data['main_content'] = 'admin_password';
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	修改密码
	*
	*/
	function change_password()
	{
		$this->is_logged();
		$this->form_validation->set_rules('new_password','新密码','trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('again_password','再次输入新密码','trim|required|min_length[4]|max_length[32]|matches[new_password]');
		
		if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'admin_password';
			$this->load->view('admin/include/template',$data);
		}
		else if(!$this->Admin_model->get())
		{
			
			$data['error']='原密码不正确';
			$data['main_content'] = 'admin_password';
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
			if($this->Admin_model->update())
			{
				$data = array('message' => '修改成功，将于2秒后跳转至登录页面！', 'main_content' => 'message','url' => 'admin/Admin_index');	
				$this->load->view('admin/include/template',$data);
			}else
			{
				$data = array('message' => '修改失败，将于2秒后跳转至登录页面！', 'main_content' => 'message','url' => 'admin/Admin_index/manage_password');
				$this->load->view('admin/include/template',$data);
			}
		}
	}
	/**
	* @brief	登出函数
	*
	*/
	function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/Admin_index');
	}
}
