<?php

// enables sessions for the entire app
session_start();

require_once("controller/JokesController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");

// dinamicno izracunamo pot ... path name vrne to kar sledi za http://localhost/netbeans/mvc/index.php/
$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

/* Uncomment to see the contents of variables
  var_dump(BASE_URL);
  var_dump(IMAGES_URL);
  var_dump(CSS_URL);
  var_dump($path);
  exit(); */

// ROUTER: defines mapping between URLS and controllers <--- NAS USMERJEVALNIK
// Asociativno polje, kjer so kljuci naslovi url, vrednosti pa so lambde (anonimne funkcije, ki se poklicejo v kolikor uporabnik obisce ta spletni naslov)
$urls = [
    "jokes" => function () {
        JokesController::index();
    },
    "jokes/add" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            JokesController::add();
        } else {
            JokesController::addForm();
        }
    },
    "jokes/edit" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            JokesController::edit();
        } else {
            JokesController::editForm();
        }
    },
    "jokes/delete" => function () {
        JokesController::delete();
    },
    "" => function () {
        ViewHelper::redirect(BASE_URL . "jokes");
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