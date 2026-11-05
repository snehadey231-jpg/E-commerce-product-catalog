<?php
session_start();

$products = [
    [
        'id' => 1,
        'name' => 'Samsung Galaxy S24',
        'brand' => 'Samsung',
        'category' => 'smartphones',
        'price' => 24197,
        'condition' => 'New',
        'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=500',
        'description' => 'Powerful performance and stunning camera.'
    ],
    [
        'id' => 2,
        'name' => 'Dell Inspiron 15',
        'brand' => 'Dell',
        'category' => 'laptops',
        'price' => 28000,
        'condition' => 'Used',
        'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=500',
        'description' => 'Reliable laptop for work and study.'
    ],
    [
        'id' => 3,
        'name' => 'Sony Headphones',
        'brand' => 'Sony',
        'category' => 'headphones',
        'price' => 18500,
        'condition' => 'Refurbished',
        'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500',
        'description' => 'Premium sound quality.'
    ],
    [
        'id' => 4,
        'name' => 'Canon EOS 200D',
        'brand' => 'Canon',
        'category' => 'cameras',
        'price' => 35000,
        'condition' => 'Used',
        'image' => 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?w=500',
        'description' => 'Capture more beautiful memories.'
    ],
    [
        'id' => 5,
        'name' => 'PS5 Controller',
        'brand' => 'Sony',
        'category' => 'gaming',
        'price' => 8500,
        'condition' => 'Used',
        'image' => 'https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=500',
        'description' => 'Next-generation gaming experience.'
    ],
    [
        'id' => 6,
        'name' => 'Mi Earbuds 3 Pro',
        'brand' => 'Xiaomi',
        'category' => 'headphones',
        'price' => 3000,
        'condition' => 'Refurbished',
        'image' => 'https://images.unsplash.com/photo-1606220945770-b5b6c2c55bf1?w=500',
        'description' => 'Premium sound, compact design.'
    ],
    [
        'id' => 7,
        'name' => 'iPhone 15',
        'brand' => 'Apple',
        'category' => 'smartphones',
        'price' => 65000,
        'condition' => 'New',
        'image' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=500',
        'description' => 'Innovation in your hands.'
    ],
    [
        'id' => 8,
        'name' => 'Asus VivoBook 15',
        'brand' => 'Asus',
        'category' => 'laptops',
        'price' => 32000,
        'condition' => 'Used',
        'image' => 'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?w=500',
        'description' => 'Work smarter, live better.'
    ]
];

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

// DEMO ADD TO CART
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $id = (int) $_POST['product_id'];

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }

    header('Location: product.php?added=1');
    exit;
}

// CATEGORY FILTER
$category = $_GET['category'] ?? 'all';
$search = trim($_GET['search'] ?? '');
$price = $_GET['price'] ?? '';
$sort = $_GET['sort'] ?? 'default';

$filteredProducts = array_filter($products, function($product) use ($category, $search, $price) {

    if ($category !== 'all' && $product['category'] !== $category) {
        return false;
    }

    if ($search !== '' &&
        stripos($product['name'] . ' ' . $product['brand'], $search) === false) {
        return false;
    }

    if ($price === 'under15' && $product['price'] > 15000) {
        return false;
    }

    if ($price === '15to30' &&
        ($product['price'] < 15000 || $product['price'] > 30000)) {
        return false;
    }

    if ($price === 'above30' && $product['price'] < 30000) {
        return false;
    }

    return true;
});

// SORT PRODUCTS
if ($sort === 'low') {
    usort($filteredProducts, fn($a, $b) => $a['price'] <=> $b['price']);
} elseif ($sort === 'high') {
    usort($filteredProducts, fn($a, $b) => $b['price'] <=> $a['price']);
}

$cartCount = array_sum($_SESSION['cart'] ?? []);

$categories = [
    'smartphones' => '📱 Smartphones',
    'laptops' => '💻 Laptops',
    'headphones' => '🎧 Headphones',
    'cameras' => '📷 Cameras',
    'gaming' => '🎮 Gaming Devices',
    'accessories' => '⌚ Accessories',
    'other' => '📦 Other Electronics'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>All Products | ReTech</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: #f4f7fa;
    color: #172033;
}

/* HEADER */

.shop-header {
    background: #101f32;
    color: white;
    padding: 17px 4%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    flex-wrap: wrap;
}

.shop-logo {
    font-size: 30px;
    font-weight: bold;
    color: white;
    text-decoration: none;
}

.shop-logo span {
    color: #16b978;
}

.search-form {
    display: flex;
    background: white;
    border-radius: 9px;
    overflow: hidden;
    width: 35%;
}

.search-form input {
    padding: 13px;
    width: 100%;
    border: none;
    outline: none;
    font-size: 15px;
}

