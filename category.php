
<?php

$category = $_GET['category'] ?? 'smartphones';

$products = [

    'smartphones' => [
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
            'image' => 'motorola.jpg',
            'ram' => '8 GB RAM',
            'rating' => '4.3',
            'reviews' => '900+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Up to ₹5,000 Off on Exchange'
        ],
        [
            'name' => 'iPhone',
            'brand' => 'Apple',
            'price' => 49999,
            'old_price' => 59999,
            'image' => 'iphone.jpg',
            'ram' => '128 GB Storage',
            'rating' => '4.7',
            'reviews' => '3.5K+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Up to ₹10,000 Off on Exchange'
        ],
        [
            'name' => 'Samsung Smartphone',
            'brand' => 'Samsung',
            'price' => 17999,
            'old_price' => 21999,
            'image' => 'samsung.jpg',
            'ram' => '8 GB RAM',
            'rating' => '4.6',
            'reviews' => '1.6K+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Up to ₹6,000 Off on Exchange'
        ],
        [
            'name' => 'OnePlus Smartphone',
            'brand' => 'OnePlus',
            'price' => 29999,
            'old_price' => 34999,
            'image' => 'oneplus.jpg',
            'ram' => '12 GB RAM',
            'rating' => '4.6',
            'reviews' => '2K+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Up to ₹7,000 Off on Exchange'
        ]
    ],

    'laptops' => [
        [
            'name' => 'HP Laptop',
            'brand' => 'HP',
            'price' => 45999,
            'old_price' => 52999,
            'image' => 'laptop.jpg',
            'ram' => '16 GB RAM',
            'rating' => '4.4',
            'reviews' => '800+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Exchange Offer Available'
        ],
        [
            'name' => 'Dell Laptop',
            'brand' => 'Dell',
            'price' => 49999,
            'old_price' => 57999,
            'image' => 'laptop.jpg',
            'ram' => '16 GB RAM',
            'rating' => '4.5',
            'reviews' => '700+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Exchange Offer Available'
        ],
        [
            'name' => 'Lenovo Laptop',
            'brand' => 'Lenovo',
            'price' => 42999,
            'old_price' => 49999,
            'image' => 'laptop.jpg',
            'ram' => '8 GB RAM',
            'rating' => '4.3',
            'reviews' => '600+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Exchange Offer Available'
        ],
        [
            'name' => 'ASUS Laptop',
            'brand' => 'ASUS',
            'price' => 52999,
            'old_price' => 59999,
            'image' => 'laptop.jpg',
            'ram' => '16 GB RAM',
            'rating' => '4.5',
            'reviews' => '500+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Exchange Offer Available'
        ]
    ],

    'headphones' => [
        [
            'name' => 'Sony Headphones',
            'brand' => 'Sony',
            'price' => 2999,
            'old_price' => 3999,
            'image' => 'headphones.jpg',
            'ram' => 'Wireless Headphones',
            'rating' => '4.5',
            'reviews' => '900+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Limited Time Offer'
        ],
        [
            'name' => 'JBL Headphones',
            'brand' => 'JBL',
            'price' => 2499,
            'old_price' => 3499,
            'image' => 'headphones.jpg',
            'ram' => 'Wireless Headphones',
            'rating' => '4.4',
            'reviews' => '800+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Limited Time Offer'
        ],
        [
            'name' => 'boAt Headphones',
            'brand' => 'boAt',
            'price' => 1499,
            'old_price' => 1999,
            'image' => 'headphones.jpg',
            'ram' => 'Wireless Headphones',
            'rating' => '4.3',
            'reviews' => '1K+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Limited Time Offer'
        ]
    ],

    'cameras' => [
        [
            'name' => 'Canon Camera',
            'brand' => 'Canon',
            'price' => 35999,
            'old_price' => 42999,
            'image' => 'camera.jpg',
            'ram' => 'Digital Camera',
            'rating' => '4.6',
            'reviews' => '500+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Exchange Offer Available'
        ],
        [
            'name' => 'Nikon Camera',
            'brand' => 'Nikon',
            'price' => 39999,
            'old_price' => 46999,
            'image' => 'camera.jpg',
            'ram' => 'Digital Camera',
            'rating' => '4.5',
            'reviews' => '400+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Exchange Offer Available'
        ],
        [
            'name' => 'Sony Camera',
            'brand' => 'Sony',
            'price' => 42999,
            'old_price' => 49999,
            'image' => 'camera.jpg',
            'ram' => 'Digital Camera',
            'rating' => '4.7',
            'reviews' => '600+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Exchange Offer Available'
        ]
    ]

];

