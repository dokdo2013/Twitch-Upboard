<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';
$route['404_override'] = 'err404';
$route['translate_uri_dashes'] = FALSE;

$route['main/auth/social'] = 'auth/social';
$route['main/auth/login'] = 'auth/login';
$route['main/auth/logout'] = 'auth/logout';
$route['main/auth/register'] = 'auth/register';
$route['main/auth/term_agree'] = 'auth/term_agree';

// $route['main/mypage'] = 'mypage/profile';
// $route['main/mypage/profile'] = 'mypage/profile';
// $route['main/star'] = 'mypage/star'; 
// $route['main/mypage/star'] = 'mypage/star';

$route['main/api/(:any)'] = 'api/$1';

$route['main/error/(:any)'] = 'error/index/$1';

$route['main/term'] = 'page/term';
$route['main/privacy'] = 'page/privacy';

$route['main/service'] = 'service/index';
$route['main/service/support'] = 'service/support';

$route['main/board/list/(:num)'] = 'board/list/$1';
$route['main/board/view/(:num)'] = 'board/view/$1';

$route['main/search'] = 'search/index';

$route['main'] = 'main/index';

$route['(:any)'] = 'upbo/home/$1';
$route['(:any)/home'] = 'upbo/home/$1';
$route['(:any)/list'] = 'upbo/list/$1';
$route['(:any)/history'] = 'upbo/history/$1';
$route['(:any)/notice'] = 'upbo/notice/$1';
$route['(:any)/notice/(:num)'] = 'upbo/notice_view/$1/$2';

$route['(:any)/manage'] = 'manage/home/$1';
$route['(:any)/manage/home'] = 'manage/home/$1';
$route['(:any)/manage/access'] = 'manage/access/$1';
$route['(:any)/manage/upbo'] = 'manage/upbo/$1';
$route['(:any)/manage/stat'] = 'manage/stat/$1';

