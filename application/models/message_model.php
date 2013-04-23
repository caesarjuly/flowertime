<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Admin_model.php
#         Desc: 留言模型，包括对留言表的一些操作
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-11-20 
#      History: none
=============================================================================*/
class Message_model extends CI_Model {
	/**
	* @brief	用户添加留言
	*
	* @return	添加留言成功标志
	*/
	function add()
	{
		$this->db->where('name' , $this->session->userdata('name'));
		$query = $this->db->get('customer');
		$customer_id = $query->row()->customer_id;
		$data = array(
		'content' => $this->input->post('customer_message'),
		'date' => time(),
		'customer_id' => $customer_id,
		);
		return $this->db->insert('message',$data);
	}
	/**
	* @brief	用户添加留言
	*
	* @return	添加留言成功标志
	*/
	function add_message()
	{
		$data = array(
		'add_message_content' => $this->input->post('add_message'),
		'date' => time(),
		'add_customer_name' =>$this->input->post('title'),
		'add_customer_message' =>$this->input->post('add_customer_message'),
		);
		return $this->db->insert('add_message',$data);
	}
	/**
	* @brief	获得未回复的留言数组
	*
	* @return	留言数组	
	*/
	function get_unreply()
	{
		$query = $this->db->get('message');
			$contents = array();
			foreach($query->result() as $row)
			{
				if($row->reply == NULL)
				{
					$this->db->where('customer_id' , $row->customer_id);
					$query = $this->db->get('customer');
					$customer_name = $query->row()->name;
					$contents [] = array(
					'content' => $row->content,
					'date' => $row->date,
					'name' => $customer_name,
					'message_id' =>$row->message_id
					);
				}
			}
			return $contents;
	}
	/**
	* @brief	获得未回复的留言数组
	*
	* @return	留言数组	
	*/
	function get_unreply1($limit, $offset)
	{
		//$this->db->where('reply',NULL);
		//$this->db->where('verify',0);
		$this->db->order_by("date", "desc");
		if(!$limit)
		{
			$query = $this->db->get('add_message');
				$contents = array();
				foreach($query->result() as $row)
				{
					
						$contents [] = array(
						'content' => $row->add_message_content,
						'date' => $row->date,
						'message_id' =>$row->add_message_id,
						'add_customer_name' => $row->add_customer_name,
						'add_customer_message' => $row->add_customer_message
						);
				}
		}
		else 
		{
			$this->db->limit($limit, $offset);
			$query = $this->db->get('add_message');
					$contents = array();
					foreach($query->result() as $row)
					{
							$contents [] = array(
							'content' => $row->add_message_content,
							'date' => $row->date,
							'message_id' =>$row->add_message_id,
							'add_customer_name' => $row->add_customer_name,
							'add_customer_message' => $row->add_customer_message
							);
					}
		}
			return $contents;
	}
	/**
	* @brief	获得未回复的留言并且准备进行回复的留言
	*
	* @return	留言数组	
	*/
	function get_unreply_message($message_id)
	{
		$this->db->where('add_message_id',$message_id);
		$query = $this->db->get('add_message');
		
		$contents = array(
					'content' => $query->row()->add_message_content,
					'date' => $query->row()->date,
					'message_id' =>$message_id,
					'add_customer_name' =>  $query->row()->add_customer_name,
					'add_customer_message' => $query->row()->add_customer_message
					);
		return $contents;
	}
	/**
	* @brief	获得未回复的留言并且准备进行回复的留言
	*
	* @return	留言数组	
	*/
	function get_message_delete($message_id)
	{
		$this->db->where('message_id',$message_id);
		$query = $this->db->get('message');
		$contents  = $query->row()->content;
		return $contents;
	}
	/**
	* @brief	获得未回复的留言并且准备进行回复的留言
	*
	* @return	留言数组	
	*/
	function get_activity_message_delete($message_id)
	{
		$this->db->where('message_id',$message_id);
		$query = $this->db->get('message_activity');
		$contents  = $query->row()->content;
		return $contents;
	}
	/**
	* @brief	获得未回复的留言并且准备进行回复的留言
	*
	* @return	留言数组	
	*/
	function get_course_message_delete($message_id)
	{
		$this->db->where('message_id',$message_id);
		$query = $this->db->get('message_course');
		$contents  = $query->row()->content;
		return $contents;
	}
	
