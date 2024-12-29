<?php
require_once "model/CategoryModel.php";

class Controller {
    public static function displayCategories() {
        $categories = CategoryModel::getCategories();
        include "view/displayCategories.php";
    }

    public static function adminLogIn() {
        include "view/adminLogIn.php";
    }

    public static function prodajalecLogIn() {
        include "view/prodajalecLogIn.php";
    }

    public static function strankaLogIn() {
        include "view/strankaLogIn.php";
    }
}
?>
