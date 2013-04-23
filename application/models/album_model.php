<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Admin_model.php
#         Desc: 作品分类数据模型，包括对作品分类表的一些操作
#       Author: 马健
#      Version: 1.0
#   LastChange: 2011-12-10 
#      History: none
=============================================================================*/
class Album_model extends CI_Model {
	/**
	* @brief	添加作品分类
	*
	*/
	function add()
	{	
		$time = time();
		$data = array(
		'name' => $this->input->post('name'),
		'url' => 'album/' . $time,
		'thumbs_url' =>'album/' . $time . '/thumbs'
		);
		$w = $data['name'];
		$q = '';
		mkdir('album/' . $time,0777);
		mkdir('album/' . $time . '/thumbs',0777);
		return $this->db->insert('album',$data);
	}
	/**
	* @brief	编辑作品分类
	*
	*/
	function edit($album_id)
	{
		$this->db->where('album_id',$album_id);
		$data = array(
		'name' => $this->input->post('name')
		);
		return $this->db->update('album',$data);
	}
	/**
	* @brief	停用作品分类
	*
	*/
	function stop($album_id)
	{
		$this->db->where('album_id',$album_id);
		$data = array(
		'in_use' => 0
		);
		return $this->db->update('album',$data);
	}
	/**
	* @brief	开启作品分类
	*
	*/
	function start($album_id)
	{
		$this->db->where('album_id',$album_id);
		$data = array(
		'in_use' => 1
		);
		return $this->db->update('album',$data);
	}
	/**
	* @brief	删除作品分类
	*
	*/
	function delete($album_id)
	{
		$this->db->where('album_id',$album_id);
		$query = $this->db->get('album');
		$q = $query->row()->url;
		$this->db->where('album_id',$album_id);
	$path_a = realpath(APPPATH . '../');
	$svndir = $path_a .'\\'. $q . '/thumbs';
	$dh=opendir($svndir);
    while($file=readdir($dh))
    {
        if($file!="."&&$file!="..")
        {
            $fullpath=$svndir."/".$file;
            if(is_dir($fullpath))
            {
                delsvndir($fullpath);
            }
            else
            {
                unlink($fullpath);
            }
        } 
    }
    closedir($dh);
    //删除目录文件夹
   rmdir($svndir);
   
  // 
  $svndir = $path_a .'\\'. $q;
   $dh=opendir($svndir);
    while($file=readdir($dh))
    {
        if($file!="."&&$file!="..")
        {
            $fullpath=$svndir."/".$file;
            if(is_dir($fullpath))
            {
                delsvndir($fullpath);
            }
            else
            {
                unlink($fullpath);
            }
        } 
    }
    closedir($dh);
    //删除目录文件夹
   rmdir($svndir);
		function delsvndir($svndir){ 
//先删除目录下的文件： 
$dh=opendir($svndir); 
while($file=readdir($dh)){ 
if($file!="."&&$file!=".."){ 
$fullpath=$svndir."/".$file; 
if(is_dir($fullpath)){ 
delsvndir($fullpath); 
}else{ 
unlink($fullpath); 
} 
} 
} 
closedir($dh); 
//删除目录文件夹 
if(rmdir($svndir)){ 
return true; 
}else{ 
return false; 
} 
} 
	
		return $this->db->delete('album',$data);
	}
	/**
	* @brief	获得作品分类
	*
	*/
	function get_album()
	{
		$query = $this->db->get('album');
		$contents = array();
			foreach($query->result() as $row)
			{
					$contents [] = array(
					'name' => $row->name,
					'album_id' =>$row->album_id,
					'in_use' => $row->in_use
					);
			}
			return $contents;
	}
	/**
	* @brief	获得正在使用的作品分类
	*
	*/
	function get_album_in_use()
	{
		$this->db->where('in_use' , 1);
		$query = $this->db->get('album');
		$contents = array();
			foreach($query->result() as $row)
			{
					$contents [] = array(
					'name' => $row->name,
					'album_id' =>$row->album_id,
					'in_use' => $row->in_use
					);
			}
			return $contents;
	}
	/**
	* @brief	获得作品分类并编辑
	*
	*/
	function get_album_edit($album_id)
	{
		$this->db->where('album_id',$album_id);
		$query = $this->db->get('album');
		$contents = array(
					'name' => $query->row()->name,
					'album_id' =>$query->row()->album_id,
					'in_use' => $query->row()->in_use
					);
		return $contents;
	}
	/**
	* @brief	获得作品分类第一个id
	*
	*/
	function get_first_id()
	{
		$sql="select album_id from album";
		$query=mysql_query($sql);
		$row=@mysql_fetch_array($query);
		return $row['album_id'];
	}
	/**
	* @brief	获得作品分类的名字
	*
	*/
	function get_album_url($album_id)
	{
		$this->db->where('album_id',$album_id);
		$query = $this->db->get('album');
		$url = $query->row()->url;
		return $url;
	}
	/**
	* @brief	作品分类个数，用于管理员首页显示
	*
	* @return	作品分类个数
	*/
	function count()
	{
		$this->db->from('album');
		$query = $this->db->count_all_results();
		return $query;
	}
}