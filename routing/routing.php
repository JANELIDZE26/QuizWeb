<?php
//echo "Routing file opened";
define('FUNCTIONS_PATH', dirname(__DIR__));


// Con  tains routes and corresponding functions.
$routes = [

];

/**
 * Register a function on a path.
 *
 * @param $path
 * @param $function
 */
function registerRoute($path, $function) {
    global $routes;

    if (!isset($routes[$path])) {
        $method = explode(':', $function);
        $routes[$path] = [
            'file_name' => $method[0] . '.php',
            'function_name' => $method[1],
        ];
    }

    return $routes;
}

/**
 *
 * Execute Route
 * @param $path
 */
function executeRoute($path) {
    global $routes;

    // Check if this path is registered in the router.
    if (!isset($routes[$path])) {

        echo "No route registered for path: " . $path;
        exit(1);
    }

    $function_file = FUNCTIONS_PATH . '/' . $routes[$path]['file_name'];
    if (!file_exists($function_file)) {
        echo "File $function_file doesn't exist.";
        exit(1);
    }

    include_once $function_file;

    $function = $routes[$path]['function_name'];

    // Check if function exists for this path.
    if (!function_exists($function)) {
        echo "No function registered for path: " . $path;
        exit(1);
    }

    $function();
}