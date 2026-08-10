<?php
require_once __DIR__ . '/includes/db.php';

$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Safe handling and validation
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $product_interest = trim($_POST['product_interest'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        $errorMessage = "Please fill in all required fields (Name, Email, Message).";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Please enter a valid email address.";
    } else {
        try {
            // Ensure table exists
            $pdo->exec("CREATE TABLE IF NOT EXISTS inquiries (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                phone VARCHAR(50),
                product_interest VARCHAR(255),
                message TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )");

            // Insert into DB
            $stmt = $pdo->prepare("INSERT INTO inquiries (name, email, phone, product_interest, message) VALUES (:name, :email, :phone, :product_interest, :message)");
            $stmt->execute([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'product_interest' => $product_interest,
                'message' => $message
            ]);

            // Load Mailer
            require_once __DIR__ . '/includes/mailer.php';

            // 1. Send Admin Notification
            $adminSubject = "New Enquiry from " . htmlspecialchars($name);
            $adminBody = "
                <h3>New Enquiry Received</h3>
                <p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>
                <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
                <p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>
                <p><strong>Product Interest:</strong> " . htmlspecialchars($product_interest) . "</p>
                <p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
            ";
            
            // We use SMTP_FROM_EMAIL as the admin email in this case
            sendMail(SMTP_FROM_EMAIL, $adminSubject, $adminBody, $email);

            // 2. Send User Auto-responder
            $userSubject = "Thank you for contacting HimalayanMonk";
            $userBody = "
                <p>Dear " . htmlspecialchars($name) . ",</p>
                <p>Thank you for getting in touch with us! We have received your enquiry regarding <strong>" . htmlspecialchars($product_interest ?: 'our products') . "</strong>.</p>
                <p>Our team will review your message and get back to you as soon as possible.</p>
                <p>In the meantime, feel free to explore more of our natural collections on our website.</p>
                <br>
                <p>Warm regards,<br>The HimalayanMonk Team</p>
            ";
            sendMail($email, $userSubject, $userBody);

            $successMessage = "Thank you, " . htmlspecialchars($name) . ". Your enquiry has been sent successfully. Our team will contact you shortly.";
            
            // Clear post array to prevent resubmission
            $_POST = [];
        } catch (PDOException $e) {
            $errorMessage = "Sorry, there was an error submitting your enquiry. Please try again later.";
        }
    }
}

// Prefill product interest if passed in URL
$prefillProduct = '';
if ($_SERVER['REQUEST_METHOD'] !== 'POST' && isset($_GET['product'])) {
    $prefillProduct = trim($_GET['product']);
} elseif (isset($_POST['product_interest'])) {
    $prefillProduct = trim($_POST['product_interest']);
}

require_once __DIR__ . '/includes/header.php';
?>

<!-- Contact Page Hero Banner -->
<section class="contact-hero-banner">
    <?php 
    ?>
    <img src="<?= SITE_URL ?>/image/contact.webp" alt="Get In Touch" class="contact-hero-img">
</section>

