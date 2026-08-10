<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/header.php';
?>

<!-- About Page Hero Banner -->
<section class="about-hero-banner" style="width: 100%; height: 60vh; min-height: 450px; max-height: 650px; background: #08120c; position: relative; overflow: hidden;">
    <?php 
    ?>
    <img src="<?= SITE_URL ?>/image/about.webp" alt="Our Story - HimalayanMonk" style="width: 100%; height: 100%; object-fit: cover; object-position: center 60%; display: block;">
</section>

<!-- About Intro Section -->
<section class="section about-intro-section" style="position: relative; overflow: hidden; padding: 6rem 0; background: var(--color-white);">
    <div class="container">
        <div class="about-intro-grid">
            
            <div class="intro-content animate-on-scroll">
                <div class="intro-heading-wrap">
                    <span class="intro-line"></span>
                    <h2 class="intro-heading">About HimalayanMonk</h2>
                    <span class="intro-line"></span>
                </div>
                
                <p class="intro-text">
                    Born from the hearts of passionate wellness artisans and a family of agriculturists with centuries of tradition in cultivating natural herbs, we blend the heritage of the Himalayas with the art of pure living.
                </p>
                <p class="intro-text">
                    The story unfolds in the pristine altitudes of the Himalayas, known for its valuable botanicals, which have drawn the interest of wellness seekers for centuries. Our lineage spans several generations and is deeply rooted in a rich agricultural heritage. This legacy has profoundly inspired us to launch HimalayanMonk, seamlessly blending ancient wisdom with modern wellness.
                </p>
                <p class="intro-text" style="margin-bottom: 0;">
                    Whether you're a health enthusiast or seeking daily balance, at HimalayanMonk, our mission is to ignite your passion for natural living and elevate your well-being.
                </p>
            </div>

            <div class="intro-image-wrap animate-on-scroll" style="animation-delay: 0.2s;">
                <img src="<?= SITE_URL ?>/image/shilajit.webp" alt="HimalayanMonk Products" class="intro-image" style="object-fit: cover; height: 100%; width: 100%;">
            </div>

        </div>
    </div>
</section>

<!-- Brand Ethos Section -->
<section class="ethos-section" style="padding-bottom: 0;">
    <div class="container">
        <!-- Part 1: Philosophy -->
        <div class="about-philosophy-grid" style="padding-bottom: 3rem;">
            <div class="philosophy-left animate-on-scroll">
                <div class="ethos-icon">
                    <i data-feather="sun"></i>
                </div>
                <h2 class="ethos-heading">Our Philosophy</h2>
                <p>The Himalayas have long been known as a place of natural abundance and timeless traditions.</p>
                <p>We honor that heritage by sourcing premium ingredients and combining traditional knowledge with modern quality standards.</p>
                <p>Whether it's Himalayan Shilajit, rare botanicals, superfoods, or wellness supplements, every Himalayan Monk product is chosen to help support a healthier lifestyle through ingredients you can trust.</p>
            </div>
            
            <div class="ethos-divider"></div>
            
            <div class="philosophy-right animate-on-scroll" style="animation-delay: 0.2s;">
                <div class="about-philosophy-item">
                    <div class="philosophy-item-icon"><i data-feather="star"></i></div>
                    <div>
                        <h4>Premium Quality</h4>
                        <p>We believe quality begins at the source. We work with trusted partners who share our commitment to purity, responsible sourcing, and rigorous quality control.</p>
                    </div>
                </div>
                <div class="about-philosophy-item">
                    <div class="philosophy-item-icon"><i data-feather="map-pin"></i></div>
                    <div>
                        <h4>Authentic Origins</h4>
                        <p>Our inspiration comes from the Himalayan region and its rich history of natural wellness. We strive to preserve the integrity of traditional ingredients while meeting modern expectations for safety and quality.</p>
                    </div>
                </div>
                <div class="about-philosophy-item">
                    <div class="philosophy-item-icon"><i data-feather="search"></i></div>
                    <div>
                        <h4>Transparency</h4>
                        <p>We believe our customers deserve to know exactly what they're purchasing. Clear labeling, honest sourcing, and uncompromising standards are at the heart of everything we do.</p>
                    </div>
                </div>
                <div class="about-philosophy-item">
                    <div class="philosophy-item-icon"><i data-feather="user"></i></div>
                    <div>
                        <h4>Everyday Wellness</h4>
                        <p>Health isn't built overnight—it's created through small, consistent habits. Our products are designed to become part of your daily wellness journey.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Part 2: Mission & Vision -->
