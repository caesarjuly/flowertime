<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Course_model.php
#         Desc: 摄影课堂数据模型，包括对课堂表的一些操作
#       Author: 马健|杨帆
#      Version: 2.0
#   LastChange: 2011-12-20
#      History: none
=============================================================================*/
class Course_model extends CI_Model {
	/**
	* @brief	添加问题课堂
	*	
	*/
	function add_question()
	{
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content2');
		$data['create_date'] = time();
		return $this->db->insert('course',$data);
	}
	/**
	* @brief	添加回答课堂
	*	
	*/
	function add_answer()
	{
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content2');
		$data['create_date'] = time();
		$data['type'] = 2;
		return $this->db->insert('course',$data);
	}
	/**
	* @brief	获得课堂问题
	*	
	*/
	function get_question($limit, $offset)
	{
		$this->db->order_by("top", "desc");
		$this->db->order_by("create_date", "desc");
		
		if(!$limit)
		{
			$query = $this->db->get('course');
			$contents = array();
			foreach($query->result() as $row)
			{
					$contents [] = array(
					'course_id' => $row->course_id,
					'title' => $row->title,
					'content' => $row->content,
					'create_date' => $row->create_date,
					'change_date' => $row->change_date,
					'top' => $row->top,
					);
			}
		}
		else 
		{
			$this->db->limit($limit, $offset);
			$query = $this->db->get('course');
				$contents = array();
				foreach($query->result() as $row)
				{
						$contents [] = array(
						'course_id' => $row->course_id,
						'title' => $row->title,
						'content' => $row->content,
						'create_date' => $row->create_date,
						'change_date' => $row->change_date,
						'top' => $row->top,
						);
				}
		} 
		
		return $contents;
	}
	/**
	* @brief	获得课堂答案
	*	
	*/
	function get_answer($limit, $offset)
	{
		$this->db->where('type',2);
		$this->db->order_by("top", "desc");
		$this->db->order_by("create_date", "desc");
		if(!$limit)
		{
			$query = $this->db->get('course');
			$contents = array();
			foreach($query->result() as $row)
			{
				if($row->type == 2)
					$contents [] = array(
					'course_id' => $row->course_id,
					'title' => $row->title,
					'content' => $row->content,
					'create_date' => $row->create_date,
					'change_date' => $row->change_date,
					'top' => $row->top,
					);
			}
		}
		else 
		{
			$this->db->limit($limit, $offset);
			$query = $this->db->get('course');
			$contents = array();
			foreach($query->result() as $row)
			{
				if($row->type == 2)
					$contents [] = array(
					'course_id' => $row->course_id,
					'title' => $row->title,
					'content' => $row->content,
					'create_date' => $row->create_date,
					'change_date' => $row->change_date,
					'top' => $row->top,
					);
			}
		}
		return $contents;
	}
	/**
	* @brief	获取所有课程
	*
	*/
	function get_all()
	{
		$this->db->order_by("top", "desc");
		$this->db->order_by("create_date", "desc"); 
		return $this->db->get('course');
	}
	/**
	* @brief	根据id获得课堂内容
	*	
	*/
	function get_course($course_id)
	{
		$this->db->where('course_id' , $course_id);
		$query = $this->db->get('course');
		$contents = array(
		'course_id' => $course_id,
		'title' => $query->row()->title,
		'content' => $query->row()->content,
		'top_url' => $query->row()->top_url,
		'top_content' => $query->row()->top_content
			);
		return $contents;
	}
	/**
	* @brief	根据id编辑课堂内容
	*	
	*/
	function edit_no_image($course_id)
	{
			$data = array(
			'title' =>$this->input->post('title'),
			'content' => $this->input->post('content2'),
			'change_date' => time(),
			'top_content' => $this->input->post('top_course')
			);
			$this->db->where('course_id' , $course_id);
			
		return $this->db->update('course',$data);
	}
	
	/**
	* @brief	根据id编辑课堂内容
	*	
	*/
	function edit_top($course_id,$contents)
	{
		$this->db->where('course_id',$course_id);
		$query = $this->db->get('course');
		$url = $query->row()->top_url;
		$u = str_ireplace("/","\\", $url);
	if(file_exists($u))
			{
				unlink($u);
			}
		$this->gallery_path_url = 'top/';
			$data = array(
			'title' =>$this->input->post('title'),
			'content' => $this->input->post('content2'),
			'change_date' => time(),
			'top_url' => $this->gallery_path_url . $contents['file_name'],
			'top_content' => $this->input->post('top_course')
			);
			$this->db->where('course_id' , $course_id);
			
		return $this->db->update('course',$data);
	}
	
