<?php

require_once 'AbstractDB.php';

class ProjectDB extends AbstractDB {

    // Users

    public static function add_user(array $params) {
        return parent::modify("INSERT INTO users (ime, priimek, enaslov, geslo, naslov, hisna_st, postna_st, active) VALUES (:user_id, :ime, :priimek, :enaslov, :geslo, :naslov, :hisna_st, :postna_st, :active)", $params);
    }

    public static function update_user(array $params) {
        return parent::modify("UPDATE users SET ime = :ime, priimek = :priimek, enaslov = :enaslov, naslov = :naslov, hisna_st = :hisna_st, postna_st = :postna_st WHERE user_id = :user_id", $params);
    }

    public static function delete_user(int $id) {
        return parent::modify("DELETE FROM users WHERE user_id = :user_id", ['user_id' => $id]);
    }

    public static function get_user(array $params) {
        $users = parent::query("SELECT * FROM users WHERE user_id = :user_id", $params);
        if (count($users) === 1) return $users[0];
        throw new Exception("User not found");
    }

    public static function get_all_users() {
        return parent::query("SELECT * FROM users ORDER BY user_id ASC");
    }

    // Items

    public static function add_item(array $params) {
        return parent::modify("INSERT INTO items (ime, opis, price, vendor_id, category, active) VALUES (:ime, :opis, :price, :vendor_id, :category, :active)", $params);
    }

    public static function update_item(array $params) {
        return parent::modify("UPDATE items SET ime = :ime, opis = :opis, price = :price, vendor_id = :vendor_id, category = :category, active = :active WHERE item_id = :item_id", $params);
    }

    public static function delete_item(int $id) {
        return parent::modify("DELETE FROM items WHERE item_id = :item_id", ['item_id' => $id]);
    }

    public static function get_item(array $params) {
        $items = parent::query("SELECT * FROM items WHERE item_id = :item_id", $params);
        if (count($items) === 1) return $items[0];
        throw new Exception("Item not found");
    }

    public static function get_all_item() {
        return parent::query("SELECT * FROM items ORDER BY item_id ASC");
    }

    public static function get_items_by_category($categoryId) {
        $db = DBInit::getInstance();
        $statement = $db->prepare("
            SELECT * FROM items
            WHERE category = :categoryId AND active = TRUE
        ");
        $statement->bindParam(":categoryId", $categoryId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }

    // Transactions

    public static function add_transaction(array $params) {
        return parent::modify("INSERT INTO transactions (customer_id, vendor_id, item_id, price, status) VALUES (:customer_id, :vendor_id, :item_id, :price, :status)", $params);
    }

    public static function get_transaction(array $params) {
        return parent::query("SELECT * FROM transactions WHERE transaction_id = :transaction_id", $params);
    }

    public static function getAll_transactions() {
        return parent::query("SELECT * FROM transactions ORDER BY transaction_date DESC");
    }
}
