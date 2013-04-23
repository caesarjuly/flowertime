<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_market extends MY_Controller {
	
	/**
	* @brief	构造函数，一般可以在里面load一些库、辅助函数以及所用到的model，也可以在autoload配置文件里默认添加
	*
	* @return	void
	*/
	function __construct() 
	{
		parent::__construct();
	}
	
	/**
	* @brief	默认函数，跳转到admin_market页面
	*
	*/
	function index()
	{
		$data['main_content'] = 'admin_market';
		$data['contents'] = $this->Market_model->get_market();
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转至添加新超市分类页面
	*
	*/
	function add_market_view()
	{
		$data['main_content'] = 'admin_add_market_view';
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	添加新超市作品
	*
	*/
	function add_market()
	{
		$this->form_validation->set_rules('title','分类标题','trim|required|min_length[2]');
		if($this->form_validation->run()==FALSE)
		{
			$this->add_market_view();
		}
		else 
		{
			$this->gallery_path = realpath(APPPATH . '../market');
			$config = array(
						'allowed_types' => 'jpg|png|gif',
						'upload_path' => $this->gallery_path ,
						'max_size' => 4000,
						'encrypt_name' => true
					);
				$this->load->library('upload',$config);
				$field_name = "titleurlfile";
				$this->upload->do_upload($field_name);
				$image_data['titleurlfile'] = $this->upload->data();
				$field_name = "urlfile";	
				$this->upload->do_upload($field_name);
				$image_data['urlfile'] = $this->upload->data();
				if($this->input->post('upload'))
					{
						
						if(!$this->Market_model->add($image_data))
						{
							$this->Market_model->add($image_data);
						}
						else 
						{
							redirect('admin/Admin_market');
						}
					}
		}
	}
	/**
	* @brief	跳转至添加编辑分类页面
	*
	*/
	function edit_market_view($market_id)
	{
		$data['main_content'] = 'admin_edit_market';
		$data['contents'] = $this->Market_model->get_market_byid($market_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	编辑分类
	*
	*/
	function edit_market($market_id)
	{
		$this->form_validation->set_rules('title','活动标题','trim|required|min_length[2]');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->edit_market_view($market_id);
		}
		else 
		{		
				$this->gallery_path = realpath(APPPATH . '../market');
				$config = array(
							'allowed_types' => 'jpg|jpeg|png|gif',
							'upload_path' => $this->gallery_path ,
							'max_size' => 4000,
							'encrypt_name' => true
						);
					$this->load->library('upload',$config);
				$image_data = "";
				if($_FILES['urlfile']['name'])
				{
					$filename = "urlfile";
					$this->upload->do_upload($filename);
					$image_data['urlfile'] = $this->upload->data();
				}
				if($_FILES['titleurlfile']['name'])
				{
					$filename = "titleurlfile";
					$this->upload->do_upload($filename);
					$image_data['titleurlfile'] = $this->upload->data();
				}
					if($this->input->post('upload'))
						{
							
							if(!$this->Market_model->edit($image_data))
							{
								$this->Market_model->edit($image_data);
							}
							else 
							{
								redirect('admin/Admin_market');
							}
						}
			}
	}
	/**
	* @brief	删除分类
	*
	*/
	function delete_market($market_id)
	{
		if($this->Market_model->delete($market_id))
		{
			$this->index();
		}
		else 
		{
			$data = array('message' => '删除失败，将于2秒后跳回！', 'main_content' => 'message','url' => 'admin/Admin_market');	
			$this->load->view('admin/include/template',$data);
		}
	}
	
}
