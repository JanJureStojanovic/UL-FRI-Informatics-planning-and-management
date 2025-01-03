<?php

require_once("ViewHelper.php");

class ItemController {
    public static function displayItemsByCategory($categoryName, $categoryId) {
        // Optionally verify categoryName matches categoryId if needed.
        
        // Fetch items from the database by category ID
        $items = ItemModel::getItemsByCategory($categoryId);

        // Render the view
        ViewHelper::render("view/displayItems.php", [
            "items" => $items,
            "categoryName" => $categoryName
        ]);
    }
}