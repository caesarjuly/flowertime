<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Customer_charge.php
#         Desc: 实现工作室摄影课堂的控制器
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-12-5 
#      History: none
=============================================================================*/

class Customer_charge extends CI_Controller {
	
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
		$data['main_content'] = 'charge';
		$data['contents'] = $this->Series_model->get();
		$data['market'] = $this->Market_model->get_market();
		$this->load->view('customer/include/template', $data);
	}
	/**
	* @brief	订单管理
	*
	*/
	function order_list()
	{
		$this->is_logged_in();
		$id =$this->session->userdata('id');
		$data['main_content'] = 'order_list';
		$data['contents'] = $this->Order_model->customer_get_order($id);
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	删除订单
	*
	*/
	function delete_order($order_id)
	{
		$this->is_logged_in();
		if($this->Order_model->delete($order_id))
		{
			$this->order_list();
		}
		else 
		{
			$data = array('message' => '删除失败，将于2秒后跳转至order_list.view！', 'main_content' => 'message','url' => 'customer/Customer_charge/order_list');
			$this->load->view('admin/include/template',$data);
		}
	}
	/**
	* @brief	查看订单
	*
	*/
	function show_order($order_id)
	{
		$this->is_logged_in();
		$data['main_content'] = 'order_detail';
		$data['contents'] = $this->Order_model->get_detail($order_id);
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	确认订单
	*
	*/
	function confirm_order($order_id)
	{
		$this->is_logged_in();
		$data['main_content'] = 'order_confirm';
		$data['contents'] = $this->Order_model->get_detail($order_id);
		$data['form'] = $this->Alipay_model->build_form($data['contents']['order_id'], $data['contents']['series_name'], '用于支付宝功能的测试', 0.01);
		$this->load->view('customer/include/template',$data);
	}
}