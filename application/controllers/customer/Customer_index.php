<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Customer_index.php
#         Desc: 实现用户登录、注册、获得密码、退出和显示首页的控制器
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-12-5 
#      History: none
=============================================================================*/

class Customer_index extends CI_Controller {
	
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
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		$id = $this->session->userdata('id');
		if(!isset($is_logged_in)||$is_logged_in != true)
		{
			redirect('customer/Customer_index');
			die();
		}
	}
	/**
	* @brief	默认函数，跳转到首页页面
	*
	*/
	function index()
	{
		$data['main_content'] = 'index';
		$data['images'] = $this->Info_model->get_images();
		$data['normal'] = $this->Course_model->get_normal();
		$data['news'] = $this->Activity_model->get_news(6, 0);
		$this->load->view('customer/include/template',$data);
	}
	
	
	/**
	* @brief	登出
	*
	*/
	function logout($name)
	{
	            $dete = array(
				'is_logged_in' => false
				);
				$this->session->set_userdata($dete);
				$data['main_content'] = 'login';
				$data['widget_name'] = $name;
				$data['id'] = -1;
		        $this->load->view('customer/include/template',$data);
	}
	
	/**
	* @brief	登录页面
	*
	*/
	function login0($widget_name = "header_login",$id = -1)
	{
				$data['main_content'] = 'login';
				$widget_name = $_GET['widget_name'];
				$data['widget_name'] = $widget_name;
				$id = $_GET['activity_id'];
				$data['id'] = $id;
 		        $this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	登录
	*
	*/
	function login($widget_name , $id=-1)
	{	    
	    $this->form_validation->set_rules('name','用户名','trim|required|min_length[2]');
		$this->form_validation->set_rules('password','密码','trim|required|min_length[4]|max_length[32]');
		
		$widget_name = $_GET['widget_name'];
		$id = $_GET['activity_id'];
				
		if($this->form_validation->run()==FALSE)
		{
			$this->login0($widget_name , $id);
			
		}
		else 
		{
			if($this->customer_login_model->check_in())
			{
				if($this->customer_login_model->check_active())
				{
					$dete = array(
					'name' => $this->input->post('name'),
					'password' => sha1($this->input->post('password')),
					'is_logged_in' => true,
					'id' => $this->customer_login_model->get_id($this->input->post('name'))
					);
					$this->session->set_userdata($dete);
					switch ($widget_name)
					{
						case "customer_message_hidden":
							redirect('customer/Customer_message');
						break;
						case "untop_activity_message_hidden":
							redirect('customer/Customer_activity/detail/' . $id);
						case "course":
							redirect('customer/Customer_course/show_detail/' . $id);
						case 'pay':
							redirect('customer/Customer_pay/index/'. $id);
						default:
       						redirect('customer/customer_index');
						
					}
				}
				else 
				{
					$data['error']='用户未激活';
					$data['main_content'] = 'login';
					$data['name'] = $name;
					$data['widget_name'] = $widget_name;
					$data['id'] = $id;
		        	$this->load->view('customer/include/template',$data);
				}
			}
			else
			{
				$data['error']='用户名或密码错误';
				$data['main_content'] = 'login';
				$data['widget_name'] = $widget_name;
				$data['id'] = $id;
		        $this->load->view('customer/include/template',$data);
			}
		}
	}
	/**
	* @brief	注册页面
	*
	*/
	function signup() 
	{
		$data['title'] = '注册';
		$data['main_content'] = 'signup_view';
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	激活页面
	*
	*/
	function actived($i=0,$a='') 
	{
		$data['title'] = '激活';
		$data['main_content'] = 'active';
		$i = $_GET['i'];
		$a = $_GET['a'];
		$data['i'] = $i;
		$data['a'] = $a;
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	注册
	*
	*/
	function sign() 
	{
		
		$this->form_validation->set_rules('name', '用户名', 'trim|is_unique[customer.name]|required|min_length[2]');
		$this->form_validation->set_rules('password', '密码', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('passwd2', '密码确认', 'trim|required|min_length[4]|max_length[32]|matches[password]');
        $this->form_validation->set_rules('phone', '手机号', 'trim|regex_match[/^(1[3458])\d{9}$/]');
        $this->form_validation->set_rules('email', '邮箱', 'trim|is_unique[customer.email]|required|valid_email');
        $this->form_validation->set_rules('address', '地址', 'trim|max_length[128]');
		
       
		//设置验证规则
		if (!$this->form_validation->run()) {
			$data['title'] = '注册';
			$data['error'] = '注册失败了，请检查你的信息！';//此处应该是注册失败。
			$data['main_content'] = 'signup_view';
		    $this->load->view('customer/include/template',$data);
		} else 
		{
			if ($this->customer_login_model->add()) {
				$name = "header_login";
				$config['protocol'] = 'smtp'; 
		        $config['smtp_host'] = 'smtp.163.com'; // given server 
		        $config['smtp_user'] = 'mj4015515'; 
		        $config['smtp_pass'] = '4015515'; 
		        $config['smtp_port'] = '25'; // given port. 
		        $config['smtp_timeout'] = '5'; 
		        $config['newline'] = "/r/n"; 
		        $config['crlf'] = "/r/n"; 
		        $config['charset']='utf-8';  // Encoding type 
		        $config['wrapchars'] = '140';
		        $this->email->initialize($config);
		        $email = $this->input->post('email');
		        $name = $this->input->post('name');
		        $id = $this->customer_login_model->catch_id($name);
		        $this->email->from('mj4015515@163.com', 'service');  // show in the reciever email box 
		        $this->email->to($email); 
		       
		        $diy_subject='[花·时间]帐户激活通知！';  // Email title 
		        $diy_msg='亲爱的 '. $name .'：您好！
	感谢您注册[花·时间]，您只需要点击下面链接激活您的帐户，您便可以享受[花·时间]各项服务。  
	http://localhost/flowertime/customer/Customer_index/active_success/' . $id .'
	(如果无法点击该URL链接地址，请将它复制并粘帖到浏览器的地址输入框回车即可)
	注意:请您在收到邮件30天内进行激活，否则该激活码将会失效。';  // Email content 
		         
		        $this->email->subject($diy_subject); 
		        $this->email->message($diy_msg); 
		        if($this->email->send())
		        {
			        for($i=0;$i<strlen($email);$i++)
					{
						if($email[$i] == '@')
						{
							break;
						}
					}
					$a='';
			        for($j=$i+1;$j<strlen($email)-4;$j++)
					{
						$a = $a . $email[$j];	
					}	
		        	redirect('customer/Customer_index/actived/index.php?' . 'i=' . $i . '&' . 'a=' . $a);
		        }   //Send out the email. 
		        else
		        {
		        	show_error($this->email->print_debugger());
		        }
			} else {
				$this->signup();//这里也可以设置错误提示
			}
		}
	}
	/**
	* @brief	激活账号
	*
	*/
	function active_success($id)
	{
		$id = $id + 0;
		if($this->customer_login_model->is_actived($id))
		{
			$data['main_content'] = 'active_success';
			$data['name'] = $name = $this->input->post('name');
			$this->load->view('customer/include/template',$data);
		}
		else 
		{
			$data['error'] = '激活失败了，请重新注册！';//此处应该是注册失败。
			$data['main_content'] = 'signup_view';
			$this->load->view('customer/include/template',$data);
		}
	}
	/**
	* @brief	个人信息管理页面
	*
	*/
	function change_info()
	{
		$this->is_logged_in();
		$data['main_content'] = 'change_info';
		$this->load->view('customer/include/template',$data);
	}
	/**
	* @brief	个人信息管理
	*
	*/
	function change_info0($name)
	{
	    $this->form_validation->set_rules('name', '用户名', 'trim|min_length[2]');
        $this->form_validation->set_rules('phone', '手机号', 'trim|regex_match[/^(1[3458])\d{9}$/]');
        $this->form_validation->set_rules('email', '邮箱', 'trim|valid_email');
        $this->form_validation->set_rules('address', '地址', 'trim|max_length[128]');
		$name = $this->session->userdata('name');
		//设置验证规则
		if (!$this->form_validation->run()) {
			$data['title'] = '更新';
			$data['error'] = '更改信息失败，请检查你的信息！';//此处应该是更新失败。
			$data['main_content'] = 'change_info';
		    $this->load->view('customer/include/template',$data);
		} else {
		
			if ($this->customer_login_model->update_info($name)) {
				redirect('customer/Customer_index');
			} else {
			echo($name);
				$this->change_info();//这里也可以设置错误提示
			}
		}
	}
	
	
}