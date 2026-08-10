<?php
require_once __DIR__ . '/includes/db.php';

$slug = $_GET['slug'] ?? '';
if (empty($slug)) {
    header('Location: ' . SITE_URL . '/products.php');
    exit;
}

// Fetch product
$stmt = $pdo->prepare("SELECT * FROM products WHERE slug = ? AND is_active = 1");
$stmt->execute([$slug]);
$product = $stmt->fetch();

if (!$product) {
    header('Location: ' . SITE_URL . '/products.php');
    exit;
}

// Fetch related products (same category, exclude current)
$relatedStmt = $pdo->prepare("SELECT * FROM products WHERE category = ? AND id != ? AND is_active = 1 ORDER BY display_order ASC LIMIT 4");
$relatedStmt->execute([$product['category'], $product['id']]);
$relatedProducts = $relatedStmt->fetchAll();

require_once __DIR__ . '/includes/header.php';
?>

<!-- ========================================== -->
<!-- 1. HIGHLIGHTS BAR                          -->
<!-- ========================================== -->
<?php 
$highlights = !empty($product['product_highlights']) ? array_filter(array_map('trim', explode("\n", $product['product_highlights']))) : [];
if (count($highlights) > 0): 
    $icons = ['feather', 'compass', 'check-circle', 'star'];
?>
<section class="prod-v2-section prod-v2-highlights animate-on-scroll" style="margin-top: 80px;">
    <div class="container">
        <div class="prod-v2-highlights-grid">
            <?php foreach (array_slice($highlights, 0, 4) as $index => $highlight): ?>
                <div class="prod-v2-highlight-item">
                    <div class="prod-v2-highlight-icon">
                        <i data-feather="<?= $icons[$index % count($icons)] ?>"></i>
                    </div>
                    <h3 class="prod-v2-highlight-title"><?= htmlspecialchars($highlight) ?></h3>
                    <p class="prod-v2-highlight-desc">100% authentic and ethically sourced</p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php else: ?>
<!-- Fallback margin if no highlights -->
<div style="margin-top: 80px;"></div>
<?php endif; ?>

<!-- ========================================== -->
<?php
// 1. First, check if admin has uploaded any additional_images for this product
$secImgs = [];
$additionalImages = !empty($product['additional_images']) ? json_decode($product['additional_images'], true) : [];

if (!empty($additionalImages) && is_array($additionalImages)) {
    // If they exist, cycle through them for the 4 sections
    for ($i = 0; $i < 4; $i++) {
        $secImgs[$i] = SITE_URL . '/image/' . $additionalImages[$i % count($additionalImages)];
    }
} else {
    // 2. Fallback: Determine which hardcoded asset images to use based on product name/slug
    $pSearch = strtolower(($product['name'] ?? '') . ' ' . ($product['slug'] ?? ''));
    $assetImages = [];

    if (strpos($pSearch, 'saffron') !== false) {
        $assetImages = ['saffron.webp', 'saffron1.webp', 'saffron2.webp'];
    } elseif (strpos($pSearch, 'shilajit') !== false) {
        $assetImages = ['shilajit.webp', 'shilajit1.webp', 'shilajit2.webp', 'shilajit1.webp'];
    } elseif (strpos($pSearch, 'honey') !== false) {
        $assetImages = ['honey.webp', 'honey1.webp', 'honey2.webp', 'honey3.webp'];
    } elseif (strpos($pSearch, 'turmeric') !== false) {
        $assetImages = ['turmeric.webp', 'turmeric1.webp'];
    }

    for ($i = 0; $i < 4; $i++) {
        if (!empty($assetImages)) {
            $secImgs[$i] = SITE_URL . '/image/' . $assetImages[$i % count($assetImages)];
        } else {
            $secImgs[$i] = !empty($product['image_path']) ? SITE_URL . '/image/' . $product['image_path'] : '';
        }
    }
}
?>
<!-- ========================================== -->
<!-- 2. OUR STORY                               -->
<!-- ========================================== -->
<section class="prod-v2-section animate-on-scroll" style="background-color: #F8F6F0; padding: 3rem 0;">
    <div class="container">
        <div class="prod-v2-alt-row">
            <div class="prod-v2-alt-img">
                <?php if (!empty($secImgs[0])): ?>
                    <img src="<?= htmlspecialchars($secImgs[0]) ?>" alt="Our Story">
                <?php else: ?>
                    <div style="width:100%; height:400px; background:#e0dcd3; border-radius:8px;"></div>
                <?php endif; ?>
            </div>
            <div class="prod-v2-alt-text">
                <div class="prod-v2-eyebrow">Our Story</div>
                <h1 class="prod-v2-story-title"><?= htmlspecialchars($product['name']) ?></h1>
                <div class="prod-v2-story-text">
                    <?= !empty($product['product_intro']) ? nl2br(htmlspecialchars($product['product_intro'])) : nl2br(htmlspecialchars($product['full_description'])) ?>
                </div>
                <div>
                    <a href="<?= SITE_URL ?>/contact?product=<?= urlencode($product['name']) ?>&ref=website" class="btn btn-outline-dark" style="border-color:#1C1C1A; color:#1C1C1A; border-radius:50px; padding:0.8rem 2rem; font-weight:600; text-transform:uppercase; letter-spacing:0.1em; font-size:0.8rem;">Enquire Now <i data-feather="arrow-right" style="width:16px; height:16px; vertical-align:middle; margin-left:8px;"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- 3. WHY CHOOSE                              -->
