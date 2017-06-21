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
$route['default_controller'] = 'Application';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['opslogin']  = "application/opslogin";
$route['aulogin']     = "application/aulogin";
$route['forgotpassword']     = "application/fpassword";
$route['confirmation']     = "application/confirmation";

$route['signup']    = "application/signup";
$route['success']   = "application/success";
$route['dashboard'] = "application/dashboard";
$route['aud_dashboard'] = "application/audDashboard";
$route['logout']    = "application/logout";

$route['confirm_password']    = "application/confirm_password";
$route['success_password']    = "application/success_password";

/* profile */
$route['profile/userinfo']   = "profile/index";
$route['profile/changepass'] = "profile/changepass";

/* operations */
$route['operations/client_catalog'] = "operations/index";
$route['operations/client_info']    = "operations/client_info";
$route['operations/branch_handle']    = "operations/branch_handle";
$route['operations/success_branch_assign']    = "operations/success_branch_assign";
$route['operations/los_report']    = "operations/los_report";
$route['operations/client_search']    = "operations/client_search";
$route['operations/processor_pending']    = "operations/get_processor_pending";

/* system settings */
$route['sys/registration_request'] = "sys/index";
$route['sys/tc_question/add']    = "sys/add_tc_questions";
$route['sys/tc_question/update']    = "sys/update_tc_questions";
$route['sys/telle']    = "sys/tc_question";
$route['sys/client_rejected']    = "sys/client_rejected";
$route['sys/assign_role_id']    = "sys/assign_roles";
//$route['sys/approver_user'] = "sys/approver_user";


/* audit */
$route['audit/audit_extraction']="audit/index";
$route['audit/audit_import']="audit/import";

/* hr */
//$route['hr/bulletin'] = 'hr/index';
$route['hr'] = "hr/index";

/* los */
$route['operations/los/(:any)/(:any)/(:any)'] = function ($date, $branchid, $groupid) {
    return 'operations/los_pending/' . $date . '/' . $branchid . '/' . $groupid . '/';
};

$route['operations/los/(:any)/(:any)/(:any)/(:any)'] = 'operations/los_info/$1/$2/$3/$4';

$route['operations/los/(:any)/(:any)/(:any)/(:any)/submit'] = "operations/los_laf_approval";

