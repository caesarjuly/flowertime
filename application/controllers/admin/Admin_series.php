<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_series extends MY_Controller {
	
	/**
	* @brief	构造函数，一般可以在里面load一些库、辅助函数以及所用到的model，也可以在autoload配置文件里默认添加
	*
	* @return	void
	*/
	function __construct() 
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<p align="center" style= "font-size: 12px;color:red;" class="error">', '</p>');
	}
	
	/**
	* @brief	默认函数，跳转到admin_active_charge.view页面
	*
	*/
	function index()
	{
		$data['main_content'] = 'admin_active_charge';
		$data['contents'] = $this->Series_model->get();
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到add_series_view页面，add新套系
	*
	*/
	function add_series_view()
	{
		$data['main_content'] = 'admin_add_series_view';
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到admin_add.view页面，add新套系
	*
	*/
	function add_series()
	{
		$this->form_validation->set_rules('name','套系名','trim|required|min_length[2]');
		$this->form_validation->set_rules('price','价格','trim|required|min_length[2]');
		$this->form_validation->set_rules('table_danyuan','标签颜色','trim|required|min_length[2]');
		$this->form_validation->set_rules('content2','中文介绍','trim|required|min_length[2]');
		$this->form_validation->set_rules('content3','英文介绍','trim|required|min_length[2]');
		if($this->form_validation->run()==FALSE)
		{
			$this->add_series_view();
		}
		else 
		{
			$this->Series_model->add();
			redirect('admin/Admin_series');
		}
		
	}
	/**
	* @brief	跳转到edit_series_view页面，edit新套系
	*
	*/
	function edit_series_view($series_id)
	{
		$data['main_content'] = 'admin_edit_series_view';
		$data['contents'] = $this->Series_model->get_series($series_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到edit_series页面，edit新套系
	*
	*/
	function edit_series($series_id)
	{
		if($this->Series_model->edit($series_id))
		{
			$data = array('message' => '更新成功，将于2秒后跳转页面！', 'main_content' => 'message','url' => 'admin/Admin_series');	
			$this->load->view('admin/include/template',$data);
		}else 
		{
			$data = array('message' => '更新失败，将于2秒后跳回！', 'main_content' => 'message','url' => 'admin/Admin_series/edit_series_view');	
			$this->load->view('admin/include/template',$data);
		}
	}
	/**
	* @brief	删除新套系
	*
	*/
	function delete_series($series_id)
	{
		if($this->Series_model->delete($series_id))
		{
			$this->index();
		}
		else 
		{
			$data = array('message' => '更新失败，将于2秒后跳回！', 'main_content' => 'message','url' => 'admin/Admin_series');	
			$this->load->view('admin/include/template',$data);
		}
	}
}