<!-- ========================================== -->
<?php 
$benefits = !empty($product['key_benefits']) ? array_filter(array_map('trim', explode("\n", $product['key_benefits']))) : [];
if (count($benefits) > 0): 
    $benefitIcons = ['award', 'sun', 'shield', 'thumbs-up', 'heart'];
?>
<section class="prod-v2-section animate-on-scroll" style="background-color: #1C1C1A; background-image: linear-gradient(135deg, rgba(28,28,26,0.95) 0%, rgba(18,20,18,0.98) 100%); padding: 3rem 0;">
    <div class="container">
        <div class="prod-v2-alt-row reverse">
            <div class="prod-v2-alt-img">
                <?php if (!empty($secImgs[1])): ?>
                    <img src="<?= htmlspecialchars($secImgs[1]) ?>" alt="Why Choose">
                <?php else: ?>
                    <div style="width:100%; height:400px; background:#222; border-radius:8px;"></div>
                <?php endif; ?>
            </div>
            <div class="prod-v2-alt-text">
                <h2 class="prod-v2-why-title" style="text-align: left;">Why Choose Himalayan Monk <?= htmlspecialchars($product['name']) ?>?</h2>
                <div class="prod-v2-why-grid">
                    <?php foreach (array_slice($benefits, 0, 5) as $index => $benefit): ?>
                        <div class="prod-v2-why-item">
                            <div class="prod-v2-why-icon-wrap">
                                <i data-feather="<?= $benefitIcons[$index % count($benefitIcons)] ?>"></i>
                            </div>
                            <h3 class="prod-v2-why-item-title"><?= htmlspecialchars($benefit) ?></h3>
                            <p class="prod-v2-why-item-desc">Premium quality assurance.</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ========================================== -->
<!-- 4. PRODUCT DETAILS                         -->
<!-- ========================================== -->
<section class="prod-v2-section animate-on-scroll" style="background-color: #F8F6F0; padding: 3rem 0;">
    <div class="container">
        <div class="prod-v2-alt-row">
            <div class="prod-v2-alt-img">
                <?php if (!empty($secImgs[2])): ?>
                    <img src="<?= htmlspecialchars($secImgs[2]) ?>" alt="Product Details">
                <?php else: ?>
                    <div style="width:100%; height:400px; background:#e0dcd3; border-radius:8px;"></div>
                <?php endif; ?>
            </div>
            <div class="prod-v2-alt-text">
                <h2 class="prod-v2-details-title" style="text-align: left; margin-bottom: 3rem;">Product Details</h2>
                
                <div class="prod-v2-spec-item">
                    <div class="prod-v2-spec-icon"><i data-feather="map-pin"></i></div>
                    <div>
                        <div class="prod-v2-spec-title">Origin</div>
                        <div class="prod-v2-spec-value"><?= !empty($product['origin_source']) ? htmlspecialchars($product['origin_source']) : 'Himalayas, India' ?></div>
                    </div>
                </div>
                
                <div class="prod-v2-spec-item">
                    <div class="prod-v2-spec-icon"><i data-feather="star"></i></div>
                    <div>
                        <div class="prod-v2-spec-title">Grade / Purity</div>
                        <div class="prod-v2-spec-value"><?= !empty($product['purity_note']) ? htmlspecialchars($product['purity_note']) : '100% Pure Premium Quality' ?></div>
                    </div>
                </div>
                
                <?php if (!empty($product['ingredients'])): ?>
                <div class="prod-v2-spec-item">
                    <div class="prod-v2-spec-icon"><i data-feather="feather"></i></div>
                    <div>
                        <div class="prod-v2-spec-title">Ingredient</div>
                        <div class="prod-v2-spec-value"><?= htmlspecialchars($product['ingredients']) ?></div>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($product['storage_instructions'])): ?>
                <div class="prod-v2-spec-item">
                    <div class="prod-v2-spec-icon"><i data-feather="package"></i></div>
                    <div>
                        <div class="prod-v2-spec-title">Storage</div>
                        <div class="prod-v2-spec-value"><?= htmlspecialchars($product['storage_instructions']) ?></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- 5. HOW TO ENJOY                            -->
