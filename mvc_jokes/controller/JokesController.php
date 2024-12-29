<?php

require_once("model/JokeDB.php");
require_once("ViewHelper.php");

class JokesController {

    public static function index() {
        $rules = [
            "id" => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1]
            ]
        ];

        $data = filter_input_array(INPUT_GET, $rules);

        if (self::checkValues($data)) {
            echo ViewHelper::render("view/joke-detail.php", [
                "joke" => JokeDB::get($data)
            ]);
        } else {
            echo ViewHelper::render("view/joke-list.php", [
                "jokes" => JokeDB::getAll()
            ]);
        }
    }

    public static function addForm($values = [
        "joke_text" => "",
        "joke_date" => ""
    ]) {
        echo ViewHelper::render("view/joke-add.php", $values);
    }

    public static function add() {
        $data = filter_input_array(INPUT_POST, [
            'joke_text' => FILTER_SANITIZE_SPECIAL_CHARS,
            'joke_date' => FILTER_SANITIZE_STRING
        ]);

        // Insert if the data is valid
        if (self::checkValues($data)) {
            JokeDB::insert($data);
            ViewHelper::redirect(BASE_URL . "jokes");
        } else {
            echo ViewHelper::render("view/joke-add.php", $data);
        }
    }

    public static function editForm() {
        $rules = [
            "id" => [
                "filter" => FILTER_VALIDATE_INT,
                "options" => ["min_range" => 1]
            ]
        ];

        $data = filter_input_array(INPUT_GET, $rules);

        if (self::checkValues($data)) {
            echo ViewHelper::render("view/joke-edit.php", [
                "joke" => JokeDB::get($data)
            ]);
        } else {
            ViewHelper::redirect(BASE_URL . "jokes");
        }
    }
    
    public static function edit() {
        $data = filter_input_array(INPUT_POST, [
            "id" => FILTER_VALIDATE_INT,
            "joke_text" => FILTER_SANITIZE_SPECIAL_CHARS,
            "joke_date" => FILTER_SANITIZE_STRING
        ]);

        if (self::checkValues($data)) {
            JokeDB::update($data);
            ViewHelper::redirect(BASE_URL . "jokes");
        } else {
            echo ViewHelper::render("view/joke-edit.php", [
                "joke" => $data,
                "error" => "Invalid input data"
            ]);
        }
    }

    public static function delete() {
        $rules = [
            'id' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1]
            ]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        if (isset($data['id']) && self::checkValues($data)) {
            // Tu so bile tezave z delete  metodo iz JokesDB
            JokeDB::delete($data['id']);
            // Ostanemo na isti strani
            $url = BASE_URL . "jokes";
        } else {
            $url = BASE_URL . "jokes";
        }
        
        ViewHelper::redirect($url);
    }


    /**
     * Returns TRUE if given $input array contains no FALSE values
     * @param type $input
     * @return type
     */
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

    /**
     * Returns an array of filtering rules for manipulation books
     * @return type
     */
    private static function getRules() {
        return [
            'joke_text' => FILTER_SANITIZE_SPECIAL_CHARS,
            'joke_date' => FILTER_SANITIZE_SPECIAL_CHARS,
        ];
    }

}