<section class="mission-vision-section">
    <div class="container">
        <div class="mv-grid">
            <div class="mv-col animate-on-scroll">
                <div class="ethos-icon"><i data-feather="flag"></i></div>
                <h2 class="ethos-heading">Our Mission</h2>
                <p>To make the finest Himalayan-inspired wellness products accessible to people around the world while maintaining the highest standards of quality, authenticity, and integrity.</p>
            </div>
            
            <div class="mv-center">
                <div class="mv-line"></div>
                <div class="mv-center-icon"><i data-feather="sun"></i></div>
                <div class="mv-line"></div>
            </div>
            
            <div class="mv-col animate-on-scroll" style="animation-delay: 0.2s;">
                <div class="ethos-icon"><i data-feather="eye"></i></div>
                <h2 class="ethos-heading">Our Vision</h2>
                <p>To become one of the world's most trusted premium wellness brands—recognized for sourcing exceptional natural ingredients and creating products that inspire healthier, more balanced lives.</p>
            </div>
        </div>
    </div>
</section>

<!-- Part 3: Our Promise -->
<section class="ethos-section">
    <div class="container">
        <div class="promise-header animate-on-scroll">
            <h3 class="promise-subtitle">Our Promise</h3>
            <h2 class="promise-title">Every Himalayan Monk product is guided by five core principles.</h2>
            <div class="ethos-icon" style="margin-top: 1rem;"><i data-feather="sun" style="width:24px; height:24px;"></i></div>
        </div>
        
        <div class="promise-grid animate-on-scroll" style="animation-delay: 0.2s;">
            <div class="promise-item">
                <div class="promise-item-icon"><i data-feather="aperture"></i></div>
                <h4>Premium Ingredients</h4>
                <p>Only the finest natural ingredients make it into our products.</p>
            </div>
            <div class="promise-item">
                <div class="promise-item-icon"><i data-feather="map"></i></div>
                <h4>Authentic Sourcing</h4>
                <p>Responsibly sourced from the pure and untouched regions of the Himalayas.</p>
            </div>
            <div class="promise-item">
                <div class="promise-item-icon"><i data-feather="shield"></i></div>
                <h4>Rigorous Quality Standards</h4>
                <p>Manufactured with strict quality control to ensure purity and safety.</p>
            </div>
            <div class="promise-item">
                <div class="promise-item-icon"><i data-feather="droplet"></i></div>
                <h4>Honest Transparency</h4>
                <p>Clear labeling and honest practices you can always count on.</p>
            </div>
            <div class="promise-item">
                <div class="promise-item-icon"><i data-feather="heart"></i></div>
                <h4>Customer First</h4>
                <p>Your wellness journey is our priority—always.</p>
            </div>
        </div>
        
        <div class="promise-footer animate-on-scroll" style="animation-delay: 0.3s;">
            <div class="ethos-icon"><i data-feather="sun" style="width:24px; height:24px;"></i></div>
            <h3>Welcome to Himalayan Monk</h3>
            <p>More than a wellness brand. A way of living.</p>
        </div>
    </div>
</section>

<!-- Himalayan Origin Story -->
<section class="section" style="position: relative; overflow: hidden; padding: 3rem 0; background: var(--color-white);">
    <div class="container">
        <div class="story-grid">
            <div class="story-image animate-on-scroll" style="overflow: hidden; border-radius: 12px; box-shadow: 0 20px 50px rgba(0,0,0,0.1);">
                <div class="story-bg parallax-bg" role="img" aria-label="Himalayan Shilajit Resin" style="background-image: url('<?= SITE_URL ?>/image/shilajit.webp'); aspect-ratio: 1/1; height: 110%; background-size: cover; background-position: center;"></div>
            </div>
            <div class="story-content animate-on-scroll" style="animation-delay: 0.2s;">
                <h2 style="font-family: var(--font-heading); color: var(--color-primary); font-size: 2.2rem; margin-bottom: 0; letter-spacing: -0.01em;">Born in the Himalayas</h2>
                <div class="hm-gold-divider" style="margin: 1rem 0;"></div>
                <p style="font-size: 1.05rem; color: #555; line-height: 1.7; margin-bottom: 1.2rem;">
                    HimalayanMonk was born from a deep reverence for the world's highest and most majestic mountain range. We believe that true wellness is inextricably linked to the purity of nature.
                </p>
                <p style="font-size: 1.05rem; color: #555; line-height: 1.7;">
                    Our journey begins at the roof of the world, where pristine air, unpolluted water, and mineral-rich soils cultivate extraordinary flora that has been cherished for centuries.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Ethical Sourcing -->
