<?php
session_start();
require_once("controller/MainController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");

// Get the path after index.php
$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

// ROUTER: Map URLs to controller methods
$urls = [
    "" => function () {
        MainController::displayCategories();
    },
    "adminLogIn" => function () {
        MainController::adminLogIn();
    },
    "prodajalecLogIn" => function () {
        MainController::prodajalecLogIn();
    },
    "strankaLogIn" => function () {
        MainController::strankaLogIn();
    }
];

// Routing logic
try {
    if (isset($urls[$path])) {
        $urls[$path]();
    } else {
        echo "404 - Page not found: '$path'";
    }
} catch (InvalidArgumentException $e) {
    echo "Invalid Argument: " . $e->getMessage();
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
}
?>
