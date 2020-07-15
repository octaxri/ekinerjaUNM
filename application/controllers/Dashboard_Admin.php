<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->auth->cek_auth();
		// $this->load->model('m_model');
		$group = $this->session->userdata('group');
		if ($group != "admin")
			redirect("dashboard");
	}
	public function index()
	{
		$uri = $this->uri->segment('1');
		$data['page'] = 'dashboard_admin.php';
		$data['segment'] = 'dashboard';
		$data['uri'] = $uri;
		$this->load->view('template/das_admin', $data);
	}
}
