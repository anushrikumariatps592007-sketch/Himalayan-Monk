<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/header.php';

// Fetch active banners
$stmt = $pdo->query("SELECT * FROM banners WHERE is_active = 1 ORDER BY display_order ASC");
$banners = $stmt->fetchAll();

// Fetch featured products (up to 8)
$stmt = $pdo->query("SELECT * FROM products WHERE is_active = 1 ORDER BY created_at DESC LIMIT 8");
$featuredProducts = $stmt->fetchAll();

// Fetch distinct categories
$stmt = $pdo->query("SELECT DISTINCT category FROM products WHERE category IS NOT NULL AND category != '' AND is_active = 1");
$categories = $stmt->fetchAll(PDO::FETCH_COLUMN);
?>

<style>
    /* Hero section styles */
    .hero-section-unified {
        position: relative;
        width: 100%;
        height: 100vh;
        min-height: 650px;
        overflow: hidden;
        background: #000;
        display: block !important;
    }
    
    .hero-section-unified .slide-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 2;
    }

    .hero-content-wrap {
        position: relative;
        z-index: 3;
        height: 100%;
        display: flex;
        align-items: center;
    }
    
    .hero-text-box {
        text-align: left;
        max-width: 800px;
        padding: 0 15px;
    }

    .hero-anim-title {
        font-size: 4rem;
        font-weight: 400;
        line-height: 1.2;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        color: #fff;
    }

    .hero-anim-title span {
        color: #c49a45;
    }

    .hero-anim-text {
        font-size: 1.2rem;
        line-height: 1.6;
        max-width: 600px;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        color: #fff;
        margin-top: 20px;
    }

    .hero-anim-btn {
        background-color: #c49a45;
        color: #fff;
        border: none;
        padding: 12px 30px;
        font-weight: 600;
        letter-spacing: 1px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .hero-anim-btn:hover {
        background-color: #a37f37;
        color: #fff;
    }

    @media (max-width: 767px) {
        .hero-anim-title {
            font-size: 2.5rem;
        }
        .hero-anim-text {
            font-size: 1rem;
        }
        .hero-anim-text br {
            display: none;
        }
    }
</style>

<!-- Hero Video Section -->
<section class="hero-section-unified">
    <video autoplay muted loop playsinline style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1; min-width: 100%; min-height: 100%;">
        <source src="image/final_him.mp4" type="video/mp4">
    </video>
    <div class="slide-overlay"></div>
    
    <div class="container hero-content-wrap">
        <div class="hero-text-box">
            <h1 class="hero-anim-title hero-gsap-elem">
                Ancient Wisdom.<br>
                <span>Modern Wellness.</span>
            </h1>
            
            <!-- <div class="hero-gsap-elem" style="margin-top: 15px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="#c49a45" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="width: 32px; height: 32px;">
                    <path d="M12 22c4-2 7-5.5 7-10 0-4-3-7-7-10-4 3-7 6-7 10 0 4.5 3 8 7 10z"></path>
                    <path d="M12 22c-2.5-3-4-7-4-10 0-3 1.5-6 4-8 2.5 2 4 5 4 8 0 3-1.5 7-4 10z"></path>
                </svg>
            </div> -->

            <p class="hero-anim-text hero-gsap-elem">
                In the high Himalayas, monks embraced a way of life<br>
                rooted in balance, resilience, and inner clarity.<br>
                We carry that wisdom forward—so you can thrive<br>
                in your everyday journey.
            </p>
            
            <div class="hero-gsap-elem" style="margin-top: 40px;">
                <a href="#welcome-section" class="btn hero-anim-btn">
                    OUR STORY 
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 18px; height: 18px; margin-left: 5px;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Initial hide for elements so they don't flash before GSAP kicks in
    if (typeof gsap !== 'undefined') {
        gsap.set(".hero-gsap-elem", { opacity: 0, y: 50 });
        
        // Wait a slight moment for everything to settle, then animate
        setTimeout(() => {
            gsap.to(".hero-gsap-elem", {
                opacity: 1, 
                y: 0, 
                duration: 1, 
                stagger: 0.2, 
                ease: "power3.out"
            });
        }, 100);
    }
    
    // Smooth scroll for the OUR STORY button
    const storyBtn = document.querySelector('a[href="#welcome-section"]');
    if (storyBtn) {
        storyBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector('#welcome-section');
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }
});
</script>

