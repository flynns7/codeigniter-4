<?php
$routes->get('/panel', '\Modules\Auth\Controllers\Auth::index');
$routes->get('/login', '\Modules\Auth\Controllers\Auth::index');
$routes->get('/logout', '\Modules\Auth\Controllers\Auth::logout');
$routes->get('/process-login', '\Modules\Auth\Controllers\Auth::process');