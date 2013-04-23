<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Admin_model.php
#         Desc: 留言模型，包括对留言表的一些操作
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-11-20 
#      History: none
=============================================================================*/
class Message_activity_model extends CI_Model {
	/**
	* @brief	用户添加活动留言
	*
	* @return	添加活动留言成功标志
	*/
	function add_top($activity_id)
	{
		$data = array(
		'content' => $this->input->post('top_activity_message'),
		'date' => time(),
		'customer_id' => $this->session->userdata('id'),
		'activity_id' => $activity_id
		);
		return $this->db->insert('message_activity',$data);
	}
	/**
	* @brief	用户添加未置顶活动留言
	*
	* @return	添加未置顶活动留言成功标志
	*/
	function add_untop($activity_id)
	{
		$data = array(
		'content' => $this->input->post('untop_activity_message'),
		'date' => time(),
		'customer_id' => $this->session->userdata('id'),
		'activity_id' => $activity_id,
		);
		return $this->db->insert('message_activity',$data);
	}
	/**
	* @brief	获得未回复的留言数组
	*
	* @return	留言数组	
	*/
	function get_unreply()
	{
		$query = $this->db->get('message_activity');
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
		$this->db->where('reply' , NULL);
		$this->db->where('verify',0);
		if(!$limit)
		{
			$query = $this->db->get('message_activity');
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
		}
		else
		{
			$this->db->limit($limit, $offset);
			$query = $this->db->get('message_activity');
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
		$this->db->where('message_id',$message_id);
		$query = $this->db->get('message_activity');
		$this->db->where('customer_id' , $query->row()->customer_id);
		$q = $this->db->get('customer');
		$customer_name = $q->row()->name;
		$contents = array(
					'content' => $query->row()->content,
					'date' => $query->row()->date,
					'name' => $customer_name,
					'message_id' =>$message_id,
					'reply' => $query->row()->reply,
					);
		return $contents;
	}
	/**
	* @brief	未处理留言数，用于管理员首页显示
	*
	* @return	留言数量	
	*/
	function count()
	{
		$this->db->where('reply' , NULL);
		$this->db->where('verify' , 0);
		$this->db->from('message_activity');
		$query = $this->db->count_all_results();
		return $query;
	}
	/**
	* @brief	已回复留言
	*
	* @return	留言数量	
	*/
	function count_reply()
	{
		$this->db->where('verify' , 1);
		$this->db->from('message_activity');
		$query = $this->db->count_all_results();
		return $query;
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
		return $this->db->update('message_activity',$data);
	}
	/**
	* @brief	删除留言
	*
	* @return	删除留言成功标志
	*/
	function delete($message_id)
	{
		$this->db->where('message_id',$message_id);
		return $this->db->delete('message_activity');
	}
	/**
	* @brief	获得已回复的留言
	*
	* @return	留言数组	
	*/
	function get_normal()
	{
		$query = $this->db->get('message_activity');
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
					'message_id' =>$row->message_id
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
	function get_normal1($limit,$offset)
	{
		$this->db->where('verify',1);
		if(!$limit)
		{
			$query = $this->db->get('message_activity');
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
						'message_id' =>$row->message_id
						);
					}
				}
		}
		else
		{
			$this->db->limit($limit,$offset);
			$query = $this->db->get('message_activity');
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
							'message_id' =>$row->message_id
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
	function show_normal($limit,$offset)
	{
		$this->db->order_by('date','desc');
		if(!$limit)
			{
				$query = $this->db->get('message_activity');
			}
		else 
			{
				//$this->db->limit($limit,$offset);
				$query = $this->db->get('message_activity');
			}
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
		$this->db->join('message_activity', 'message_activity.customer_id = customer.customer_id');
		
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
		return $this->db->count_all('message_activity');
	}
	/**
	* @brief	获得相应的活动留言
	*
	* @return	留言数组	
	*/
	function get_activity_message($activity_id)
	{
		$this->db->where('activity_id',$activity_id);
		$query = $this->db->get('message_activity');
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
					'message_id' =>$row->message_id
					);
				}
			}
			return $contents;
	}
}