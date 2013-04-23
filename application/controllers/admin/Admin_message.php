<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_message extends MY_Controller {
	
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
	* @brief	默认函数，跳转到admin_message.view页面
	*
	*/
	function index($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_message/index');
		$config['total_rows'] = $this->Message_model->count();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_message';
		$data['contents'] = $this->Message_model->get_unreply1($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跟上面的函数一样
	*
	*/
	function test($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_message/test');
		$config['total_rows'] = $this->Message_model->count();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_message';
		$data['contents'] = $this->Message_model->get_unreply1($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到admin_message_list.view页面
	*
	*/
	function show_normal_message($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_message/show_normal_message');
		$config['total_rows'] = $this->Message_model->count_reply();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_message_list';
		$data['contents'] = $this->Message_model->get_normal1($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	function search_message()
	{
		$data['main_content'] = 'admin_message_search';
		$name = $this->input->post('name');
		$data['name'] = $name;
		$data['contents'] = $this->Message_model->search($name);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到回复留言页面
	*
	*/
	function reply_message_view($message_id)
	{
		$data['main_content'] = 'admin_message_reply';
		$data['contents'] = $this->Message_model->get_unreply_message($message_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到编辑留言页面
	*
	*/
	function edit_message_view($message_id)
	{
		$data['main_content'] = 'admin_message_edit';
		$data['contents'] = $this->Message_model->get_unreply_message($message_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	编辑留言
	*
	*/
	function edit_message($message_id)
	{
		$this->form_validation->set_rules('name','用户姓名','trim|required|min_length[2]|max_length[16]');
		$this->form_validation->set_rules('add_customer_message','用户留言','trim|required|min_length[4]|max_length[128]');
		$this->form_validation->set_rules('add_message_content','管理员回复','trim|required|min_length[4]|max_length[128]');
		if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'admin_message_edit';
			$data['contents'] = $this->Message_model->get_unreply_message($message_id);
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
			if($this->Message_model->update_message($message_id))
			{
				redirect('admin/Admin_message/');
			}
			else
			{
				$data = array('message' => '编辑留言失败，将于2秒后跳转至admin_message.view！', 'main_content' => 'message','url' => 'admin/Admin_message');
				$this->load->view('admin/include/template',$data);
			}
		}
	}
	/**
	* @brief	回复留言
	*
	*/
	function reply_message($message_id)
	{
		$this->form_validation->set_rules('reply','回复内容','trim|required|max_length[128]');
		if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'admin_message_reply';
			$data['contents'] = $this->Message_model->get_unreply_message($message_id);
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
			if($this->Message_model->reply($message_id))
			{
				$this->Notice_model->add_message_customer($message_id);
				redirect('admin/Admin_message');
			}
			else
			{
				$data = array('message' => '回复失败，将于2秒后跳转至admin_message.view！', 'main_content' => 'message','url' => 'admin/Admin_message');
				$this->load->view('admin/include/template',$data);
			}
		}
	}
	/**
	* @brief	删除留言
	*
	*/
	function delete_message($message_id)
	{
		if($this->Message_model->delete($message_id))
		{
			$this->test();
		}
		else
		{
			$data = array('message' => '删除失败，将于2秒后跳转至待回复留言页面！', 'main_content' => 'message','url' => 'admin/Admin_message');
			$this->load->view('admin/include/template',$data);
		}
		
	}
	/**
	* @brief	删除已回复的留言
	*
	*/
	function delete_reply_message($message_id)
	{
		if($this->Message_model->delete($message_id))
		{
			redirect('admin/Admin_message/show_normal_message');
		}
		else
		{
			$data = array('message' => '删除失败，将于2秒后跳转至待回复留言页面！', 'main_content' => 'message','url' => 'admin/Admin_message/show_normal_message');
			$this->load->view('admin/include/template',$data);
		}
		
	}
	/**
	* @brief	跳转到admin_activity_message页面
	*
	*/
	function show_activity_message($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_message/show_activity_message');
		$config['total_rows'] = $this->Message_activity_model->count();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_activity_message';
		$data['contents'] = $this->Message_activity_model->get_unreply1($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	function search_activity_message()
	{
		$data['main_content'] = 'admin_activity_message_search';
		$name = $this->input->post('name');
		$data['name'] = $name;
		$data['contents'] = $this->Message_activity_model->search($name);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到admin_activity_message_list页面
	*
	*/
	function show_normal_activity_message($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_message/show_normal_activity_message');
		$config['total_rows'] = $this->Message_activity_model->count_reply();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_activity_message_list';
		$data['contents'] = $this->Message_activity_model->get_normal1($limit,$offset);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到回复活动留言页面
	*
	*/
	function reply_activity_message_view($message_id)
	{
		$data['main_content'] = 'admin_activity_message_reply';
		$data['contents'] = $this->Message_activity_model->get_unreply_message($message_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到编辑留言页面
	*
	*/
	function edit_activity_message_view($message_id)
	{
		$data['main_content'] = 'admin_activity_message_edit';
		$data['contents'] = $this->Message_activity_model->get_unreply_message($message_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	编辑留言
	*
	*/
	function edit_activity_message($message_id)
	{
		$this->form_validation->set_rules('reply','回复内容','trim|required|max_length[128]');
		if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'admin_activity_message_edit';
			$data['contents'] = $this->Message_activity_model->get_unreply_message($message_id);
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
			if($this->Message_activity_model->reply($message_id))
			{
				redirect('admin/Admin_message/show_normal_activity_message');
			}
			else
			{
				$data = array('message' => '编辑回复失败，将于2秒后跳转至admin_message.view！', 'main_content' => 'message','url' => 'admin/Admin_message/show_normal_activity_message');
				$this->load->view('admin/include/template',$data);
			}
		}
	}
	/**
	* @brief	回复留言
	*
	*/
	function reply_activity_message($message_id)
	{
		$this->form_validation->set_rules('reply','回复内容','trim|required|max_length[128]');
		if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'admin_activity_message_reply';
			$data['contents'] = $this->Message_activity_model->get_unreply_message($message_id);
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
			if($this->Message_activity_model->reply($message_id))
			{
				$this->Notice_model->add_message_activity($message_id);
				redirect('admin/Admin_message/show_activity_message');
			}
			else
			{
				$data = array('message' => '回复失败，将于2秒后跳转至admin_message.view！', 'main_content' => 'message','url' => 'admin/Admin_message/show_activity_message');
				$this->load->view('admin/include/template',$data);
			}
		}
	}
	/**
	* @brief	删除留言
	*
	*/
	function delete_activity_message($message_id)
	{
		$q = $this->Message_model->get_activity_message_delete($message_id);
		if($this->Message_activity_model->delete($message_id))
		{
			$this->Notice_model->add_activity_message_delete($q);
			redirect('admin/Admin_message/show_activity_message');
		}
		else
		{
			$data = array('message' => '删除失败，将于2秒后跳转至待回复留言页面！', 'main_content' => 'message','url' => 'admin/Admin_message/show_activity_message');
			$this->load->view('admin/include/template',$data);
		}
		
	}
	/**
	* @brief	删除已回复的留言
	*
	*/
	function delete_activity_reply_message($message_id)
	{
		if($this->Message_activity_model->delete($message_id))
		{
			redirect('admin/Admin_message/show_normal_activity_message');
		}
		else
		{
			$data = array('message' => '删除失败，将于2秒后跳转至待回复留言页面！', 'main_content' => 'message','url' => 'admin/Admin_message/show_normal_activity_message');
			$this->load->view('admin/include/template',$data);
		}
		
	}

	/**
	* @brief	默认函数，跳转到admin_course_message页面
	*
	*/
	function show_course_message($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_message/show_course_message');
		$config['total_rows'] = $this->Message_course_model->count();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_course_message';
		$data['contents'] = $this->Message_course_model->get_unreply1($limit,$offset);
		$this->load->view('admin/include/template',$data);
	}
	function search_course_message()
	{
		$data['main_content'] = 'admin_course_message_search';
		$name = $this->input->post('name');
		$data['name'] = $name;
		$data['contents'] = $this->Message_course_model->search($name);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到admin_course_message_list页面
	*
	*/
	function show_normal_course_message($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_message/show_normal_course_message');
		$config['total_rows'] = $this->Message_course_model->count_reply();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_course_message_list';
		$data['contents'] = $this->Message_course_model->get_normal1($limit,$offset);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到回复活动留言页面
	*
	*/
	function reply_course_message_view($message_id)
	{
		$data['main_content'] = 'admin_course_message_reply';
		$data['contents'] = $this->Message_course_model->get_unreply_message($message_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到编辑留言页面
	*
	*/
	function edit_course_message_view($message_id)
	{
		$data['main_content'] = 'admin_course_message_edit';
		$data['contents'] = $this->Message_course_model->get_unreply_message($message_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	编辑留言
	*
	*/
	function edit_course_message($message_id)
	{
		$this->form_validation->set_rules('reply','回复内容','trim|required|max_length[128]');
		if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'admin_course_message_edit';
			$data['contents'] = $this->Message_course_model->get_unreply_message($message_id);
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
			if($this->Message_course_model->reply($message_id))
			{
				redirect('admin/Admin_message/show_normal_course_message');
			}
			else
			{
				$data = array('message' => '编辑回复失败，将于2秒后跳转至admin_message.view！', 'main_content' => 'message','url' => 'admin/Admin_message/show_normal_course_message');
				$this->load->view('admin/include/template',$data);
			}
		}
	}
	/**
	* @brief	回复留言
	*
	*/
	function reply_course_message($message_id)
	{
		$this->form_validation->set_rules('reply','回复内容','trim|required|max_length[128]');
		if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'admin_course_message_reply';
			$data['contents'] = $this->Message_course_model->get_unreply_message($message_id);
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
			if($this->Message_course_model->reply($message_id))
			{
				$this->Notice_model->add_message_course($message_id);
				redirect('admin/Admin_message/show_course_message');
			}
			else
			{
				$data = array('message' => '回复失败，将于2秒后跳转至admin_message.view！', 'main_content' => 'message','url' => 'admin/Admin_message/show_course_message');
				$this->load->view('admin/include/template',$data);
			}
		}
	}
	/**
	* @brief	删除留言
	*
	*/
	function delete_course_message($message_id)
	{
		$q = $this->Message_model->get_course_message_delete($message_id);
		if($this->Message_course_model->delete($message_id))
		{
			$this->Notice_model->add_course_message_delete($q);
			redirect('admin/Admin_message/show_course_message');
		}
		else
		{
			$data = array('message' => '删除失败，将于2秒后跳转至待回复留言页面！', 'main_content' => 'message','url' => 'admin/Admin_message/show_course_message');
			$this->load->view('admin/include/template',$data);
		}
		
	}
	/**
	* @brief	删除已回复的留言
	*
	*/
	function delete_course_reply_message($message_id)
	{
		if($this->Message_course_model->delete($message_id))
		{
			redirect('admin/Admin_message/show_normal_course_message');
		}
		else
		{
			$data = array('message' => '删除失败，将于2秒后跳转至待回复留言页面！', 'main_content' => 'message','url' => 'admin/Admin_message/show_normal_course_message');
			$this->load->view('admin/include/template',$data);
		}
		
	}
	function add_message_view()
	{
		$data['main_content'] = 'add_message';
		$this->load->view('admin/include/template',$data);
	}
	function add_message()
	{
		$this->form_validation->set_rules('title','用户姓名','trim|required|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('add_customer_message','用户留言','trim|required|min_length[4]|max_length[128]');
		$this->form_validation->set_rules('add_message','管理员回复','trim|required|min_length[4]|max_length[256]');
		if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'add_message';
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
			if($this->Message_model->add_message())
			{
				redirect('admin/Admin_message/');
			}
			else
			{
				$data = array('message' => '添加留言失败', 'main_content' => 'message','url' => 'admin/Admin_message');
				$this->load->view('admin/include/template',$data);
			}
		}
	}

}