	/**
	* @brief	根据id编辑课堂内容
	*	
	*/
	function edit($course_id)
	{
		$this->db->where('course_id',$course_id);
		$data= array(
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content2'),
				'change_date' => time()
		);
		return $this->db->update('course',$data);
	}
	/**
	* @brief	根据id删除课堂内容
	*	
	*/
	function delete($course_id)
	{
		$this->db->where('course_id',$course_id);
		$query = $this->db->get('course');
		if(($query->row()->top_url == NULL)&&($query->row()->top_content == NULL))
		{
			$this->db->where('course_id',$course_id);
			return $this->db->delete('course');
		}
		else 
		{
			$url = $query->row()->top_url;
			$u = str_ireplace("/","\\", $url);
			if(file_exists($u))
			{
				unlink($u);
			}
			$this->db->where('course_id',$course_id);
			return $this->db->delete('course');
		}
	}
	/**
	* @brief	置顶已经有内容简介的课堂
	*	
	*/
	function top_content($course_id)
	{
		$this->db->where('top' , 1);
		
		$this->db->from('course');
		$q = $this->db->count_all_results();
		
		if($q == 0)
		{
			$data = array(
				'top' => 1
			);
			$this->db->where('course_id' , $course_id);
			$this->db->update('course',$data);
		}
		else 
		{
			$this->db->where('top' , 1);
			$query = $this->db->get('course');
			$id = $query->row()->course_id;
			$this->db->where('course_id' , $id);
			$data = array(
				'top' => 0
			);
			$this->db->update('course',$data);
			$data = array(
				
				'top' => 1
			);
			$this->db->where('course_id' , $course_id);
			$this->db->update('course',$data);
		}
	}
	/**
	* @brief	置顶课堂
	*	
	*/
	function add_top($course_id,$contents)
	{
		$this->db->where('top' , 1);
		
		$this->db->from('course');
		$q = $this->db->count_all_results();
		
		if($q == 0)
		{
			$this->gallery_path_url = 'top/';
			$data = array(
			'top_url' => $this->gallery_path_url . $contents['file_name'],
			'top_content' => $this->input->post('top_course'),
			'top' => 1
			);
			$this->db->where('course_id' , $course_id);
			$this->db->update('course',$data);
		}
		else 
		{
			$this->db->where('top' , 1);
			$query = $this->db->get('course');
			$id = $query->row()->course_id;
			$this->db->where('course_id' , $id);
			$data = array(
			'top' => 0
			);
			$this->db->update('course',$data);
			$this->gallery_path_url = 'top/';
			$data = array(
				'top_url' => $this->gallery_path_url . $contents['file_name'],
				'top_content' => $this->input->post('top_course'),
				'top' => 1
			);
			$this->db->where('course_id' , $course_id);
			$this->db->update('course',$data);
		}
		
	}
	/**
	* @brief	取消置顶
	*
	* @return	
	*/
	function untop($course_id)
	{
		$this->db->where('course_id' , $course_id);
		$data = array(
		'top' => 0
		);
		$this->db->update('course',$data);
	}
	/**
	* @brief	取得数据行数
	*
	* @return	数据行数	
	*/
	function count()
	{
		return $this->db->count_all('course');
	}
	
	/**
	* @brief	取得数据行数
	*
	* @return	数据行数	
	*/
	function count_question()
	{
		$this->db->from('course');
		$query = $this->db->count_all_results();
		return $query;
	}
	/**
	* @brief	取得数据行数
	*
	* @return	数据行数	
	*/
	function count_answer()
	{
		$this->db->where('type', 2);
		$this->db->from('course');
		$query = $this->db->count_all_results();
		return $query;
	}
	/**
	* @brief	获取普通课程
	*
	* @return	普通课程对象
	*/
	function get_normal()
	{
		$this->db->order_by('top','desc');
		$this->db->order_by('create_date','desc');
		$query = $this->db->get('course');
		$contents = array();
			foreach($query->result() as $row)
			{
					$contents [] = array(
					'id' => $row->course_id,
					'title' => $row->title,
					'top' => $row->top,
					'top_content' => $row->top_content,
					'top_url' => $row->top_url
					);
			}
		return $contents;
	}
	
	/**
	* @brief	获取吕老师答疑
	*
	* @return	答疑课程对象
	*/
	function get_qa()
	{
		$this->db->order_by('top','desc');
		$this->db->order_by('create_date','asc');
		$query = $this->db->get('course');
		$contents = array();
			foreach($query->result() as $row)
			{
					$contents [] = array(
					'id' => $row->course_id,
					'title' => $row->title,
					);
			}
		return $contents;
	}
	
}