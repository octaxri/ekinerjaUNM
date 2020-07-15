<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->auth->cek_auth();
		$this->load->model('ModelData', 'model');
		$group = $this->session->userdata('group');
		if ($group != "pegawai")
			redirect("dashboard-admin");
	}
	public function index()
	{
		$uri = $this->uri->segment('1');
		$data['page'] = 'dashboard.php';
		$data['segment'] = 'dashboard';
		$data['uri'] = $uri;
		$this->load->view('template/das', $data);
	}
	public function agenda()
	{
		$data['page'] = 'content/agenda.php';
		$data['content'] = 'Data Agenda';
		$data['judul_content'] = 'Agenda';
		$data['detail_content'] = 'E-kinerja Universitas Negeri Makassar';
		$this->load->view('template/das', $data);
	}
	public function agenda_detail()
	{
		$tabel = $this->input->post('tabel');
		$kode = $this->input->post('kd_form');
		$where = $this->input->post('where');
		// $sql = $this->db->query("SELECT a.*, b.kategori_rubrik FROM $tabel a INNER JOIN mst_kategori_rubrik b ON a.id_kategori_rubrik = b.id_kategori_rubrik WHERE $where='$kode'");
		$sql = $this->db->query("SELECT * FROM $tabel WHERE $where='$kode'");

		foreach ($sql->result() as $list) {
			# code...
			$result = array(
				'agenda' => $list->agenda,
				'nip_atasan' => $list->nip_atasan,
				'deskripsi' => $list->deskripsi,
				'tanggal' => $list->tanggal,
				'file' => $list->file,
			);
		}
		echo json_encode($result);
	}

	public function Laporan()
	{
		$data['page'] = 'content/laporan.php';
		$data['content'] = 'Data Laporan Harian';
		$data['judul_content'] = 'Laporan Harian';
		$data['detail_content'] = 'E-kinerja Universitas Negeri Makassar';
		$this->load->view('template/das', $data);
	}

	public function laporan_detail()
	{
		$tabel = $this->input->post('tabel');
		$kode = $this->input->post('kd_form');
		$where = $this->input->post('where');
		$sql = $this->db->query("SELECT * FROM $tabel WHERE $where='$kode'");

		foreach ($sql->result() as $list) {
			# code...
			$result = array(
				'laporan' => $list->laporan,
				'deskripsi' => $list->deskripsi,
				'id_agenda' => $list->id_agenda,
				'tanggal' => $list->tanggal,
				'file' => $list->file,
			);
		}
		echo json_encode($result);
	}
	public function Pegawai()
	{
		$data['page'] = 'content/pegawai.php';
		$data['content'] = 'Data Pegawai';
		$data['judul_content'] = 'Pegawai';
		$data['detail_content'] = 'E-kinerja Universitas Negeri Makassar';
		$this->load->view('template/das', $data);
	}
	public function Approve()
	{
		$data['page'] = 'content/approve.php';
		$data['content'] = 'Approve Agenda Pegawai';
		$data['judul_content'] = 'Approve Agenda';
		$data['detail_content'] = 'E-kinerja Universitas Negeri Makassar';
		$this->load->view('template/das', $data);
	}
	public function Password()
	{
		$nip = $this->session->userdata('nip');
		$queryPass  = $this->db->query("SELECT password FROM t_pegawai WHERE nip='$nip'");
		$password = $queryPass->row("password");
		$data['nip'] = $nip;
		$data['password'] = $password;
		$data['page'] = 'content/password.php';
		$data['content'] = 'Ubah Password';
		$data['judul_content'] = 'Password';
		$data['detail_content'] = 'E-kinerja Universitas Negeri Makassar';
		$this->load->view('template/das', $data);
	}
}
