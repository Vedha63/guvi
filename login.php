<?php
// Simulated login response
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    echo "All fields are required.";
    exit;
}

// Just simulate login success for demo
if ($email === 'test@example.com' && $password === '123456') {
    echo json_encode(["status" => "success", "email" => $email]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid credentials"]);
}
?>

