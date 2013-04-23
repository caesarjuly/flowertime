<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_course extends MY_Controller {
	
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
	* @brief	默认函数，跳转到admin_active_course.view页面
	*
	*/
	function index($offset = '')
	{
		$limit = 9;
		$config['base_url'] = site_url('admin/Admin_course/index');
		$config['total_rows'] = $this->Course_model->count_question();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_active_course';
		$data['contents'] = $this->Course_model->get_question($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	
	/**
	* @brief	跳转到admin_active_course_answer页面
	*
	*/
	function get_course_answer($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_course/get_course_answer');
		$config['total_rows'] = $this->Course_model->count_answer();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_active_course_answer';
		$data['contents'] = $this->Course_model->get_answer($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到admin_add_course_view页面，add新课程
	*
	*/
	function add_course_view()
	{
		$data['main_content'] = 'admin_add_course_view';
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	add新课程
	*
	*/
	function add_course()
	{
		$this->form_validation->set_rules('title','课程名','trim|required|min_length[2]');
		$this->form_validation->set_rules('content2','课程内容','trim|required|min_length[2]');
		if($this->form_validation->run()==FALSE)
		{
			$this->add_course_view();
		}
		else 
		{
			$this->Course_model->add_question();
			redirect('admin/Admin_course');
		}
	}
	/**
	* @brief	跳转到admin_add_course_view页面，add新课程
	*
	*/
	function add_course_answer_view()
	{
		$data['main_content'] = 'admin_add_course_answer';
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	add新课程
	*
	*/
	function add_course_answer()
	{
		$this->form_validation->set_rules('title','课程名','trim|required|min_length[2]');
		$this->form_validation->set_rules('content2','课程内容','trim|required|min_length[2]');
		if($this->form_validation->run()==FALSE)
		{
			$this->add_course_answer_view();
		}
		else 
		{
			$this->Course_model->add_answer();
			redirect('admin/Admin_course/get_course_answer');
		}
	}
	
	/**
	* @brief	跳转到edit_course_view页面，edit新课堂
	*
	*/
	function edit_course_top_view($course_id)
	{
		$data['main_content'] = 'admin_edit_top_course_view';
		$data['contents'] = $this->Course_model->get_course($course_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到edit_series页面，edit新课堂
	*
	*/
	function edit_top_course($course_id)
	{
		$this->form_validation->set_rules('title','课程名','trim|required|min_length[2]');
		$this->form_validation->set_rules('content2','课程内容','trim|required|min_length[2]');
		$this->form_validation->set_rules('top_course','置顶课程简介','trim|required|min_length[2]');
		if($this->form_validation->run()==FALSE)
		{
			$this->edit_course_top_view($course_id);
		}
		else 
		{
			if(!$_FILES['userfile']['name'])
			{
				$this->Course_model->edit_no_image($course_id);
				redirect('admin/Admin_course');
			}
			else 
			{
			$this->gallery_path = realpath(APPPATH . '../top');
			$config = array(
						'allowed_types' => 'jpg|jpeg|png|gif',
						'upload_path' => $this->gallery_path ,
						'max_size' => 4000,
						'encrypt_name' => true
					);
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				$this->upload->do_upload();
				$image_data = $this->upload->data();
				
				if($this->input->post('upload'))
					{			
						if($this->Course_model->edit_top($course_id,$image_data))
							{
								$data = array('message' => '更新成功，将于2秒后跳转页面！', 'main_content' => 'message','url' => 'admin/Admin_course/');	
								$this->load->view('admin/include/template',$data);
							}
						else 
							{
								$data = array('message' => '更新失败，将于2秒后跳回！', 'main_content' => 'message','url' => 'admin/Admin_course/edit_course_top_view/' . $course_id);	
								$this->load->view('admin/include/template',$data);
							}
					}
			}
		}
	}
	
	/**
	* @brief	跳转到edit_course_view页面，edit新课堂
	*
	*/
	function edit_course_view($course_id)
	{
		$data['main_content'] = 'admin_edit_course_view';
		$data['contents'] = $this->Course_model->get_course($course_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到edit_series页面，edit新课堂
	*
	*/
	function edit_course($course_id)
	{
		if($this->Course_model->edit($course_id))
		{
			$data = array('message' => '更新成功，将于2秒后跳转页面！', 'main_content' => 'message','url' => 'admin/Admin_course');	
			$this->load->view('admin/include/template',$data);
		}else 
		{
			$data = array('message' => '更新失败，将于2秒后跳回！', 'main_content' => 'message','url' => 'admin/Admin_course/edit_course_view');	
			$this->load->view('admin/include/template',$data);
		}
	}
	
	/**
	* @brief	跳转到edit_course_answer_view页面
	*
	*/
	function edit_course_answer_view($course_id)
	{
		$data['main_content'] = 'admin_edit_course_answer';
		$data['contents'] = $this->Course_model->get_course($course_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到edit_course_answer页面，edit新课堂
	*
	*/
	function edit_course_answer($course_id)
	{
		if($this->Course_model->edit($course_id))
		{
			$data = array('message' => '更新成功，将于2秒后跳转页面！', 'main_content' => 'message','url' => 'admin/Admin_course/get_course_answer');	
			$this->load->view('admin/include/template',$data);
		}else 
		{
			$data = array('message' => '更新失败，将于2秒后跳回！', 'main_content' => 'message','url' => 'admin/Admin_course/edit_course_answer_view');	
			$this->load->view('admin/include/template',$data);
		}
	}
	/**
	* @brief	删除新课堂
	*
	*/
	function delete_course($course_id)
	{
		if($this->Course_model->delete($course_id))
		{
			$this->index();
		}
		else 
		{
			$data = array('message' => '删除失败，将于2秒后跳回！', 'main_content' => 'message','url' => 'admin/Admin_course');	
			$this->load->view('admin/include/template',$data);
		}
	}
	
	/**
	* @brief	删除新课堂
	*
	*/
	function delete_course_answer($course_id)
	{
		if($this->Course_model->delete($course_id))
		{
			$this->get_course_answer();
		}
		else 
		{
			$data = array('message' => '删除失败，将于2秒后跳回！', 'main_content' => 'message','url' => 'admin/Admin_course');	
			$this->load->view('admin/include/template',$data);
		}
	}
	/**
	* @brief	置顶新活动
	*
	*/
	function top_course_view($course_id)
	{
		
		$data['contents'] = $this->Course_model->get_course($course_id);
		if(($data['contents']['top_url'] == NULL)&&($data['contents']['top_content'] == NULL))
		{
			$data['main_content'] = 'admin_top_course';
			$this->load->view('admin/include/template',$data);
		}
		else
		{
			$this->Course_model->top_content($course_id);
			$this->index();
		}
	}
	
	/**
	* @brief	置顶新活动
	*
	*/
	function top_course($course_id)
	{
		$this->form_validation->set_rules('top_course','置顶课程简介','trim|required|min_length[2]');
		if($this->form_validation->run()==FALSE)
		{
			$this->top_course_view($course_id);
		}
		else 
		{
		$this->gallery_path = realpath(APPPATH . '../top');
			$config = array(
						'allowed_types' => 'jpg|jpeg|png|gif',
						'upload_path' => $this->gallery_path ,
						'max_size' => 4000,
						'encrypt_name' => true
					);
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				$this->upload->do_upload();
				$image_data = $this->upload->data();
				
				if($this->input->post('upload'))
					{			
							$this->Course_model->add_top($course_id,$image_data);
							$this->index();
					}
			
		}
	}
	/**
	* @brief	取消置顶新活动
	*
	*/
	function untop_course($course_id)
	{
		$this->Course_model->untop($course_id);
		$this->index();
	}
	/**
	* @brief	置顶新活动
	*
	*/
	function top_course_answer($course_id)
	{
		$this->Course_model->top($course_id);
		$this->get_course_answer();
	}
	/**
	* @brief	取消置顶新活动
	*
	*/
	function untop_course_answer($course_id)
	{
		$this->Course_model->untop($course_id);
		$this->get_course_answer();
	}
}