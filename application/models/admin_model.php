<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Admin_model.php
#         Desc: 管理员数据模型，包括对管理员表的一些操作，登录的检查，获取密码，更新密码
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-11-20 
#      History: none
=============================================================================*/
class Admin_model extends CI_Model {

	/**
	* @brief	检查用户是否存在，同时也检查了用户和密码是否匹配
	*
	* @return	boolean标识	
	*/
	function check_in()
	{
		$this->db->where('name', $this->input->post('name'));
		$this->db->where('password', sha1($this->input->post('password')));
		$q = $this->db->get('admin');
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
	* @brief	获取用户密码
	*
	* @return	密码
	*/
	function get()
	{
		$query = $this->db->get('admin');
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
		return	$this->db->update('admin', $data);
	}
}
