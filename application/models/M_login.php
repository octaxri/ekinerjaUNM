<?php

defined('BASEPATH') or exit('No direct script access allowed');



class M_login extends CI_Model

{

    function __construct()

    {

        parent::__construct();

        // $this->sia = $this->load->database('sia', true);
    }



    function cek_login2($table, $where)

    {

        return $this->sia->get_where($table, $where);
    }

    function cek_login($table, $where)

    {

        return $this->db->get_where($table, $where);
    }

    function cek_data($table, $where)

    {

        return $this->db->get_where($table, $where);
    }

    function cek_jadwal()

    {

        $jadwalOn = 0;

        $query = $this->db->query("SELECT * FROM `tahun_akad` WHERE CURDATE() > MulaiBayar AND CURDATE() < DATE_ADD(BatasBayar, INTERVAL 1 DAY);");

        $jadwalOn = $query->num_rows();



        return $jadwalOn;
    }

    function cek_lokasi($username)

    {
        $lokasi = 0;
        $query = $this->db->query("SELECT Lokasi FROM program WHERE Nim = $username");
        $lokasi =  $query->num_rows();
        return $lokasi;
    }

    function CekBolehAkses($no_pendaftaran)

    {

        $result = 0;

        $query = $this->db->query("SELECT is_boleh_akses FROM `master_biodata_ukt` WHERE no_daftar = $no_pendaftaran");

        foreach ($query->result() as $lists) {

            # code...

            $result = $lists->is_boleh_akses;
        }



        return $result;
    }

    function cek_jadwal_Sanggah()

    {

        $jadwalOn = 0;

        $query = $this->db->query("SELECT * FROM `biodata_pengumuman` WHERE CURDATE() > tanggal_sanggah_awal AND CURDATE() < tanggal_sanggah_akhir;");

        $jadwalOn = $query->num_rows();

        return $jadwalOn;
    }

    function akses()

    {

        $noPendaftaran = $this->session->userdata('noPendaftaran');

        $where = array(

            'no_pendaftaran' => $noPendaftaran

        );

        $final = $this->db->get_where('biodata_ukt', $where);

        foreach ($final->result() as $finals) {

            $is_finalisasi = $finals->is_finalisasi;

            if ($is_finalisasi == '1')

                // echo "<script> window.history.forward();

                //         function noBack() {window.history.forward();

                //         </script>";

                redirect('verifikasi', 'refresh');
        }
    }
}







//    function cek_login2($table,$where)

//    {		

// 	return $this->sia->get_where($table,$where);

// }	
