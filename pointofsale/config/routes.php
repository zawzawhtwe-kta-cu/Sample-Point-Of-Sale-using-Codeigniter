<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'testing/sale';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['add_category']='testing/add_category';
$route['do_add_category']='testing/do_add_category';
$route['add_product']='testing/add_product';
$route['do_add_product']='testing/do_add_product';
$route['add_product_detail']='testing/add_product_detail';
$route['do_add_detail']='testing/do_add_detail';
$route['do_pick']='testing/do_pick';
$route['check_pay']='testing/print_data';
