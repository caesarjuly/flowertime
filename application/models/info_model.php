<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Info_model.php
#         Desc: 站点基本信息模型，包括对站点信息表的一些操作
#       Author: 马健|杨帆
#      Version: 2.0
#   LastChange: 2011-11-30
#      History: 添加工作室简介，拍摄流程简介的更新方法
=============================================================================*/
class Info_model extends CI_Model {
	
	function Info_model()
	{
		parent::__construct();
		$this->gallery_path_a = realpath(APPPATH . '../picture');
		$this->gallery_path_b = realpath(APPPATH . '../picture/thumbs');
		$this->gallery_path_url = 'picture/';
	}
	/**
	* @brief	添加首页图片
	*
	* @return	boolean标识，插入图片是否成功标志
	*/
	function add($contents)
	{
		$data = array(
			'url' => $this->gallery_path_url . $contents['file_name'],
			'thumbnail_url' => $this->gallery_path_url . 'thumbs/' . $contents['file_name'],
			'date' => time(),
			'file_type' => $contents['image_type'],
			'file_size' => $contents['file_size'],
			'file_name' => $contents['file_name']
		);
		return $this->db->insert('index_picture',$data);
		
	}
	/**
	* @brief	获取首页图片列表
	*
	* @return	图片	数组
	*/
	function get_images()
	{
		$query = $this->db->get('index_picture');
		$images = array();
		foreach($query->result() as $row)
		{
			$images [] = array(
			'id' => $row->index_picture_id,
			'url' => base_url() . $row->url,
			'thumb_url' => base_url() . $row->thumbnail_url,
			'file_type' =>$row->file_type,
			'file_size' =>$row->file_size
			);
		}
		return $images;
	}
	/**
	* @brief	删除首页图片
	*
	* @param  图片id
	*
	* @return	删除图片	
	*/
	function delete($picture_id)
	{
		
		$this->db->where('index_picture_id' , $picture_id);
		$query = $this->db->get('index_picture');
		
		$filename_a = $query->row()->file_name;
		$path_a = $this->gallery_path_a;
		$path_b = $this->gallery_path_b;
		$this->db->where('index_picture_id' , $picture_id);
		$this->db->delete('index_picture');
	if(file_exists($path_a .'\\'. $filename_a))
			{
				unlink($path_a .'\\'. $filename_a);
			}
	if(file_exists($path_b .'\\'. $filename_a))
			{
				unlink($path_b .'\\'. $filename_a);
			}
	}
	/**
	* @brief	获取工作室简介
	*			
	* @return	站点介绍信息对象	
	*/
	function get_introduction()
	{
		$this->db->where('type', 1);
		return $this->db->get('info');
	}
	/**
	* @brief	更新工作室简介信息
	*			
	* @return	成功标志
	*/
	function update_introduction()
	{
		$data['content'] = $this->input->post('introduction');
		$this->db->where('type', 1);
		return $this->db->update('info', $data);
	}
	
	
	/**
	* @brief	获取拍摄流程介绍
	*			
	* @return	拍摄流程介绍信息对象	
	*/
	function get_process()
	{
		$this->db->where('type', 2);
		return $this->db->get('info');
	}
	/**
	* @brief	更新工作室简介信息
	*			
	* @return	成功标志
	*/
	function update_process()
	{
		$data['content'] = $this->input->post('process');
		$this->db->where('type', 2);
		return $this->db->update('info', $data);
	}
	/**
	* @brief	上传的首页图片数，用于管理员首页显示
	*
	* @return	首页图片数
	*/
	function count()
	{
		$this->db->from('index_picture');
		$query = $this->db->count_all_results();
		return $query;
	}
	
	/**
	* @brief	获取站点基本信息
	*			暂时舍弃
	* @return	站点基本信息对象	
	*/
//	function get_info()
//	{
//		$this->db->where('type',1);
//		return $this->db->get('info');
//	}
/**
	* @brief	更新站点基本信息
	*			暂时舍弃
	* @return	成功标志
	*/
//	function update_info()
//	{
//		$qq['content'] = $this->input->post('qq');
//		$qun['content'] = $this->input->post('qun');
//		$weibo['content'] = $this->input->post('weibo');
//		$boke['content'] = $this->input->post('boke');
//		$dianhua['content'] = $this->input->post('dianhua');
//		return $this->db->update('info',$qq,"name = 'qq'")&&
//			   $this->db->update('info',$qun,"name = 'qun'")&&
//			   $this->db->update('info',$weibo,"name = 'weibo'")&&
//			   $this->db->update('info',$boke,"name = 'boke'")&&
//			   $this->db->update('info',$dianhua,"name = 'dianhua'");
//	}
}