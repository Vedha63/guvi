<?php
require 'db_connection.php';

$email = $_POST['email'] ?? '';
$dob = $_POST['dob'] ?? '';
$age = $_POST['age'] ?? '';
$contact = $_POST['contact'] ?? '';

if (!$email) {
    echo "Email missing.";
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM user_profiles WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->rowCount() > 0) {
    $stmt = $pdo->prepare("UPDATE user_profiles SET dob = ?, age = ?, contact = ? WHERE email = ?");
    $stmt->execute([$dob, $age, $contact, $email]);
} else {
    $stmt = $pdo->prepare("INSERT INTO user_profiles (email, dob, age, contact) VALUES (?, ?, ?, ?)");
    $stmt->execute([$email, $dob, $age, $contact]);
}

echo "Profile updated successfully.";
?>