<?php require_once 'includes/header.php'; ?>

<!-- HERO SECTION -->
<section class="ingredients-hero">
    <div class="hero-overlay"></div>
    <div class="container hero-content text-left">
        <h1 class="hero-title animate-fade-up">Pure Himalayan<br>Ingredients</h1>
        <div class="hero-divider animate-fade-up" style="animation-delay: 0.1s;">
            <i data-feather="sun" class="gold-icon"></i>
            <div class="gold-line"></div>
        </div>

        <div class="animate-fade-up" style="margin-top: 2rem; animation-delay: 0.3s;">
            <a href="<?= SITE_URL ?>/products?ref=website" class="wj-btn wj-btn-primary">Explore Collection</a>
        </div>
    </div>
</section>

<!-- TRUST STRIP -->
<section class="trust-strip">
    <div class="container trust-strip-inner">
        <div class="trust-item">
            <i data-feather="image" class="trust-icon"></i>
            <div>
                <h4>PURE & NATURAL</h4>
                <p>Sourced from the<br>Himalayas</p>
            </div>
        </div>
        <div class="trust-item">
            <i data-feather="check-circle" class="trust-icon"></i>
            <div>
                <h4>SCIENCE BACKED</h4>
                <p>Formulated with<br>evidence & tradition</p>
            </div>
        </div>
        <div class="trust-item">
            <i data-feather="award" class="trust-icon"></i>
            <div>
                <h4>PREMIUM QUALITY</h4>
                <p>Third-party tested<br>for purity & potency</p>
            </div>
        </div>
        <div class="trust-item">
            <i data-feather="heart" class="trust-icon"></i>
            <div>
                <h4>HOLISTIC WELLNESS</h4>
                <p>Supporting body,<br>mind & spirit</p>
            </div>
        </div>
        <div class="trust-item">
            <i data-feather="globe" class="trust-icon"></i>
            <div>
                <h4>SUSTAINABLE</h4>
                <p>Ethical sourcing for<br>a better tomorrow</p>
            </div>
        </div>
    </div>
</section>

<!-- COLLECTION TITLE -->
<section class="collection-title-section">
    <div class="container text-center">
        <h2>Our Himalayan Wellness Collection</h2>
        <p>Four powerful gifts from nature, crafted to elevate your everyday wellness.</p>
    </div>
</section>

<!-- COLLECTION CARDS -->
<section class="collection-cards" id="horizontal-scroll-section">
    <div class="horizontal-scroll-container">
        <!-- Card 1: Saffron -->
        <div class="horizontal-item">
            <div class="container">
                <div class="ingredient-card">
                    <div class="ing-img-col">
                        <img src="<?= SITE_URL ?>/image/saffron.webp" alt="Himalayan Monk Saffron">
                    </div>
                    <div class="ing-text-col">
                        <span class="ing-brand">HIMALAYAN MONK</span>
                        <h2 class="ing-title" style="color: #C49A45;">SAFFRON</h2>
                        <span class="ing-subtitle">The Golden Elixir</span>
                        <p class="ing-desc">Handpicked from the high-altitude valleys of Kashmir, our saffron is rich in crocin, safranal, and picrocrocin compounds that support mood, memory, skin health, and overall vitality.</p>
                        <a href="<?= SITE_URL ?>/product/saffron?ref=website" class="btn-primary" style="background:#C49A45;border-color:#6a1a21;color:#fff;">EXPLORE SAFFRON</a>
                    </div>
                    <div class="ing-features-col">
                        <ul class="ing-feature-list">
                            <li><i data-feather="smile"></i> Enhances Mood & Relaxation</li>
                            <li><i data-feather="sun"></i> Supports Healthy Skin</li>
                            <li><i data-feather="shield"></i> Antioxidant Rich</li>
                            <li><i data-feather="activity"></i> Promotes Mental Clarity</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Shilajit -->
        <div class="horizontal-item">
            <div class="container">
                <div class="ingredient-card">
                    <div class="ing-img-col">
                        <img src="<?= SITE_URL ?>/image/shilajit.webp" alt="Himalayan Monk Shilajit">
                    </div>
                    <div class="ing-text-col">
                        <span class="ing-brand">HIMALAYAN MONK</span>
                        <h2 class="ing-title" style="color: #C49A45;">SHILAJIT</h2>
                        <span class="ing-subtitle">Nature's Ultimate Rejuvenator</span>
                        <p class="ing-desc">Rich in fulvic acid, minerals, and trace elements that help boost energy, stamina, strength, and overall performance.</p>
                        <a href="<?= SITE_URL ?>/product/shilajit?ref=website" class="btn-primary" style="background:#C49A45;border-color:#222;color:#fff;">DISCOVER SHILAJIT</a>
                    </div>
                    <div class="ing-features-col">
                        <ul class="ing-feature-list">
                            <li><i data-feather="zap"></i> Boosts Energy & Stamina</li>
                            <li><i data-feather="bar-chart-2"></i> Supports Testosterone & Strength</li>
                            <li><i data-feather="refresh-cw"></i> Enhances Recovery</li>
                            <li><i data-feather="shield-alert"></i> Promotes Longevity</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Honey -->
        <div class="horizontal-item">
            <div class="container">
                <div class="ingredient-card">
                    <div class="ing-img-col">
                        <img src="<?= SITE_URL ?>/image/honey.webp" alt="Himalayan Monk Honey">
                    </div>
                    <div class="ing-text-col">
                        <span class="ing-brand">HIMALAYAN MONK</span>
                        <h2 class="ing-title" style="color: #C49A45;">HONEY</h2>
                        <span class="ing-subtitle">Nature's Purest Sweetness</span>
                        <p class="ing-desc">Sourced from wild Himalayan forests, our raw honey is unprocessed and unfiltered to retain natural enzymes, antioxidants, and nutrients that support immunity and overall wellness.</p>
                        <a href="<?= SITE_URL ?>/product/honey?ref=website" class="btn-primary" style="background:#C49A45;border-color:#a57b32;color:#fff;">EXPLORE HONEY</a>
                    </div>
                    <div class="ing-features-col">
                        <ul class="ing-feature-list">
                            <li><i data-feather="shield"></i> Boosts Immunity</li>
                            <li><i data-feather="star"></i> Rich in Antioxidants</li>
                            <li><i data-feather="heart"></i> Supports Digestive Health</li>
                            <li><i data-feather="battery-charging"></i> Natural Energy Source</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4: Lakadong Curcumin -->
        <div class="horizontal-item">
            <div class="container">
                <div class="ingredient-card">
                    <div class="ing-img-col">
                        <img src="<?= SITE_URL ?>/image/turmeric.webp" alt="Himalayan Monk Lakadong Curcumin">
                    </div>
                    <div class="ing-text-col">
                        <span class="ing-brand">HIMALAYAN MONK</span>
                        <h2 class="ing-title" style="color: #C49A45;">LAKADONG TURMERIC</h2>
                        <span class="ing-subtitle">The Power of Purity</span>
                        <p class="ing-desc">Made with premium Lakadong turmeric from Meghalaya, combined with ginger and BioPerine® for enhanced absorption. Supports joint health, reduces inflammation, and promotes overall well-being.</p>
                        <a href="<?= SITE_URL ?>/product/lakadong-turmeric?ref=website" class="btn-primary" style="background:#C49A45;border-color:#c15e19;color:#fff;">DISCOVER TURMERIC</a>
                    </div>
                    <div class="ing-features-col">
                        <ul class="ing-feature-list">
                            <li><i data-feather="activity"></i> Supports Joint Health</li>
                            <li><i data-feather="sun"></i> Powerful Anti-Inflammatory</li>
                            <li><i data-feather="coffee"></i> Enhances Digestion</li>
                            <li><i data-feather="heart"></i> Supports Overall Wellness</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BOTTOM BANNER -->
