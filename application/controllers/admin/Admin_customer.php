<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_customer extends MY_Controller {
	
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
	* @brief	默认函数，跳转到admin_customer.view页面，激活会员页面
	*
	*/
	function index($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_customer/index');
		$config['total_rows'] = $this->Customer_model->count();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_customer';
		$data['contents'] = $this->Customer_model->get_active1($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	更上面的函数一样的意思
	*
	*/
	function test($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_customer/test');
		$config['total_rows'] = $this->Customer_model->count();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_customer';
		$data['contents'] = $this->Customer_model->get_active1($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到admin_customer_unactive.view页面,未激活会员页面
	*
	*/
	function show_unactive_customer($offset = '')
	{
		$limit = 5;
		$config['base_url'] = site_url('admin/Admin_customer/show_unactive_customer');
		$config['total_rows'] = $this->Customer_model->count_unactived();
		$config['per_page'] = $limit;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);    //初始化配置
		$data['pagination'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin_customer_unactive';
		$data['contents'] = $this->Customer_model->get_unactive1($limit, $offset);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到admin_customer_search.view页面
	*
	*/
	function search_customer()
	{
		$data['main_content'] = 'admin_customer_search';
		$name = $this->input->post('name');
		$data['contents'] = $this->Customer_model->search($name);
		$data['name'] = $name;
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到admin_customer_add.view页面
	*
	*/
	function show_add_customer()
	{
		$data['main_content'] = 'admin_customer_add';
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	编辑用户页面
	*
	*/
	function edit_customer($customer_id)
	{
		$data['main_content'] = 'admin_customer_edit';
		$data['query'] = $this->Customer_model->edit($customer_id);
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	删除已激活用户
	*
	*/
	function delete_actived_customer($customer_id)
	{
		if($this->Customer_model->delete_actived($customer_id))
		{
			$this->test();
		}
		else
		{
			$data = array('message' => '删除失败，将于2秒后跳转至已激活会员页面！', 'main_content' => 'message','url' => 'admin/Admin_customer');
			$this->load->view('admin/include/template',$data);
		}
	}
	/**
	* @brief	删除未激活用户
	*
	*/
	function delete_unactived_customer($customer_id)
	{
		if($this->Customer_model->delete_unactived($customer_id))
		{
			redirect('admin/Admin_customer/show_unactive_customer');
		}
		else
		{
			$data = array('message' => '删除失败，将于2秒后跳转至已激活会员页面！', 'main_content' => 'message','url' => 'admin/Admin_customer/show_unactive_customer');
			$this->load->view('admin/include/template',$data);
		}
	}
	/**
	* @brief	激活未激活的用户
	*
	*/
	function actived_customer($customer_id)
	{
		if($this->Customer_model->active($customer_id))
		{
			redirect('admin/Admin_customer/show_unactive_customer');
		}
		else
		{
			$data = array('message' => '激活失败，将于2秒后跳转至未激活会员页面！', 'main_content' => 'message','url' => 'admin/Admin_customer/show_unactive_customer');
			$this->load->view('admin/include/template',$data);
		}
	}
	/**
	* @brief	更新用户
	*
	*/
	function update_customer($customer_id)
	{
	    $this->form_validation->set_rules('phone','手机号','trim|regex_match[/^(1[3458])\d{9}$/]');
	    $this->form_validation->set_rules('email','邮箱','trim|valid_email');
	    $this->form_validation->set_rules('address','地址','trim|max_length[128]');
	   if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'admin_customer_edit';
			$data['query'] = $this->Customer_model->edit($customer_id);
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
			
			if($this->Customer_model->update_customer($customer_id) == 1)
			{
					$this->test();
			}
			else 
			{
					redirect('admin/Admin_customer/show_unactive_customer');
			}
		}
	}
	/**
	* @brief	添加用户，并实现页面跳转
	*
	*/
	function add_customer()
	{
		$this->form_validation->set_rules('name','用户名','trim|is_unique[customer.name]|required|min_length[2]|max_length[32]');
		$this->form_validation->set_rules('password','密码','trim|required|min_length[4]|max_length[32]');
	    $this->form_validation->set_rules('phone','手机号','trim|regex_match[/^(1[3458])\d{9}$/]');
	    $this->form_validation->set_rules('email','邮箱','trim|valid_email');
	    $this->form_validation->set_rules('address','地址','trim|max_length[128]');
		if($this->form_validation->run()==FALSE)
		{
			$data['main_content'] = 'admin_customer_add';
			$this->load->view('admin/include/template',$data);
		}
		else 
		{
			if($this->Customer_model->add())
			{
				redirect('admin/Admin_customer/test');
			}
			else 
			{
				redirect('admin/Admin_customer/show_add_customer');
			}
		}
	}
}
