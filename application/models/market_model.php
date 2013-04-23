<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Market_model.php
#         Desc: 自选超市数据模型，包括对超市分类表的一些操作
#       Author: 杨帆
#      Version: 1.0
#   LastChange: 2012-10-31 
#      History: none
=============================================================================*/
class Market_model extends CI_Model {
	/**
	* @brief	添加超市分类
	*
	*/
	function add($contents)
	{
		$time = time();
		$this->gallery_path_url = 'market/';
		$data = array(
			'title' => $this->input->post('title'),
			'notice' => $this->input->post('content2'),
			'url' => $this->gallery_path_url . $contents['urlfile']['file_name'],
			'title_url' => $this->gallery_path_url . $contents['titleurlfile']['file_name'],
			'content_url' => $this->gallery_path_url . $time
		);
		mkdir('market/' . $time,0777);
		return $this->db->insert('market',$data);
	}
	/**
	* @brief	编剧超市分类内容
	*
	* @return
	*/
	function edit($contents)
	{
		$market_id = $this->uri->segment(4);
		$this->db->where('market_id' , $market_id);
		$query = $this->db->get('market');
		$this->gallery_path_url = 'market/';
		$data = array(
			'title' => $this->input->post('title'),
			'notice' => $this->input->post('content2'),
		);
		
		$url = $query->row()->url;
		$title_url = $query->row()->title_url;
		$u = str_ireplace("/","\\", $url);
		$th = str_ireplace("/","\\", $title_url);
		if($_FILES['urlfile']['name'])
		{
			$data['url'] = $this->gallery_path_url . $contents['urlfile']['file_name'];
			if(file_exists($u))
			{
				unlink($u);
			}
		}
		if($_FILES['titleurlfile']['name'])
		{
			$data['title_url'] = $this->gallery_path_url . $contents['titleurlfile']['file_name'];
			if(file_exists($th))
			{
				unlink($th);
			}
		}
		
		$this->db->where('market_id' , $market_id);
		return $this->db->update('market',$data);
	}

	/**
	* @brief	删除超市分类
	*
	*/
	function delete($market_id)
	{
		$this->db->where('market_id', $market_id);
		$data['is_deleted'] = 1;
		return $this->db->update('market',$data);
	}
	/**
	* @brief	获得超市分类
	*
	*/
	function get_market()
	{
		$this->db->where('is_deleted' , 0);
		$query = $this->db->get('market');
		$contents = array();
		if($query){
			foreach($query->result() as $row)
			{
					$contents [] = array(
					'market_id' =>$row->market_id,
					'title' => $row->title,
					'title_url' => base_url().$row->title_url,
					'url' => base_url().$row->url,
					'notice' => $row->notice
					);
			}
		}
			return $contents;
	}

	/**
	* @brief	获得特定超市分类
	*
	*/
	function get_market_byid($market_id)
	{
		$this->db->where('is_deleted' , 0);
		$this->db->where('market_id', $market_id);
		$query = $this->db->get('market');
		$row = $query->row();
		$contents = array(
					'market_id' =>$row->market_id,
					'title' => $row->title,
					'title_url' => base_url().$row->title_url,
					'url' => base_url().$row->url,
					'content_url' => $row->content_url,
					'notice' => $row->notice
					);
		return $contents;
	}
	/**
	* @brief	获得分类第一个id
	*
	*/
	function get_first_id()
	{
		$this->db->where('is_deleted', 0);
		$query = $this->db->get('market');
		$row = $query->row();
		if($row)
		return $row->market_id;
		else
		return "";
	}
}