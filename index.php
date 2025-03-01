<?php


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = [
    '/soleXchange/' => 'src/controllers/home.php',
    '/soleXchange/brands/' => 'src/controllers/brands.php',
    '/soleXchange/register/' => 'src/controllers/register.php',
    '/soleXchange/login/' => 'src/controllers/login.php',
    '/soleXchange/logout/' => 'src/controllers/logout.php',
];

// // Debug output
// echo "Current URI: " . $uri . "<br>";
// var_dump($routes);
// echo "<br>";

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);
    echo '404 - Page Not Found<br>';
    echo 'Requested URI: ' . $uri . '<br>';
    echo 'Available routes: ' . implode(', ', array_keys($routes)) . '<br>';
}

?>

