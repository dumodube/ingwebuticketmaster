<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts/index'] ='posts/index';
$route['posts/create'] ='posts/create';
$route['posts/update'] ='posts/update';
$route['posts/(:any)']='posts/view/$1';
$route['posts'] ='posts/index';

$route['admin'] ='adminstrator/index';
$route['admin/login'] ='adminstrator/login';
$route['posts/admin'] ='posts/index';

$route['admin/view'] = 'posts/view';
$route['contacts'] ='contacts/view';
$route['home']='pages/view';
$route['default_controller'] = 'users/login';

$route['admin/categories'] = 'categories/index';
$route['admin/categories/create'] = 'categories/create';
$route['admin/categories/posts/(:any)'] = 'categories/posts/$1';

$route['users']='users/index';
$route['users/posts/(:any)']='users/post/$1';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
