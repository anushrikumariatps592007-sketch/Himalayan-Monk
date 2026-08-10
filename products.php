<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/header.php';

// Fetch distinct categories for the tabs
$catStmt = $pdo->query("SELECT DISTINCT category FROM products WHERE category IS NOT NULL AND category != '' AND is_active = 1");
$categories = $catStmt->fetchAll(PDO::FETCH_COLUMN);

// Fetch ALL active products
$stmt = $pdo->query("SELECT * FROM products WHERE is_active = 1 ORDER BY display_order ASC, created_at DESC");
$products = $stmt->fetchAll();
?>

<!-- Page Hero Banner -->
<section class="products-hero-banner" style="position: relative; width: 100%; height: 60vh; min-height: 450px; max-height: 650px; background: #08120c; overflow: hidden;">
    <?php 
    ?>
    <img src="<?= SITE_URL ?>/image/Product.webp" alt="Our Products - Pure gifts from the heart of the Himalayas" style="width: 100%; height: 100%; object-fit: cover; object-position: center; display: block;">
    
    <!-- Hero Overlay & Content -->
    <div style="position: absolute; inset: 0; background: transparent; display: flex; align-items: center; justify-content: flex-start; text-align: left;">
        <div class="container animate-on-scroll">
            <h1 style="color: #f8f6f0; font-family: var(--font-heading); font-size: clamp(2.5rem, 5vw, 4rem); margin-bottom: 1rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Our Collection</h1>
            <p style="color: rgba(255, 255, 255, 0.9); font-size: 1.1rem; max-width: 450px; margin: 0; line-height: 1.6; text-shadow: 1px 1px 3px rgba(0,0,0,0.5);">Discover the finest natural wellness treasures sustainably sourced from the pristine altitudes of the Himalayas.</p>
        </div>
    </div>
</section>

<!-- Main Products Section -->
<section class="section products-page-section" style="position: relative; overflow: hidden; padding: 3rem 0 6rem;">
    <div class="container text-center">
        <h1 class="page-title" style="margin-top: 1rem;">Our Products</h1>
        <div class="hm-gold-divider"></div>
        
        <!-- Category Filter Tabs -->
        <div class="category-tabs animate-on-scroll">
            <a href="javascript:void(0)" class="cat-tab active" data-filter="All">All</a>
            <?php foreach ($categories as $cat): ?>
                <a href="javascript:void(0)" class="cat-tab" data-filter="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></a>
            <?php endforeach; ?>
        </div>

        <!-- Product Grid -->
        <?php if (count($products) > 0): ?>
            <div class="product-grid">
                <?php foreach ($products as $index => $product): $delay = $index * 0.1; ?>
                    <a href="<?= SITE_URL ?>/product.php?slug=<?= urlencode($product['slug']) ?>&ref=website" class="product-card fade-in-up" data-category="<?= htmlspecialchars($product['category'] ?? '') ?>" style="animation-delay: <?= $delay ?>s;">
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
                            <span class="product-cat-label"><?= htmlspecialchars($product['category'] ?? '') ?></span>
                            <h3 class="product-name"><?= htmlspecialchars($product['name']) ?></h3>
                            <p class="product-short-desc"><?= htmlspecialchars($product['short_description']) ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Empty Category State -->
            <div class="empty-state text-center animate-on-scroll">
                <h3>No products found</h3>
                <p>We couldn't find any products in this category right now. Please check back later or explore other categories.</p>
            </div>
        <?php endif; ?>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.category-tabs .cat-tab');
    const products = document.querySelectorAll('.product-grid .product-card');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove('active'));
            // Add active class to clicked tab
            this.classList.add('active');
            
            const filterValue = this.getAttribute('data-filter');
            let visibleCount = 0;
            
            products.forEach(product => {
                const productCategory = product.getAttribute('data-category');
                
                if (filterValue === 'All' || productCategory === filterValue) {
                    product.style.display = 'block';
                    visibleCount++;
                    // Re-trigger animation
                    product.style.animation = 'none';
                    product.offsetHeight; /* trigger reflow */
                    product.style.animation = null; 
                } else {
                    product.style.display = 'none';
                }
            });

            // Optional: Handle empty state if needed, though all active products should be shown.
            const emptyState = document.querySelector('.empty-state');
            if(emptyState) {
                if(visibleCount === 0) {
                    emptyState.style.display = 'block';
                } else {
                    emptyState.style.display = 'none';
                }
            }
        });
    });
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
