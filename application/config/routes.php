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
//$route['default_controller'] = 'Application';
$route['default_controller'] = 'application/opslogin';
$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;

//$route['login']  = "application/opslogin";
//$route['login']  = "sys/main_login";
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
$route['operations/client-catalog'] = "operations/index";
$route['operations/client-info']    = "operations/client_info";
$route['operations/branch-handle']    = "operations/branch_handle";
$route['operations/success_branch_assign']    = "operations/success_branch_assign";
$route['operations/los-report']    = "operations/los_report";
$route['operations/branch_centers/(:any)']    = "operations/branch_centers";
$route['operations/report']    = "operations/los_report_qa";
$route['operations/client-search']    = "operations/client_search";
$route['operations/client_upload']    = "operations/client_upload";
$route['operations/processor-pending']    = "operations/get_processor_pending";
$route['operations/client-rejected']    = "sys/client_rejected";

/* system settings */
$route['sys/registration-request'] = "sys/index";
$route['sys/tc_question/add']    = "sys/add_tc_questions";
$route['sys/tc_question/update']    = "sys/update_tc_questions";
$route['sys/assign_role_id/update_role_id']    = "sys/update_role_id";
$route['sys/assign_role_id/manage_resign']    = "sys/manage_resign";
$route['sys/assign_role_id/manage_resign/update_resigned_user']    = "sys/update_resigned_user";
$route['sys/add_role_id']    = "sys/add_role_id";
$route['sys/telle']    = "sys/tc_question";
$route['sys/assign_role_id']    = "sys/assign_roles";
$route['sys/approver_user'] = "sys/approver_user";


/* audit */
$route['audit/audit_extraction']    ="audit/index";
$route['audit/audit_import']    ="audit/import";
$route['audit/aud_extraction_assign']   ="audit/assign_roles";
$route['audit/assign_branch']   ="audit/branch_assign";
$route['audit/aud_client']   ="audit/aud_client";
$route['audit/assign_branch/update_aud_branch_handle']    = "audit/update_branch_assign";
$route['audit/add']    = "audit/branch_handle";
$route['audit/client/(:num)']    = "audit/client/$1";
$route['audit/client_info/(:any)']    = "audit/aud_info/$1";

/* hr */
//$route['hr/bulletin'] = 'hr/index';
$route['hr'] = "hr/index";

/* los */
$route['operations/los/(:any)/(:any)/(:any)'] = function ($date, $branchid, $groupid) {
    return 'operations/los_pending/' . $date . '/' . $branchid . '/' . $groupid . '/';
};

$route['operations/los/(:any)/(:any)/(:any)/(:any)'] = 'operations/los_info/$1/$2/$3/$4';

$route['operations/los/(:any)/(:any)/(:any)/(:any)/submit'] = "operations/los_laf_approval";


$route['get_los_laf_repeat_display/(:any)'] = 'Operations/get_los_laf_repeat_display/$1';
$route['get_los_laf_err/(:any)'] = 'Operations/get_los_laf_err/$1';
