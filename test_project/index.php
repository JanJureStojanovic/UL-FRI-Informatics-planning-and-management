<?php

// enables sessions for the entire app
session_start();

require_once("controller/Controller.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

/*
require_once("model/DB.php");

try {
    $db = DBInit::getInstance();
    echo "Database connection successful!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
*/

// ROUTER: defines mapping between URLS and controllers
$urls = [
    // Route for the main page
    "mainPage" => function () {
        MainController::mainPage();
    },

    // Route for admin login
    "mainPage/adminLogIn" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            MainController::adminLogIn();
        } else {
            MainController::adminLogInForm();
        }
    },

    // Route for prodajalec login (assuming prodajalec is a user type)
    "mainPage/prodajalecLogIn" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            MainController::prodajalecLogIn();
        } else {
            MainController::prodajalecLogInForm();
        }
    },

    // Route for stranka login
    "mainPage/strankaLogIn" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            MainController::strankaLogIn();
        } else {
            MainController::strankaLogInForm();
        }
    },

    // Default route when no specific path is found (redirect to main page)
    "" => function () {
        ViewHelper::redirect(BASE_URL . "mainPage");
    },

    "mainPage/Shoes" => function () {
        ItemController::displayItemsByCategory('Shoes');
    },

    "mainPage/Clothes" => function () {
        ItemController::displayItemsByCategory('Clothes');
    },

    "mainPage/Accessories" => function () {
        ItemController::displayItemsByCategory('Accessories');
    },
    
    "mainPage/Gifts" => function () {
        ItemController::displayItemsByCategory('Gifts');
    },
];

try {
    foreach ($urls as $urlPattern => $route) {
        // Match the URL pattern and pass matched values
        if (preg_match("~^$urlPattern$~", $path, $matches)) {
            array_shift($matches);  // Remove the full match (the URL itself)
            call_user_func_array($route, $matches);
            break;
        }
    }
} catch (InvalidArgumentException $e) {
    ViewHelper::error404();
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
}
?>
