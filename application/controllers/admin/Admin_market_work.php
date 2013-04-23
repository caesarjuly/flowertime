<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_market_work extends MY_Controller {
	
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
	* @brief	默认函数，跳转到admin_market_work页面
	*
	*/
	function index($market_id = -1)
	{
		if($market_id==-1)
		{
			$data = array('message' => '无超市分类，请先超市作品分类。将于2秒后跳转至添加分类页面！', 'main_content' => 'message','url' => 'admin/Admin_market/index');
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
		$data['main_content'] = 'admin_market_work';
		$data['works'] = $this->Market_work_model->get_market_work($market_id);
		$data['contents'] = $this->Market_model->get_market();
		$this->load->view('admin/include/template',$data);
		}
	}
	/**
	* @brief	跳转至添加新超市分类页面
	*
	*/
	function add_view($market_id)
	{
		$data['main_content'] = 'admin_add_market_work_view';
		$data['market_id'] = $market_id;
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	添加新超市分类
	*
	*/
	function add_market_work($market_id)
	{
		$this->form_validation->set_rules('title','名字','trim|required|min_length[2]');
		if($this->form_validation->run()==FALSE)
		{
			$this->add_view($market_id);
		}
		else 
		{
			$q = $this->Market_model->get_market_byid($market_id);
			$this->gallery_path = realpath(APPPATH . '../' . $q['content_url']);
			$config = array(
						'allowed_types' => 'jpg|png|gif',
						'upload_path' => $this->gallery_path ,
						'max_size' => 4000,
						'encrypt_name' => true
					);
				$this->load->library('upload',$config);
				$this->upload->do_upload();
				$image_data = $this->upload->data();
				if($this->input->post('upload'))
					{
						
						if(!$this->Market_work_model->add($image_data))
						{
							$this->Market_work_model->add($image_data);
						}
						else 
						{
							redirect('admin/Admin_market_work/index/' . $market_id);
						}
					}
		}
	}
	/**
	* @brief	跳转至编辑作品页面
	*
	*/
	function edit_view($market_work_id)
	{
		$data['main_content'] = 'admin_edit_market_work';
		$data['contents'] = $this->Market_work_model->get_market_work_byid($market_work_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	编辑作品
	*
	*/
	function edit_market_work($market_work_id)
	{
		$this->form_validation->set_rules('title','活动标题','trim|required|min_length[2]');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->edit_market_view($market_work_id);
		}
		else 
		{		
				$q = $this->Market_work_model->get_market_work_byid($market_work_id);
				$market_id =$q['market_id'];
				$q = $this->Market_model->get_market_byid($market_id);
				$this->gallery_path = realpath(APPPATH . '../' . $q['content_url']);
				$config = array(
							'allowed_types' => 'jpg|jpeg|png|gif',
							'upload_path' => $this->gallery_path ,
							'max_size' => 4000,
							'encrypt_name' => true
						);
					$this->load->library('upload', $config);
					$image_data = "";
				if($_FILES['userfile']['name'])
				{
					$this->upload->do_upload();
					$image_data = $this->upload->data();
				}
					if($this->input->post('upload'))
						{
							
							if(!$this->Market_work_model->edit($image_data))
							{
								$this->Market_work_model->edit($image_data);
							}
							else 
							{
								redirect('admin/Admin_market_work/index/' . $market_id);
							}
						}
			}
	}
	/**
	* @brief	删除作品
	*
	*/
	function delete_market_work($market_work_id)
	{
		$q = $this->Market_work_model->get_market_work_byid($market_work_id);
		if($this->Market_work_model->delete($market_work_id))
		{
			$this->index($q['market_id']);
		}
		else 
		{
			$data = array('message' => '删除失败，将于2秒后跳回！', 'main_content' => 'message','url' => 'admin/Admin_market');	
			$this->load->view('admin/include/template',$data);
		}
	}
	
}
