<?php
try {
    $host = getenv('DB_HOST') ?: "aws-0-ap-south-1.pooler.supabase.com";
    $port = getenv('DB_PORT') ?: "6543";
    $dbname = getenv('DB_NAME') ?: "postgres";
    $user = getenv('DB_USER') ?: "postgres.ennuvgpyhiiaiehkwsmw";
    $password = getenv('DB_PASSWORD') ?: "UrvaVyas1107";

    // Create the DSN for PostgreSQL
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

    // Establish the connection
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    // echo "Connection successful! Current server time: "; // debuging 
 

} catch (PDOException $e) {
    echo "<p style='color: red'>Connection failed: " . $e->getMessage() . "</p>";
    echo "<p>DSN used: " . $dsn . "</p>";
}
?>
