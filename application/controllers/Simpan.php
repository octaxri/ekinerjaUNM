<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('ModelData', 'model');
	}

	public function agenda()
	{
		$id =  $this->input->post('id_agenda', true);
		$nip =  $this->session->userdata('nip');
		$nama =  $this->session->userdata('nama');
		$deskripsi =  $this->input->post('deskripsi', true);
		$agenda = $this->input->post('agenda', true);
		$tanggal = $this->input->post('tgl', true);
		$atasan = $this->input->post('atasan', true);
		date_default_timezone_set("Asia/Makassar");
		$c_date = date("Y-m-d H:i:s");
		$u_date = date("Y-m-d H:i:s");

		$data = array(
			'id_agenda' => $id,
			'nip' => $nip,
			'nip_atasan' => $atasan,
			'nama_pegawai' => $nama,
			'deskripsi' => $deskripsi,
			'agenda' => $agenda,
			'tanggal' => date("Y-m-d", strtotime($tanggal)),
			'approval' => "2",
			'u_date' => $u_date,
		);
		if ($id == 0) {
			$doc = $this->uploadfile("Agenda");
			$data["file"] = $doc;
			$data["c_date"] = $c_date;
			$q = $this->db->insert("t_agenda", $data);
		} else {
			$file = $this->input->post('file', true);
			$doc = $this->uploadfile("Agenda");
			if ($doc != "") {
				unlink('assets/images/' . $file);
				$data["file"] = $doc;
			}
			$this->db->where("id_agenda", $id);
			$q = $this->db->update("t_agenda", $data);
		}
		if ($q) {
			$return = array(
				'status'	=> true,
				'message'	=> 'Data berhasil disimpan..',
			);
		} else {
			$return = array(
				'status'	=> false,
				'message'	=> 'Terjadi kesalahan..',
			);
		}
		echo json_encode($return);
	}
	public function laporan()
	{
		$id =  $this->input->post('id_laporan', true);
		$nip =  $this->session->userdata('nip');
		$nama =  $this->session->userdata('nama');
		$deskripsi =  $this->input->post('deskripsi', true);
		$laporan = $this->input->post('laporan', true);
		$agenda = $this->input->post('agenda', true);
		$tanggal = $this->input->post('tgl', true);
		date_default_timezone_set("Asia/Makassar");
		$c_date = date("Y-m-d H:i:s");
		$u_date = date("Y-m-d H:i:s");

		$data = array(
			'id_agenda' => $id,
			'nip' => $nip,
			'id_agenda' => $agenda,
			'nama_pegawai' => $nama,
			'deskripsi' => $deskripsi,
			'laporan' => $laporan,
			'tanggal' => date("Y-m-d", strtotime($tanggal)),
			'u_date' => $u_date,
		);
		if ($id == 0) {
			$doc = $this->uploadfile("Laporan");
			$data["file"] = $doc;
			$data["c_date"] = $c_date;
			$q = $this->db->insert("t_laporan", $data);
		} else {
			$file = $this->input->post('file', true);
			$doc = $this->uploadfile("Laporan");
			if ($doc != "") {
				// unlink('assets/images/' . $file);
				$data["file"] = $doc;
			}
			$this->db->where("id_laporan", $id);
			$q = $this->db->update("t_laporan", $data);
		}
		if ($q) {
			$return = array(
				'status'	=> true,
				'message'	=> 'Data berhasil disimpan..',
			);
		} else {
			$return = array(
				'status'	=> false,
				'message'	=> 'Terjadi kesalahan..',
			);
		}
		echo json_encode($return);
	}

	public function ganti_password()
	{
		$nip = $this->input->post('nip', true);
		$passwordBaru = $this->input->post('passwordBaru', true);
		date_default_timezone_set("Asia/Makassar");
		$data = array(
			'password' => $passwordBaru
		);
		$this->db->where("nip", $nip);
		$q = $this->db->update("t_pegawai", $data);

		if ($q) {
			$return = array(
				'status'	=> true,
				'message'	=> 'Password Behasil Duganti',
			);
		} else {
			$return = array(
				'status'	=> false,
				'message'	=> 'Terjadi kesalahan..',
			);
		}
		echo json_encode($return);
	}

	public function uploadfile($kode_file)
	{
		$AlamatFile = '';
		$kode = str_replace(' ', '-', $kode_file);
		$nip =  $this->session->userdata('nip');
		$folder = 'assets/file/';
		if (!empty($_FILES['file']['name'])) {
			$temp = explode(".", $_FILES["file"]["name"]);
			$newfilename = $kode . "-" . $nip . "-" . round(microtime(true)) . '.' . end($temp);
			if (file_exists($folder . "/" . $newfilename) >= 1) {
				//hapus file
				$this->deleteFile($folder . "/", $newfilename);
			}
			$gambar = $this->_do_upload2('file', $folder, $newfilename);
			$AlamatFile = $newfilename;
		}
		return $AlamatFile;
	}
	public function _do_upload2($nama, $folder, $newfilename)
	{
		$config['upload_path'] = $folder;
		$config['allowed_types'] = '|jpg|png|jpeg|pdf';
		$config['max_size'] = 1024;
		$config['max_width'] = 0;
		$config['max_height'] = 0;
		$config['file_name'] = $newfilename;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload($nama)) {
			$status = array("pesan" => 'inputerror : ' . $nama . ': ' . $this->upload->display_errors('', ''), 'getStatus' => 0);
			echo json_encode($status);
		}
		return $this->upload->data('file_name');
	}

	public function deleteFile($path, $fileName)
	{
		unlink($path . $fileName);
	}
}