.search-form button {
    background: #08a85b;
    color: white;
    border: none;
    padding: 0 22px;
    cursor: pointer;
}

.shop-nav {
    display: flex;
    align-items: center;
    gap: 22px;
    flex-wrap: wrap;
}

.shop-nav a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    font-size: 14px;
}

.cart-link {
    background: #08a85b;
    padding: 12px 18px;
    border-radius: 8px;
}

/* MAIN LAYOUT */

.shop-layout {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 24px;
    padding: 30px 3%;
    max-width: 1600px;
    margin: auto;
}

/* SIDEBAR */

.sidebar {
    background: white;
    border-radius: 14px;
    padding: 25px;
    height: fit-content;
    box-shadow: 0 4px 15px rgba(0,0,0,.06);
}

.sidebar h2 {
    font-size: 25px;
    margin-bottom: 22px;
}

.category-list {
    list-style: none;
}

.category-list li {
    margin-bottom: 12px;
}

.category-list a {
    display: block;
    padding: 10px;
    text-decoration: none;
    color: #172033;
    border-radius: 7px;
    font-size: 16px;
}

.category-list a:hover,
.category-list a.active {
    background: #e5f7ed;
    color: #087f5b;
    font-weight: bold;
}

.filter-box {
    border-top: 1px solid #e5eaf0;
    margin-top: 20px;
    padding-top: 20px;
}

.filter-box h3 {
    margin-bottom: 15px;
}

.filter-box label {
    display: block;
    margin: 15px 0;
    cursor: pointer;
}

.filter-box input {
    margin-right: 9px;
    accent-color: #08a85b;
}

.filter-btn {
    width: 100%;
    background: #087f5b;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 7px;
    font-weight: bold;
    cursor: pointer;
}

.eco-box {
    margin-top: 25px;
    padding: 18px 10px;
    text-align: center;
    border-radius: 10px;
    background: #08a85b;
    color: white;
}

.eco-box h3 {
    margin-bottom: 6px;
}

/* PRODUCTS */

.products-area {
    min-width: 0;
}

.products-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 22px;
    gap: 15px;
    flex-wrap: wrap;
}

.products-top h1 {
    font-size: 32px;
}

.sort-form select {
    padding: 10px 15px;
    border: 1px solid #dce3eb;
    border-radius: 7px;
    background: white;
}

.success-message {
    background: #d9f8e6;
    color: #087f5b;
    padding: 12px;
    border-radius: 7px;
    margin-bottom: 18px;
}

/* PRODUCT GRID */

.product-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 15px;
}

.product-card {
    background: white;
    border: 1px solid #e4eaf0;
    border-radius: 15px;
    padding: 12px;
    text-align: center;
    position: relative;
    transition: .3s;
    box-shadow: 0 4px 12px rgba(0,0,0,.04);
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,.10);
}

.product-image {
    width: 100%;
    height: 155px;
    background: #f4f7fb;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 15px;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.condition {
    position: absolute;
    top: 20px;
    right: 18px;
    padding: 6px 12px;
    color: white;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
}

.New {
    background: #08a85b;
}

.Used {
    background: #dc3545;
}

.Refurbished {
    background: #ed9b13;
}

.product-card h3 {
    font-size: 16px;
    margin-bottom: 6px;
}

.brand {
    color: #667085;
    font-size: 13px;
    margin-bottom: 10px;
}

.product-price {
    color: #08984f;
    font-size: 21px;
    font-weight: bold;
    margin-bottom: 10px;
}

.product-description {
    font-size: 13px;
    color: #667085;
    min-height: 35px;
    margin-bottom: 12px;
}

.add-cart-btn {
    display: block;
    width: 100%;
    background: #08a85b;
    color: white;
    border: none;
    padding: 12px 5px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
}

.add-cart-btn:hover {
    background: #087f5b;
}

.no-products {
    background: white;
    padding: 40px;
    text-align: center;
    border-radius: 12px;
    grid-column: 1 / -1;
}

/* FOOTER */

.shop-footer {
    background: #101f32;
    color: white;
    text-align: center;
    padding: 25px;
    margin-top: 25px;
}

/* RESPONSIVE */

