<?php
session_start();
require_once __DIR__ . '/../models/connection.php';

define('SUPABASE_URL', 'https://ennuvgpyhiiaiehkwsmw.supabase.co');
define('SUPABASE_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVubnV2Z3B5aGlpYWllaGt3c213Iiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc0MDgyNDM2NSwiZXhwIjoyMDU2NDAwMzY1fQ.SfjGhaRFaBDgsX2l0x1e_3IMdwPCRRQWHbAM4RCXoks');
define('SUPABASE_BUCKET', 'product_image');

// Add debug logging
error_log("Using Supabase URL: " . SUPABASE_URL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Debug logging
        error_log("POST request received");
        error_log("FILES data: " . print_r($_FILES, true));
        error_log("POST data: " . print_r($_POST, true));

        // Validate image upload
        if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Please upload a valid image file. Error code: " . 
                (isset($_FILES['image']) ? $_FILES['image']['error'] : 'No file uploaded'));
        }

        // Validate file type
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($_FILES['image']['type'], $allowed_types)) {
            throw new Exception("Only JPG, JPEG and PNG files are allowed");
        }

        // Generate unique filename
        $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $file_name = uniqid() . '_' . time() . '.' . $file_extension;
        
        // Get file content
        $file_content = file_get_contents($_FILES['image']['tmp_name']);
        if ($file_content === false) {
            throw new Exception("Failed to read uploaded file");
        }

        // Prepare upload URL - using the correct endpoint
        $upload_url = SUPABASE_URL . "/storage/v1/object/" . SUPABASE_BUCKET . "/" . $file_name;
        error_log("Attempting upload to: " . $upload_url);

        // Initialize cURL
        $ch = curl_init($upload_url);
        if ($ch === false) {
            throw new Exception("Failed to initialize upload");
        }

        // Set cURL options with correct headers
        curl_setopt_array($ch, [
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => true,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer " . SUPABASE_KEY,
                "Content-Type: " . $_FILES['image']['type']
            ],
            CURLOPT_POSTFIELDS => $file_content
        ]);

        // Execute upload
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        // Check for cURL errors
        if ($response === false) {
            $curl_error = curl_error($ch);
            error_log("cURL Error: " . $curl_error);
            throw new Exception("Upload failed: " . $curl_error);
        }

        error_log("Upload Response Code: " . $http_code);
        error_log("Upload Response: " . $response);

        curl_close($ch);

        // Verify upload success
        if ($http_code !== 200) {
            throw new Exception("Failed to upload image. Status: " . $http_code . ". Response: " . $response);
        }

        // Generate public URL - using the correct public URL format
        $public_url = SUPABASE_URL . "/storage/v1/object/public/" . SUPABASE_BUCKET . "/" . $file_name;
        error_log("Generated public URL: " . $public_url);

        // Prepare database insert with only existing columns
        $stmt = $pdo->prepare("
            INSERT INTO products (
                product_name,
                brand_name,
                product_price,
                product_desc,
                img_url
            ) VALUES (
                :product_name,
                :brand_name,
                :product_price,
                :product_desc,
                :img_url
            )
        ");

        $params = [
            ':product_name' => $_POST['shoe_name'],
            ':brand_name' => $_POST['brand'],
            ':product_price' => $_POST['price'],
            ':product_desc' => $_POST['description'],
            ':img_url' => $public_url
        ];

        error_log("Database parameters: " . print_r($params, true));

        if (!$stmt->execute($params)) {
            $error = $stmt->errorInfo();
            error_log("Database Error: " . print_r($error, true));
            throw new Exception("Failed to save to database: " . $error[2]);
        }

        $_SESSION['success_message'] = "Product listed successfully!";
        header('Location: /soleXchange/');
        exit;

    } catch (Exception $e) {
        error_log("Error in sell.php: " . $e->getMessage());
        $_SESSION['error_message'] = $e->getMessage();
        header('Location: /soleXchange/sell/');
        exit;
    }
}

require_once __DIR__ . '/../views/sell.view.php';
?>
