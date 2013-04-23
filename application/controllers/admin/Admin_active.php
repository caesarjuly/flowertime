<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_active extends MY_Controller {
	
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
	* @brief	默认函数，跳转到admin_active.view页面
	*
	*/
	function index()
	{
		$data['main_content'] = 'admin_active';
		$data['contents'] = $this->Album_model->get_album();
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到admin_active_test.view页面,跟上面页面一样，为了实现功能
	*
	*/
	function test()
	{
		$data['main_content'] = 'admin_active_test';
		$data['contents'] = $this->Album_model->get_album();
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到admin_active_piture.view页面
	*
	*/
	function show_work_byseries($album_id=-1)
	{
		if($album_id==-1)
		{
			$data = array('message' => '无作品分类，请先添加作品分类。将于2秒后跳转至添加分类页面！', 'main_content' => 'message','url' => 'admin/Admin_active');
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
			$data['main_content'] = 'admin_active_picture';
			$data['contents'] = $this->Album_model->get_album();
			$data['works'] = $this->Work_model->get_byalbum($album_id);
			$this->load->view('admin/include/template',$data);
		}
	}
	/**
	* @brief	添加新的作品分类页面
	*
	*/
	function add_album_view() 
	{
		$data['main_content'] = 'admin_active_add_album';
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	添加新的作品分类
	*
	*/
	function add_album() 
	{
		$this->form_validation->set_rules('name','分类名','trim|required|min_length[2]|max_length[32]');
		if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'admin_active_add_album';
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
			if($this->Album_model->add())
			{
				$this->test();
			}
			else
			{
				$data = array('message' => '添加失败，将于2秒后跳转至添加分类页面！', 'main_content' => 'message','url' => 'admin/Admin_active');
				$this->load->view('admin/include/template',$data);
			}
		}
	}
	/**
	* @brief	编辑新的作品分类页面
	*
	*/
	function edit_album_view($album_id) 
	{
		$data['album_id'] = $album_id;
		$data['contents'] = $this->Album_model->get_album_edit($album_id);
		$data['main_content'] = 'admin_active_edit_album';
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	编辑新的作品分类
	*
	*/
	function edit_album($album_id) 
	{
		$this->form_validation->set_rules('name','分类名','trim|required|min_length[2]|max_length[32]');
		if($this->form_validation->run()==FALSE)
		{
			$data['album_id'] = $album_id;
			$data['contents'] = $this->Album_model->get_album_edit($album_id);
			$data['main_content'] = 'admin_active_edit_album';
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
			 if($this->Album_model->edit($album_id))
			 {
			 	$this->test();
			 }
			 else 
			 {
			 	$data = array('message' => '编辑失败，将于2秒后跳转至编辑分类页面！', 'main_content' => 'message','url' => 'admin/Admin_active');
				$this->load->view('admin/include/template',$data);
			 }
		}
	}
/**
	* @brief	编辑新的停用的分类页面
	*
	*/
	function edit_stop_album_view($album_id) 
	{
		$data['album_id'] = $album_id;
		$data['contents'] = $this->Album_model->get_album_edit($album_id);
		$data['main_content'] = 'admin_active_edit_stop_album';
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	编辑新的停用作品分类
	*
	*/
	function edit_stop_album($album_id) 
	{
		$this->form_validation->set_rules('name','分类名','trim|required|min_length[2]|max_length[32]');
		if($this->form_validation->run()==FALSE)
		{
			$data['album_id'] = $album_id;
			$data['contents'] = $this->Album_model->get_album_edit($album_id);
			$data['main_content'] = 'admin_active_edit_stop_album';
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
			 if($this->Album_model->edit($album_id))
			 {
			 	redirect('admin/Admin_active/show_stop_album');
			 }
			 else 
			 {
			 	$data = array('message' => '编辑失败，将于2秒后跳转至编辑停用分类页面！', 'main_content' => 'message','url' => 'admin/Admin_active/show_stop_album');
				$this->load->view('admin/include/template',$data);
			 }
		}
	}
	/**
	* @brief	停用新的作品分类
	*
	*/
	function stop_album($album_id) 
	{
		if($this->Album_model->stop($album_id))
		{
			$this->test();
		}
		else 
		{
			$data = array('message' => '停用失败，将于2秒后跳转至在使用的分类页面！', 'main_content' => 'message','url' => 'admin/Admin_active');
			$this->load->view('admin/include/template',$data);
		}
		
	}
	/**
	* @brief	显示停用的新的作品分类
	*
	*/
	function show_stop_album() 
	{
		$data['main_content'] = 'admin_active_stop_album';
		$data['contents'] = $this->Album_model->get_album();
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	停用新的作品分类
	*
	*/
	function start_album($album_id) 
	{
		if($this->Album_model->start($album_id))
		{
			redirect('admin/Admin_active/show_stop_album');
		}
		else 
		{
			$data = array('message' => '开启失败，将于2秒后跳转至停用的分类页面！', 'main_content' => 'message','url' => 'admin/Admin_active/show_stop_album');
			$this->load->view('admin/include/template',$data);
		}
	}
	/**
	* @brief	停用新的作品分类
	*
	*/
	function delete_album($album_id) 
	{
		if($this->Album_model->delete($album_id))
		{
			redirect('admin/Admin_active/show_stop_album');
		}
		else 
		{
			$data = array('message' => '删除失败，将于2秒后跳转至停用的分类页面！', 'main_content' => 'message','url' => 'admin/Admin_active/show_stop_album');
			$this->load->view('admin/include/template',$data);
		}
	}
	/**
	* @brief	添加作品
	*
	*/
	function add_work($album_id)
	{
		$q = $this->Album_model->get_album_url($album_id);
		$this->gallery_path = realpath(APPPATH . '../' . $q);
		//$this->gallery_path_url = base_url() . 'album/';
		$config = array(
				'allowed_types' => 'jpg|png|gif',
				'upload_path' => $this->gallery_path ,
				'max_size' => 4000,
				'encrypt_name' => true
			);
		$this->load->library('upload',$config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		
		$config = array(
			'source_image' => $image_data['full_path'],
			'new_image' => $this->gallery_path . '/thumbs',
			'width' => 100,
			'height' => 100
		);
		
		$this->load->library('image_lib',$config);
		$this->image_lib->resize();
		
		$contents = $image_data;
		if($this->input->post('upload'))
			{
				
				if(!$this->Work_model->add($image_data))
				{
					$this->Work_model->add($image_data);
				}
				else 
				{
					redirect('admin/Admin_active/show_work_byseries/' . $album_id);
				}
			}
	}
	/**
	* @brief	作品图片删除
	* 
	*/
	function delete_work($id)
	{
		$picture_id = $id;
		$album_id = $this->Work_model->delete($picture_id);
		redirect('admin/Admin_active/show_work_byseries/' . $album_id);
	}
}