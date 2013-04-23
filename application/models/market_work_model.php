<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Market_work_model.php
#         Desc: 自选超市作品数据模型，包括对超市作品表的一些操作
#       Author: 杨帆
#      Version: 1.0
#   LastChange: 2012-10-31 
#      History: none
=============================================================================*/
class Market_work_model extends CI_Model {
	/**
	* @brief	获得特定超市分类所有作品
	*
	*/
	function get_market_work($market_id)
	{
		$this->db->where('market_id',$market_id);
		$query = $this->db->get('market_work');
		$contents = array();
			foreach($query->result() as $row)
			{
					$contents [] = array(
					'market_work_id' => $row->market_work_id,
					'title' => $row->title,
					'price' =>$row->price,
					'url' => $row->url
					);
			}
			return $contents;
	}
	/**
	* @brief	获得特定超市分类所有作品
	*
	*/
	function add($contents)
	{
		$market_id = $this->uri->segment(4);
		$this->db->where('market_id',$market_id);
		$query = $this->db->get('market');
		$url = $query->row()->content_url;
		$this->gallery_path_url = $url . '/';
		$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content2'),
			'price' => $this->input->post('price'),
			'url' => $this->gallery_path_url . $contents['file_name'],
			'market_id' => $market_id
		);
		return $this->db->insert('market_work',$data);
	}
	/**
	* @brief	获得特定作品
	*
	*/
	function get_market_work_byid($market_work_id)
	{
		$this->db->where('market_work_id',$market_work_id);
		$query = $this->db->get('market_work');
		$row = $query->row();
		$contents = array(
					'market_id' => $row->market_id,
					'market_work_id' => $row->market_work_id,
					'title' => $row->title,
					'price' => $row->price,
					'url' => $row->url,
					'content' => $row->content
					);
		return $contents;
	}
	/**
	* @brief	编辑作品内容
	*
	* @return	
	*/
	function edit($contents)
	{
		$market_work_id = $this->uri->segment(4);
		$this->db->where('market_work_id' , $market_work_id);
		$query = $this->db->get('market_work');
		$market_id = $query->row()->market_id;
		$market = $this->Market_model->get_market_byid($market_id);
		$this->gallery_path_url = $market['content_url'] . '/';
		$data = array(
			'title' => $this->input->post('title'),
			'price' => $this->input->post('price'),
			'content' => $this->input->post('content2')
		);
		
		$url = $query->row()->url;
		$u = str_ireplace("/","\\", $url);
		if($_FILES['userfile']['name'])
		{
			$data['url'] = $this->gallery_path_url . $contents['file_name'];
			if(file_exists($u))
			{
				unlink($u);
			}
		}
		
		$this->db->where('market_work_id' , $market_work_id);
		return $this->db->update('market_work',$data);
	}
	/**
	* @brief	删除作品
	*
	* @param  图片id
	*
	* @return	
	*/
	function delete($market_work_id)
	{
		$this->db->where('market_work_id' , $market_work_id);
		$query = $this->db->get('market_work');
		$url = $query->row()->url;
		$u = str_ireplace("/","\\", $url);			
		if(file_exists($u))
		{
			unlink($u);
		}
		$this->db->where('market_work_id' , $market_work_id);
		return $this->db->delete('market_work');
	}
}