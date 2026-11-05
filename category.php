<?php

$category = $_GET['category'] ?? 'smartphones';

$products = [

    'smartphones' => [

        [
            'name' => 'V70 FE',
            'brand' => 'Vivo',
            'price' => 40999,
            'old_price' => 44999,
            'image' => 'vivo.jpg',
            'ram' => '8 GB RAM',
            'rating' => '4.5',
            'reviews' => '1.2K+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Up to ₹5,000 Off on Exchange'
        ],

        [
            'name' => 'Redmi Note 17 Pro Max',
            'brand' => 'Redmi',
            'price' => 50999,
            'old_price' => 58999,
            'image' => 'redmi.jpg',
            'ram' => '6 GB RAM',
            'rating' => '4.4',
            'reviews' => '2.1K+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Up to ₹4,000 Off on Exchange'
        ],

        [
            'name' => 'Motorola EDGE 60 Fusion',
            'brand' => 'Motorola',
            'price' => 30999,
            'old_price' => 37999,
            'image' => 'Motorola.jpg',
            'ram' => '8 GB RAM',
            'rating' => '4.3',
            'reviews' => '1K+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Exchange Offer Available'
        ],

        [
            'name' => 'Apple iPhone 18 Pro',
            'brand' => 'Apple',
            'price' => 158900,
            'old_price' => 164900,
            'image' => 'apple.jpg',
            'ram' => '128 GB Storage',
            'rating' => '4.7',
            'reviews' => '3K+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Exchange Offer Available'
        ],

        [
            'name' => 'Samsung Galaxy S26',
            'brand' => 'Samsung',
            'price' => 80999,
            'old_price' => 87999,
            'image' => 'Samsung.jpg',
            'ram' => '12 GB RAM',
            'rating' => '4.6',
            'reviews' => '1.6K+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Up to ₹5,000 Off on Exchange'
        ],

        [
            'name' => 'OnePlus 13 s',
            'brand' => 'OnePlus',
            'price' => 59999,
            'old_price' => 64999,
            'image' => 'OnePlus.jpg',
            'ram' => '12 GB RAM',
            'rating' => '4.5',
            'reviews' => '2K+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Exchange Offer Available'
        ]

    ],

    'laptops' => [

        [
            'name' => 'HP Laptop',
            'brand' => 'HP',
            'price' => 45999,
            'old_price' => 49999,
            'image' => 'hp.jpg',
            'ram' => '8 GB RAM',
            'rating' => '4.5',
            'reviews' => '1K+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Exchange Offer Available'
        ],

        [
            'name' => 'Dell Laptop',
            'brand' => 'Dell',
            'price' => 30999,
            'old_price' => 54999,
            'image' => 'dell.jpg',
            'ram' => '16 GB RAM',
            'rating' => '4.4',
            'reviews' => '900+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Exchange Offer Available'
        ],

        [
            'name' => 'Lenovo Laptop',
            'brand' => 'Lenovo',
            'price' => 40999,
            'old_price' => 47999,
            'image' => 'lenevo.jpg',
            'ram' => '8 GB RAM',
            'rating' => '4.3',
            'reviews' => '800+',
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
            'image' => 'sony.jpg',
            'ram' => 'Wireless',
            'rating' => '4.5',
            'reviews' => '1K+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Special Offer Available'
        ],

        [
            'name' => 'JBL Headphones',
            'brand' => 'JBL',
            'price' => 2499,
            'old_price' => 2999,
            'image' => 'jbl.jpg',
            'ram' => 'Wireless',
            'rating' => '4.4',
            'reviews' => '900+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Special Offer Available'
        ],

        [
            'name' => 'boAt Headphones',
            'brand' => 'boAt',
            'price' => 1499,
            'old_price' => 1999,
            'image' => 'boat.jpg',
            'ram' => 'Wireless',
            'rating' => '4.3',
            'reviews' => '700+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Special Offer Available'
        ]

    ],

    'cameras' => [

        [
            'name' => 'Canon Camera',
            'brand' => 'Canon',
            'price' => 35999,
            'old_price' => 39999,
            'image' => 'canon.jpg',
            'ram' => 'Digital Camera',
            'rating' => '4.5',
            'reviews' => '800+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Exchange Offer Available'
        ],

        [
            'name' => 'Nikon Camera',
            'brand' => 'Nikon',
            'price' => 39999,
            'old_price' => 44999,
            'image' => 'nikon.jpg',
            'ram' => 'Digital Camera',
            'rating' => '4.4',
            'reviews' => '700+',
            'bank' => 'Special Bank Offer',
            'exchange' => 'Exchange Offer Available'
        ],

        [
            'name' => 'Sony Camera',
            'brand' => 'Sony',
            'price' => 42999,
            'old_price' => 47999,
            'image' => 'sonyl.jpg',
            'ram' => 'Digital Camera',
            'rating' => '4.6',
            'reviews' => '1K+',
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
        <?php echo htmlspecialchars($categoryNames[$category]); ?> | ReTech
    </title>

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<header>

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

    <div class="product-container">

        <?php foreach ($products[$category] as $product): ?>

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
                    Brand:
                    <?php echo htmlspecialchars($product['brand']); ?>
                </p>

                <p>
                    <?php echo htmlspecialchars($product['ram']); ?>
                </p>

                <p>
                    ⭐ <?php echo htmlspecialchars($product['rating']); ?>
                    (<?php echo htmlspecialchars($product['reviews']); ?>)
                </p>

                <p class="product-price">
                    ₹<?php echo number_format($product['price']); ?>
                </p>

                <p>
                    <del>
                        ₹<?php echo number_format($product['old_price']); ?>
                    </del>
                </p>

                <p><?php echo htmlspecialchars($product['bank']); ?></p>

                <p><?php echo htmlspecialchars($product['exchange']); ?></p>

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