<?php

require_once("model/projectDB.php");
require_once("viewHelper.php");

class projectController {

    public static function loginForm($values = ["email" => "", "password" => ""]) {
        echo ViewHelper::render("view/adminLogIn.php", $values);
    }

    public static function registerForm($values = [
        "first_name" => "",
        "last_name" => "",
        "email" => "",
        "password" => ""
    ]) {
        echo ViewHelper::render("view/adminRegister.php", $values);
    }

    public static function registerAdmin() {
        $data = filter_input_array(INPUT_POST, [
            'first_name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'last_name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'email' => FILTER_VALIDATE_EMAIL,
            'password' => FILTER_SANITIZE_STRING
        ]);

        if (self::checkValues($data)) {
            projectDB::insertAdmin($data);
            ViewHelper::redirect(BASE_URL . "admin/login");
        } else {
            echo ViewHelper::render("view/adminRegister.php", $data);
        }
    }

    public static function addItemForm($values = ["item_name" => "", "price" => ""]) {
        echo ViewHelper::render("view/addItem.php", $values);
    }

    public static function addItem() {
        $data = filter_input_array(INPUT_POST, [
            'item_name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'price' => FILTER_VALIDATE_FLOAT
        ]);

        if (self::checkValues($data)) {
            projectDB::insertItem($data);
            ViewHelper::redirect(BASE_URL . "items/view");
        } else {
            echo ViewHelper::render("view/addItem.php", $data);
        }
    }

    public static function viewItems() {
        echo ViewHelper::render("view/items.php", [
            "items" => projectDB::getAllItems()
        ]);
    }

    private static function checkValues($input) {
        if (empty($input)) {
            return FALSE;
        }

        $result = TRUE;
        foreach ($input as $value) {
            $result = $result && $value != false;
        }
        return $result;
    }
}
