<?php

require_once 'DB.php';

abstract class AbstractDB {

    protected static $dbh = null;

    public static function getConnection() {
        if (is_null(self::$dbh)) {
            self::$dbh = DBInit::getInstance();
        }
        return self::$dbh;
    }

    public static function setConnection($dbh) {
        self::$dbh = $dbh;
    }
    
    protected static function modify($sql, array $params = array()) {
        $stmt = self::getConnection()->prepare($sql);
        $params_filtered = self::filterParams($sql, $params);
        $stmt->execute($params_filtered);
        
        return self::getConnection()->lastInsertId();
    }

    protected static function query($sql, array $params = array()) {
        $stmt = self::getConnection()->prepare($sql);
        $params_filtered = self::filterParams($sql, $params);
        $stmt->execute($params_filtered);

        return $stmt->fetchAll();
    }

    protected static function filterParams($sql, array $params) {
        $params_altered = self::alterKeys($params);
        $sql_split = preg_split("/[\(\) ,]/", $sql);
        $sql_params = array_values(preg_grep('/^:/', $sql_split));

        $result = array();
        foreach ($sql_params as $key => $value) {
            if (isset($params_altered[$value])) {
                $result[$value] = $params_altered[$value];
            }
        }

        if (count($sql_params) != count($result)) {
            $message = "Parameter mismatch: required (" . implode(", ", $sql_params) . "), provided (" . implode(", ", array_keys($params)) . ")";
            throw new Exception($message);
        }
        return $result;
    }

    protected static function alterKeys(array $params) {
        $result = array();
        foreach ($params as $key => $value) {
            $result[':' . $key] = $value;
        }
        return $result;
    }

    public static abstract function get(array $id);
    public static abstract function getAll();
    public static abstract function insert(array $params);
    public static abstract function update(array $params);
    public static abstract function delete(int $id);
}