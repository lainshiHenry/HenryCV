<?php
include 'sqlcredentials.php';

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    echo "Connection unsuccessful";
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>