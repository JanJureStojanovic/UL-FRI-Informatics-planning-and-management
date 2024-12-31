<?php

require_once 'AbstractDB.php';

class UsersDB extends AbstractDB {
    public static function insert(array $params) {
        return parent::modify("INSERT INTO users (ime, priimek, enaslov, geslo, tip, active) VALUES (:ime, :priimek, :enaslov, :geslo, :tip, :active)", $params);
    }

    public static function update(array $params) {
        return parent::modify("UPDATE users SET ime = :ime, priimek = :priimek, enaslov = :enaslov, tip = :tip, active = :active WHERE user_id = :user_id", $params);
    }

    public static function delete(int $id) {
        return parent::modify("DELETE FROM users WHERE user_id = :user_id", ['user_id' => $id]);
    }

    public static function get(array $params) {
        $users = parent::query("SELECT * FROM users WHERE user_id = :user_id", $params);
        if (count($users) === 1) return $users[0];
        throw new Exception("User not found");
    }

    public static function getAll() {
        return parent::query("SELECT * FROM users ORDER BY user_id ASC");
    }
}

class ItemsDB extends AbstractDB {
    public static function insert(array $params) {
        return parent::modify("INSERT INTO items (ime, opis, price, vendor_id, active) VALUES (:ime, :opis, :price, :vendor_id, :active)", $params);
    }

    public static function update(array $params) {
        return parent::modify("UPDATE items SET ime = :ime, opis = :opis, price = :price, vendor_id = :vendor_id, active = :active WHERE item_id = :item_id", $params);
    }

    public static function delete(int $id) {
        return parent::modify("DELETE FROM items WHERE item_id = :item_id", ['item_id' => $id]);
    }

    public static function get(array $params) {
        $items = parent::query("SELECT * FROM items WHERE item_id = :item_id", $params);
        if (count($items) === 1) return $items[0];
        throw new Exception("Item not found");
    }

    public static function getAll() {
        return parent::query("SELECT * FROM items ORDER BY item_id ASC");
    }
}

class TransactionsDB extends AbstractDB {
    public static function insert(array $params) {
        return parent::modify("INSERT INTO transactions (customer_id, vendor_id, item_id, price, status) VALUES (:customer_id, :vendor_id, :item_id, :price, :status)", $params);
    }

    public static function get(array $params) {
        return parent::query("SELECT * FROM transactions WHERE transaction_id = :transaction_id", $params);
    }

    public static function getAll() {
        return parent::query("SELECT * FROM transactions ORDER BY transaction_date DESC");
    }
}