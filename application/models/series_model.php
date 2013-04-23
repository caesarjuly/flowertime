<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Admin_model.php
#         Desc: 作品taox数据模型，包括对作品分类表的一些操作
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-11-20 
#      History: none
=============================================================================*/
class Series_model extends CI_Model {
	/**
	* @brief	添加套系
	*
	*/
	function add()
	{
		$data['name'] = $this->input->post('name');
		$data['price'] = $this->input->post('price');
		$data['color'] = $this->input->post('table_danyuan');
		$data['content'] = $this->input->post('content2');
		$data['english_content'] = $this->input->post('content3');
		return $this->db->insert('series',$data);
	}
	/**
	* @brief	获得套系
	*
	*/
	function get()
	{
		$this->db->order_by('name');
		$query = $this->db->get('series');
		$contents = array();
		foreach($query->result() as $row)
		{
				$contents [] = array(
				'series_id' => $row->series_id,
				'name' => $row->name,
				'color' => $row->color,
				'price' => $row->price,
				'content' => $row->content,
				'english_content' => $row->english_content
				);
		}
		return $contents;
	}
	/**
	* @brief	根据套系id获得套系
	*
	*/
	function get_series($series_id)
	{
		$this->db->where('series_id' , $series_id);
		$query = $this->db->get('series');
		$contents = array(
		'series_id' => $series_id,
		'name' => $query->row()->name,
		'price' => $query->row()->price,
		'color' => $query->row()->color,
		'content' => $query->row()->content,
		'english_content' => $query->row()->english_content
			);
		return $contents;
	}
	/**
	* @brief	根据套系id编辑套系
	*
	*/
	function edit($series_id)
	{
		$this->db->where('series_id',$series_id);
		$data= array(
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
				'color' => $this->input->post('table_danyuan'),
				'content' => $this->input->post('content2'),
				'english_content' => $this->input->post('content3')
		);
		return $this->db->update('series',$data);
	}
	/**
	* @brief	根据套系id删除套系
	*
	*/
	function delete($series_id)
	{
		$this->db->where('series_id',$series_id);
		return $this->db->delete('series');
	}
}