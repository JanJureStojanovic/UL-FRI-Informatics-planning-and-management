<?php

// enables sessions for the entire app
session_start();

require_once("controller/Controller.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

// ROUTER: defines mapping between URLS and controllers
$urls = [
    // Route for the main page
    "mainPage" => function () {
        include "view/displayCategories.php";
    },

    // Route for admin login
    "mainPage/adminLogIn" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            Controller::adminLogIn();
        } else {
            Controller::adminLogInForm();
        }
    },

    // Route for prodajalec login (assuming prodajalec is a user type)
    "mainPage/prodajalecLogIn" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            Controller::prodajalecLogIn();
        } else {
            Controller::prodajalecLogInForm();
        }
    },

    // Route for stranka login
    "mainPage/strankaLogIn" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            Controller::strankaLogIn();
        } else {
            Controller::strankaLogInForm();
        }
    },

    // Default route when no specific path is found (redirect to main page)
    "" => function () {
        ViewHelper::redirect(BASE_URL . "mainPage");
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