@media(max-width: 1200px) {
    .product-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

@media(max-width: 850px) {
    .shop-layout {
        grid-template-columns: 1fr;
    }

    .product-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .search-form {
        width: 100%;
        order: 3;
    }
}

@media(max-width: 550px) {
    .shop-header {
        justify-content: center;
    }

    .shop-nav {
        justify-content: center;
    }

    .product-grid {
        grid-template-columns: 1fr;
    }

    .products-top h1 {
        font-size: 25px;
    }

    .shop-layout {
        padding: 18px 4%;
    }
}
</style>
</head>

<body>

<!-- HEADER -->

<header class="shop-header">

    <a href="index.php" class="shop-logo">
        ReTech<span>.</span>
    </a>

    <form action="product.php" method="GET" class="search-form">
        <input type="text" name="search"
               placeholder="Search products..."
               value="<?php echo e($search); ?>">
        <button type="submit">🔍</button>
    </form>

    <nav class="shop-nav">
        <a href="index.php">Home</a>
        <a href="product.php">Products</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="cart.php" class="cart-link">
            🛒 Cart (<?php echo $cartCount; ?>)
        </a>
    </nav>

</header>

<!-- MAIN -->

<div class="shop-layout">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <h2>Categories</h2>

        <ul class="category-list">

            <li>
                <a href="product.php"
                   class="<?php echo $category === 'all' ? 'active' : ''; ?>">
                    🛍️ All Products
                </a>
            </li>

            <?php foreach ($categories as $slug => $name): ?>
                <li>
                    <a href="product.php?category=<?php echo e($slug); ?>"
                       class="<?php echo $category === $slug ? 'active' : ''; ?>">
                        <?php echo e($name); ?>
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>

        <!-- PRICE FILTER -->

        <form action="product.php" method="GET" class="filter-box">

            <h3>Filter by Price</h3>

            <input type="hidden" name="category"
                   value="<?php echo e($category); ?>">

            <label>
                <input type="radio" name="price" value="under15"
                    <?php echo $price === 'under15' ? 'checked' : ''; ?>>
                ₹0 – ₹15,000
            </label>

            <label>
                <input type="radio" name="price" value="15to30"
                    <?php echo $price === '15to30' ? 'checked' : ''; ?>>
                ₹15,000 – ₹30,000
            </label>

            <label>
                <input type="radio" name="price" value="above30"
                    <?php echo $price === 'above30' ? 'checked' : ''; ?>>
                ₹30,000+
            </label>

            <button type="submit" class="filter-btn">
                Apply Filter
            </button>

            <a href="product.php"
               style="display:block;text-align:center;margin-top:12px;color:#087f5b;">
                Clear Filters
            </a>

        </form>

        <div class="eco-box">
            <h3>♻ Eco-Friendly</h3>
            <p>Choose Sustainable Technology</p>
        </div>

    </aside>

    <!-- PRODUCTS AREA -->

    <main class="products-area">

        <div class="products-top">

            <h1>All Products</h1>

            <form action="product.php" method="GET" class="sort-form">

                <input type="hidden" name="category"
                       value="<?php echo e($category); ?>">

                <input type="hidden" name="search"
                       value="<?php echo e($search); ?>">

                <input type="hidden" name="price"
                       value="<?php echo e($price); ?>">

                <label>Sort by: </label>

                <select name="sort" onchange="this.form.submit()">
                    <option value="default">Default</option>
                    <option value="low" <?php echo $sort === 'low' ? 'selected' : ''; ?>>
                        Price: Low to High
                    </option>
                    <option value="high" <?php echo $sort === 'high' ? 'selected' : ''; ?>>
                        Price: High to Low
                    </option>
                </select>

            </form>

        </div>

        <?php if (isset($_GET['added'])): ?>
            <div class="success-message">
                Product added to demo cart successfully!
            </div>
        <?php endif; ?>

        <div class="product-grid">

            <?php if (count($filteredProducts) > 0): ?>

                <?php foreach ($filteredProducts as $product): ?>

                    <div class="product-card">

                        <span class="condition <?php echo e($product['condition']); ?>">
                            <?php echo e($product['condition']); ?>
                        </span>

                        <div class="product-image">
                            <img
                                src="<?php echo e($product['image']); ?>"
                                alt="<?php echo e($product['name']); ?>"
                            >
                        </div>

                        <h3><?php echo e($product['name']); ?></h3>

                        <p class="brand">
                            <?php echo e($product['brand']); ?>
                        </p>

                        <p class="product-price">
                            ₹ <?php echo number_format($product['price']); ?>
                        </p>

                        <p class="product-description">
                            <?php echo e($product['description']); ?>
                        </p>

                        <form method="POST" action="product.php">
                            <input type="hidden" name="product_id"
                                   value="<?php echo $product['id']; ?>">

                            <button type="submit" name="add_to_cart"
                                    class="add-cart-btn">
                                🛒 Add to Cart
                            </button>
                        </form>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="no-products">
                    <h2>No Products Found!</h2>
                    <p>Try another category or price filter.</p>
                    <a href="product.php">View All Products</a>
                </div>

            <?php endif; ?>

        </div>

    </main>

</div>

<footer class="shop-footer">
    <h2>ReTech.</h2>
    <p>Give Technology a Second Life.</p>
    <p>Buy • Reuse • Be Sustainable</p>
    <p>© 2026 ReTech. All Rights Reserved.</p>
</footer>

</body>
</html>