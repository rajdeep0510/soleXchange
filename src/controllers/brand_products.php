<?php
require_once __DIR__ . '/../models/connection.php';

// Get brand from URL parameter
$brand = isset($_GET['brand']) ? $_GET['brand'] : '';

try {
    // Debug connection
    if (!isset($pdo)) {
        throw new Exception("Database connection not established");
    }

    // Fetch products for the specific brand
    $query = "SELECT * FROM products WHERE brand_name = :brand";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['brand' => $brand]);
    $brand_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debug query results
    error_log("Query executed for brand: " . $brand);
    error_log("Number of products found: " . count($brand_products));

    // Include the view to display the products
    require __DIR__ . '/../views/brand_products.view.php';
} catch (PDOException $e) {
    // Detailed database error logging
    error_log("Database error details: " . $e->getMessage());
    error_log("Error code: " . $e->getCode());
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    error_log("General error: " . $e->getMessage());
    echo "Error: " . $e->getMessage();
}
?> 