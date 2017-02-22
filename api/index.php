<?php

require 'vendor/autoload.php';
require 'dbconn.php';
require 'config.php';

$app = new \Slim\App;

/* Halaman Depan */

$app->get('/', 'get_employee');

/* Mencari Pegawai Berdasarkan ID */

$app->get('/employee/{id}', function($request, $response, $args) {
    get_employee_id($args['id']);
});

/* Menambahkan Pegawai */

$app->post('/employee_add', function($request, $response, $args) {
    add_employee($request->getParsedBody());
});

/* Mengubah atau mengedit pegawai */

$app->put('/update_employee', function($request, $response, $args) {
    update_employee($request->getParsedBody());
});

/* Hapus pegawai */

$app->delete('/delete_employee', function($request, $response, $args) {
    delete_employee($request->getParsedBody());
});

$app->run();

?>