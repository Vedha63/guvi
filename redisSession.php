<?php
require 'db_connection.php';

$email = $_POST['email'] ?? '';

if (!$email) {
    echo json_encode(["status" => "error", "message" => "Email is required"]);
    exit;
}

$session = [
    "email" => $email,
    "time" => date("Y-m-d H:i:s")
];

header('Content-Type: application/json');
echo json_encode(["status" => "success", "session" => $session]);
?>