$categoryNames = [
    'smartphones' => 'Smartphones',
    'laptops' => 'Laptops',
    'headphones' => 'Headphones',
    'cameras' => 'Cameras'
];

if (!isset($products[$category])) {
    $category = 'smartphones';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo htmlspecialchars($categoryNames[$category]); ?>
        | ReTech
    </title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<header class="retech-header">

    <div class="logo">
        ReTech<span>.</span>
    </div>

    <nav>
        <a href="index.php">Home</a>
        <a href="products.php">Categories</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </nav>

    <a href="cart.php" class="cart">🛒 Cart</a>

</header>

<section class="products-section">

    <div class="products-heading">
        <p class="tagline">OUR COLLECTION</p>

        <h1>
            <?php echo htmlspecialchars($categoryNames[$category]); ?>
        </h1>

        <p>Explore our latest products.</p>
    </div>

    <div class="flip-product-list">

        <?php foreach ($products[$category] as $product): ?>

            <?php
                $discount = round(
                    (($product['old_price'] - $product['price'])
                    / $product['old_price']) * 100
                );
            ?>

            <div class="flip-product-card">

                <div class="flip-product-photo">

                    <img
                        src="assets/images/<?php echo htmlspecialchars($product['image']); ?>"
                        alt="<?php echo htmlspecialchars($product['name']); ?>"
                    >

<<<<<<< HEAD

                <h3>
                    <?php echo htmlspecialchars($product['name']); ?>
                </h3>
=======
                </div>
>>>>>>> 639080440903073a350344c0cb39459c48ec5935

                <div class="flip-product-details">

                    <a href="login.php" class="flip-wishlist" title="Add to Wishlist">
                        ♡
                    </a>

                    <h2>
                        <?php echo htmlspecialchars($product['name']); ?>
                    </h2>

                    <p class="flip-ram">
                        <?php echo htmlspecialchars($product['ram']); ?>
                    </p>

                    <div class="flip-rating">
                        <strong>
                            <?php echo htmlspecialchars($product['rating']); ?>
                            ★
                        </strong>

                        <span>
                            <?php echo htmlspecialchars($product['reviews']); ?>
                            Ratings
                        </span>

                        <b>✔ Assured</b>
                    </div>

                    <div class="flip-price">

                        <span class="flip-discount">
                            ↓<?php echo $discount; ?>%
                        </span>

                        <del>
                            ₹<?php echo number_format($product['old_price']); ?>
                        </del>

                        <strong>
                            ₹<?php echo number_format($product['price']); ?>
                        </strong>

                    </div>

                    <p class="flip-bank">
                        WOW! ₹<?php echo number_format($product['price'] - 500); ?>
                        <span>with Bank Offer</span>
                    </p>

                    <p class="flip-exchange">
                        <?php echo htmlspecialchars($product['exchange']); ?>
                    </p>

                    <p class="flip-delivery">
                        Get it by <strong>Tomorrow</strong>
                    </p>

                    <p class="flip-brand">
                        Brand: <?php echo htmlspecialchars($product['brand']); ?>
                    </p>

                    <a href="login.php" class="flip-cart-button">
                        Add to Cart
                    </a>

                </div>

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
