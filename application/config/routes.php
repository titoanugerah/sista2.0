<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#DEFAULT STRUCTURE
$route['default_controller'] = 'account/dashboard';
$route['404_override'] = 'account/error404';
$route['translate_uri_dashes'] = FALSE;

#ACCOUNT AREA
$route['login'] = 'account/login';
$route['logout'] = 'account/logout';
$route['forgotPassword'] = 'account/forgotPassword';
$route['dashboard'] = 'account/dashboard';
$route['profile'] = 'account/profile';

#ADMIN AREA
$route['webConf'] = 'admin/webConf';
$route['account'] = 'admin/account';
$route['detailAccount/(:any)'] = 'admin/detailAccount/$1';
$route['theme'] = 'admin/theme';
$route['detailTheme/(:any)'] = 'admin/detailTheme/$1';

#MAHASISWA AREA
$route['statusKP'] = 'mahasiswa/statusKP';
$route['print/(:any)'] = 'mahasiswa/print/$1';

#DOSEN AREA
$route['kelayakanKP'] = 'dosen/kelayakanKP';
$route['accKKP/(:any)'] = 'dosen/accKKP/$1';

#TESTING PURPOSE
$route['test'] = 'welcome/test';
