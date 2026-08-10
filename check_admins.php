<?php
require_once __DIR__ . '/includes/db.php';
$stmt = $pdo->query("SELECT id, email FROM admin_users");
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (empty($admins)) {
    echo "No admins found. Creating one...\n";
    $email = 'admin@himalayanmonk.com';
    $password = 'admin123';
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO admin_users (email, password_hash) VALUES (?, ?)");
    $stmt->execute([$email, $hash]);
    echo "Created admin: $email / $password\n";
} else {
    print_r($admins);
    // update password for the first one to admin123
    $id = $admins[0]['id'];
    $email = $admins[0]['email'];
    $password = 'admin123';
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("UPDATE admin_users SET password_hash = ? WHERE id = ?");
    $stmt->execute([$hash, $id]);
    echo "Password updated for $email to: $password\n";
}
