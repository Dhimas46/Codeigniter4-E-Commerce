<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
$cart = \Config\Services::cart();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/cek', 'Home::cek');
$routes->post('/home/add', 'Home::add');
$routes->post('/home/update', 'Home::update');
$routes->get('/home/clear', 'Home::clear');
$routes->get('/home/delete/(:any)', 'Home::delete/$1');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('profil/(:any)', 'Home::profil/$1');
$routes->put('profil/(:any)', 'Home::update_profil/$1');


$routes->get('/manage-user', 'Superadmin::get_user', ['filter' => 'role:superadmin']);
$routes->get('/superadmin/(:num)', 'Superadmin::detail_user/$1', ['filter' => 'role:superadmin']);
$routes->put('superadmin/(:any)', 'Superadmin::update_user/$1');

$routes->get('barang', 'Barang::index', ['filter' => 'role:admin, superadmin']);
$routes->get('add-barang', 'Barang::create', ['filter' => 'role:admin, superadmin']);
$routes->post('barang/add', 'Barang::save', ['filter' => 'role:superadmin, admin']);
$routes->get('detail-barang/(:any)', 'Barang::details/$1');
$routes->get('edit-barang/(:any)', 'Barang::edit/$1', ['filter' => 'role:admin, superadmin']);
$routes->put('barang/(:any)', 'Barang::update/$1', ['filter' => 'role:admin, superadmin']);
$routes->get('hapus-barang/(:segment)', 'Barang::destroy/$1', ['filter' => 'role:admin, superadmin']);

$routes->get('city', 'Cart::getCity');
$routes->get('getCost', 'Cart::getCost');

$routes->put('status/(:any)', 'Order::status/$1', ['filter' => 'role:admin, superadmin']);


$routes->get('kategori', 'Kategori::index');
$routes->post('kategori', 'Kategori::save', ['filter' => 'role:superadmin']);
$routes->put('kategori/(:any)', 'Kategori::update/$1', ['filter' => 'role:admin, superadmin']);
$routes->get('detail-product/(:any)', 'Product::details/$1');
$routes->get('kategori/(:any)', 'Kategori::edit/$1', ['filter' => 'role:admin, superadmin']);
$routes->get('kategori-hapus/(:segment)', 'Kategori::destroy/$1', ['filter' => 'role:superadmin, admin']);


$routes->get('transaksi', 'Order::get_transaksi' , ['filter' => 'role: admin, superadmin']);
$routes->get('transaksi/(:any)', 'Order::get/$1', ['filter' => 'role:user, admin, superadmin']);
$routes->post('order', 'Order::save', ['filter' => 'role:user, admin, superadmin']);
$routes->put('kategori/(:any)', 'Kategori::update/$1', ['filter' => 'role:admin, superadmin']);
$routes->get('detail-product/(:any)', 'Product::details/$1');
$routes->get('kategori/(:any)', 'Kategori::edit/$1', ['filter' => 'role:admin, superadmin']);
$routes->get('kategori-hapus/(:segment)', 'Kategori::destroy/$1', ['filter' => 'role:superadmin, admin']);

$routes->get('transaksi', 'Order::get_transaksi' , ['filter' => 'role: admin, superadmin']);
$routes->get('history/(:any)', 'History::get/$1', ['filter' => 'role:user, admin, superadmin']);

if ($cart->contents()==!null) {
  $routes->get('/cart', 'Cart::index', ['filter' => 'role:user, superadmin, admin']);
}else{
  return redirect()->to(base_url('/'));
}



/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
