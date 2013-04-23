<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Activity_model.php
#         Desc: 通知基本信息模型
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-12-18
#      History: none
=============================================================================*/
class Notice_model extends CI_Model {
	/**
	* @brief	根据用户名获得通知
	*
	*/
	function get()
	{
		$id = $this->session->userdata('id');
		$this->db->where('customer_id' , $id);
		$query = $this->db->get('notice');
			$contents = array();
			foreach($query->result() as $row)
			{
					$contents [] = array(
					'notice_id' => $row->notice_id,
					'title' => $row->title,
					'message' => $row->message,
					'date' => $row->date,
					'customer_id' => $id
					);
			}
			return $contents;
	}
	/**
	* @brief	添加订单确认支付消息
	*
	*/
	function add_order_check($order_id)
		{
			$this->db->where('order_id' , $order_id);
			$query = $this->db->get('order');
						$contents = array(
						'title' => '订单确认支付',
						'message' => '您订购的"' . $query->row()->series_name . '"已确认付款！',
						'date' => time(),
						'customer_id' => $query->row()->customer_id
						);
			$this->db->insert('notice' , $contents);
		}
	/**
	* @brief	添加订单关闭消息
	*
	*/
	function add_order_closed($order_id)
		{
			$this->db->where('order_id' , $order_id);
			$query = $this->db->get('order');
						$contents = array(
						'title' => '订单已关闭',
						'message' => '您订购的"' . $query->row()->series_name . '"的订单已关闭！',
						'date' => time(),
						'customer_id' => $query->row()->customer_id
						);
			$this->db->insert('notice' , $contents);
		}
	/**
	* @brief	添加用户留言消息
	*
	*/
	function add_message_customer($message_id)
		{
			$this->db->where('message_id' , $message_id);
			$query = $this->db->get('message');
						$contents = array(
						'title' => '留言通过审核',
						'message' => '您的留言"' . $query->row()->content . '"通过审核，管理员进行了回复！',
						'date' => time(),
						'customer_id' => $query->row()->customer_id
						);
			$this->db->insert('notice' , $contents);
		}
	/**
	* @brief	添加用户活动留言消息
	*
	*/
	function add_message_activity($message_id)
		{
			$this->db->where('message_id' , $message_id);
			$query = $this->db->get('message_activity');
						$contents = array(
						'title' => '留言通过审核',
						'message' => '您的活动留言"' . $query->row()->content . '"通过审核，管理员进行了回复！',
						'date' => time(),
						'customer_id' => $query->row()->customer_id
						);
			$this->db->insert('notice' , $contents);
		}
	/**
	* @brief	添加用户课程留言消息
	*
	*/
	function add_message_course($message_id)
		{
			$this->db->where('message_id' , $message_id);
			$query = $this->db->get('message_course');
						$contents = array(
						'title' => '留言通过审核',
						'message' => '您的课堂留言"' . $query->row()->content . '"通过审核，管理员进行了回复！',
						'date' => time(),
						'customer_id' => $query->row()->customer_id
						);
			$this->db->insert('notice' , $contents);
		}
	/**
	* @brief	添加用户留言删除消息
	*
	*/
	function add_message_delete($q)
		{
						$contents = array(
						'title' => '留言未通过审核',
						'message' => '您的留言"' . $q . '"未通过审核，已被管理员删除！',
						'date' => time(),
						'customer_id' => $this->session->userdata('id')
						);
			$this->db->insert('notice' , $contents);
		}
	/**
	* @brief	添加用户活动留言删除消息
	*
	*/
	function add_activity_message_delete($q)
		{
			$contents = array(
						'title' => '留言未通过审核',
						'message' => '您的活动留言"' . $q . '"未通过审核，已被管理员删除！',
						'date' => time(),
						'customer_id' => $this->session->userdata('id')
						);
			$this->db->insert('notice' , $contents);
		}
	/**
	* @brief	添加用户课程留言删除消息
	*
	*/		
	function add_course_message_delete($q)
		{
			$contents = array(
						'title' => '留言未通过审核',
						'message' => '您的课堂留言"' . $q . '"未通过审核，已被管理员删除！',
						'date' => time(),
						'customer_id' => $this->session->userdata('id')
						);
			$this->db->insert('notice' , $contents);
		}
	/**
	* @brief	删除消息
	*
	*/		
	function delete($notice_id)
	{
		$this->db->where('notice_id' , $notice_id);
		return $this->db->delete('notice');
	}
}