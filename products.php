
<?php

$products = [

    [
        'name' => 'Vivo Smartphone',
        'brand' => 'Vivo',
        'price' => 12999,
        'old_price' => 15999,
        'image' => 'vivo.jpg',
        'ram' => '8 GB RAM',
        'rating' => '4.5',
        'reviews' => '1.2K+',
        'bank' => 'Special Bank Offer',
        'exchange' => 'Up to ₹5,000 Off on Exchange'
    ],

    [
        'name' => 'Redmi Smartphone',
        'brand' => 'Redmi',
        'price' => 10999,
        'old_price' => 13999,
        'image' => 'redmi.jpg',
        'ram' => '6 GB RAM',
        'rating' => '4.4',
        'reviews' => '2.1K+',
        'bank' => 'Special Bank Offer',
        'exchange' => 'Up to ₹4,000 Off on Exchange'
    ],

    [
        'name' => 'Motorola Smartphone',
        'brand' => 'Motorola',
        'price' => 14999,
        'old_price' => 17999,
        'image' => 'Motorola.jpg',
        'ram' => '8 GB RAM',
        'rating' => '4.3',
        'reviews' => '1K+',
        'bank' => 'Special Bank Offer',
        'exchange' => 'Exchange Offer Available'
    ],

    [
        'name' => 'Apple iPhone',
        'brand' => 'Apple',
        'price' => 49999,
        'old_price' => 59999,
        'image' => 'apple.jpg',
        'ram' => '128 GB Storage',
        'rating' => '4.7',
        'reviews' => '3K+',
        'bank' => 'Special Bank Offer',
        'exchange' => 'Exchange Offer Available'
    ],

    [
        'name' => 'Samsung Smartphone',
        'brand' => 'Samsung',
        'price' => 17999,
        'old_price' => 21999,
        'image' => 'Samsung.jpg',
        'ram' => '8 GB RAM',
        'rating' => '4.6',
        'reviews' => '1.6K+',
        'bank' => 'Special Bank Offer',
        'exchange' => 'Up to ₹5,000 Off on Exchange'
    ],

    [
        'name' => 'OnePlus Smartphone',
        'brand' => 'OnePlus',
        'price' => 29999,
        'old_price' => 34999,
        'image' => 'OnePlus.jpg',
        'ram' => '8 GB RAM',
        'rating' => '4.5',
        'reviews' => '2K+',
        'bank' => 'Special Bank Offer',
        'exchange' => 'Exchange Offer Available'
    ]

];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Smartphones | ReTech</title>

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: #f1f3f6;
    color: #212121;
}

header {
    background: #172554;
    color: white;
    padding: 18px 6%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.logo {
    font-size: 28px;
    font-weight: bold;
}

.logo span {
    color: #facc15;
}

nav {
    display: flex;
    gap: 22px;
    flex-wrap: wrap;
}

nav a {
    color: white;
    text-decoration: none;
}

.cart {
    color: white;
    text-decoration: none;
}

.products-section {
    padding: 45px 6%;
}

.products-heading {
    margin-bottom: 30px;
}

.tagline {
    color: #2563eb;
    font-weight: bold;
    letter-spacing: 2px;
    margin-bottom: 10px;
}

.products-heading h1 {
    font-size: 32px;
    margin-bottom: 10px;
}

.product-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}

.product-card {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    transition: 0.3s;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 18px rgba(0,0,0,0.14);
}

.product-image {
    height: 230px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 15px;
}

.product-image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.product-card h3 {
    font-size: 20px;
    margin-bottom: 8px;
}

.product-brand {
    color: #666;
    margin-bottom: 8px;
}

.ram {
    color: #555;
    margin-bottom: 12px;
}

.rating {
    margin-bottom: 12px;
}

.rating span {
    background: #15803d;
    color: white;
    padding: 5px 9px;
    border-radius: 4px;
    font-weight: bold;
}

.price {
    margin: 15px 0;
}

.new-price {
    font-size: 25px;
    font-weight: bold;
}

.old-price {
    color: #888;
    text-decoration: line-through;
    margin-left: 8px;
}

.discount {
    color: #15803d;
    font-weight: bold;
    margin-top: 5px;
}

.bank {
    color: #1d4ed8;
    font-weight: bold;
    margin: 12px 0;
}

.exchange {
    color: #555;
    font-size: 14px;
    margin-bottom: 18px;
}

.category-explore {
    display: block;
    text-align: center;
    background: #172554;
    color: white;
    padding: 12px;
    text-decoration: none;
    border-radius: 6px;
}

.category-explore:hover {
    background: #2563eb;
}

footer {
    background: #172554;
    color: white;
    text-align: center;
    padding: 30px;
    margin-top: 30px;
    line-height: 2;
}

footer span {
    color: #facc15;
}

@media (max-width: 800px) {
    .product-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 550px) {
    .product-container {
        grid-template-columns: 1fr;
    }

    header {
        flex-direction: column;
    }

    .products-section {
        padding: 25px 4%;
    }
}

</style>

</head>

<body>

<header>

    <div class="logo">
        ReTech<span>.</span>
    </div>

    <nav>
        <a href="index.php">Home</a>
        <a href="category.php">Categories</a>
        <a href="products.php">Products</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </nav>

    <a href="cart.php" class="cart">🛒 Cart</a>

</header>

<section class="products-section">

    <div class="products-heading">

        <p class="tagline">OUR COLLECTION</p>

        <h1>Latest Smartphones</h1>

        <p>Explore our amazing smartphone collection.</p>

    </div>

    <div class="product-container">

        <?php foreach ($products as $product): ?>

        <div class="product-card">

            <div class="product-image">

                <img
                    src="assets/images/<?php echo htmlspecialchars($product['image']); ?>"
                    alt="<?php echo htmlspecialchars($product['name']); ?>"
                >

            </div>

            <h3>
                <?php echo htmlspecialchars($product['name']); ?>
            </h3>

            <p class="product-brand">
                Brand: <?php echo htmlspecialchars($product['brand']); ?>
            </p>

            <p class="ram">
                <?php echo htmlspecialchars($product['ram']); ?>
            </p>

            <div class="rating">
                <span>
                    <?php echo htmlspecialchars($product['rating']); ?> ★
                </span>

                <?php echo htmlspecialchars($product['reviews']); ?> Reviews
            </div>

            <div class="price">

                <div class="new-price">
                    ₹<?php echo number_format($product['price']); ?>
                </div>

                <div>
                    <span class="old-price">
                        ₹<?php echo number_format($product['old_price']); ?>
                    </span>
                </div>

                <p class="discount">
                    Special Price
                </p>

            </div>

            <p class="bank">
                <?php echo htmlspecialchars($product['bank']); ?>
            </p>

            <p class="exchange">
                <?php echo htmlspecialchars($product['exchange']); ?>
            </p>

            <a href="login.php" class="category-explore">
                Add to Cart
            </a>

        </div>

        <?php endforeach; ?>

    </div>

</section>

<footer>

    <h2>ReTech<span>.</span></h2>

    <p>Give Technology a Second Life.</p>

    <p>© 2026 ReTech. All Rights Reserved.</p>

</footer>

</body>
</html>



