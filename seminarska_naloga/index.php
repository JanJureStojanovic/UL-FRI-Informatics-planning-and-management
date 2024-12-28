<?php

// enables sessions for the entire app
session_start();

require_once("controller/Controller.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");

// dynamically calculate path
$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

$urls = [
    "admin/login" => function () {
        projectController::loginForm();
    },
    "admin/register" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            projectController::registerAdmin();
        } else {
            projectController::registerForm();
        }
    },
    "items/add" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            projectController::addItem();
        } else {
            projectController::addItemForm();
        }
    },
    "items/view" => function () {
        projectController::viewItems();
    },
    "" => function () {
        ViewHelper::redirect(BASE_URL . "admin/login");
    },
];

try {
    if (isset($urls[$path])) {
        $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (InvalidArgumentException $e) {
    ViewHelper::error404();
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
}