<!-- ========================================== -->
<?php if (!empty($product['how_to_use']) || !empty($product['recommended_intake']) || !empty($product['best_time_to_use'])): ?>
<section class="prod-v2-section animate-on-scroll" style="background-color: #F5F2EA; padding: 3rem 0 1rem 0;">
    <div class="container">
        <div class="prod-v2-alt-row reverse">
            <div class="prod-v2-alt-img">
                <?php if (!empty($secImgs[3])): ?>
                    <img src="<?= htmlspecialchars($secImgs[3]) ?>" alt="How To Enjoy">
                <?php else: ?>
                    <div style="width:100%; height:400px; background:#e0dcd3; border-radius:8px;"></div>
                <?php endif; ?>
            </div>
            <div class="prod-v2-alt-text">
                <div class="prod-v2-eyebrow">How To Enjoy</div>
                <h2 class="prod-v2-enjoy-title" style="margin-bottom: 1.5rem;">Elevate Your Everyday.</h2>
                <p class="prod-v2-enjoy-desc" style="margin-bottom: 0;">A little goes a long way. Incorporate it seamlessly into your daily routine for maximum wellness benefits.</p>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ========================================== -->
<!-- 6. USAGE & WELLNESS                        -->
<!-- ========================================== -->
<?php if (!empty($product['how_to_use']) || !empty($product['recommended_intake']) || !empty($product['best_time_to_use'])): ?>
<section class="prod-v2-section prod-v2-usage animate-on-scroll">
    <div class="prod-v2-usage-inner">
        <div class="prod-v2-enjoy-grid">
            <?php if (!empty($product['how_to_use'])): ?>
            <div class="prod-v2-enjoy-item">
                <div class="prod-v2-enjoy-icon"><i data-feather="coffee"></i></div>
                <h4 class="prod-v2-enjoy-item-title">Usage</h4>
                <p class="prod-v2-enjoy-item-text"><?= htmlspecialchars($product['how_to_use']) ?></p>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($product['recommended_intake'])): ?>
            <div class="prod-v2-enjoy-item">
                <div class="prod-v2-enjoy-icon"><i data-feather="pie-chart"></i></div>
                <h4 class="prod-v2-enjoy-item-title">Intake</h4>
                <p class="prod-v2-enjoy-item-text"><?= htmlspecialchars($product['recommended_intake']) ?></p>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($product['best_time_to_use'])): ?>
            <div class="prod-v2-enjoy-item">
                <div class="prod-v2-enjoy-icon"><i data-feather="clock"></i></div>
                <h4 class="prod-v2-enjoy-item-title">Best Time</h4>
                <p class="prod-v2-enjoy-item-text"><?= htmlspecialchars($product['best_time_to_use']) ?></p>
            </div>
            <?php endif; ?>
            
            <div class="prod-v2-enjoy-item">
                <div class="prod-v2-enjoy-icon"><i data-feather="heart"></i></div>
                <h4 class="prod-v2-enjoy-item-title">Wellness</h4>
                <p class="prod-v2-enjoy-item-text">Experience the benefits</p>
            </div>
        </div>
        
        <?php if (!empty($product['who_should_avoid'])): ?>
        <div class="prod-v2-safety">
            <h4 class="prod-v2-safety-title">
                <i data-feather="info" style="width:18px; height:18px; margin-right:8px;"></i> 
                Important Safety Note
            </h4>
            <p class="prod-v2-safety-text"><?= nl2br(htmlspecialchars($product['who_should_avoid'])) ?></p>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- ======================= -->
