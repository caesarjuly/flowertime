<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Customer_course.php
#         Desc: 实现预订的控制器
#       Author: 杨帆
#      Version: 1.0
#   LastChange: 2011-12-21
#      History: none
=============================================================================*/

class Customer_pay extends CI_Controller {
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
			$name = 'pay';
			redirect('customer/Customer_index/login0/index.php?' . 'widget_name=' . $name . '&' . 'activity_id=' . $id);
			die();
		}
	}
	/**
	* @brief	默认函数，跳转到order_create
	*
	*/
	public function index($series_id)
	{
		$this->is_logged_in($series_id);
		$data['series'] = $this->Series_model->get_series($series_id);
		$data['series']['price'] = $data['series']['price']*0.1;
		$data['series_id'] = $series_id;
		$data['main_content'] = 'order_create';
		$this->load->view('customer/include/template', $data);
		
	}
	/**
	* @brief	创建订单
	*
	*/
	function create_order()
	{
		$this->form_validation->set_rules('customer_name','订单者姓名','trim|required|min_length[2]');
		$this->form_validation->set_rules('kid_name','孩子姓名','trim|required|min_length[2]');
		$this->form_validation->set_rules('birthday','生日','trim|required');
		$this->form_validation->set_rules('telephone1','联系电话①','trim|required|regex_match[/^(1[3458])\d{9}$/]');
		$this->form_validation->set_rules('telephone2','联系电话②','trim|required|regex_match[/^(1[3458])\d{9}$/]');
		$this->form_validation->set_rules('email','邮箱','trim|required|valid_email');
		
		$a = $this->input->post('telephone1');
		$b = $this->input->post('telephone2');
			
		if($this->form_validation->run() &&($a != $b))
		{
			$this->Order_model->add();
			redirect('customer/Customer_charge/order_list');
		}
		else
		{
			
			if(($a!=NULL)&&($b!=NULL)&&($a == $b))
			{
				$data['error'] = '两个联系方式不能相同';//此处应该是注册失败
			}
			$data['series'] = array(
			'name' => $this->input->post('series_name'),
			'price'	=> $this->input->post('price')
			);
			$data['main_content'] = 'order_create';
			$this->load->view('customer/include/template', $data);
		}
	}
	/**
	* @brief	订单付款
	*
	*/
	function pay()
	{
		$this->Alipay_model->return_verify();
		redirect('customer/Customer_charge/order_list');
	}
	
}
