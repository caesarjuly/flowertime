<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Customer_market.php
#         Desc: 实现自选超市的控制器
#       Author: 杨帆
#      Version: 1.0
#   LastChange: 2012-10-31
#      History: none
=============================================================================*/

class Customer_market extends CI_Controller {
	
	/**
	* @brief	默认函数，跳转到特定分类超市作品页面
	*
	*/
	function index($id)
	{
		$data['main_content'] = 'market';
		$data['contents'] = $this->Market_work_model->get_market_work($id);
		$data['market'] = $this->Market_model->get_market_byid($id);
		$this->load->view('customer/include/template', $data);
	}
		
	/**
	* @brief	查看具体作品
	*
	*/
	function view($id){
		$data['main_content'] = 'market_work';
		$data['contents'] = $this->Market_work_model->get_market_work_byid($id);
		$this->load->view('customer/include/template', $data);
	}
}