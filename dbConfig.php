<?php
// Database credentials
$host = 'localhost';        // Database host
$dbname = 'unit_management_system'; // Your database name
$username = 'root';         // Use 'root' if no specific user is required
$password = '';             // No password

// Set up the PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Set PDO error mode to exception to handle errors properly
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If connection fails, output the error message
    die("Database connection failed: " . $e->getMessage());
}
?>
