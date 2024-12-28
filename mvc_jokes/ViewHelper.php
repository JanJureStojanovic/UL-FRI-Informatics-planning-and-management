<?php

class ViewHelper {

    /**
     * Render a view file with provided variables.
     * Extracts variables so they can be used in the template.
     * 
     * @param string $path Path to the view file
     * @param array $variables Data to be passed to the view
     * @return string Rendered HTML
     */
    public static function render($path, $variables = []) {
        extract($variables);
        
        ob_start();
        include($path);
        return ob_get_clean();
    }

    /**
     * Redirect to a different URL
     * 
     * @param string $url URL to redirect to
     */
    public static function redirect($url) {
        header("Location: " . $url);
        exit();
    }

    /**
     * Show a 404 error page
     */
    public static function error404() {
        http_response_code(404);
        echo self::render("view/404.php");
        exit();
    }
}
