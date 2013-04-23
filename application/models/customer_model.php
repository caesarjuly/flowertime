<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Admin_model.php
#         Desc: 管理员管理用户数据模型，包括对用户表的一些操作
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-11-20 
#      History: none
=============================================================================*/
class Customer_model extends CI_Model {
	/**
	* @brief	获得已激活的会员
	*
	* @return	激活会员数组
	*/
	function get_active()
	{
		$query = $this->db->get('customer');
			$contents = array();
			foreach($query->result() as $row)
			{
				if($row->is_actived == 1)
				{
					$contents [] = array(
					'customer_id' => $row->customer_id,
					'name' => $row->name,
					'phone' => $row->phone,
					'email' => $row->email,
					'address' => $row->address
					);
				}
			}
			return $contents;
	}
/**
	* @brief	获得已激活的会员
	*
	* @return	激活会员数组
	*/
	function get_active1($limit, $offset)
	{
		$this->db->where('is_actived',1);
		if(!$limit)
		{
			$query = $this->db->get('customer');
				$contents = array();
				foreach($query->result() as $row)
				{
					if($row->is_actived == 1)
					{
						$contents [] = array(
						'customer_id' => $row->customer_id,
						'name' => $row->name,
						'phone' => $row->phone,
						'email' => $row->email,
						'address' => $row->address
						);
					}
				}
		}
		else 
		{
			$this->db->limit($limit, $offset);
			$query = $this->db->get('customer');
					$contents = array();
					foreach($query->result() as $row)
					{
						if($row->is_actived == 1)
						{
							$contents [] = array(
							'customer_id' => $row->customer_id,
							'name' => $row->name,
							'phone' => $row->phone,
							'email' => $row->email,
							'address' => $row->address
							);
						}
					}
		}
			return $contents;
	}
	/**
	* @brief	获得未激活的会员
	*
	* @return	未激活会员数组
	*/
	function get_unactive()
	{
		$query = $this->db->get('customer');
		$contents = array();
		foreach ($query->result() as $row)
		{
			if($row->is_actived ==0)
			{
				$contents [] = array(
				'customer_id' => $row->customer_id,
				'name' => $row->name,
				'phone' => $row->phone,
				'email' => $row->email,
				'address' => $row->address
				);
			}
		}
		return $contents;
	}
	
/**
	* @brief	获得未激活的会员
	*
	* @return	未激活会员数组
	*/
	function get_unactive1($limit, $offset)
	{
		$this->db->where('is_actived',0);
		if(!$limit)
		{
			$query = $this->db->get('customer');
			$contents = array();
			foreach ($query->result() as $row)
			{
				if($row->is_actived ==0)
				{
					$contents [] = array(
					'customer_id' => $row->customer_id,
					'name' => $row->name,
					'phone' => $row->phone,
					'email' => $row->email,
					'address' => $row->address
					);
				}
			}
		}
		else 
		{
			$this->db->limit($limit, $offset);
			$query = $this->db->get('customer');
			$contents = array();
			foreach ($query->result() as $row)
			{
				if($row->is_actived ==0)
				{
					$contents [] = array(
					'customer_id' => $row->customer_id,
					'name' => $row->name,
					'phone' => $row->phone,
					'email' => $row->email,
					'address' => $row->address
					);
				}
			}
		}
		return $contents;
	}
	
	/**
	* @brief	模糊查询所有会员
	*
	* @return	满足结果的会员数组
	*/
	function search($name)
	{
		$sql = "name like '%$name%'";
		$this->db->where($sql);
		$query = $this->db->get('customer');
		$contents = array();
		if($name != "")
		{
			foreach($query->result() as $row)
			{
					$contents [] = array(
					'customer_id' => $row->customer_id,
					'name' => $row->name,
					'phone' => $row->phone,
					'email' => $row->email,
					'address' => $row->address,
					'is_actived' => $row->is_actived,
					);
			}
		}
		return $contents;
	}
	/**
	* @brief	管理员添加会员
	*
	* @return	boolean标识
	*/
	function add()
	{
		
		$data = array(
		'name' => $this->input->post('name'),
		'password' => sha1($this->input->post('password')),
		'phone' => $this->input->post('phone'),
		'email' => $this->input->post('email'),
		'address' => $this->input->post('address'),
		'is_actived' => "1"
		);
		return $this->db->insert('customer',$data);
	}
	/**
	* @brief	管理员编辑会员
	*
	* @return	会员记录
	*/
	function edit($customer_id)
	{
		$this->db->where('customer_id',$customer_id);
		$query = $this->db->get('customer');
		return $query;
	}
	/**
	* @brief	管理员激活会员
	*
	* @return	激活成功标志
	*/
	function active($customer_id)
	{
		$data = array(
		'is_actived' => 1);
		$this->db->where('customer_id',$customer_id);
		return $this->db->update('customer' , $data);
	}
	/**
	* @brief	管理员删除已激活会员
	*
	* @return	删除成功标志
	*/
	function delete_actived($customer_id)
	{
		$this->db->where('customer_id',$customer_id);
		return $this->db->delete('customer');
	}
	/**
	* @brief	管理员删除未激活会员
	*
	* @return	删除成功标志
	*/
	function delete_unactived($customer_id)
	{
		$this->db->where('customer_id',$customer_id);
		return $this->db->delete('customer');
	}
	/**
	* @brief	管理员更新会员
	*
	* @return	boolean标识
	*/
	function update_customer($customer_id)
	{
		$data=array(
		'phone' => $this->input->post('phone'),
		'email' => $this->input->post('email'),
		'address' => $this->input->post('address'),
		);
		$this->db->where('customer_id',$customer_id);
		$query = $this->db->get('customer');
		$this->db->where('customer_id',$customer_id);
	    $this->db->update('customer',$data);
	    
	    return $query->row()->is_actived;
	}
	/**
	* @brief	拥有的会员数，用于管理员首页显示
	*
	* @return	会员数量	
	*/
	function count()
	{
		$this->db->where('is_actived' , 1);
		$this->db->from('customer');
		$query = $this->db->count_all_results();
		return $query;
	}
	/**
	* @brief	未激活会员
	*
	* @return	会员数量	
	*/
	function count_unactived()
	{
		$this->db->where('is_actived' , 0);
		$this->db->from('customer');
		$query = $this->db->count_all_results();
		return $query;
	}
}
