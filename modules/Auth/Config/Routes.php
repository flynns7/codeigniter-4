<?php
$routes->get('/', '\Modules\Auth\Controllers\Auth::index');
$routes->get('/panel', '\Modules\Auth\Controllers\Auth::index');
$routes->get('/login', '\Modules\Auth\Controllers\Auth::index');
$routes->get('/logout', '\Modules\Auth\Controllers\Auth::logout');
$routes->post('/panel/login/proses', '\Modules\Auth\Controllers\Auth::process');