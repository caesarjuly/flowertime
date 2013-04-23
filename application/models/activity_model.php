<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Activity_model.php
#         Desc: 活动基本信息模型，包括对站点活动表的一些操作
#       Author: 马健
#      Version: 2.0
#   LastChange: 2011-12-11
#      History: 
=============================================================================*/
class Activity_model extends CI_Model {
	/**
	* @brief	添加活动内容
	*
	* @return	boolean标识，添加活动是否成功标志
	*/
	function add($contents)
	{
		$this->gallery_path_url = 'activity/';
		$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content2'),
			'create_date' => time(),
			'url' => $this->gallery_path_url . $contents['file_name'],
			'thumbnail_url' => $this->gallery_path_url . 'thumbs/' . $contents['file_name'],
		);
		return $this->db->insert('activity',$data);
	}
	
	/**
	* @brief	
	*
	* @return	boolean标识，是否成功标志
	*/
	function edit_no_image()
	{
		$activity_id = $this->uri->segment(4);
		$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content2'),
			'change_date' => time(),
		);
		$this->db->where('activity_id' , $activity_id);
		return $this->db->update('activity',$data);
	}
	
	/**
	* @brief	添加活动内容
	*
	* @return	boolean标识，添加活动是否成功标志
	*/
	function edit($contents)
	{
		$activity_id = $this->uri->segment(4);
		$this->db->where('activity_id' , $activity_id);
		$query = $this->db->get('activity');
		$this->gallery_path_url = 'activity/';
		$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content2'),
			'create_date' => $query->row()->create_date,
			'change_date' => time(),
			'url' => $this->gallery_path_url . $contents['file_name'],
			'thumbnail_url' => $this->gallery_path_url . 'thumbs/' . $contents['file_name'],
		);
		
		$this->db->where('activity_id' , $activity_id);
		$query = $this->db->get('activity');
		$url = $query->row()->url;
		$thumbnail_url = $query->row()->thumbnail_url;
		$u = str_ireplace("/","\\", $url);
		$th = str_ireplace("/","\\", $thumbnail_url);
	if(file_exists($u))
			{
				unlink($u);
			}
	if(file_exists($th))
			{
				unlink($th);
			}
		
		$this->db->where('activity_id' , $activity_id);
		return $this->db->update('activity',$data);
	}
	/**
	* @brief	获得活动内容
	*
	* @return	活动内容
	*/
	function get($limit, $offset)
	{
		$this->db->order_by("top", "desc");
		$this->db->order_by("create_date", "desc"); 
		$images = array();
		if(!$limit)
		{
			$query = $this->db->get('activity');
			foreach($query->result() as $row)
			{
				$images [] = array(
				'activity_id' => $row->activity_id,
				'thumb_url' => base_url() . $row->thumbnail_url,
				'url' =>base_url() . $row->url,
				'title' =>$row->title,
				'content' => $row->content,
				'create_date' =>$row->create_date,
				'change_date' =>$row->change_date,
				'top' => $row->top
				);
			}
		}
		else 
		{
			$this->db->limit($limit,$offset);
			$query = $this->db->get('activity');
				foreach($query->result() as $row)
				{
					$images [] = array(
					'activity_id' => $row->activity_id,
					'thumb_url' => base_url() . $row->thumbnail_url,
					'url' =>base_url() . $row->url,
					'title' =>$row->title,
					'content' => $row->content,
					'create_date' =>$row->create_date,
					'change_date' =>$row->change_date,
					'top' => $row->top
					);
				}
		}
			
		return $images;
	}
	
	/**
	* @brief	获得活动内容
	*
	* @return	活动内容
	*/
	function news_get()
	{
		$this->db->order_by("top", "desc");
		$this->db->order_by("create_date", "desc"); 
		$images = array();
		$query = $this->db->get('activity');
		foreach($query->result() as $row)
		{
			$images [] = array(
			'activity_id' => $row->activity_id,
			'thumb_url' => base_url() . $row->thumbnail_url,
			'url' =>base_url() . $row->url,
			'title' =>$row->title,
			'content' => $row->content,
			'create_date' =>$row->create_date,
			'change_date' =>$row->change_date,
			'top' => $row->top
			);
		}	
	return $images;
	}
	/**
	* @brief	获得活动内容,用于前台活动显示，未置顶的活动分页
	*
	* @return	活动内容
	*/
	function get_news($limit, $offset)
	{
		$this->db->where('top',0);
		$this->db->order_by('create_date','desc');
		$images = array();
		if(!$limit)
			{
				$query = $this->db->get('activity');
				foreach($query->result() as $row)
				{
					$images [] = array(
					'activity_id' => $row->activity_id,
					'thumb_url' => base_url() . $row->thumbnail_url,
					'url' =>base_url() . $row->url,
					'title' =>$row->title,
					'content' => $row->content,
					'create_date' =>$row->create_date,
					'change_date' =>$row->change_date,
					'top' => $row->top
					);
				}
			}
			else 
			{
				$this->db->limit($limit,$offset);
				$query = $this->db->get('activity');
				foreach($query->result() as $row)
				{
					$images [] = array(
					'activity_id' => $row->activity_id,
					'thumb_url' => base_url() . $row->thumbnail_url,
					'url' =>base_url() . $row->url,
					'title' =>$row->title,
					'content' => $row->content,
					'create_date' =>$row->create_date,
					'change_date' =>$row->change_date,
					'top' => $row->top
					);
				}
			}
		return $images;
	}
	/**
	* @brief	根据id获得活动内容
	*
	* @return	活动内容
	*/
	function get_activity($activity_id)
	{
		$this->db->where('activity_id' , $activity_id);
		$query = $this->db->get('activity');
		$row = $query->row();
			$images = array(
			'activity_id' => $row->activity_id,
			'thumb_url' => base_url() . $row->thumbnail_url,
			'content' => $row->content,
			'title' =>$row->title,
			'create_date' =>$row->create_date,
			'change_date' =>$row->change_date,
			'top' => $row->top
			);
		return $images;
	}
	/**
	* @brief	发布的活动数，用于管理员首页显示
	*
	* @return	活动数量
	*/
	function count()
	{
		$this->db->from('activity');
		$query = $this->db->count_all_results();
		return $query;
	}
	/**
	* @brief	置顶活动
	*
	* @return	
	*/
	function top($activity_id)
	{
		$this->db->where('activity_id' , $activity_id);
		$data = array(
		'top' => 1
		);
		$this->db->update('activity',$data);
	}
	/**
	* @brief	取消置顶
	*
	* @return	
	*/
	function untop($activity_id)
	{
		$this->db->where('activity_id' , $activity_id);
		$data = array(
		'top' => 0
		);
		$this->db->update('activity',$data);
	}
	/**
	* @brief	取得未置顶的数据行数
	*
	* @return	
	*/
	function row_count()
	{
		$this->db->where('top' , 0);
		$this->db->from('activity');
		$query = $this->db->count_all_results();
		return $query;
	}
	/**
	* @brief	取得所有的活动数据行数
	*
	* @return	数据行数
	*/
	function count_all()
	{
		$this->db->from('activity');
		$query = $this->db->count_all_results();
		return $query;
	}
	/**
	* @brief	删除活动数据行数
	*
	* @return	
	*/
	function delete($activity_id)
	{
		$this->db->where('activity_id' , $activity_id);
		$query = $this->db->get('activity');
		$url = $query->row()->url;
		$thumbnail_url = $query->row()->thumbnail_url;
		$u = str_ireplace("/","\\", $url);
		$th = str_ireplace("/","\\", $thumbnail_url);
		
		//$path_a = realpath(APPPATH . '../album') ."\\" . $u;
		//$path_b = realpath(APPPATH . '../album') ."\\" . $th;
		
		$this->db->where('activity_id',$activity_id);
	if(file_exists($u))
			{
				unlink($u);
			}
	if(file_exists($th))
			{
				unlink($th);
			}
		
		return $this->db->delete('activity');
	}
	
}