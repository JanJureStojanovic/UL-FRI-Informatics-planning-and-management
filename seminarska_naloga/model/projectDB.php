<?php

require_once 'model/AbstractDB.php';

class projectDB extends AbstractDB {

    // Insert admin during registration
    public static function insertAdmin(array $params) {
        return parent::modify(
            "INSERT INTO admins (first_name, last_name, email, password) 
             VALUES (:first_name, :last_name, :email, :password)", 
            $params
        );
    }

    // Insert new item into the store
    public static function insertItem(array $params) {
        return parent::modify(
            "INSERT INTO items (item_name, price) 
             VALUES (:item_name, :price)", 
            $params
        );
    }

    // Retrieve all items from the database
    public static function getAllItems() {
        return parent::query(
            "SELECT id, item_name, price FROM items ORDER BY id ASC"
        );
    }

    // Retrieve a single admin by email (for login validation)
    public static function getAdminByEmail(array $params) {
        $admins = parent::query(
            "SELECT * FROM admins WHERE email = :email",
            $params
        );

        if (count($admins) === 1) {
            return $admins[0];
        } else {
            throw new InvalidArgumentException("No admin found with this email");
        }
    }

    // Implement abstract methods from AbstractDB

    // Get single item by ID
    public static function get(array $params) {
        $items = parent::query(
            "SELECT * FROM items WHERE id = :id",
            $params
        );
        
        if (count($items) === 1) {
            return $items[0];
        } else {
            throw new InvalidArgumentException("No item found with this ID");
        }
    }

    // Get all items (fallback)
    public static function getAll() {
        return parent::query(
            "SELECT * FROM items ORDER BY id ASC"
        );
    }

    // Insert method (fallback generic implementation)
    public static function insert(array $params) {
        return parent::modify(
            "INSERT INTO items (item_name, price) VALUES (:item_name, :price)",
            $params
        );
    }

    // Update item by ID
    public static function update(array $params) {
        return parent::modify(
            "UPDATE items SET item_name = :item_name, price = :price WHERE id = :id",
            $params
        );
    }

    // Delete item by ID
    public static function delete(int $id) {
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM items WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }
}
