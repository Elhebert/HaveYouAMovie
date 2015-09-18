<?php

define('ROOT', dirname(__DIR__ ) . '/api');

require_once 'Lib/app.php';

App::load();

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

$slim = App::getInstance()->getSlim();
$slim->db = App::getInstance()->getDb();

$slim->get('/movie', function () use ($slim) {
    try {

    } catch(PDOException $e) {
        $slim->response()->setStatus(404);
        $slim->response()->headers->set('Content-Type', 'application/json');
        echo json_encode(["error" => ["text" => $e->getMessage()]]);
    }
});

$slim->get('/movie/:title', function ($title) use ($slim) {
    try {

    } catch(PDOException $e) {
        $slim->response()->setStatus(404);
        $slim->response()->headers->set('Content-Type', 'application/json');
        echo json_encode(["error" => ["text" => $e->getMessage()]]);
    }
});

$slim->post('/movie/:title', function ($title) use ($slim) {

});

$slim->put('/movie/:title', function ($title) use ($slim) {

});

$slim->get('/serie/', function () use ($slim) {
    try {

    } catch(PDOException $e) {
        $slim->response()->setStatus(404);
        $slim->response()->headers->set('Content-Type', 'application/json');
        echo json_encode(["error" => ["text" => $e->getMessage()]]);
    }
});

$slim->get('/serie/:title', function ($title) use ($slim) {
    try {

    } catch(PDOException $e) {
        $slim->response()->setStatus(404);
        $slim->response()->headers->set('Content-Type', 'application/json');
        echo json_encode(["error" => ["text" => $e->getMessage()]]);
    }
});

$slim->post('/serie/:title', function ($title) use ($slim) {

});

$slim->put('/serie/:title', function ($title) use ($slim) {

});

$slim->run();