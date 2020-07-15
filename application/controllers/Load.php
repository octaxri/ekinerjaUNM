<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Load extends CI_Controller
{

	function __construct()
	{

		parent::__construct();

		$this->load->model('ModelData', 'model');

		// $this->auth->cek_auth();
	}

	function get_data_pegawai()
	{
		$table = 't_pegawai';
		$column_order = array('nip', 'nama', 'jabatan', 'unit', 'jns_jabatan');
		$column_search = array('nip', 'nama', 'jabatan', 'unit', 'jns_jabatan');
		$order = array('unit' => 'asc');
		$list = $this->model->get_datatables($table, $column_order, $column_search, $order);
		$data = array();
		$no = $_POST['start'];
		$i = 1;
		foreach ($list as $post) {
			$no++;
			$nestedData['no'] = $no;
			$nestedData['nip'] = $post->nip;
			$nestedData['nama'] = $post->nama;
			$nestedData['jabatan'] = $post->jabatan;
			$nestedData['unit'] = $post->unit;
			$i++;
			$data[] = $nestedData;
		}
		$json_data = array(
			"draw"            => intval($this->input->post('draw')),
			"recordsTotal"    => $this->model->count_all($table),
			"recordsFiltered" => $this->model->count_filtered($table, $column_order, $column_search, $order),
			"data"            => $data
		);
		echo json_encode($json_data);
	}

	function get_data_agenda()
	{
		$nip = $this->session->userdata('nip');
		$table = 't_agenda';
		$column_order = array('nip', 'agenda', 'deskripsi', 'tanggal');
		$column_search = array('nip', 'agenda', 'deskripsi', 'tanggal');
		$order = array('agenda' => 'asc');
		$where = array('nip' => $nip);
		$list = $this->model->get_datatablesw($table, $column_order, $column_search, $order, $where);
		$data = array();
		$no = $_POST['start'];
		$i = 1;
		foreach ($list as $post) {
			$no++;
			$nestedData['no'] = $no;
			$nestedData['deskripsi'] = $post->deskripsi;
			// $nestedData['tanggal'] = $post->tanggal;
			$nestedData['tanggal'] = date("d-m-Y", strtotime($post->tanggal));
			$nestedData['agenda'] = $post->agenda;

			// <span class="badge badge-pill green"><i class="fas fa-user" aria-hidden="true"></i></span>
			$status = '<span class="badge badge-pill badge-warning"><i class="fas fa-spinner" aria-hidden="true"></i> Waiting</span>';

			if ($post->approval == '1') {

				$status = '<span class="badge badge-pill badge-primary"><i class="fas fa-check" aria-hidden="true"></i> Approve</span>';
			}

			if ($post->approval == '0') {

				$status = '<span class="badge badge-pill badge-danger"><i class="fas fa-times" aria-hidden="true"></i> Decline</span>';
			}
			$nestedData['status'] = $status;

			$nestedData['file'] = "<div class='text-center'> 

			<a href='assets/file/" . $post->file . "'  class='btn btn-blue btn-sm px-3 mb-1' target='_blank'> <i class='fas fa-eye'></i></a></div>";
			$nestedData['action'] = "<div class='text-center'> 
			<a onclick=\"edit('" . $post->id_agenda . "');return false;\" class='btn btn-default btn-sm px-3 mb-1'> <i class='fas fa-edit'></i></a>
			<a onclick=\"hapus('" . $post->id_agenda . "');return false;\" class='btn btn-warning px-3 btn-sm mb-1'> <i class='fas fa-trash-alt'></i></a>
			</div>";
			$i++;
			$data[] = $nestedData;
		}
		$json_data = array(
			"draw"            => intval($this->input->post('draw')),
			"recordsTotal"    => $this->model->count_allw($table, $where),
			"recordsFiltered" => $this->model->count_filteredw($table, $column_order, $column_search, $order, $where),
			"data"            => $data
		);
		echo json_encode($json_data);
	}
	function get_data_laporan()
	{
		$nip = $this->session->userdata('nip');
		$table = 't_agenda';
		$table2 = 't_laporan';
		$join = 'id_agenda';
		$select = 't_laporan.*, t_agenda.id_agenda, t_agenda.agenda';
		$column_order = array('t_laporan.laporan', 't_laporan.nip', 't_agenda.id_agenda', 't_laporan.deskripsi', 't_laporan.tanggal');
		$column_search = array('t_laporan.laporan', 't_laporan.nip', 't_agenda.id_agenda', 't_laporan.deskripsi', 't_laporan.tanggal');
		$order = array('t_laporan.laporan' => 'asc');
		$where = array('t_laporan.nip' => $nip);
		$list = $this->model->get_datatablesw_join($table, $table2, $join, $column_order, $column_search, $order, $where, $select);
		$data = array();
		$no = $_POST['start'];
		$i = 1;
		foreach ($list as $post) {
			$no++;
			$nestedData['no'] = $no;
			$nestedData['deskripsi'] = $post->deskripsi;
			// $nestedData['tanggal'] = $post->tanggal;
			$nestedData['tanggal'] = date("d-m-Y", strtotime($post->tanggal));
			$nestedData['agenda'] = $post->agenda;
			$nestedData['laporan'] = $post->laporan;

			$nestedData['file'] = "<div class='text-center'> 

			<a href='assets/file/" . $post->file . "'  class='btn btn-blue btn-sm px-3 mb-1' target='_blank'> <i class='fas fa-eye'></i></a></div>";
			$nestedData['action'] = "<div class='text-center'> 
			<a onclick=\"edit('" . $post->id_laporan . "');return false;\" class='btn btn-default btn-sm px-3 mb-1'> <i class='fas fa-edit'></i></a>
			<a onclick=\"hapus('" . $post->id_laporan . "');return false;\" class='btn btn-warning px-3 btn-sm mb-1'> <i class='fas fa-trash-alt'></i></a>
			</div>";
			$i++;
			$data[] = $nestedData;
		}
		$json_data = array(
			"draw"            => intval($this->input->post('draw')),
			"recordsTotal"    => $this->model->count_allw_join($table, $table2, $join, $where, $select),
			"recordsFiltered" => $this->model->count_filteredw_join($table, $table2, $join, $column_order, $column_search, $order, $where, $select),
			"data"            => $data
		);
		echo json_encode($json_data);
	}
	function get_antrian()
	{
		$value = $this->input->post('value', true);
		$tgl = $this->input->post('tgl', true);
		$table = 'kontrol_pasien';
		$table2 = 'pasien';
		$join = 'id_pasien';
		$select = 'pasien.nama,kontrol_pasien.*, jam_operasional.jam_mulai,jam_operasional.jam_akhir';
		$column_order = array(null, 'pasien.nama', 'kontrol_pasien.hasil', 'kontrol_pasien.`status`', 'jam_operasional.jam_mulai', 'jam_operasional.jam_akhir');
		$column_search = array('pasien.nama', 'kontrol_pasien.hasil', 'kontrol_pasien.`status`', 'jam_operasional.jam_mulai', 'jam_operasional.jam_akhir');
		$order = array('kontrol_pasien.id_kontrol' => 'asc');
		$where = array(
			'kontrol_pasien.status' => 1,
			'kontrol_pasien.id_klinik' => $value,
			'kontrol_pasien.tanggal_terapi' => $tgl
		);
		$list = $this->model->get_datatables_joinw($table, $table2, $join, $column_order, $column_search, $order, $select, $where);
		$data = array();
		$no = $_POST['start'];
		$i = 1;
		foreach ($list as $post) {
			$no++;
			$nestedData['no'] =  $no;
			$nestedData['nama'] = $post->nama;
			$nestedData['jam'] = $post->jam_mulai . " - " . $post->jam_akhir;
			$nestedData['no_urut'] = $post->no_urut;
			$qTerapis = $this->db->get_where('terapis', array('id_terapis' => $post->id_terapis));
			$namaTer = $qTerapis->row('nama');
			if ($this->session->userdata('userGroup') == "terapis" && $this->session->userdata('id') == $post->id_terapis) {
				$namaTer = $namaTer . "<div class='text-center'> 
                <a href='terapi.html?pasien=" . $post->id_pasien . "&kontrol=" . $post->id_kontrol . "' class='btn btn-default btn-sm px-3 mb-1'> <i class='fas fa-eye'></i></a>
                </div>";
			}
			$nestedData['terapis'] = $namaTer;
			if ($post->status_kontrol == 2) {
				$nestedData['status'] = "Tunggu";
			} else if ($post->status_kontrol == 3) {
				$nestedData['status'] = "Panggil";
			} else  if ($post->status_kontrol == 4) {
				$nestedData['status'] = "Selesai";
			} else
				$nestedData['status'] = $post->status_kontrol;

			$i++;
			$data[] = $nestedData;
		}
		$json_data = array(
			"draw"            => intval($this->input->post('draw')),
			"recordsTotal"    => $this->model->count_all_joinw($table, $table2, $join, $select, $where),
			"recordsFiltered" => $this->model->count_filtered_joinw($table, $table2, $join, $column_order, $column_search, $order, $select, $where),
			"data"            => $data
		);
		echo json_encode($json_data);
	}
	function get_approve()
	{
		$nip = $this->session->userdata('nip');
		$table = 't_agenda';
		$column_order = array('nama_pegawai', 'nip', 'agenda', 'deskripsi', 'tanggal');
		$column_search = array('nama_Pegawai', 'nip', 'agenda', 'deskripsi', 'tanggal');
		$order = array('agenda' => 'asc');
		$where = array('nip_atasan' => $nip);
		$list = $this->model->get_datatablesw($table, $column_order, $column_search, $order, $where);
		$data = array();
		$no = $_POST['start'];
		$i = 1;
		foreach ($list as $post) {
			$no++;
			$nestedData['no'] = $no;
			$nestedData['nama_pegawai'] = $post->nama_pegawai;
			$nestedData['deskripsi'] = $post->deskripsi;
			// $nestedData['tanggal'] = $post->tanggal;
			$nestedData['tanggal'] = date("d-m-Y", strtotime($post->tanggal));
			$nestedData['agenda'] = $post->agenda;

			// <span class="badge badge-pill green"><i class="fas fa-user" aria-hidden="true"></i></span>
			$status = '<span class="badge badge-pill badge-warning"><i class="fas fa-spinner" aria-hidden="true"></i> Waiting</span>';

			if ($post->approval == '1') {

				$status = '<span class="badge badge-pill badge-primary"><i class="fas fa-check" aria-hidden="true"></i> Approve</span>';
			}

			if ($post->approval == '0') {

				$status = '<span class="badge badge-pill badge-danger"><i class="fas fa-times" aria-hidden="true"></i> Decline</span>';
			}
			$nestedData['status'] = $status;

			$nestedData['file'] = "<div class='text-center'> 

			<a href='assets/file/" . $post->file . "'  class='btn btn-blue btn-sm px-3 mb-1' target='_blank'> <i class='fas fa-eye'></i></a></div>";
			$nestedData['action'] = "<div class='text-center'> 
			<a onclick=\"approve('" . $post->id_agenda . "');return false;\" class='btn btn-default btn-sm px-3 mb-1'><i class='fas fa-check'></i></a>
			<a onclick=\"decline('" . $post->id_agenda . "');return false;\" class='btn btn-warning px-3 btn-sm mb-1'><i class='fas fa-times'></i></a>
			</div>";
			$i++;
			$data[] = $nestedData;
		}
		$json_data = array(
			"draw"            => intval($this->input->post('draw')),
			"recordsTotal"    => $this->model->count_allw($table, $where),
			"recordsFiltered" => $this->model->count_filteredw($table, $column_order, $column_search, $order, $where),
			"data"            => $data
		);
		echo json_encode($json_data);
	}
}
