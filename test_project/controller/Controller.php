<?php

require_once("ViewHelper.php");

class MainController {
    
    public static function mainPage() {
        // Fetch categories from the databas

        // Pass categories to the view
        ViewHelper::render("view/displayCategories.php");
    }

    // This method is for showing the admin login form (GET request)
    public static function adminLogInForm() {
        echo ViewHelper::render("view/adminLogIn.php");
    }

    // This method handles the login form submission (POST request)
    public static function adminLogIn() {
        // Retrieve and sanitize the form inputs
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // Validate the inputs
        if (self::checkCredentials($username, $password)) {
            // If credentials are correct, set session and redirect to admin dashboard (or another page)
            $_SESSION['admin'] = $username; // Example: store the admin username in the session
            ViewHelper::redirect(BASE_URL . 'admin/dashboard'); // Redirect to the dashboard (or another page)
        } else {
            // If credentials are invalid, show an error message or redirect back to the login page
            echo "Invalid username or password!";
            // Alternatively, you can render the login form again with an error message
            echo ViewHelper::render("view/adminLogIn.php", [
                'error' => 'Invalid username or password'
            ]);
        }
    }

    public static function prodajalecLogInForm() {
        echo ViewHelper::render("view/prodajalecLogIn.php");
    }

    // This method handles the login form submission (POST request)
    public static function prodajalecLogIn() {
        // Retrieve and sanitize the form inputs
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // Validate the inputs
        if (self::checkCredentials($username, $password)) {
            // If credentials are correct, set session and redirect to admin dashboard (or another page)
            $_SESSION['admin'] = $username; // Example: store the admin username in the session
            ViewHelper::redirect(BASE_URL . 'admin/dashboard'); // Redirect to the dashboard (or another page)
        } else {
            // If credentials are invalid, show an error message or redirect back to the login page
            echo "Invalid username or password!";
            // Alternatively, you can render the login form again with an error message
            echo ViewHelper::render("view/adminLogIn.php", [
                'error' => 'Invalid username or password'
            ]);
        }
    }

    public static function strankaLogInForm() {
        echo ViewHelper::render("view/strankaLogIn.php");
    }

    // A simple method to check credentials (you might want to replace this with a database check)
    private static function checkCredentials($username, $password) {
        // Example check (replace this with your actual validation logic)
        return ($username === 'admin' && $password === 'password'); // Example: hardcoded credentials
    }
}

class CategoryController {

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

class ItemController {
    
    public static function display_items_by_category($categoryName) {
        // Fetch items for the given category
        $items = ProjectDB::getItemsByCategoryName($categoryName);

        // Determine the appropriate view file based on the category
        $viewFile = __DIR__ . "/../view/display" . $categoryName . ".php";

        if (file_exists($viewFile)) {
            ViewHelper::render($viewFile, [
                "items" => $items,
                "categoryName" => $categoryName
            ]);
        } else {
            echo "Category view not found.";
        }
    }
}
