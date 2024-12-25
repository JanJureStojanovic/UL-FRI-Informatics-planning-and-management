<?php

require_once 'model/AbstractDB.php';

class JokeDB extends AbstractDB {

    public static function insert(array $params) {
        return parent::modify("INSERT INTO jokes (joke_text, joke_date) VALUES (:joke_text, :joke_date)", $params);
    }

    public static function update(array $params) {
        return parent::modify("UPDATE jokes SET joke_text = :joke_text, joke_date = :joke_date WHERE id = :id", $params);
    }
    
    // Drugacne oblike, ker mi for some reason return parent::modify ni delalo
    public static function delete(int $id) {
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM jokes WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }
    
    public static function get(array $params) {
        $jokes = parent::query("SELECT id, joke_text, joke_date FROM jokes WHERE id = :id", $params);

        if (count($jokes) === 1) {
            return $jokes[0];
        } else {
            throw new InvalidArgumentException("No such joke");
        }
    }
    
    public static function getAll() {
        return parent::query("SELECT id, joke_text, joke_date FROM jokes ORDER BY id ASC");
    }

}