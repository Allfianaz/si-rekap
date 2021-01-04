<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// HOMEPAGE
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');

// SUPERADMIN
$routes->get('/superadmin', 'Home::loginSuperAdmin');
$routes->get('/superadmin/dashboard', 'Administrator::dashboardSuper', ['filter' => 'authsuper']);
$routes->get('/superadmin/manage', 'Administrator::manageAcc', ['filter' => 'authsuper']);
$routes->get('/superadmin', 'Auth::logoutSuperAdmin');
$routes->get('/superadmin/addAdmin', 'Administrator::addAdmin');
$routes->get('/superadmin/addUser', 'Administrator::addUser');
$routes->get('/superadmin/manage/editAdmin/(:any)', 'Administrator::editAdmin/$1');
$routes->get('/superadmin/manage/editUser/(:any)', 'Administrator::editUser/$1');

// ADMIN
$routes->get('/admin/dashboard', 'Administrator::dashboardAdmin', ['filter' => 'authadmin']);
$routes->get('/admin/dashboard/reportDate', 'Administrator::reportDate', ['filter' => 'authadmin']);
$routes->get('/admin/dashboard/reportRangeDate', 'Administrator::reportRangeOfDate', ['filter' => 'authadmin']);
$routes->get('/admin/dashboard/reportDate/Meetingdetail/(:any)', 'Administrator::detail/meeting/$1', ['filter' => 'authadmin']);
$routes->get('/admin/dashboard/reportDate/Casedetail/(:any)', 'Administrator::detail/case/$1', ['filter' => 'authadmin']);
$routes->get('/admin/dashboard/reportDate/Sweepingdetail/(:any)', 'Administrator::detail/sweeping/$1', ['filter' => 'authadmin']);
$routes->get('/admin/dashboard/reportDate/Patroldetail/(:any)', 'Administrator::detail/patrol/$1', ['filter' => 'authadmin']);

// USER
$routes->get('/user/dashboard', 'Report::index', ['filter' => 'authuser']);

$routes->get('/user/report/meeting/detail/(:any)', 'Report::meeting/detail/$1', ['filter' => 'authuser']);
$routes->get('/user/report/meeting/edit/(:any)', 'Report::meeting/edit/$1', ['filter' => 'authuser']);
$routes->get('/user/report/meeting', 'Report::meeting/index', ['filter' => 'authuser']);
$routes->get('/user/report/case', 'Report::case/index', ['filter' => 'authuser']);
$routes->get('/user/report/case/save', 'Report::case/save', ['filter' => 'authuser']);
$routes->get('/user/report/case/edit/(:segment)', 'Report::case/edit/$1', ['filter' => 'authuser']);
$routes->get('/user/report/case/detail/(:any)', 'Report::case/detail/$1', ['filter' => 'authuser']);
$routes->get('/user/report/sweeping', 'Report::sweeping/index', ['filter' => 'authuser']);
$routes->get('/user/report/sweeping/detail/(:any)', 'Report::sweeping/detail/$1', ['filter' => 'authuser']);
$routes->get('/user/report/sweeping/edit/(:any)', 'Report::sweeping/edit/$1', ['filter' => 'authuser']);
$routes->get('/user/report/patrol', 'Report::patrol/index', ['filter' => 'authuser']);
$routes->get('/user/report/patrol/detail/(:any)', 'Report::patrol/detail/$1', ['filter' => 'authuser']);
$routes->get('/user/report/patrol/edit/(:any)', 'Report::patrol/edit/$1', ['filter' => 'authuser']);

$routes->get('/user/licensing/personelsCategory', 'Report::personelsCategory/index', ['filter' => 'authuser']);
$routes->get('/user/licensing/personelsCategory/edit/(:segment)', 'Report::personelsCategory/edit/$1', ['filter' => 'authuser']);

$routes->get('/user/perizinan/izinKeluar', 'Perizinan::izinKeluar/index', ['filter' => 'authuser']);
$routes->get('/user/perizinan/izinKeluar/edit/(:segment)', 'Perizinan::izinKeluar/edit/$1', ['filter' => 'authuser']);
$routes->get('/user/perizinan/izinPulang', 'Perizinan::izinPulang/index', ['filter' => 'authuser']);
$routes->get('/user/perizinan/izinPulang/edit/(:segment)', 'Perizinan::izinPulang/edit/$1', ['filter' => 'authuser']);
$routes->get('/user/perizinan/personilTerlambat', 'Perizinan::personilTerlambat/index', ['filter' => 'authuser']);
$routes->get('/user/perizinan/personilTerlambat/edit/(:segment)', 'Perizinan::personilTerlambat/edit/$1', ['filter' => 'authuser']);


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
