<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Admin_model.php
#         Desc: 管理员数据模型，包括对管理员表的一些操作，登录的检查，获取密码，更新密码
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-11-20 
#      History: none
=============================================================================*/
class Customer_login_model extends CI_Model {

	/**
	* @brief	检查用户是否存在，同时也检查了用户和密码是否匹配
	*
	* @return	boolean标识	
	*/
	function check_in()
	{
		$this->db->where('name', $this->input->post('name'));
		$this->db->where('password', sha1($this->input->post('password')));
		$q = $this->db->get('customer');

		if($q->num_rows()>0)
		{
			return TRUE;

		}
		else
		{
			return FALSE;

		}
	}
	
	/**
	* @brief	根据用户name取得id
	*
	* @return	id	
	*/
	function get_id($name)
	{
		$this->db->where('name', $name);
		$q = $this->db->get('customer');
		return $q->row()->customer_id;
	}
	
	/**
	* @brief	检查用户是否激活
	*
	* @return	boolean标识	
	*/
	function check_active()
	{
		$this->db->where('name', $this->input->post('name'));
		$this->db->where('password', sha1($this->input->post('password')));
		$q = $this->db->get('customer');
		
		return $q->row()->is_actived;
	}

	/**
	* @brief	获取用户密码
	*
	* @return	密码
	*/
	function get()
	{
		$query = $this->db->get('customer');
		$passwd = $query->row()->password;
		if(sha1($this->input->post('old_password'))==$passwd)
		{
			return TRUE;
		}
		else 
		{
			return FALSE;
		}
		
	}

	/**
	* @brief	更新密码
	*
	* @return	boolean标识	
	*/
	function update()
	{
		$data=array('password' =>sha1($this->input->post('new_password')));
		return	$this->db->update('customer', $data);
	}
	/**
	* @brief	添加用户
	*
	* @return	boolean标识	
	*/
    function add() {
		
		$data['name'] = $this->input->post('name');
		$data['password'] = sha1($this->input->post('password'));
		$data['phone'] = $this->input->post('phone');
		$data['email'] = $this->input->post('email');
		$data['address'] = $this->input->post('address');
		
		return $this->db->insert('customer', $data);
	}
	/**
	* @brief	激活账号
	*
	* @return	boolean标识	
	*/
	function is_actived($id)
	{
		$this->db->where('customer_id' , $id);
		$data=array('is_actived' => 1);
		return	$this->db->update('customer', $data);
	}
	/**
	* @brief	获得用户id
	*
	* @return	用户id	
	*/
	function catch_id($name)
	{
		$this->db->where('name' , $name);
		$query = $this->db->get('customer');
		$id = $query->row()->customer_id;
		return $id;
	}
	/**
	* @brief	更新用户信息
	*
	* @return	boolean标识	
	*/
	function update_info($name) {
		$this->db->where('name' , $name);
		$data['phone'] = $this->input->post('phone');
		$data['email'] = $this->input->post('email');
		$data['address'] = $this->input->post('address');
		
		return $this->db->update('customer', $data);
	}
}