<section class="section" style="position: relative; overflow: hidden; padding: 3rem 0; background: var(--color-bg);">
    <div class="container">
        <div class="story-grid">
            <!-- Order reversed for alternating layout on desktop -->
            <div class="story-content animate-on-scroll" style="order: 2;">
                <h2 style="font-family: var(--font-heading); color: var(--color-primary); font-size: 2.2rem; margin-bottom: 0; letter-spacing: -0.01em;">Ethical Sourcing</h2>
                <div class="hm-gold-divider" style="margin: 1rem 0;"></div>
                <p style="font-size: 1.05rem; color: #555; line-height: 1.7; margin-bottom: 1.2rem;">
                    We do not simply harvest; we partner. Our relationship with local Himalayan communities is built on profound respect and fair trade principles.
                </p>
                <p style="font-size: 1.05rem; color: #555; line-height: 1.7;">
                    By sourcing directly from indigenous farmers and foragers, we ensure that traditional harvesting practices are preserved, ecosystems are protected, and the communities thrive alongside our brand.
                </p>
            </div>
            <div class="story-image animate-on-scroll" style="order: 1; animation-delay: 0.2s; overflow: hidden; border-radius: 12px; box-shadow: 0 20px 50px rgba(0,0,0,0.1);">
                <div class="story-bg parallax-bg" role="img" aria-label="Wild Mountain Honey Harvesting" style="background-image: url('<?= SITE_URL ?>/image/honey.webp'); aspect-ratio: 1/1; height: 110%; background-size: cover; background-position: center;"></div>
            </div>
        </div>
    </div>
</section>

<!-- Purity and Craftsmanship -->
<section class="section" style="padding: 3rem 0; background: var(--color-white);">
    <div class="container">
        <div class="story-grid">
            <div class="story-image animate-on-scroll" style="overflow: hidden; border-radius: 12px; box-shadow: 0 20px 50px rgba(0,0,0,0.1);">
                <div class="story-bg parallax-bg" role="img" aria-label="Premium Saffron" style="background-image: url('<?= SITE_URL ?>/image/saffron.webp'); aspect-ratio: 1/1; height: 110%; background-size: cover; background-position: center;"></div>
            </div>
            <div class="story-content animate-on-scroll" style="animation-delay: 0.2s;">
                <h2 style="font-family: var(--font-heading); color: var(--color-primary); font-size: 2.2rem; margin-bottom: 0; letter-spacing: -0.01em;">Purity & Craftsmanship</h2>
                <div class="hm-gold-divider" style="margin: 1rem 0;"></div>
                <p style="font-size: 1.05rem; color: #555; line-height: 1.7; margin-bottom: 1.2rem;">
                    Every product that bears the HimalayanMonk name undergoes rigorous quality control without ever compromising its natural integrity. We refuse to use artificial additives, preservatives, or synthetic fillers.
                </p>
                <p style="font-size: 1.05rem; color: #555; line-height: 1.7;">
                    What you receive is exactly what nature intended—potent, unadulterated, and meticulously crafted for maximum efficacy.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Community Connection Banner -->
<section class="section animate-on-scroll" style="padding: 0 0 6rem 0; background: var(--color-white);">
    <div class="container">
        <div style="background: linear-gradient(145deg, var(--color-primary) 0%, #08120c 100%); color: var(--color-white); padding: 5rem 2rem; border-radius: 16px; text-align: center; position: relative; overflow: hidden; box-shadow: 0 20px 40px rgba(26,54,38,0.15);">
            <h2 style="font-family: var(--font-heading); color: var(--color-accent); font-size: 2.8rem; margin-bottom: 1.5rem; position: relative; z-index: 2;">Join Our Community</h2>
            <p style="font-size: 1.1rem; max-width: 700px; margin: 0 auto 3rem; line-height: 1.8; color: rgba(255,255,255,0.85); position: relative; z-index: 2;">
                Wellness is a shared journey. Connect with us and experience the profound benefits of ancient Himalayan wisdom adapted for modern living.
            </p>
            <a href="<?= SITE_URL ?>/contact?ref=website" class="enquiry-btn" style="position: relative; z-index: 2;">Get In Touch</a>
        </div>
    </div>
</section>


<style>
    /* Desktop alternating layout fix */
    @media (min-width: 769px) {
        .story-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 6rem; align-items: center; }
    }
    @media (max-width: 768px) {
        .story-grid > div[style*="order: 2;"] { order: 1 !important; }
        .story-grid > div[style*="order: 1;"] { order: 2 !important; }
        .story-grid { gap: 3rem; }
    }
</style>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