<!-- SECTION 8: FAQS -->
<!-- ======================= -->
<?php 
// Check if at least one FAQ exists
$hasFaq = (!empty($product['faq_1_question']) && !empty($product['faq_1_answer'])) || 
          (!empty($product['faq_2_question']) && !empty($product['faq_2_answer'])) || 
          (!empty($product['faq_3_question']) && !empty($product['faq_3_answer']));

if ($hasFaq): 
?>
<section class="section fade-in-up product-faq-section" style="background: #fff; padding: 5rem 0;">
    <div class="container" style="max-width: 800px;">
        <h2 class="section-title text-center" style="width: 100%; font-size: 2rem;">Frequently Asked Questions</h2>
        <div class="hm-gold-divider"></div>
        
        <div class="faq-container" style="margin-top: 3rem;">
            <?php for ($i = 1; $i <= 3; $i++): ?>
                <?php if (!empty($product["faq_{$i}_question"]) && !empty($product["faq_{$i}_answer"])): ?>
                    <div class="faq-item">
                        <button class="faq-question">
                            <span><?= htmlspecialchars($product["faq_{$i}_question"]) ?></span>
                            <i data-feather="chevron-down" class="faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                <?= nl2br(htmlspecialchars($product["faq_{$i}_answer"])) ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ======================= -->
<!-- SECTION 9: ENQUIRY CTA -->
<!-- ======================= -->
<section class="section product-enquiry-cta fade-in-up" style="background: var(--color-bg); padding: 5rem 0; text-align: center; border-top: 1px solid rgba(196,154,69,0.2); border-bottom: 1px solid rgba(196,154,69,0.2);">
    <div class="container">
        <h2 style="font-family: 'Playfair Display', serif; font-size: 2.2rem; color: var(--color-primary); margin-bottom: 1rem;">Interested in this product?</h2>
        <p style="font-size: 1.1rem; color: #555; max-width: 600px; margin: 0 auto 2rem auto;">Send us your enquiry and our team will guide you with availability and product details.</p>
        <a href="<?= SITE_URL ?>/contact?product=<?= urlencode($product['name']) ?>&ref=website" class="btn-primary" style="font-size: 1.1rem; padding: 1rem 2.5rem;"><i data-feather="mail" style="width:18px; height:18px; vertical-align:middle; margin-right:8px;"></i> Enquire About This Product</a>
    </div>
</section>

<!-- Related Products Section -->
<?php if (count($relatedProducts) > 0): ?>
<section class="section related-section fade-in-up" style="position: relative; overflow: hidden;">
    <div class="container">
        <h2 class="section-title text-center" style="width: 100%;">Related Products</h2>
        <div class="hm-gold-divider"></div>
        <div class="product-grid">
            <?php foreach ($relatedProducts as $relProduct): ?>
                <a href="<?= SITE_URL ?>/product.php?slug=<?= urlencode($relProduct['slug']) ?>&ref=website" class="product-card">
                    <div class="product-image-wrapper">
                        <?php if ($relProduct['image_path']): ?>
                            <img src="<?= SITE_URL ?>/image/<?= htmlspecialchars($relProduct['image_path']) ?>" alt="<?= htmlspecialchars($relProduct['name']) ?>" class="product-image" loading="lazy">
                        <?php else: ?>
                            <div class="product-image placeholder-image">No Image</div>
                        <?php endif; ?>
                        
                        <div class="product-hover-overlay">
                            <span class="view-product-text">View Product</span>
                        </div>
                    </div>
                    
                    <div class="product-info">
                        <h3 class="product-name"><?= htmlspecialchars($relProduct['name']) ?></h3>
                        <p class="product-short-desc"><?= htmlspecialchars($relProduct['short_description']) ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Re-init feather icons manually for this page since we added them inline -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if(typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>

<script src="<?= SITE_URL ?>/assets/js/slider.js"></script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
