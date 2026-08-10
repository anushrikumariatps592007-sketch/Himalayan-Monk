<?php
// Database configuration
define('DB_HOST', '127.0.0.1;port=3306');
define('DB_NAME', 'himalayanmonk');
define('DB_USER', 'root');
define('DB_PASS', '');

// Site configuration
define('SITE_URL', 'http://localhost/himalayanmonk');
define('SITE_NAME', 'HimalayanMonk');

// SMTP Email Configuration (Placeholders)
define('SMTP_HOST', 'smtp.example.com');      // e.g., smtp.gmail.com or smtp.hostinger.com
define('SMTP_PORT', 587);                     // 587 for TLS, 465 for SSL
define('SMTP_USER', 'your-email@example.com');
define('SMTP_PASS', 'your-email-password');
define('SMTP_FROM_EMAIL', 'no-reply@himalayanmonk.com');
define('SMTP_FROM_NAME', 'HimalayanMonk');

// Basic Session Security
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // Set to 1 if using HTTPS

session_start();
