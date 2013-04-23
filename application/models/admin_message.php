<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Admin_model.php
#         Desc: 留言模型，包括对留言表的一些操作
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-11-20 
#      History: none
=============================================================================*/
class Admin_message extends CI_Model {
	/**
	* @brief	获得未回复的留言
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
					$contents [] = array(
					'name' => $row->name,
					'phone' => $row->phone,
					'email' => $row->email,
					'address' => $row->address
					);
				}
			}
			return $contents;
	}
}