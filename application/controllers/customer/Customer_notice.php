<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Customer_charge.php
#         Desc: 实现工作室摄影课堂的控制器
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-12-5 
#      History: none
=============================================================================*/

class Customer_notice extends CI_Controller {
	
	/**
	* @brief	构造函数，一般可以在里面load一些库、辅助函数以及所用到的model，也可以在autoload配置文件里默认添加
	*
	* @return	void
	*/
	function __construct() 
	{
		parent::__construct();
		$this->load->library('session');
		
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
			redirect('customer/Customer_index');
			die();
		}
	}
	/**
	* @brief	默认函数，跳转到Charge 费用
	*
	*/
	function index()
	{
		$this->is_logged_in();
		$data['main_content'] = 'notice_list';
		$data['contents'] = $this->Notice_model->get();
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	删除通知
	*
	*/
	function delete($notice_id)
	{
		$this->is_logged_in();
		if($this->Notice_model->delete($notice_id))
		{
			$this->index();
		}
		else
		{
			$data = array('message' => '删除失败，将于2秒后跳转至通知管理页面！', 'main_content' => 'message','url' => 'customer/Customer_notice');
			$this->load->view('admin/include/template',$data);
		}
	}
}