	/**
	* @brief	未处理留言数，用于管理员首页显示
	*
	* @return	留言数量	
	*/
	function count()
	{
		//$this->db->where('reply' , NULL);
		//$this->db->where('verify' , 0);
		$this->db->from('add_message');
		$query = $this->db->count_all_results();
		return $query;
	}
	/**
	* @brief	未处理留言数，用于管理员首页显示
	*
	* @return	留言数量	
	*/
	function count_reply()
	{
		$this->db->where('verify' , 1);
		$this->db->from('message');
		$query = $this->db->count_all_results();
		return $query;
	}
	/**
	* @brief	回复留言
	*
	* @return	回复留言成功标志
	*/
	function update_message($message_id)
	{
		$this->db->where('add_message_id',$message_id);
		$data = array(
		'add_customer_name' => $this->input->post('name'),
		'add_customer_message' => $this->input->post('add_customer_message'),
		'add_message_content' => $this->input->post('add_message_content')
		);
		return $this->db->update('add_message',$data);
	}
	/**
	* @brief	回复留言
	*
	* @return	回复留言成功标志
	*/
	function reply($message_id)
	{
		$this->db->where('message_id',$message_id);
		$data = array(
		'reply' => $this->input->post('reply'),
		'reply_date' => time(),
		'verify' => 1
		);
		return $this->db->update('message',$data);
	}
	/**
	* @brief	删除留言
	*
	* @return	删除留言成功标志
	*/
	function delete($message_id)
	{
		$this->db->where('add_message_id',$message_id);
		return $this->db->delete('add_message');
	}
	/**
	* @brief	删除留言
	*
	* @return	删除留言成功标志
	*/
	function delete_activity($message_id)
	{
		$this->db->where('message_id',$message_id);
		return $this->db->delete('message_activity');
	}
	/**
	* @brief	删除留言
	*
	* @return	删除留言成功标志
	*/
	function delete_course($message_id)
	{
		$this->db->where('message_id',$message_id);
		return $this->db->delete('message_course');
	}
	/**
	* @brief	获得add_message表的用户留言
	*
	* @return	用户留言
	*/
	function get_message()
	{
		$this->db->order_by("date", "desc");
		$query = $this->db->get('add_message');
		$contents = array();
				foreach($query->result() as $row)
				{
					
						$contents [] = array(
						'content' => $row->add_message_content,
						'date' => $row->date,
						'message_id' =>$row->add_message_id,
						'add_customer_name' => $row->add_customer_name,
						'add_customer_message' => $row->add_customer_message
						);
				}
	
		return $contents;
	}
	
	/**
	* @brief	根据留言id获得message表的用户留言
	*
	* @return	用户留言
	*/
	function get_customer_message($message_id)
	{
		$this->db->where('message_id',$message_id);
		$query = $this->db->get('message');
					$contents = array(
					'content' => $query->row()->content,
					'date' => $query->row()->date,
					'reply' => $query->row()->reply,
					'reply_date' => $query->row()->reply_date,
					'message_id' =>$query->row()->message_id,
					'verify' => $query->row()->verify
					);
			return $contents;
	}
	
