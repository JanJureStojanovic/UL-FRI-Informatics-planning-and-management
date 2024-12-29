<?php

require_once("ViewHelper.php");

require_once("ViewHelper.php");

class CategoriesController {

    // Show category by name
    public static function show($categoryName) {
        // Mock items related to the category
        $items = [
            "Electronics" => [
                ["name" => "Laptop", "description" => "High performance laptop", "price" => "$1200"],
                ["name" => "Smartphone", "description" => "Latest model", "price" => "$800"]
            ],
            "Furniture" => [
                ["name" => "Chair", "description" => "Comfortable office chair", "price" => "$150"],
                ["name" => "Table", "description" => "Wooden dining table", "price" => "$300"]
            ],
            "Clothing" => [
                ["name" => "T-shirt", "description" => "Comfortable cotton t-shirt", "price" => "$20"],
                ["name" => "Jeans", "description" => "Slim fit jeans", "price" => "$40"]
            ],
            // Add more categories and items as needed
        ];

        // Check if category exists
        if (array_key_exists($categoryName, $items)) {
            // Render the category page with the items
            echo "<h1>Welcome to the " . htmlspecialchars($categoryName) . " category!</h1>";
            echo "<p>Here are some items:</p>";
            
            foreach ($items[$categoryName] as $item) {
                echo "<p>" . htmlspecialchars($item['name']) . ": " . htmlspecialchars($item['price']) . "</p>";
            }
        } else {
            echo "<h1>Category not found.</h1>";
        }
    }
}
