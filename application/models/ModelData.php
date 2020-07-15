<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class ModelData extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function maxNomor($tabel, $field, $jns)
	{
		$query = $this->db->query("select concat('$jns',lpad(ifnull(max(right($field,7))+1,1),7,0)) as maxNo from $tabel");
		return $query->result();
	}
	public function save($data, $table)
	{
		$save = $this->db->insert($table, $data);
		if ($save) {
			return '1';
		} else {
			return '2';
		}
	}
	public function update($data, $table, $kode, $field)
	{
		$this->db->where($field, $kode);
		$this->db->update($table, $data);
		return '1';
	}
	public function update_user($data, $table, $kode, $field)
	{
		$this->db->where($field, $kode);
		$this->db->where('dgroup', '3');
		$this->db->update($table, $data);
		return '1';
	}
	function hapus($table, $where)
	{
		$this->db->where($where);
		$del = $this->db->delete($table);
		if ($del) {
			return '1';
		} else {
			return '2';
		}
	}
	function insertNotif($data)
	{
		if ($this->db->insert('t_notifikasi', $data)) {
			return true;
		} else {
			return false;
		}
	}
	function simpan($table, $pk, $data, $field, $action)
	{
		if ($action == 'tambah') {
			if ($this->db->insert($table, $data)) {
				return true;
			} else {
				return false;
			}
		} else {
			if ($this->db->update($table, $data, array($pk => $field))) {
				return true;
			} else {
				return false;
			}
		}
	}
	function get_harga_kirim()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=501&originType=city&destination=574&destinationType=subdistrict&weight=1700&courier=jne",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: 08d74b8f5a8bf90af2a48127e540f8f5"
			),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
	}
	function getData($table, $field, $group1)
	{
		$query = $this->db->query("select * from $table group by $group1 order by last_update desc");
		return $query->result();
	}
	function getDataPabrik($table, $field, $group1)
	{
		date_default_timezone_set("Asia/Makassar");
		$dnow = date("Y-m-d");
		$query = $this->db->query("select * from $table where batas_awal<='$dnow'and batas_akhir>='$dnow' and qty<>qty_out group by $group1 order by last_update desc");
		return $query->result();
	}
	function getDataWhere($table, $value)
	{
		$query = $this->db->query("select * from $table where jns_kategori='$value'");
		return $query->result();
	}
	function getDataWhere2($table)
	{
		$query = $this->db->query("select kategori,count(kd_form) as jum from $table group by kategori");
		return $query->result();
	}
	function getDataWhere3($table, $value)
	{
		$query = $this->db->query("select * from $table where id='$value'");
		return $query->result();
	}
	function getDataWhere4($table, $value, $field)
	{
		$query = $this->db->query("select * from $table where $field='$value'");
		return $query->result();
	}

	function getDataWhere5($table, $value, $field)
	{
		$query = $this->db->query("select * from $table where $field='$value'");
		return $query;
	}
	function getDataWhere6($table, $value, $field, $field2)
	{
		$query = $this->db->query("select $field2 as nama from $table where $field='$value'")->row('nama');
		return $query;
	}

	//mpdf2
	// function _mpdf2($judul = '', $isi = '', $lMargin = '', $rMargin = '', $font = 0, $orientasi = '', $footer = '')
	// {

	// 	ini_set("memory_limit", "512M");
	// 	$this->load->library('mpdf');
	// 	$this->mpdf->defaultheaderfontsize = 6;	/* in pts */
	// 	$this->mpdf->defaultheaderfontstyle = BI;	/* blank, B, I, or BI */
	// 	$this->mpdf->defaultheaderline = 1; 	/* 1 to include line below header/above footer */

	// 	$this->mpdf->defaultfooterfontsize = 6;	/* in pts */
	// 	$this->mpdf->defaultfooterfontstyle = BI;	/* blank, B, I, or BI */
	// 	$this->mpdf->defaultfooterline = 1;
	// 	$this->mpdf->SetLeftMargin = $lMargin;
	// 	$this->mpdf->SetRightMargin = $rMargin;
	// 	//$this->mpdf->SetHeader('SIMAKDA||');
	// 	$jam = date("H:i:s");
	// 	//$this->mpdf->SetFooter('Printed on @ {DATE j-m-Y H:i:s} |Simakda| Page {PAGENO} of {nb}');
	// 	$this->mpdf->SethtmlFooter($footer);

	// 	$this->mpdf->AddPage($orientasi, '', '', '', '', $lMargin, $rMargin);

	// 	if (!empty($judul)) $this->mpdf->writeHTML($judul);
	// 	$this->mpdf->writeHTML($isi);
	// 	$this->mpdf->Output();
	// }
	function number_format_short($n, $precision = 1)
	{
		if ($n < 900) {
			// 0 - 900
			$n_format = number_format($n, $precision);
			$suffix = '';
		} else if ($n < 900000) {
			// 0.9k-850k
			$n_format = number_format($n / 1000, $precision);
			$suffix = 'rb';
		} else if ($n < 900000000) {
			// 0.9m-850m
			$n_format = number_format($n / 1000000, $precision);
			$suffix = 'jt';
		} else if ($n < 900000000000) {
			// 0.9b-850b
			$n_format = number_format($n / 1000000000, $precision);
			$suffix = 'mlr';
		} else {
			// 0.9t+
			$n_format = number_format($n / 1000000000000, $precision);
			$suffix = 'trl';
		}
		// Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
		// Intentionally does not affect partials, eg "1.50" -> "1.50"
		if ($precision > 0) {
			$dotzero = '.' . str_repeat('0', $precision);
			$n_format = str_replace($dotzero, '', $n_format);
		}
		return $n_format . $suffix;
	}
	function getDataGroup($tabel, $index, $search, $uri, $filed0, $fields1, $fields2)
	{
		$cari = '';
		$w = '';
		if ($search) {
			$cari = "where $fields1 like '%$search%' or $fields2 like '%$search%'";
		}
		if ($uri) {
			$w = "where $filed0='$uri'";
			$cari = "and ($fields1 like '%$search%' or $fields2 like '%$search%')";
		}
		$db = $this->db->query("select $fields1 as kode, $fields2 as nama from $tabel $w $cari group by $fields1,$fields2 order by $index");
		$get_data = $db->row();
		if ($db->num_rows() > 0) {
			foreach ($db->result() as $a) {
				$realisasi = 0;
				$data[] = array(
					'id' => $a->kode,
					'text' => $a->nama,
				);
			}
			return $data;
		} else {
			return $data[] = array('id' => '0', 'text' => 'No Products Found');
		}
	}


	//get data table
	function get_datatables($table, $column_order, $column_search, $order)
	{
		$this->_get_datatables_query($table, $column_order, $column_search, $order);
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered($table, $column_order, $column_search, $order)
	{
		$this->_get_datatables_query($table, $column_order, $column_search, $order);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($table)
	{
		$this->db->from($table);
		return $this->db->count_all_results();
	}
	private function _get_datatables_query($table, $column_order, $column_search, $order)
	{
		$level = $this->session->userdata('dgroup');
		$id_user = $this->session->userdata('id_user');
		$uname = $this->session->userdata('uname');
		$this->db->from($table);
		$i = 0;
		foreach ($column_search as $item) {
			if (isset($_POST['search']['value'])) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if (count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($order)) {
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	//get data table where
	function get_datatablesw($table, $column_order, $column_search, $order, $fwhere)
	{
		$this->_get_datatables_queryw($table, $column_order, $column_search, $order, $fwhere);
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filteredw($table, $column_order, $column_search, $order, $fwhere)
	{
		$this->_get_datatables_queryw($table, $column_order, $column_search, $order, $fwhere);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_allw($table, $fwhere)
	{
		$this->db->from($table);
		$this->db->where($fwhere);
		return $this->db->count_all_results();
	}
	private function _get_datatables_queryw($table, $column_order, $column_search, $order, $fwhere)
	{
		$this->db->from($table);
		$this->db->where($fwhere);
		$i = 0;
		foreach ($column_search as $item) {
			if (isset($_POST['search']['value'])) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if (count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($order)) {
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	//get data table join
	function get_datatables_join($table, $table2, $join, $column_order, $column_search, $order)
	{
		$this->_get_datatables_query_join($table, $table2, $join, $column_order, $column_search, $order);
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered_join($table, $table2, $join, $column_order, $column_search, $order)
	{
		$this->_get_datatables_query_join($table, $table2, $join, $column_order, $column_search, $order);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_join($table, $table2, $join)
	{
		$this->db->from($table);
		$this->db->join($table2, $table2 . '.' . $join . ' = ' . $table . '.' . $join);
		if ($table2 == 'registrasi' || $table2 == 'm_toko') {
			$this->db->where($table . '.status', '0');
		}
		return $this->db->count_all_results();
	}
	private function _get_datatables_query_join($table, $table2, $join, $column_order, $column_search, $order)
	{
		$this->db->from($table);

		$this->db->join($table2, $table2 . '.' . $join . ' = ' . $table . '.' . $join);
		if ($table2 == 'registrasi') {
			$this->db->join('tbl_provinsi', 'tbl_provinsi.province_id=registrasi.provinsi');
			$this->db->join('tbl_kota', 'tbl_kota.city_id=registrasi.kota');
			$this->db->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan=registrasi.kecamatan');
			$this->db->where($table . '.status', '0');
		}
		if ($table2 == 'm_toko') {
			$this->db->select('m_toko.nm_toko,tbl_merchant_mitra.nm_merchant,tbl_merchant_mitra.kategori_produk,tbl_merchant_mitra.jns_kartu,tbl_merchant_mitra.promo_layanan,tbl_merchant_mitra.created_at,tbl_merchant_mitra.status,tbl_merchant_mitra.kd_form,tbl_merchant_mitra.gambar');
			$this->db->where($table . '.status', '0');
		}
		$i = 0;
		foreach ($column_search as $item) {
			if (isset($_POST['search']['value'])) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if (count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($order)) {
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	//get data table join where
	function get_datatablesw_join($table, $table2, $join, $column_order, $column_search, $order, $fwhere, $select)
	{
		$this->_get_datatables_queryw_join($table, $table2, $join, $column_order, $column_search, $order, $fwhere, $select);
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filteredw_join($table, $table2, $join, $column_order, $column_search, $order, $fwhere, $select)
	{
		// $this->_get_datatables_queryw($table, $column_order, $column_search, $order, $fwhere);
		$this->_get_datatables_queryw_join($table, $table2, $join, $column_order, $column_search, $order, $fwhere, $select);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_allw_join($table, $table2, $join, $fwhere, $select)
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->join($table2, $table2 . '.' . $join . ' = ' . $table . '.' . $join);
		$this->db->where($fwhere);
		return $this->db->count_all_results();
	}
	private function _get_datatables_queryw_join($table, $table2, $join, $column_order, $column_search, $order, $fwhere, $select)
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->join($table2, $table2 . '.' . $join . ' = ' . $table . '.' . $join);
		$this->db->where($fwhere);
		$i = 0;
		foreach ($column_search as $item) {
			if (isset($_POST['search']['value'])) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if (count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($order)) {
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	//get data table db2
	function get_datatables_db2($table, $column_order, $column_search, $order)
	{
		$this->_get_datatables_query_db2($table, $column_order, $column_search, $order);
		if ($_POST['length'] != -1)
			$this->db2->limit($_POST['length'], $_POST['start']);
		$query = $this->db2->get();
		return $query->result();
	}
	function count_filtered_db2($table, $column_order, $column_search, $order)
	{
		$this->_get_datatables_query_db2($table, $column_order, $column_search, $order);
		$query = $this->db2->get();
		return $query->num_rows();
	}

	public function count_all_db2($table)
	{
		$this->db2->from($table);
		return $this->db2->count_all_results();
	}
	private function _get_datatables_query_db2($table, $column_order, $column_search, $order)
	{
		$level = $this->session->userdata('dgroup');
		$id_user = $this->session->userdata('id_user');
		$this->db2->from($table);
		if ($level != '11') {
			$this->db2->where('url', 'Rudianto');
		}
		$i = 0;
		foreach ($column_search as $item) {
			if (isset($_POST['search']['value'])) {
				if ($i === 0) {
					$this->db2->group_start();
					$this->db2->like($item, $_POST['search']['value']);
				} else {
					$this->db2->or_like($item, $_POST['search']['value']);
				}
				if (count($column_search) - 1 == $i) //last loop
					$this->db2->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db2->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($order)) {
			$this->db2->order_by(key($order), $order[key($order)]);
		}
	}
	function  getBulanHuruf($bln)
	{
		switch ($bln) {
			case 1:
				return   "Januari";
				break;
			case 2:
				return   "Februari";
				break;
			case 3:
				return   "Maret";
				break;
			case 4:
				return   "April";
				break;
			case 5:
				return   "Mei";
				break;
			case 6:
				return   "Juni";
				break;
			case 7:
				return   "Juli";
				break;
			case 8:
				return   "Agustus";
				break;
			case 9:
				return   "September";
				break;
			case 10:
				return  "Oktober";
				break;
			case 11:
				return  "November";
				break;
			case 12:
				return  "Desember";
				break;
		}
	}
}
