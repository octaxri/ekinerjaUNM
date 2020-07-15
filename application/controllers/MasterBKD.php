<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterBKD extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('ModelData', 'model');
	}
	public function Perkuliahan()
	{
		$uri = $this->uri->segment('1');
		$data['page'] = 'masterdata/perkuliahan.php';
		$data['content'] = 'Data Rubrik Perkuliahan';
		$data['judul_content'] = 'Rubrik Perkuliahan';
		$data['detail_content'] = 'Data Master Rubrik Perkuliahan BKD';
		$data['segment'] = 'master-perkuliahan';
		$data['uri'] = $uri;
		$this->load->view('template/das', $data);
	}
	public function Perkuliahan_detail()
	{
		$tabel = $this->input->post('tabel');
		$kode = $this->input->post('kd_form');
		$where = $this->input->post('where');
		$sql = $this->db->query("SELECT a.*, b.kategori_rubrik FROM $tabel a INNER JOIN mst_kategori_rubrik b ON a.id_kategori_rubrik = b.id_kategori_rubrik WHERE $where='$kode'");

		foreach ($sql->result() as $list) {
			# code...
			$result = array(
				// 'id' => $kode,
				'rubrik' => $list->rubrik,
				'sks' => $list->sks,
				'keterangan' => $list->keterangan,
				'rumus' => $list->rumus_perhitungan,
				'kategori' => $list->kategori_rubrik,
			);
		}
		echo json_encode($result);
	}

	public function Pengajaran()
	{
		$data['page'] = 'masterdata/pengajaran.php';
		$data['content'] = 'Data Rubrik Pengajaran';
		$data['judul_content'] = 'Rubrik Pengajaran';
		$data['detail_content'] = 'Data Master Rubrik Pengajaran BKD';
		$this->load->view('template/das', $data);
	}
	public function Pengajaran_detail()
	{
		$tabel = $this->input->post('tabel');
		$kode = $this->input->post('kd_form');
		$where = $this->input->post('where');
		$sql = $this->db->query("SELECT * FROM $tabel WHERE $where='$kode'");

		foreach ($sql->result() as $list) {
			# code...
			$result = array(
				// 'id' => $kode,
				'rubrik' => $list->rubrik,
				'sks' => $list->sks,
				'keterangan' => $list->keterangan,
				'rumus' => $list->rumus_perhitungan,
			);
		}
		echo json_encode($result);
	}
	public function Penelitian()
	{
		$uri = $this->uri->segment('1');
		$data['page'] = 'masterdata/penelitian.php';
		$data['content'] = 'Data Rubrik Penelitian';
		$data['judul_content'] = 'Rubrik Penelitian';
		$data['detail_content'] = 'Data Master Rubrik Penelitian BKD';
		$data['segment'] = 'master-penelitian';
		$data['uri'] = $uri;
		$this->load->view('template/das', $data);
	}
	public function Penelitian_detail()
	{
		$tabel = $this->input->post('tabel');
		$kode = $this->input->post('kd_form');
		$where = $this->input->post('where');
		$sql = $this->db->query("SELECT a.*, b.kategori_rubrik FROM $tabel a INNER JOIN mst_kategori_rubrik b ON a.id_kategori_rubrik = b.id_kategori_rubrik WHERE $where='$kode'");

		foreach ($sql->result() as $list) {
			# code...
			$result = array(
				// 'id' => $kode,
				'rubrik' => $list->rubrik,
				'sks' => $list->sks,
				'keterangan' => $list->keterangan,
				'rumus' => $list->rumus_perhitungan,
				'kategori' => $list->kategori_rubrik,
			);
		}
		echo json_encode($result);
	}
	public function Pengabdian()
	{
		$uri = $this->uri->segment('1');
		$data['page'] = 'masterdata/pengabdian.php';
		$data['content'] = 'Data Rubrik Pengabdian';
		$data['judul_content'] = 'Rubrik Pengabdian';
		$data['detail_content'] = 'Data Master Rubrik Pengabdian BKD';
		$data['segment'] = 'master-pengabdian';
		$data['uri'] = $uri;
		$this->load->view('template/das', $data);
	}
	public function Pengabdian_detail()
	{
		$tabel = $this->input->post('tabel');
		$kode = $this->input->post('kd_form');
		$where = $this->input->post('where');
		$sql = $this->db->query("SELECT a.*, b.kategori_rubrik FROM $tabel a INNER JOIN mst_kategori_rubrik b ON a.id_kategori_rubrik = b.id_kategori_rubrik WHERE $where='$kode'");

		foreach ($sql->result() as $list) {
			# code...
			$result = array(
				// 'id' => $kode,
				'rubrik' => $list->rubrik,
				'sks' => $list->sks,
				'keterangan' => $list->keterangan,
				'rumus' => $list->rumus_perhitungan,
				'kategori' => $list->kategori_rubrik,
			);
		}
		echo json_encode($result);
	}

	public function Penunjang()
	{
		$data['page'] = 'masterdata/penunjang.php';
		$data['content'] = 'Data Rubrik Penunjang';
		$data['judul_content'] = 'Rubrik Penunjang';
		$data['detail_content'] = 'Data Master Rubrik Penunjang BKD';
		$this->load->view('template/das', $data);
	}
	public function Penunjang_detail()
	{
		$tabel = $this->input->post('tabel');
		$kode = $this->input->post('kd_form');
		$where = $this->input->post('where');
		$sql = $this->db->query("SELECT * FROM $tabel WHERE $where='$kode'");

		foreach ($sql->result() as $list) {
			# code...
			$result = array(
				// 'id' => $kode,
				'rubrik' => $list->rubrik,
				'detail' => $list->detail_rubrik,
				'sks' => $list->sks,
				'jabatan' => $list->jabatan,
				'keterangan' => $list->keterangan,
				'rumus' => $list->rumus_perhitungan,
			);
		}
		echo json_encode($result);
	}
	public function kategori_rubrik()
	{
		$data['page'] = 'masterdata/kategori_rubrik.php';
		$data['content'] = 'Data Kategori Rubrik';
		$data['judul_content'] = 'Rubrik Kategori Rubrik';
		$data['detail_content'] = 'Data Master kategori Rubrik BKD';
		$this->load->view('template/das', $data);
	}
	public function kategori_rubrik_detail()
	{
		$tabel = $this->input->post('tabel');
		$kode = $this->input->post('kd_form');
		$where = $this->input->post('where');
		$sql = $this->db->query("SELECT * FROM $tabel WHERE $where='$kode'");

		foreach ($sql->result() as $list) {
			# code...
			$result = array(
				'kategori_rubrik' => $list->kategori_rubrik,
			);
		}
		echo json_encode($result);
	}
}
