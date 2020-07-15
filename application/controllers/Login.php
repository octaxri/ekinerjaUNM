<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()

	{

		parent::__construct();

		$this->load->model('m_login');

		// $this->sia = $this->load->database('sia', true);

		// $this->auth->cek();

	}
	public function index()
	{
		$this->load->view('login');
	}
	public function login_action()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'nip' => $username,
			'password' => $password
		);
		$query = $this->m_login->cek_login("t_pegawai", $where);
		$cek = $query->num_rows();
		if ($cek > 0) {
			$g = "pegawai";
			foreach ($query->result() as $list) {
				$nama = $list->nama;
				$email = $list->email;
				$jns_jabatan = $list->jns_jabatan;
				$jabatan = $list->jabatan;
				$unit = $list->unit;
				$foto = $list->foto;
			}
			# code...
			$data_session = array(
				'nip' => $username,
				'nama' => $nama,
				'email' => $email,
				'jabatan' => $jabatan,
				'jns_jabatan' => $jns_jabatan,
				'unit' => $unit,
				'foto' => $foto,
				'group' => $g,
				'isLogin' => true

			);
			$this->session->set_userdata($data_session);
			echo json_encode(array('status' => 2, 'group' => $g));
		} else {
			$where = array(
				"username" => $username,
				"password" => $password,
			);
			$query = $this->m_login->cek_login("t_user", $where);
			$cek = $query->num_rows();

			if ($cek > 0) {
				$g = "admin";
				foreach ($query->result() as $list) {
					# code...
					$data = array(
						'nama' => $list->nama,
						'username' => $list->username,
						'group' => 	$g,
						'isLogin'   => TRUE,
					);
				}
				$this->session->set_userdata($data);
				echo json_encode(array('status' => 1, 'group' => $g));
			} else {
				echo json_encode(array('status' => 0));
			}
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}

	public function register()
	{
		$this->load->view('register');
	}
}
