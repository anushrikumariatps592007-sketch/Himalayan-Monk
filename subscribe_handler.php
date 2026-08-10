<?php
require_once __DIR__ . '/includes/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON POST body or standard POST data
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    
    $email = $data['email'] ?? $_POST['email'] ?? '';
    
    // Validate email
    $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Please enter a valid email address.']);
        exit;
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO newsletter_subscribers (email) VALUES (:email)");
        $stmt->execute(['email' => $email]);
        
        // Load Mailer
        require_once __DIR__ . '/includes/mailer.php';

        $subject = "Welcome to the HimalayanMonk Newsletter!";
        $body = "
            <h3>Thank You for Subscribing!</h3>
            <p>We are thrilled to have you join our community.</p>
            <p>You will now be among the first to hear about our newest pure Himalayan products, exclusive wellness tips, and special offers.</p>
            <p>We promise to keep your inbox peaceful and only send you the good stuff.</p>
            <br>
            <p>Warm regards,<br>The HimalayanMonk Team</p>
        ";
        sendMail($email, $subject, $body);

        echo json_encode(['success' => true, 'message' => 'Thank you for subscribing!']);
    } catch (PDOException $e) {
        // Handle duplicate email (Integrity constraint violation: 1062)
        if ($e->getCode() == 23000) {
            echo json_encode(['success' => true, 'message' => 'You are already subscribed. Thank you!']);
        } else {
            // Other errors
            echo json_encode(['success' => false, 'message' => 'An error occurred. Please try again later.']);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
