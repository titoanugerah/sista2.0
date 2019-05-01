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
$route['error/(:any)'] = 'account/error/$1';

#ADMIN AREA
$route['webConf'] = 'admin/webConf';
$route['account'] = 'admin/account';
$route['detailAccount/(:any)'] = 'admin/detailAccount/$1';
$route['deleteAccount/(:any)'] = 'admin/deleteAccount/$1';
$route['itemList'] = 'admin/itemList';
$route['detailItem/(:any)'] = 'admin/detailItem/$1';
$route['recapOrder'] = 'admin/recapOrder';
$route['detailRecapOrder/(:any)'] = 'admin/detailRecapOrder/$1';

#WAREHOUSE AREA
$route['item'] = 'warehouse/item';
$route['itemDetail/(:any)'] = 'warehouse/itemDetail/$1';
$route['globalOrder'] = 'warehouse/globalOrder';

#DISTRIBUTION CENTER AREA
$route['order'] = 'dc/order';
$route['deleteOrder/(:any)'] = 'dc/deleteOrder/$1';
$route['orderHistory'] = 'dc/orderHistory';
$route['detailOrder/(:any)'] = 'dc/detailOrder/$1';
$route['confirmOrder/(:any)/(:any)/(:any)'] = 'dc/confirmOrder/$1/$2/$3';
$route['itemRecap'] = 'dc/itemRecap';

#PACKING AREA
$route['packingOrder'] = 'packing/packingOrder';
$route['detailPackingIn/(:any)'] = 'packing/detailPackingIn/$1';
$route['checklistItem/(:any)/(:any)'] = 'packing/checklistItem/$1/$2';
$route['detailPackingOrder/(:any)'] = 'packing/detailPackingOrder/$1';
$route['processPacking/(:any)/(:any)'] = 'packing/processPacking/$1/$2';
$route['checklistPacking/(:any)/(:any)/(:any)'] = 'packing/checklistPacking/$1/$2/$3';
#TESTING PURPOSE
$route['test'] = 'welcome/test';
