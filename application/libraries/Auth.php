<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
	public function cek_auth()
	{
		$this->ci = &get_instance();
		$this->sesi  = $this->ci->session->userdata('isLogin');
		$this->hak = $this->ci->session->userdata('stat');
		if ($this->sesi != TRUE) {
			// echo "<script>alert('Anda tidak berhak mengakses halaman ini!');</script>";
			redirect('login', 'refresh');
			exit();
		}
	}
	public function cekUserGroup($userGroup)
	{
		$this->ci = &get_instance();
		$sesi  = $this->ci->session->userdata('group');
		// $this->hak = $this->ci->session->userdata('stat');
		if ($sesi != $userGroup) {
			echo "<script>alert('User anda tidak dapat mengakses halaman ini!');</script>";
			redirect('', 'refresh');
			//exit();
		}
	}
	public function hak_akses($kecuali = "")
	{
		if ($this->hak == $kecuali) {
			echo "<script>alert('Anda tidak berhak mengakses halaman ini!');</script>";
			redirect('login', 'refresh');
		} elseif ($this->hak == "") {
			echo "<script>alert('Anda belum login!');</script>";
			redirect('login', 'refresh');
		} else {
		}
	}
	function cek_menu($val)
	{
		$this->ci = &get_instance();
		$type  = $this->ci->session->userdata('type');
		$query = $this->ci->db->query("select count(id) as jum from oto_cekdpta where jns_user='$type' and function='$val'")->row('jum');
		if ($query == 0) {
			redirect('index.php/tracking');
		}
	}
}