<section class="bottom-trust-banner">
    <div class="container banner-inner">
        <div class="banner-left">
            <div class="shield-container">
                <i data-feather="shield" class="banner-seal"></i>
            </div>
            <div>
                <h3 class="banner-title">Rooted in Ancient Wisdom.<br>Backed by Modern Science.</h3>
                <p class="banner-desc">Experience the true essence of the Himalayas<br>in every drop, every gram, every day.</p>
            </div>
        </div>
        <div class="banner-middle">
            <div class="b-icon-box"><i data-feather="triangle"></i><span>PURE</span></div>
            <div class="b-icon-box"><i data-feather="aperture"></i><span>POTENT</span></div>
            <div class="b-icon-box"><i data-feather="check-square"></i><span>AUTHENTIC</span></div>
            <div class="b-icon-box"><i data-feather="award"></i><span>TRUSTED</span></div>
        </div>
        <div class="banner-right">
            <div>
                <h4 class="ritual-title">Build Your<br>Wellness Ritual</h4>
                <p class="ritual-desc">Create a daily ritual with our<br>himalayan superfoods.</p>
            </div>
            <a href="<?= SITE_URL ?>/products?ref=website" class="btn-primary btn-gold">EXPLORE ALL PRODUCTS</a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>

<script>
    window.addEventListener("load", function() {
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);

            let horizontalSection = document.getElementById("horizontal-scroll-section");
            let horizontalContainer = horizontalSection.querySelector(".horizontal-scroll-container");
            let horizontalItems = gsap.utils.toArray(".horizontal-item");

            if (horizontalSection && horizontalContainer && horizontalItems.length > 0) {
                let getScrollAmount = () => -(horizontalContainer.scrollWidth - window.innerWidth);

                let tween = gsap.to(horizontalContainer, {
                    x: getScrollAmount,
                    ease: "none",
                    scrollTrigger: {
                        trigger: horizontalSection,
                        pin: true,
                        start: "top 120px", // Offset for the fixed header
                        scrub: 1,
                        snap: 1 / (horizontalItems.length - 1),
                        end: () => "+=" + (horizontalContainer.scrollWidth - window.innerWidth),
                        invalidateOnRefresh: true
                    }
                });
                
                // If using Lenis or other smooth scroll, sometimes a refresh is needed after load
                ScrollTrigger.refresh();
            }
        }
    });
</script>