	/**
	* @brief	根据留言id获得message_activity表的用户留言
	*
	* @return	用户留言
	*/
	function get_customer_activity_message($message_id)
	{
		$this->db->where('message_id',$message_id);
		$query = $this->db->get('message_activity');
					$contents = array(
					'content' => $query->row()->content,
					'date' => $query->row()->date,
					'reply' => $query->row()->reply,
					'reply_date' => $query->row()->reply_date,
					'message_id' =>$query->row()->message_id,
					'verify' => $query->row()->verify
					);
			return $contents;
	}
	/**
	* @brief	根据用户id获得message_course表的用户留言
	*
	* @return	用户留言
	*/
	function get_customer_course_message($message_id)
	{
		$this->db->where('message_id',$message_id);
		$query = $this->db->get('message_course');
					$contents = array(
					'content' => $query->row()->content,
					'date' => $query->row()->date,
					'reply' => $query->row()->reply,
					'reply_date' => $query->row()->reply_date,
					'message_id' =>$query->row()->message_id,
					'verify' => $query->row()->verify
					);
			return $contents;
	}
	/**
	* @brief	根据id获得activity_message表的用户留言
	*
	* @return	用户留言
	*/
	function get_activity_message($id)
	{
		$this->db->where('customer_id',$id);
		$query = $this->db->get('message_activity');
			$contents_activity = array();
			foreach($query->result() as $row)
			{
					$contents_activity [] = array(
					'content' => $row->content,
					'date' => $row->date,
					'name' => $this->session->userdata('name'),
					'reply' => $row->reply,
					'reply_date' => $row->reply_date,
					'activity_id' =>$row->activity_id,
					'message_id' =>$row->message_id,
					'verify' => $row->verify
					);
			}
			return $contents_activity;
	}
	/**
	* @brief	根据id获得course_message表的用户留言
	*
	* @return	用户留言
	*/
	function get_course_message($id)
	{
		$this->db->where('customer_id',$id);
		$query = $this->db->get('message_course');
			$contents_course = array();
			foreach($query->result() as $row)
			{
					$contents_course [] = array(
					'content' => $row->content,
					'date' => $row->date,
					'name' => $this->session->userdata('name'),
					'reply' => $row->reply,
					'reply_date' => $row->reply_date,
					'course_id' =>$row->course_id,
					'message_id' =>$row->message_id,
					'verify' => $row->verify
					);
			}
			return $contents_course;
	}
	/**
	* @brief	获得已回复的留言
	*
	* @return	留言数组	
	*/
	function get_normal()
	{
		$query = $this->db->get('message');
			$contents = array();
			foreach($query->result() as $row)
			{
				if($row->reply != NULL)
				{
					$this->db->where('customer_id' , $row->customer_id);
					$name = $this->db->get('customer');
					$customer_name = $name->row()->name;
					$contents [] = array(
					'content' => $row->content,
					'date' => $row->date,
					'name' => $customer_name,
					'reply' => $row->reply,
					'reply_date' => $row->reply_date,
					'message_id' =>$row->message_id,
					'customer_id' =>$row->customer_id
					);
				}
			}
			return $contents;
	}
	/**
	* @brief	获得已回复的留言
	*
	* @return	留言数组	
	*/
	function get_normal1($limit, $offset)
	{
		$this->db->where('verify' , 1);
		if(!$limit)
		{
			$query = $this->db->get('message');
				$contents = array();
				foreach($query->result() as $row)
				{
					if($row->reply != NULL)
					{
						$this->db->where('customer_id' , $row->customer_id);
						$name = $this->db->get('customer');
						$customer_name = $name->row()->name;
						$contents [] = array(
						'content' => $row->content,
						'date' => $row->date,
						'name' => $customer_name,
						'reply' => $row->reply,
						'reply_date' => $row->reply_date,
						'message_id' =>$row->message_id,
						'customer_id' =>$row->customer_id
						);
					}
				}
		}
		else 
		{
			$this->db->limit($limit, $offset);
			$query = $this->db->get('message');
					$contents = array();
					foreach($query->result() as $row)
					{
						if($row->reply != NULL)
						{
							$this->db->where('customer_id' , $row->customer_id);
							$name = $this->db->get('customer');
							$customer_name = $name->row()->name;
							$contents [] = array(
							'content' => $row->content,
							'date' => $row->date,
							'name' => $customer_name,
							'reply' => $row->reply,
							'reply_date' => $row->reply_date,
							'message_id' =>$row->message_id,
							'customer_id' =>$row->customer_id
							);
						}
					}
		}
			return $contents;
	}
	
	/**
	* @brief	获得已回复的留言
	*
	* @return	留言数组	
	*/
	function show_normal()
	{
		$this->db->where('reply' , NULL);
		$this->db->order_by('date','desc');
		
		
		$query = $this->db->get('message');
		return $query;
	}
	/**
	* @brief	根据用户名查询获得所有留言
	*
	* @return	留言数组	
	*/
	function search($name)
	{	
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->join('message', 'message.customer_id = customer.customer_id');
		
		$sql = "name like '%$name%'";
		$this->db->where($sql);
		
		$query = $this->db->get();
		
		if($query->row()== NULL)
		{
			$contents = array();
			
		}
		else
		{
			$contents = array();
			if($name != "")
			{
				foreach($query->result() as $row)
				{	
						$contents [] = array(
						'customer_name' => $row->name,
						'content' => $row->content,
						'date' => $row->date,
						'message_id' =>$row->message_id,
						'reply' => $row->reply,
						'reply_date' => $row->reply_date
						);
				}
		    }
		}
		return $contents;
	}
	/**
	* @brief	取得数据行数
	*
	* @return	数据行数	
	*/
	function row_count()
	{
		return $this->db->count_all('message');
	}
}