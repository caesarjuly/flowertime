<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Order_model.php
#         Desc: 管理员订单模型，包括对订单表的一些操作
#       Author: 马健
#      Version: 1.1
#   LastChange: 2011-12-18 
#      History: 在原有基础上添加用户获得所有订单
=============================================================================*/
class Order_model extends CI_Model {

	/**
	* @brief	获得已付款但未确认的订单
	*
	* @return	已付款但未确认订单数组	
	*/
	function get_pay1($limit, $offset)
	{
		$this->db->where('charge',1);
		$this->db->where('check',0);
		if(!$limit)
		{
			$query = $this->db->get('order');
				$contents = array();
				foreach($query->result() as $row)
				{
					if(($row->charge == 1) && ($row->check == 0))
					{
						$contents [] = array(
						'order_id' => $row->order_id,
						'customer_name' => $row->customer_name,
						'kid_name' => $row->kid_name,
						'birthday' => $row->birthday,
						'email' => $row->email,
						'telephone1' => $row->telephone1,
						'telephone2' => $row->telephone2,
						'series_name' => $row->series_name,
						'charge' => $row->charge,
						'check' => $row->check,
						'is_closed' => $row->is_closed
						);
					}
				}
		}
		else 
		{
			$this->db->limit($limit, $offset);
			$query = $this->db->get('order');
			$contents = array();
			foreach($query->result() as $row)
			{
				if(($row->charge == 1) && ($row->check == 0))
				{
					$contents [] = array(
					'order_id' => $row->order_id,
					'customer_name' => $row->customer_name,
					'kid_name' => $row->kid_name,
					'birthday' => $row->birthday,
					'email' => $row->email,
					'telephone1' => $row->telephone1,
					'telephone2' => $row->telephone2,
					'series_name' => $row->series_name,
					'charge' => $row->charge,
					'check' => $row->check,
					'is_closed' => $row->is_closed
					);
				}
			}
		}
		return $contents;
	}
/**
	* @brief	获得已付款但未确认的订单
	*
	* @return	已付款但未确认订单数组	
	*/
	function get_pay()
	{
		$query = $this->db->get('order');
			$contents = array();
			foreach($query->result() as $row)
			{
				if(($row->charge == 1) && ($row->check == 0))
				{
					$contents [] = array(
					'order_id' => $row->order_id,
					'customer_name' => $row->customer_name,
					'kid_name' => $row->kid_name,
					'birthday' => $row->birthday,
					'email' => $row->email,
					'telephone1' => $row->telephone1,
					'telephone2' => $row->telephone2,
					'series_name' => $row->series_name,
					'charge' => $row->charge,
					'check' => $row->check,
					'is_closed' => $row->is_closed
					);
				}
			}
			return $contents;
	}
	/**
	* @brief	获得未付款的订单
	*
	* @return	未付款订单数组	
	*/
	function get_unpay1($limit, $offset)
	{
		$this->db->where('charge',0);
		if(!$limit)
		{
			$query = $this->db->get('order');
			$contents = array();
			foreach($query->result() as $row)
			{
				if($row->charge == 0)
				{
					$contents [] = array(
					'order_id' => $row->order_id,
					'customer_name' => $row->customer_name,
					'kid_name' => $row->kid_name,
					'birthday' => $row->birthday,
					'email' => $row->email,
					'telephone1' => $row->telephone1,
					'telephone2' => $row->telephone2,
					'series_name' => $row->series_name,
					'charge' => $row->charge,
					'check' =>$row->check,
					'is_closed' => $row->is_closed
					);
				}
			}
		}
		else 
		{
			$this->db->limit($limit, $offset);
			$query = $this->db->get('order');
				$contents = array();
				foreach($query->result() as $row)
				{
					if($row->charge == 0)
					{
						$contents [] = array(
						'order_id' => $row->order_id,
						'customer_name' => $row->customer_name,
						'kid_name' => $row->kid_name,
						'birthday' => $row->birthday,
						'email' => $row->email,
						'telephone1' => $row->telephone1,
						'telephone2' => $row->telephone2,
						'series_name' => $row->series_name,
						'charge' => $row->charge,
						'check' =>$row->check,
						'is_closed' => $row->is_closed
						);
					}
				}
		}
		return $contents;
	}
	
