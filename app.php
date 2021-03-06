<?php

require __DIR__ . "/vendor/autoload.php";

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$app = new Slim\App;

require __DIR__ . "/config/logger.php";
require __DIR__ . "/config/view.php";
#require __DIR__ . "/config/database.php";

$app->get("/", function ($request, $response, $arguments) {
    return $response->write($this->view->render("index"));
});

$app->get("/hello/{name}", function ($request, $response, $arguments) {
    return $response->write($this->view->render("hello", $arguments));
});

$app->run();