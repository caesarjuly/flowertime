<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_activity extends MY_Controller {
	
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
	* @brief	默认函数，跳转到admin_active_activity.view页面
	*
	*/
	function index($offset = '')
	{
		$limit = 4;
		$config['base_url'] = site_url('admin/Admin_activity/index');
		$config['total_rows'] = $this->Activity_model->count_all();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_active_activity';
		$data['images'] = $this->Activity_model->get($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	添加新活动页面
	*
	*/
	function add_activity_view()
	{
		$data['main_content'] = 'admin_add_activity';
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	添加新活动
	*
	*/
	function add_activity()
	{
		$this->form_validation->set_rules('title','活动标题','trim|required|min_length[2]');
		if($this->form_validation->run()==FALSE)
		{
			$this->add_activity_view();
		}
		else 
		{
			$this->gallery_path = realpath(APPPATH . '../activity');
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
					'width' => 70,
					'height' => 70
				);
				$this->load->library('image_lib',$config);
				$this->image_lib->resize();
				
				$contents = $image_data;
				if($this->input->post('upload'))
					{
						
						if(!$this->Activity_model->add($image_data))
						{
							$this->Activity_model->add($image_data);
						}
						else 
						{
							redirect('admin/Admin_activity');
						}
					}
		}
	}
	/**
	* @brief	编辑新活动页面
	*
	*/
	function edit_activity_view($activity_id)
	{
		$data['main_content'] = 'admin_edit_activity';
		$data['images'] = $this->Activity_model->get_activity($activity_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	编辑新活动
	*
	*/
	function edit_activity($activity_id)
	{
		$this->form_validation->set_rules('title','活动标题','trim|required|min_length[2]');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->edit_activity_view($activity_id);
		}
		else 
		{		
			if(!$_FILES['userfile']['name'])
			{
				$this->Activity_model->edit_no_image();
				redirect('admin/Admin_activity');
			}
			else 
			{
				$this->gallery_path = realpath(APPPATH . '../activity');
				$config = array(
							'allowed_types' => 'jpg|jpeg|png|gif',
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
						'width' => 70,
						'height' => 70
					);
					
					$this->load->library('image_lib',$config);
					$this->image_lib->resize();
					
					$contents = $image_data;
					if($this->input->post('upload'))
						{
							
							if(!$this->Activity_model->edit($image_data))
							{
								$this->Activity_model->edit($image_data);
							}
							else 
							{
								redirect('admin/Admin_activity');
							}
						}
			}
		}
	}
	/**
	* @brief	置顶新活动
	*
	*/
	function top_activity($activity_id)
	{
		$this->Activity_model->top($activity_id);
		$this->index();
	}
	/**
	* @brief	取消置顶新活动
	*
	*/
	function untop_activity($activity_id)
	{
		$this->Activity_model->untop($activity_id);
		$this->index();
	}
	/**
	* @brief	删除新活动
	*
	*/
	function delete_activity($activity_id)
	{
		if($this->Activity_model->delete($activity_id))
		{
			$this->index();
		}
		else 
		{
			$data = array('message' => '删除失败，将于2秒后跳回！', 'main_content' => 'message','url' => 'admin/Admin_activity');	
			$this->load->view('admin/include/template',$data);
		}
	}
}