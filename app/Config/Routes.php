<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->post('/auth/cek_login', 'Auth::cek_login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Admin::index');

// Manajemen User
$routes->get('/manajemen_user', 'Admin::manajemen_user');
$routes->get('/manajemen_user/tambah_user', 'Admin::tambah_user');
$routes->post('/tambah_user/save_user', 'Admin::save_user');
$routes->get('/manajemen_user/edit_user/(:segment)','Admin::edit_user/$1');
$routes->post('/edit_user/save_edit_user', 'Admin::save_edit_user');
$routes->get('/manajemen_user/delete_user/(:segment)','Admin::delete_user/$1');


// Manajemen dosen
$routes->get('/manajemen_dosen', 'Admin::manajemen_dosen');
$routes->get('/manajemen_dosen/tambah_dosen', 'Admin::tambah_dosen');
$routes->post('/tambah_dosen/save', 'Admin::save');
$routes->get('/manajemen_dosen/edit_dosen/(:segment)','Admin::edit_dosen/$1');
$routes->post('/edit_dosen/save_edit', 'Admin::save_edit');
$routes->get('/manajemen_dosen/delete_dosen/(:segment)','Admin::delete_dosen/$1');

// Manajemen Pertanyaan
$routes->get('/manajemen_pertanyaan', 'Admin::manajemen_pertanyaan');
$routes->get('/manajemen_pertanyaan/tambah_pertanyaan', 'Admin::tambah_pertanyaan');
$routes->post('/tambah_pertanyaan/save_pertanyaan', 'Admin::save_pertanyaan');
$routes->get('/manajemen_pertanyaan/edit_pertanyaan/(:segment)','Admin::edit_pertanyaan/$1');
$routes->post('/edit_pertanyaan/save_edit_pertanyaan', 'Admin::save_edit_pertanyaan');
$routes->get('/manajemen_pertanyaan/delete_pertanyaan/(:segment)','Admin::delete_pertanyaan/$1');

$routes->get('/surveyResults', 'Admin::surveyResults');
$routes->post('/surveyResults', 'Admin::surveyResults');
$routes->get('/manajemen_feedback', 'Admin::manajemen_feedback');
$routes->get('/manajemen_feedback/view_feedback/(:segment)','Admin::view_feedback/$1');
$routes->get('/manajemen_feedback/delete_feedback/(:segment)','Admin::delete_feedback/$1');

// User Akses
$routes->get('/home', 'User::index');
$routes->get('/dosen', 'User::dosen');
$routes->get('/profile_dosen/(:segment)', 'User::profile_dosen/$1');
$routes->get('/survey', 'User::survey');
$routes->get('/detail_survey/(:segment)', 'User::detail_survey/$1');
$routes->get('/profile', 'User::profile');
$routes->post('/submitAnswer', 'User::submitAnswer');