	/**
	* @brief	获得未付款的订单
	*
	* @return	未付款订单数组	
	*/
	function get_unpay()
	{
		$query = $this->db->get('order');
		$contents = array();
		foreach($query->result() as $row)
		{
			if($row->charge == 0)
			{
				$contents [] = array(
				'order_id' => $row->order_id,
				'customer_name' => $row->customer_name,
				'kid_name' => $row->kid_name,
				'birthday' => $row->birthday,
				'email' => $row->email,
				'telephone1' => $row->telephone1,
				'telephone2' => $row->telephone2,
				'series_name' => $row->series_name,
				'charge' => $row->charge,
				'check' =>$row->check,
				'is_closed' => $row->is_closed
				);
			}
		}
		return $contents;
	}
	/**
	* @brief	获得已确认付款但未关闭的订单
	*
	* @return	已确认付款但未关闭订单数组	
	*/
	function get_checked_order()
	{
		$query = $this->db->get('order');
		$contents = array();
		foreach($query->result() as $row)
		{
			if(($row->charge == 1) && ($row->check == 1) && ($row->is_closed == 0))
			{
				$contents [] = array(
				'order_id' => $row->order_id,
				'customer_name' => $row->customer_name,
				'kid_name' => $row->kid_name,
				'birthday' => $row->birthday,
				'email' => $row->email,
				'telephone1' => $row->telephone1,
				'telephone2' => $row->telephone2,
				'series_name' => $row->series_name,
				'charge' => $row->charge,
				'check' => $row->check,
				'is_closed' => $row->is_closed
				);
			}
		}
		return $contents;
	}
	/**
	* @brief	获得已确认付款但未关闭的订单
	*
	* @return	已确认付款但未关闭订单数组	
	*/
	function get_checked_order1($limit, $offset)
	{
		$this->db->where('charge',1);
		$this->db->where('check',1);
		$this->db->where('is_closed',0);
		if(!$limit)
		{
			$query = $this->db->get('order');
			$contents = array();
			foreach($query->result() as $row)
			{
				if(($row->charge == 1) && ($row->check == 1) && ($row->is_closed == 0))
				{
					$contents [] = array(
					'order_id' => $row->order_id,
					'customer_name' => $row->customer_name,
					'kid_name' => $row->kid_name,
					'birthday' => $row->birthday,
					'email' => $row->email,
					'telephone1' => $row->telephone1,
					'telephone2' => $row->telephone2,
					'series_name' => $row->series_name,
					'charge' => $row->charge,
					'check' => $row->check,
					'is_closed' => $row->is_closed
					);
				}
			}
		}
		else
		{
			$this->db->limit($limit, $offset);
			$query = $this->db->get('order');
				$contents = array();
				foreach($query->result() as $row)
				{
					if(($row->charge == 1) && ($row->check == 1) && ($row->is_closed == 0))
					{
						$contents [] = array(
						'order_id' => $row->order_id,
						'customer_name' => $row->customer_name,
						'kid_name' => $row->kid_name,
						'birthday' => $row->birthday,
						'email' => $row->email,
						'telephone1' => $row->telephone1,
						'telephone2' => $row->telephone2,
						'series_name' => $row->series_name,
						'charge' => $row->charge,
						'check' => $row->check,
						'is_closed' => $row->is_closed
						);
					}
				}
		}
		return $contents;
	}
	/**
	* @brief	模糊查询站内相应订单
	*
	* @return	相应订单数组	
	*/
	function search($name)
	{
		$sql = "customer_name like '%$name%'";
		$this->db->where($sql);
		$query = $this->db->get('order');
		$contents = array();
		if($name != "")
		{
			foreach($query->result() as $row)
			{
					$contents [] = array(
					'order_id' => $row->order_id,
					'customer_name' => $row->customer_name,
					'kid_name' => $row->kid_name,
					'birthday' => $row->birthday,
					'email' => $row->email,
					'telephone1' => $row->telephone1,
					'telephone2' => $row->telephone2,
					'series_name' => $row->series_name,
					'charge' => $row->charge,
					'check' => $row->check,
					'is_closed' => $row->is_closed
					);
			}
		}
		return $contents;
	}
	/**
	* @brief	获得关闭订单列表
	*
	* @return	关闭的订单数组	
	*/
	function get_closed()
	{
		$query = $this->db->get('order');
		$contents = array();
		foreach($query->result() as $row)
		{
			if(($row->charge == 1) && ($row->check == 1) &&($row->is_closed == 1))
			{
				$contents [] = array(
				'order_id' => $row->order_id,
				'customer_name' => $row->customer_name,
				'kid_name' => $row->kid_name,
				'birthday' => $row->birthday,
				'email' => $row->email,
				'telephone1' => $row->telephone1,
				'telephone2' => $row->telephone2,
				'series_name' => $row->series_name,
				'charge' => $row->charge,
				'check' => $row->check,
				'is_closed' => $row->is_closed
				);
			}
		}
		return $contents;
	}
/**
	* @brief	获得关闭订单列表
	*
	* @return	关闭的订单数组	
	*/
	function get_closed1($limit, $offset)
	{
		$this->db->where('charge',1);
		$this->db->where('check',1);
		$this->db->where('is_closed',1);
		if(!$limit)
		{
			$query = $this->db->get('order');
			$contents = array();
			foreach($query->result() as $row)
			{
				if(($row->charge == 1) && ($row->check == 1) &&($row->is_closed == 1))
				{
					$contents [] = array(
					'order_id' => $row->order_id,
					'customer_name' => $row->customer_name,
					'kid_name' => $row->kid_name,
					'birthday' => $row->birthday,
					'email' => $row->email,
					'telephone1' => $row->telephone1,
					'telephone2' => $row->telephone2,
					'series_name' => $row->series_name,
					'charge' => $row->charge,
					'check' => $row->check,
					'is_closed' => $row->is_closed
					);
				}
			}
		}
		else 
		{
			$this->db->limit($limit, $offset);
			$query = $this->db->get('order');
			$contents = array();
			foreach($query->result() as $row)
			{
				if(($row->charge == 1) && ($row->check == 1) &&($row->is_closed == 1))
				{
					$contents [] = array(
					'order_id' => $row->order_id,
					'customer_name' => $row->customer_name,
					'kid_name' => $row->kid_name,
					'birthday' => $row->birthday,
					'email' => $row->email,
					'telephone1' => $row->telephone1,
					'telephone2' => $row->telephone2,
					'series_name' => $row->series_name,
					'charge' => $row->charge,
					'check' => $row->check,
					'is_closed' => $row->is_closed
					);
				}
			}
		}
		return $contents;
	}
	/**
	* @brief	确认订单
	*
	* @return	确认订单	
	*/
	function check($order_id)
	{
		$data = array(
		'check' => 1
		);
		$this->db->where('order_id',$order_id);
		return $this->db->update('order',$data);
	}
	/**
	* @brief	未处理订单数，用于管理员首页显示
	*
	* @return	订单数量	
	*/
	function count()
	{
		$this->db->where('check' , 0);
		$this->db->from('order');
		$query = $this->db->count_all_results();
		return $query;
	}
	/**
	* @brief	未确认已付款订单
	*
	* @return	订单数量	
	*/
	function count_pay()
	{
		$this->db->where('check' , 0);
		$this->db->where('charge' , 1);
		$this->db->from('order');
		$query = $this->db->count_all_results();
		return $query;
	}
	/**
	* @brief	未确认已付款订单
	*
	* @return	订单数量	
	*/
	function count_check()
	{
		$this->db->where('check' , 1);
		$this->db->where('charge' , 1);
		$this->db->where('is_closed' , 0);
		$this->db->from('order');
		$query = $this->db->count_all_results();
		return $query;
	}
	/**
	* @brief	未付款订单
	*
	* @return	订单数量	
	*/
	function count_unpay()
	{
		$this->db->where('charge' , 0);
		$this->db->from('order');
		$query = $this->db->count_all_results();
		return $query;
	}
	/**
	* @brief	已完成订单数，用于管理员首页显示
	*
	* @return	订单数量	
	*/
	function count_closed_order()
	{
		$this->db->where('is_closed' , 1);
		$this->db->from('order');
		$query = $this->db->count_all_results();
		return $query;
	}
	/**
	* @brief	关闭订单
	*
	* @return	关闭订单是否成功标志
	*/
	function close($order_id)
	{
		$data = array(
		'is_closed' => 1
		);
		$this->db->where('order_id',$order_id);
		return $this->db->update('order',$data);
	}
	/**
	* @brief	获得订单详情
	*
	* @return	详情
	*/
	function get_detail($order_id)
	{
		$this->db->where('order_id',$order_id);
		$query = $this->db->get('order');
		$contents = array(
		    'order_id' =>$order_id,
			'customer_name' => $query->row()->customer_name,
			'kid_name' => $query->row()->kid_name,
			'birthday' => $query->row()->birthday,
			'email' => $query->row()->email,
			'telephone1' => $query->row()->telephone1,
			'telephone2' => $query->row()->telephone2,
			'series_name' => $query->row()->series_name,
			'charge' => $query->row()->charge,
			'check' => $query->row()->check,
			'is_closed' => $query->row()->is_closed,
			'date' => $query->row()->date,
			'price' => $query->row()->price
		);
		return $contents;
	}
	/**
	* @brief	用户获得所有订单
	*
	* @return	订单数组	
	*/
	function customer_get_order($id)
	{
		$this->db->where('customer_id' , $id);
		$query = $this->db->get('order');
			$contents = array();
			foreach($query->result() as $row)
			{
					$contents [] = array(
					'order_id' => $row->order_id,
					'customer_name' => $row->customer_name,
					'kid_name' => $row->kid_name,
					'birthday' => $row->birthday,
					'email' => $row->email,
					'telephone1' => $row->telephone1,
					'telephone2' => $row->telephone2,
					'series_name' => $row->series_name,
					'charge' => $row->charge,
					'check' => $row->check,
					'is_closed' => $row->is_closed,
					'date' => $row->date
					);
			}
			return $contents;
	}
	/**
	* @brief	删除订单
	*
	* @return	删除订单成功标志
	*/
	function delete($order_id)
	{
		$this->db->where('order_id',$order_id);
		return $this->db->delete('order');
	}
	
	/**
	* @brief	创建订单
	*
	* @return	创建订单成功标志
	*/
	function add()
	{
		$data['customer_name'] = $this->input->post('customer_name');
		$data['kid_name'] = $this->input->post('kid_name');
		$data['birthday'] = $this->input->post('birthday');
		$data['email'] = $this->input->post('email');
		$data['telephone1'] = $this->input->post('telephone1');
		$data['telephone2'] = $this->input->post('telephone2');
		$data['series_name'] = $this->input->post('series_name');
		$data['price'] = $this->input->post('price');
		$data['date'] = time();
		$data['series_id'] = $this->input->post('series_id');
		$data['customer_id'] = $this->session->userdata('id');
		return $this->db->insert('order',$data);
	}
}
