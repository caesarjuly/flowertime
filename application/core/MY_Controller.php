<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	function __construct() 
		{
			parent::__construct();
			$this->load->library('session');
			$this->is_logged();
		}
	function is_logged()
	{
		$is_logged = $this->session->userdata('is_logged');
		if(!isset($is_logged)||$is_logged != true)
		{
			redirect('admin/Admin_index');
			die();
		}
	}
}