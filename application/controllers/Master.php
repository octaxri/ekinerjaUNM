<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Master extends CI_Controller
{

	function __construct()

	{

		parent::__construct();

		$this->load->model('ModelData', 'model');

		// $this->auth->cek_auth();
	}

	public function index()
	{

		$a['page'] = "";

		$this->load->view('template', $a);
	}

	function input_kupon()
	{

		$a['titel']  = 'Input Kupon';

		$a['footer'] = date('Y') . " Malltronik";

		$a['page'] = "content/suplier/master/kupon";

		$this->load->view('index', $a);
	}

	function master_landing_page()
	{

		$a['titel']  = 'Master Landing Page';

		$a['data'] = $this->db->get('landing_page');

		$a['footer'] = date('Y') . " Malltronik";

		$a['page'] = "content/suplier/master/landing-page";

		$this->load->view('index', $a);
	}

	function suplier_slide()
	{

		$a['titel']  = 'Master Landing Page';

		$a['data'] = $this->db->get('landing_page');

		$a['footer'] = date('Y') . " Malltronik";

		$a['page'] = "content/suplier/master/suplier-slide";

		$this->load->view('index', $a);
	}

	function getKode()
	{

		$tabel = $this->input->post('tabel');

		$field = $this->input->post('field');

		$uname = $this->session->userdata('id_user');

		$as = $this->input->post('as');

		$sql = $this->db->query("select concat('$uname','-','$as',ifnull(lpad(max(right($field,5))+1,5,0),'00001')) as max_kode from $tabel");

		$result = array();

		$a = 0;

		foreach ($sql->result_array() as $resulte) {

			$result = array(

				'id'		 => $a,

				'kode'		 => $resulte['max_kode']

			);

			$a++;
		}

		echo json_encode($result);
	}

	function hapus()
	{

		$tabel = $this->input->post('tabel');

		$kode = $this->input->post('kd_form');

		$where = $this->input->post('where');

		// $file = $this->db->query("SELECT `file` FROM $tabel WHERE $where='$kode'");
		// if ($file->num_rows() > 0) {
		// 	$cfile = $file->row('foto');
		// 	unlink('assets/file/' . $cfile);
		// 	$this->db->query("delete from $tabel where $where='$kode'");
		// }

		$sql = $this->db->query("delete from $tabel where $where='$kode'");

		echo '1';
	}
	function approval()
	{

		$tabel = $this->input->post('tabel');

		$kode = $this->input->post('kd_form');

		$where = $this->input->post('where');

		$sql = $this->db->query("UPDATE $tabel SET approval ='1' WHERE $where='$kode'");

		echo '1';
	}
	function not_approval()
	{

		$tabel = $this->input->post('tabel');

		$kode = $this->input->post('kd_form');

		$where = $this->input->post('where');

		$sql = $this->db->query("UPDATE $tabel SET approval ='0' WHERE $where='$kode'");

		echo '1';
	}

	function editApproval()
	{

		$tabel = $this->input->post('tabel');

		$kode = $this->input->post('kd_form');

		$where = $this->input->post('where');

		$sql = $this->db->query("UPDATE $tabel SET STATUS_APPROVAL='0' WHERE $where='$kode'");

		echo '1';
	}

	function upd_kategori()
	{

		$name = $this->input->post('name', true);

		$value = $this->input->post('value', true);

		$pk = $this->input->post('pk', true);

		$tabel = $this->input->get('tabel', true);

		$upd = $this->db->query("update $tabel set $name='$value' where kd_form='$pk'");

		if ($upd) {

			echo 'Berhasil';
		}
	}

	function get_data()
	{

		$tabel = $this->input->post('tabel', true);

		$kd_form = $this->input->post('kd_form', true);

		switch ($tabel) {

			case 'tbl_kategori':

				$get_que = $this->model->getDataWhere5($tabel, $kd_form, 'kd_form');

				foreach ($get_que->result() as $a) {

					$data = array(

						"nm_kategori" => $a->nm_kategori,

						"kd_form"	  => $a->kd_form

					);
				}

				echo json_encode($data);

				break;

			case 'sub_kat_produk':

				$get_que = $this->model->getDataWhere5($tabel, $kd_form, 'kd_form');

				foreach ($get_que->result() as $a) {

					$nm_kat = $this->db->query("select nm_kategori from kategori_produk where kd_form ='$a->kd_kat_produk'")->row('nm_kategori');

					$data = array(

						"nm_subkategori" => $a->nm_sub_kategori,

						"nm_kat" => $nm_kat,

						"id_kat" => $a->kd_kat_produk,

						"kd_form"	  => $a->kd_form

					);
				}

				echo json_encode($data);

				break;

			case 'tbl_merek':

				$get_que = $this->model->getDataWhere5($tabel, $kd_form, 'kd_form');

				foreach ($get_que->result() as $a) {

					$data = array(

						"nm_merek" => $a->nm_merek,

						"kd_form"	  => $a->kd_form

					);
				}

				echo json_encode($data);

				break;

			case 'tbl_kupon':

				$get_que = $this->model->getDataWhere5($tabel, $kd_form, 'kd_form');

				foreach ($get_que->result() as $a) {

					$data = array(

						"kd_form" => $a->kd_form,

						"nm_kupon" => $a->nm_kupon,

						"potongan"	  => $a->potongan,

						"jns_kupon"	  => $a->jns_kupon

					);
				}

				echo json_encode($data);

				break;

			case 'tbl_rekening':

				$get_que = $this->model->getDataWhere5($tabel, $kd_form, 'kd_form');

				foreach ($get_que->result() as $a) {

					$data = array(

						"kd_form" => $a->kd_form,

						"nm_bank" => $a->nm_bank,

						"nm_pemilik_bank"	  => $a->nm_pemilik_bank,

						"no_rekening_bank"	  => $a->no_rekening_bank

					);
				}

				echo json_encode($data);

				break;

			case 'kategori_produk':

				$get_que = $this->model->getDataWhere5($tabel, $kd_form, 'kd_form');

				foreach ($get_que->result() as $a) {

					$data = array(

						"kd_form" => $a->kd_form,

						"nm_kategori" => $a->nm_kategori,

						"gambar"	  => $a->gambar

					);
				}

				echo json_encode($data);

				break;

			case 'tbl_produk':

				$get_que = $this->model->getDataWhere5($tabel, $kd_form, 'kd_form');

				foreach ($get_que->result() as $a) {

					$nm_kat = $this->db->query("select nm_kategori from kategori_produk where kd_form ='$a->kd_kategori'")->row('nm_kategori');

					$nm_subkat = $this->db->query("select nm_sub_kategori from sub_kat_produk where kd_form ='$a->kd_subkategori'")->row('nm_sub_kategori');

					$nm_merek = $this->db->query("select nm_merek from tbl_merek where kd_form ='$a->kd_merek'")->row('nm_merek');

					$data = array(

						"kd_form"	=> $a->kd_form,

						"nm_produk" => $a->nm_produk,

						"id_merek" => $a->kd_merek,

						"nm_merek" => $nm_merek,

						"id_kat" => $a->kd_kategori,

						"nm_kat" => $nm_kat,

						"nm_subkat" => $nm_subkat,

						"id_subkat" => $a->kd_subkategori,

						"qty" => $a->qty,

						"min_qty" => $a->min_qty,

						"berat" => $a->berat,

						"deskripsi" => $a->deskripsi,

						"keterangan" => $a->keterangan,

						"tgl_input" => $a->tgl_input,

						"harga_jual" => intval($a->harga),

						"harga_member" => intval($a->harga_member),

						"harga_modal" => intval($a->harga_modal),

						"video" => $a->video,

						"jns_barang" => $a->jenis_barang,

						"jns_kirim" => $a->jenis_kirim,

						"gambar1" => $a->gambar1,

						"gambar2" => $a->gambar2,

						"gambar3" => $a->gambar3,

						"gambar4" => $a->gambar4,

						"gambar5" => $a->gambar5,

						"gambar6" => $a->gambar6,

					);
				}

				echo json_encode($data);

				break;
		}
	}

	function master_rekening()
	{

		$a['titel']  = 'Input Master Rekening';

		$a['footer'] = date('Y') . " Malltronik";

		$a['page'] = "content/suplier/master/rekening";

		$this->load->view('index', $a);
	}
}