<!-- Brand Welcome Section -->
<section id="welcome-section" class="section welcome-section animate-on-scroll" style="position: relative; overflow: hidden;">
    <div class="container">
        <div class="story-grid welcome-grid">
            <div class="welcome-content" style="text-align: left;">
                <h2 style="font-size: 2.8rem; margin-bottom: 1rem; color: var(--color-primary); font-family: var(--font-heading);">Welcome to HimalayanMonk.</h2>
                <div class="hm-gold-divider" style="margin: 0 0 1.5rem 0; margin-left: 0;"></div>
                <p class="welcome-text" style="max-width: 100%; margin: 0 0 2rem 0; text-align: left;">
                    Discover the untouched purity of the Himalayas. We sustainably source the finest natural and organic treasures from high-altitude terrains, delivering unparalleled quality and wellness to your everyday life. Embrace nature's finest gifts.
                </p>
                <a href="<?= SITE_URL ?>/products?ref=website" class="btn btn-outline-dark">Explore Our Range</a>
            </div>
            <div class="welcome-media" style="border-radius: 8px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.1); border: 1px solid rgba(196, 154, 69, 0.2);">
                <video src="<?= SITE_URL ?>/image/HoneyShot1.mp4" autoplay loop muted playsinline controls style="width: 100%; height: auto; display: block;"></video>
            </div>
        </div>
    </div>
</section>

<!-- Our Philosophy Section -->
<section class="philosophy-section">
    <!-- Top Light Section -->
    <div class="philosophy-top animate-on-scroll">
        <div class="container">
            <div class="philosophy-eyebrow">Our Philosophy</div>
            <h2 class="philosophy-heading">Rooted in Nature.<br>Guided by Purpose.</h2>
            <div class="philosophy-lotus">
                <!-- Simple Lotus SVG inline -->
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22c4-2 7-5.5 7-10 0-4-3-7-7-10-4 3-7 6-7 10 0 4.5 3 8 7 10z"></path>
                    <path d="M12 22c-2.5-3-4-7-4-10 0-3 1.5-6 4-8 2.5 2 4 5 4 8 0 3-1.5 7-4 10z"></path>
                    <path d="M12 22v-8"></path>
                </svg>
            </div>
            <p class="philosophy-subtitle">We believe true wellness starts with respect for nature, commitment to purity, and a mindful approach to everyday living.</p>
            
            <div class="philosophy-grid">
                <div class="philosophy-item animate-stagger">
                    <div class="philosophy-icon-wrap">
                        <i data-feather="feather"></i>
                    </div>
                    <h3 class="philosophy-item-title">Pure & Natural</h3>
                    <p class="philosophy-item-text">We source the finest ingredients from the pristine regions of the Himalayas.</p>
                </div>
                
                <div class="philosophy-item animate-stagger">
                    <div class="philosophy-icon-wrap">
                        <i data-feather="compass"></i>
                    </div>
                    <h3 class="philosophy-item-title">Rooted In Tradition</h3>
                    <p class="philosophy-item-text">Centuries of traditional wellness practices guide our formulations for mind, body and spirit.</p>
                </div>
                
                <div class="philosophy-item animate-stagger">
                    <div class="philosophy-icon-wrap">
                        <i data-feather="check-circle"></i>
                    </div>
                    <h3 class="philosophy-item-title">Backed By Quality</h3>
                    <p class="philosophy-item-text">Every product is carefully tested and crafted to the highest quality standards.</p>
                </div>
                
                <div class="philosophy-item animate-stagger">
                    <div class="philosophy-icon-wrap">
                        <i data-feather="heart"></i>
                    </div>
                    <h3 class="philosophy-item-title">Made For You</h3>
                    <p class="philosophy-item-text">Thoughtfully created to support your daily wellness journey—naturally and effectively.</p>
                </div>
            </div>
        </div>
    </div>


</section>

