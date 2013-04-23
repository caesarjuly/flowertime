<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*=============================================================================
#     FileName: Admin_index.php
#         Desc: 实现管理员首页图片更新、工作室简介更新和拍摄流程介绍更新
#       Author: 马健|杨帆
#      Version: 2.0
#   LastChange: 2011-11-30
#      History: 添加简介和拍摄流程静态信息更新功能
=============================================================================*/

class Admin_static extends MY_Controller {
	
	var $gallery_path;
	var $gallery_path_url;
	/**
	* @brief	构造函数，一般可以在里面load一些库、辅助函数以及所用到的model，也可以在autoload配置文件里默认添加
	*
	* @return	void
	*/
	function __construct() 
	{
		parent::__construct();
		$this->gallery_path = realpath(APPPATH . '../picture');
		$this->gallery_path_url = base_url() . 'picture/';
	}
	/**
	* @brief	默认函数，跳转到admin_static_picture.view页面
	*
	*/
	function index()
	{
		$this->show_picture();
	}

	/**
	* @brief	跳转到admin_static_picture.view页面,首页图片添加
	*
	*/
	function show_picture()
	{
		$data['main_content'] = 'admin_static_picture';
		$data['images'] = $this->Info_model->get_images();
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	跳转到admin_static_picture.view页面,首页图片添加
	*
	*/
	function show_picture_test()
	{
		$data['main_content'] = 'admin_static_picture_test';
		$data['images'] = $this->Info_model->get_images();
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	首页图片添加
	*
	*/	
	function add()
	{
		$config = array(
				'allowed_types' => 'jpg|png|gif',
				'upload_path' => $this->gallery_path ,
				'max_size' => 4000,
				'encrypt_name' => true
			);
		$this->load->library('upload',$config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		
		$config = array(
			'source_image' => $image_data['full_path'],
			'new_image' => $this->gallery_path . '/thumbs',
			'width' => 100,
			'height' => 100
		);
		
		$this->load->library('image_lib',$config);
		$this->image_lib->resize();
		
		$contents = $image_data;
		if($this->input->post('upload'))
			{
				
				if(!$this->Info_model->add($image_data))
				{
					$this->Info_model->add($image_data);
				}
				else 
				{
					redirect('admin/Admin_static/show_picture_test');
				}
			}
	}
	/**
	* @brief	首页图片删除
	*
	*/
	function delete_picture($id)
	{
		$picture_id = $id;
		$this->Info_model->delete($picture_id);
		redirect('admin/Admin_static/show_picture_test');
		
		
	}
	
	
	/**
	* @brief	跳转到admin_static_info.view页面,工作室简介更新显示页面
	*
	*/
	function show_introduction()
	{
		$data['introduction'] = $this->Info_model->get_introduction();
		$data['main_content'] = 'admin_static_introduction';
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	更新工作室简介
	*
	*/
	function update_introduction()
	{
		if($this->Info_model->update_introduction())
		{
			$data = array('message' => '更新成功，将于2秒后跳转页面！', 'main_content' => 'message','url' => 'admin/Admin_static/show_introduction');	
			$this->load->view('admin/include/template',$data);
		}else 
		{
			$data = array('message' => '更新失败，将于2秒后跳回！', 'main_content' => 'message','url' => 'admin/Admin_static/show_introduction');	
			$this->load->view('admin/include/template',$data);
		}
	}
	
	
	/**
	* @brief	跳转到admin_static_process.view页面,拍摄流程介绍更新显示页面
	*
	*/
	function show_process()
	{
		$data['process'] = $this->Info_model->get_process();
		$data['main_content'] = 'admin_static_process';
		$this->load->view('admin/include/template',$data);
	}
	/**
	* @brief	更新拍摄流程介绍
	*
	*/
	function update_process()
	{
		if($this->Info_model->update_process())
		{
			$data = array('message' => '更新成功，将于2秒后跳转页面！', 'main_content' => 'message','url' => 'admin/Admin_static/show_process');	
			$this->load->view('admin/include/template',$data);
		}else 
		{
			$data = array('message' => '更新失败，将于2秒后跳回！', 'main_content' => 'message','url' => 'admin/Admin_static/show_process');	
			$this->load->view('admin/include/template',$data);
		}
	}
	
	/**
	* @brief	更新站点基本信息
	* 			暂时舍弃
	*
	*/
//	function update_info()
//	{
//		$this->Info_model->update_info();
//		$data['weibo'] = 'weibo';
//		$data['boke'] = 'boke';
//		$content = $this->load->view('admin/include/header_template', $data, true);
//		write_file('./header.html', $content);
//		redirect('admin/Admin_static');
//	}
}
