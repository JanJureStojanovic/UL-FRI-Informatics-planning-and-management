<?php

require_once("ViewHelper.php");

class Controller {
    
    public static function mainPage() {
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
