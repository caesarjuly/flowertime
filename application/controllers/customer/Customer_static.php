<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Customer_static.php
#         Desc: 实现工作室简介以及拍摄流程介绍的控制器
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-12-5 
#      History: none
=============================================================================*/

class Customer_static extends CI_Controller {
	
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
	* @brief	默认函数，跳转到About 花·时间页面
	*
	*/
	function index()
	{
		$data['main_content'] = 'introduction';
		$data['contents'] = $this->Info_model->get_introduction();
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief跳转到About 花·时间，拍摄流程介绍页面
	*
	*/
	function customer_process()
	{
		$data['main_content'] = 'photoprocess';
		$data['contents'] = $this->Info_model->get_process();
		$this->load->view('customer/include/template',$data);
	}
}