<!-- Featured Products -->
<section class="section featured-section" style="position: relative; overflow: hidden;">
    <div class="container">
        <div class="philosophy-eyebrow animate-on-scroll" style="margin-bottom: 0.5rem; color: #a17f36;">Our Collection</div>
        <h2 class="section-title text-center animate-on-scroll" style="width:100%; font-size: 2.2rem; margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.05em; color: #2B2B28;">Wellness From The Himalayas</h2>
        <p class="text-center animate-on-scroll" style="color: #555; max-width: 600px; margin: 0 auto 3rem auto; font-size: 1.05rem;">Thoughtfully crafted products to support your everyday wellness.</p>
        <div class="product-grid">
            <?php foreach ($featuredProducts as $product): ?>
                <a href="<?= SITE_URL ?>/product.php?slug=<?= urlencode($product['slug']) ?>&ref=website" class="product-card">
                    <div class="product-image-wrapper">
                        <?php if ($product['image_path']): ?>
                            <img src="<?= SITE_URL ?>/image/<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="product-image" loading="lazy">
                        <?php else: ?>
                            <div class="product-image placeholder-image">No Image</div>
                        <?php endif; ?>
                        <div class="product-hover-overlay">
                            <span class="view-product-text">View Product</span>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name"><?= htmlspecialchars($product['name']) ?></h3>
                        <p class="product-short-desc"><?= htmlspecialchars($product['short_description']) ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4 animate-on-scroll" style="margin-bottom: 3rem;">
            <a href="<?= SITE_URL ?>/products?ref=website" class="btn btn-outline-dark">Explore Entire Collection</a>
        </div>
    </div>
</section>

<!-- Browse by Category -->
<?php if (count($categories) > 0): ?>
<section class="section category-section animate-on-scroll" style="position: relative; overflow: hidden;">
    <div class="container">
        <h2 class="section-title text-center" style="width:100%">Browse by Category</h2>
        <div class="hm-gold-divider"></div>
        <div class="category-grid animate-on-scroll">
            <?php 
            $catImages = [
                'Pantry' => SITE_URL . '/image/honey.webp',
                'Wellness' => SITE_URL . '/image/shilajit.webp',
                'Spices' => SITE_URL . '/image/saffron.webp'
            ];
            foreach ($categories as $cat): 
                $bgUrl = isset($catImages[$cat]) ? $catImages[$cat] : SITE_URL . '/image/turmeric.webp';
            ?>
                <a href="<?= SITE_URL ?>/products?category=<?= urlencode($cat) ?>&ref=website" class="category-card" style="background-image: url('<?= $bgUrl ?>');">
                    <div class="category-overlay"></div>
                    <h3 class="category-name"><?= htmlspecialchars($cat) ?></h3>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Brand Story Teaser -->
<section class="section story-teaser animate-on-scroll">
    <div class="container">
        <div class="story-grid">
            <div class="story-image animate-on-scroll" style="overflow: hidden; border-radius: 4px;">
                <div class="story-bg parallax-bg" role="img" aria-label="Himalayan Shilajit Resin" style="height: 130%;"></div>
            </div>
            <div class="story-content animate-on-scroll">
                <h2>The Essence of the Himalayas</h2>
                <p>Our journey begins at the roof of the world, where pristine air and mineral-rich soils cultivate extraordinary flora. We partner directly with local communities to bring you products that are as pure as the mountains they come from.</p>
                <a href="<?= SITE_URL ?>/about?ref=website" class="btn btn-outline-dark mt-2">Discover Our Story</a>
            </div>
        </div>
    </div>
</section>





