<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// admin master data
$route['dashboard-admin'] = 'dashboard_admin';
$route['agenda'] = 'dashboard/agenda';
$route['agenda-detail'] = 'dashboard/agenda_detail';
$route['laporan-harian'] = 'dashboard/laporan';
$route['laporan-detail'] = 'dashboard/laporan_detail';
$route['pegawai'] = 'dashboard/pegawai';
$route['approve'] = 'dashboard/approve';
$route['password'] = 'dashboard/password';

//login
$route['logout'] = 'login/logout';
$route['login-action'] = 'login/login_action';

//master 
$route['hapus'] = 'master/hapus';
$route['approve-agenda'] = 'master/approval';
$route['decline-agenda'] = 'master/not_approval';

//Simpan
$route['simpan-agenda'] = 'simpan/agenda';
$route['simpan-laporan'] = 'simpan/laporan';
$route['simpan-password'] = 'simpan/ganti_password';


//datatable
$route['get-data-agenda'] = 'Load/get_data_agenda';
$route['get-data-laporan'] = 'Load/get_data_laporan';
$route['get-data-pegawai'] = 'Load/get_data_pegawai';
$route['get-approve'] = 'Load/get_approve';
