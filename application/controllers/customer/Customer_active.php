<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Customer_active.php
#         Desc: 实现工作室作品的展示的控制器
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-12-5 
#      History: none
=============================================================================*/

class Customer_active extends CI_Controller {
	
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
	* @brief	默认函数，跳转到Gallery作品页面
	*
	*/
	function index()
	{
		//$data['main_content'] = 'gallery';
		//$this->load->view('customer/include/template',$data);
		$id = $this->Album_model->get_first_id();
		$this->swift($id);
	}
	/**
	* @brief	根据album_id跳转到相应Gallery作品页面
	*
	*/
	function swift($id)
	{
		$data['main_content'] = 'gallery';
		$data['works'] = $this->Work_model->get_byalbum($id);
		$this->load->view('customer/include/template',$data);
	}
}