<section class="contact-main-section" style="position: relative; overflow: hidden;">
    <div class="container contact-layout">
        
        <!-- LEFT: Info Panel -->
        <div class="contact-info-panel animate-on-scroll" id="info-panel">
            <span class="eyebrow-text">CONNECT WITH HIMALAYANMONK</span>
            <h2 class="contact-heading">Let’s Talk About Pure Himalayan Products</h2>
            <div class="hm-gold-divider" style="margin: 1.25rem 0; margin-left: 0;"></div>
            <blockquote class="contact-quote">
                “Every enquiry begins with trust — and every product we source begins with nature.”
            </blockquote>
            <p class="contact-description">
                Have a question about our products, sourcing, quality, or availability? Send us your enquiry and our team will get back to you with clear, honest guidance.
            </p>
            
            <div class="contact-details">
                <div class="detail-item animate-stagger">
                    <i data-feather="map-pin"></i>
                    <div>
                        <strong>HimalayanMonk</strong><br>
                        Ayodhya, Uttar Pradesh<br>
                        India
                    </div>
                </div>
                <div class="detail-item animate-stagger">
                    <i data-feather="phone"></i>
                    <div>+91 98765 43210</div>
                </div>
                <div class="detail-item animate-stagger">
                    <i data-feather="mail"></i>
                    <div>contact@himalayanmonk.com</div>
                </div>
                <div class="detail-item animate-stagger">
                    <i data-feather="clock"></i>
                    <div>Monday – Saturday, 10:00 AM – 6:00 PM</div>
                </div>
            </div>

            <div class="social-links animate-stagger">
                <a href="#instagram" class="social-icon-btn"><i data-feather="instagram"></i></a>
                <a href="#facebook" class="social-icon-btn"><i data-feather="facebook"></i></a>
                <a href="#linkedin" class="social-icon-btn"><i data-feather="linkedin"></i></a>
                <a href="#youtube" class="social-icon-btn"><i data-feather="youtube"></i></a>
                <a href="#whatsapp" class="social-icon-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" width="24" height="24" stroke="none" class="feather feather-whatsapp"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 222.4-99.6 222.4-222 0-59.3-23.1-115-65.4-157zM223.9 415.2c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 335l-4.4-7.1c-18.4-29.6-28.1-64-28.1-99.8 0-103.5 84.3-187.8 187.9-187.8 50.1 0 97.2 19.5 132.7 55 35.4 35.5 54.9 82.6 54.9 132.7 0 103.6-84.3 187.2-187.1 187.2zm102.6-140.2c-5.6-2.8-33.4-16.5-38.6-18.4-5.2-1.9-9-2.8-12.8 2.8-3.7 5.6-14.6 18.4-17.9 22.2-3.3 3.8-6.6 4.2-12.2 1.4-5.6-2.8-23.8-8.8-45.3-27.9-16.7-14.8-28-33.1-31.3-38.8-3.3-5.6-.4-8.7 2.4-11.5 2.5-2.5 5.6-6.6 8.4-9.9 2.8-3.3 3.8-5.6 5.6-9.4 1.9-3.8.9-7.1-.5-9.9-1.4-2.8-12.8-30.9-17.6-42.3-4.6-11.1-9.3-9.6-12.8-9.8-3.3-.2-7.1-.2-10.8-.2-3.8 0-9.9 1.4-15 7.1-5.2 5.6-19.7 19.3-19.7 47 0 27.7 20.2 54.5 23 58.2 2.8 3.8 39.7 60.6 96.1 85 13.4 5.8 23.9 9.3 32.1 11.9 13.5 4.3 25.8 3.7 35.5 2.2 10.9-1.7 33.4-13.6 38.1-26.8 4.7-13.2 4.7-24.5 3.3-26.8-1.4-2.3-5.2-3.8-10.8-6.6z"></path></svg></a>
            </div>
        </div>
        
        <!-- RIGHT: Form Card -->
        <div class="contact-form-card animate-on-scroll" id="form-card" style="animation-delay: 0.2s;">
            <?php if ($successMessage): ?>
                <div class="alert alert-success" style="padding: 1.5rem; background: #e8f5e9; border-left: 4px solid #2e7d32; color: #1b5e20; margin-bottom: 2rem; border-radius: 4px;">
                    <?= $successMessage ?>
                </div>
            <?php endif; ?>
            
            <?php if ($errorMessage): ?>
                <div class="alert alert-error" style="padding: 1.5rem; background: #ffebee; border-left: 4px solid #c62828; color: #b71c1c; margin-bottom: 2rem; border-radius: 4px;">
                    <?= $errorMessage ?>
                </div>
            <?php endif; ?>

            <form action="<?= SITE_URL ?>/contact.php" method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="name">Full Name *</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email Address *</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="phone">Phone Number (Optional)</label>
                        <input type="tel" id="phone" name="phone" class="form-control" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="product_interest">Product Interest</label>
                        <input type="text" id="product_interest" name="product_interest" class="form-control" value="<?= htmlspecialchars($prefillProduct) ?>" placeholder="e.g. Himalayan Shilajit">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="message">Your Message *</label>
                    <textarea id="message" name="message" class="form-control" rows="6" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                </div>

                <button type="submit" class="btn-submit">Send Enquiry</button>
            </form>
        </div>

    </div>
</section>

<!-- Map Section -->
<section class="map-section" id="map-location" style="position: relative; overflow: hidden;">
    <div class="container text-center">
        <h2 class="map-heading animate-on-scroll">Find Our Location</h2>
        <div class="hm-gold-divider"></div>
        <p class="map-subtitle animate-on-scroll">Visit or connect with HimalayanMonk through our official business location.</p>
        
        <div class="map-container animate-on-scroll">
            <!-- Google Maps embed URL for Ayodhya -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114002.04634407883!2d81.9366657!3d26.792225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399a07937e6d2823%3A0x5fc8f683b17f222b!2sAyodhya%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<!-- Animation Script -->
<script src="<?= SITE_URL ?>/assets/js/slider.js"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {
    // Custom GSAP animations for the new layout elements
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        
        if (!prefersReducedMotion) {
            // Fade info panel from left
            gsap.fromTo("#info-panel", 
                { opacity: 0, x: -50 }, 
                { opacity: 1, x: 0, duration: 1, ease: "power3.out", scrollTrigger: {
                    trigger: ".contact-main-section",
                    start: "top 80%"
                }}
            );
            
            // Fade form from right
            gsap.fromTo("#form-card", 
                { opacity: 0, x: 50 }, 
                { opacity: 1, x: 0, duration: 1, ease: "power3.out", delay: 0.2, scrollTrigger: {
                    trigger: ".contact-main-section",
                    start: "top 80%"
                }}
            );

            // Stagger contact details
            gsap.fromTo(".animate-stagger", 
                { opacity: 0, y: 20 }, 
                { opacity: 1, y: 0, duration: 0.8, stagger: 0.15, ease: "power2.out", scrollTrigger: {
                    trigger: ".contact-details",
                    start: "top 85%"
                }}
            );
        }
    }
});
</script>

<!-- Animation Script -->
<script src="<?= SITE_URL ?>/assets/js/slider.js"></script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
