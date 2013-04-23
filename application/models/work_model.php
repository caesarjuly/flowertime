<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Admin_model.php
#         Desc: 作品分类数据模型，包括对作品分类表的一些操作
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-12-10 
#      History: none
=============================================================================*/
class Work_model extends CI_Model {
	/**
	* @brief	根据分类id获得分类下面的作品
	*
	*/
	function get_byalbum($album_id)
	{
		$this->db->where('album_id',$album_id);
		$query = $this->db->get('work');
		$works = array();
			foreach($query->result() as $row)
			{
					$works [] = array(
					'url' => $row->url,
					'thumbnail_url' =>$row->thumbnail_url,
					'album_id' =>$album_id,
					'work_id' => $row->work_id
					);
			}
			return $works;
	}
	/**
	* @brief	添加作品图片
	*
	* @return	boolean标识，插入图片是否成功标志
	*/
	function add($contents)
	{
		$album_id = $this->uri->segment(4);
		$this->db->where('album_id',$album_id);
		$query = $this->db->get('album');
		$url = $query->row()->url;
		
		
		$this->gallery_path_url = $url . '/';
		$data = array(
			'url' => $this->gallery_path_url . $contents['file_name'],
			'thumbnail_url' => $this->gallery_path_url . 'thumbs/' . $contents['file_name'],
			'date' => time(),
			'album_id' => $album_id
		);
		return $this->db->insert('work',$data);
	}
	/**
	* @brief	删除图片
	*
	* @param  图片id
	*
	* @return	删除图片	
	*/
	function delete($picture_id)
	{
		$this->db->where('work_id' , $picture_id);
		$query = $this->db->get('work');
		$url = $query->row()->url;
		$thumbnail_url = $query->row()->thumbnail_url;
		$u = str_ireplace("/","\\", $url);
		$th = str_ireplace("/","\\", $thumbnail_url);
		$album_id = $query->row()->album_id;
		
		
		$path_a = realpath(APPPATH . '../') ."\\" . $u;
		$path_b = realpath(APPPATH . '../') ."\\" . $th;
		
		$this->db->where('work_id' , $picture_id);
		$this->db->delete('work');
	if(file_exists($path_a))
		{
			unlink($path_a);
		}
		if(file_exists($path_b))
		{
			unlink($path_b);
		}
		return $album_id;
	}
}