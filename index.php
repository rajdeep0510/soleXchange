<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

// Debug: Log all request information
error_log("Full Request URI: " . $_SERVER['REQUEST_URI']);
error_log("Parsed URI Path: " . $uri);
error_log("Request Method: " . $_SERVER['REQUEST_METHOD']);

$routes = [
    '/soleXchange/' => 'src/controllers/home.php',
    '/soleXchange/brands/' => 'src/controllers/brands.php',
    '/soleXchange/register/' => 'src/controllers/register.php',
    '/soleXchange/login/' => 'src/controllers/login.php',
    '/soleXchange/logout/' => 'src/controllers/logout.php',
    '/soleXchange/product/' => 'src/controllers/product.php',
    '/soleXchange/billing/' => 'src/controllers/billing.php',
    '/soleXchange/billing' => 'src/controllers/billing.php',
    '/soleXchange/sell/' => 'src/controllers/sell.php',
    '/soleXchange/sell' => 'src/controllers/sell.php'
];

// Debug: Log the requested URI
error_log("Requested URI: " . $uri);

// Remove trailing slash for matching
$uri_no_slash = rtrim($uri, '/');
error_log("URI without trailing slash: " . $uri_no_slash);

// Check for exact match first
if (array_key_exists($uri, $routes)) {
    error_log("Route found (exact match): " . $routes[$uri]);
    require $routes[$uri];
    exit;
}

// Then check without trailing slash
if (array_key_exists($uri_no_slash, $routes)) {
    error_log("Route found (no trailing slash): " . $routes[$uri_no_slash]);
    require $routes[$uri_no_slash];
    exit;
}

// Handle dynamic brand URLs like /soleXchange/brands/nike
if (strpos($uri, '/soleXchange/brands/') === 0) {
    error_log("Brand route matched");
    require 'src/controllers/custom_b.php';
    exit;
}

// 404 Page Not Found
error_log("No route found for URI: " . $uri);
http_response_code(404);
echo '404 - Page Not Found<br>';
echo 'Requested URI: ' . htmlspecialchars($uri) . '<br>';
echo 'Available routes: ' . implode(', ', array_keys($routes)) . '<br>';

?>