<!-- Bottom Dark Section (Moved to Footer) -->
<section class="section philosophy-bottom animate-on-scroll" style="background-image: url('<?= SITE_URL ?>/image/wellness.webp'); background-size: cover; background-position: center; position: relative;">
    <div style="position: absolute; inset: 0; background: rgba(18, 22, 26, 0.85); z-index: 1;"></div>
    <div class="container" style="position: relative; z-index: 2; padding: 4rem 0;">
        <div class="philosophy-grid">
            <div class="philosophy-item animate-stagger">
                <div class="philosophy-icon-wrap" style="border-color: rgba(196,154,69,0.5);">
                    <i data-feather="globe"></i>
                </div>
                <h3 class="philosophy-item-title">Honest Sourcing</h3>
                <p class="philosophy-item-text">We work with trusted partners who share our commitment to ethical and sustainable sourcing.</p>
            </div>
            
            <div class="philosophy-item animate-stagger">
                <div class="philosophy-icon-wrap" style="border-color: rgba(196,154,69,0.5);">
                    <i data-feather="shield"></i>
                </div>
                <h3 class="philosophy-item-title">Transparency</h3>
                <p class="philosophy-item-text">Clear labeling and honest practices because you deserve to know what you put in your body.</p>
            </div>
            
            <div class="philosophy-item animate-stagger">
                <div class="philosophy-icon-wrap" style="border-color: rgba(196,154,69,0.5);">
                    <i data-feather="award"></i>
                </div>
                <h3 class="philosophy-item-title">Integrity</h3>
                <p class="philosophy-item-text">No shortcuts. No compromises. We stand by what we promise and deliver.</p>
            </div>
            
            <div class="philosophy-item animate-stagger">
                <div class="philosophy-icon-wrap" style="border-color: rgba(196,154,69,0.5);">
                    <i data-feather="users"></i>
                </div>
                <h3 class="philosophy-item-title">Customer First</h3>
                <p class="philosophy-item-text">Your wellness is our priority. We're here to support you every step of the way.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section testimonial-section animate-on-scroll" style="background: var(--color-bg); padding: 5rem 0;">
    <div class="container text-center">
        <h2 class="section-title" style="margin-bottom: 2.5rem; color: var(--color-primary);">What Our Customers Say</h2>
        <div class="testimonial-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; max-width: 1200px; margin: 0 auto; text-align: left;">
            
            <div class="testimonial-card" style="background: #fff; padding: 2.5rem 2rem; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: 1px solid rgba(196,154,69,0.15); height: 100%; display: flex; flex-direction: column; text-align: center;">
                <div class="rating" style="color: var(--color-accent); margin-bottom: 1.2rem; display: flex; justify-content: center; gap: 4px;">
                    <i data-feather="star" fill="currentColor"></i><i data-feather="star" fill="currentColor"></i><i data-feather="star" fill="currentColor"></i><i data-feather="star" fill="currentColor"></i><i data-feather="star" fill="currentColor"></i>
                </div>
                <p style="font-style: italic; color: #555; margin-bottom: 2rem; flex-grow: 1; font-size: 1.05rem; line-height: 1.6;">"The quality of the Himalayan Shilajit is outstanding. I've noticed a significant improvement in my energy levels since I started using it daily. Truly pure!"</p>
                <h4 style="font-family: var(--font-heading); color: var(--color-primary); font-size: 1.1rem; margin: 0;">- Sarah M.</h4>
            </div>
            
            <div class="testimonial-card" style="background: #fff; padding: 2.5rem 2rem; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: 1px solid rgba(196,154,69,0.15); height: 100%; display: flex; flex-direction: column; text-align: center;">
                <div class="rating" style="color: var(--color-accent); margin-bottom: 1.2rem; display: flex; justify-content: center; gap: 4px;">
                    <i data-feather="star" fill="currentColor"></i><i data-feather="star" fill="currentColor"></i><i data-feather="star" fill="currentColor"></i><i data-feather="star" fill="currentColor"></i><i data-feather="star" fill="currentColor"></i>
                </div>
                <p style="font-style: italic; color: #555; margin-bottom: 2rem; flex-grow: 1; font-size: 1.05rem; line-height: 1.6;">"I absolutely love their Saffron. The aroma and color it brings to my dishes is unmatched. You can immediately tell it's sourced ethically and authentically."</p>
                <h4 style="font-family: var(--font-heading); color: var(--color-primary); font-size: 1.1rem; margin: 0;">- James T.</h4>
            </div>
            
            <div class="testimonial-card" style="background: #fff; padding: 2.5rem 2rem; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: 1px solid rgba(196,154,69,0.15); height: 100%; display: flex; flex-direction: column; text-align: center;">
                <div class="rating" style="color: var(--color-accent); margin-bottom: 1.2rem; display: flex; justify-content: center; gap: 4px;">
                    <i data-feather="star" fill="currentColor"></i><i data-feather="star" fill="currentColor"></i><i data-feather="star" fill="currentColor"></i><i data-feather="star" fill="currentColor"></i><i data-feather="star" fill="currentColor"></i>
                </div>
                <p style="font-style: italic; color: #555; margin-bottom: 2rem; flex-grow: 1; font-size: 1.05rem; line-height: 1.6;">"Finding truly organic honey has been a struggle until I found HimalayanMonk. The taste is incredibly rich. I highly recommend their products."</p>
                <h4 style="font-family: var(--font-heading); color: var(--color-primary); font-size: 1.1rem; margin: 0;">- Priya K.</h4>
            </div>
            
        </div>
    </div>
</section>



<!-- Custom JS for Slider and Animations (now in footer.php) -->
<?php require_once __DIR__ . '/includes/footer.php'; ?>
