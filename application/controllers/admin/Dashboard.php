<?php

/**
 *
 */
class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data = array('title' 		=> 'Karossa Travel Dashboard',
					  'breadcrumb'	=> 'Dashboard',
					  'isi'			=> 'admin/dashboard/list'
		 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


}
