<?php
require 'db_connection.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    echo "All fields are required.";
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->execute([$email, $password]);
$user = $stmt->fetch();

if ($user) {
    echo json_encode(["status" => "success", "email" => $email]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid credentials"]);
}
?>
