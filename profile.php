<?php
require 'db_connection.php';

session_start();

$email = $_POST['email'] ?? '';

if (empty($email)) {
    echo json_encode(['status' => 'error', 'message' => 'Missing email in request.']);
    exit;
}

$stmt = $pdo->prepare("SELECT dob, age, contact FROM user_profiles WHERE email = ?");
$stmt->execute([$email]);
$profile = $stmt->fetch();

if ($profile) {
    echo json_encode(['status' => 'success', 'profile' => $profile]);
} else {
    echo json_encode(['status' => 'success', 'profile' => ['dob' => '', 'age' => '', 'contact' => '']]);
}
?>