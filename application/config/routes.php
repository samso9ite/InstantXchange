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
$route['ajax-register'] 		= "home/ajax_register";
$route['home']					= "home/welcome";
$route['profile']				= "home/profile";
$route['logout']				= "home/logout";
$route['login']					= "home/login";
$route['register']				= "home/register";
$route['new-trade']				= "home/new_trade";
$route['trade/(:any)']			= "home/trade/$1";
$route['upload-image']			= "home/upload_image";
$route['initiate-trade'] 		= "home/initiate_trade";
$route['trade-details/(:any)']	= "home/trade_details/$1";
$route['trade-bitcoin-details/(:any)']	= "home/trade_bitcoin_details/$1";
$route['testimony']				= "home/testimony";
$route['ajax-login']			= "home/ajax_login";
$route['privacy-policy']		= "home/privacy";
$route['contact']				= "home/contact";
$route['new-trade-bitcoin']		= "home/new_bitcoin_trade";
$route['trade-bitcoin']         = "home/trade_bitcoin";
$route['profile-update']         = "home/profile_update";
$route['update-account']         = "home/update_account";


$route['default_controller'] 	= 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] 	= TRUE;
