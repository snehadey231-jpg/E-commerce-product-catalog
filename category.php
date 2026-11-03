<?php

$category = $_GET['category'] ?? 'smartphones';

$products = [

    'smartphones' => [
        [
            'name' => 'Vivo Smartphone',
            'brand' => 'Vivo',
            'price' => 12999,
            'image' => 'phone.jpg'
        ],
        [
            'name' => 'Redmi Smartphone',
            'brand' => 'Redmi',
            'price' => 10999,
            'image' => 'phone.jpg'
        ],
        [
            'name' => 'Motorola Smartphone',
            'brand' => 'Motorola',
            'price' => 14999,
            'image' => 'phone.jpg'
        ],
        [
            'name' => 'iPhone',
            'brand' => 'Apple',
            'price' => 49999,
            'image' => 'phone.jpg'
        ],
        [
            'name' => 'Samsung Smartphone',
            'brand' => 'Samsung',
            'price' => 17999,
            'image' => 'phone.jpg'
        ],
        [
            'name' => 'OnePlus Smartphone',
            'brand' => 'OnePlus',
            'price' => 29999,
            'image' => 'phone.jpg'
        ]
    ],

    'laptops' => [
        [
            'name' => 'HP Laptop',
            'brand' => 'HP',
            'price' => 45999,
            'image' => 'laptop.jpg'
        ],
        [
            'name' => 'Dell Laptop',
            'brand' => 'Dell',
            'price' => 49999,
            'image' => 'laptop.jpg'
        ],
        [
            'name' => 'Lenovo Laptop',
            'brand' => 'Lenovo',
            'price' => 42999,
            'image' => 'laptop.jpg'
        ],
        [
            'name' => 'ASUS Laptop',
            'brand' => 'ASUS',
            'price' => 52999,
            'image' => 'laptop.jpg'
        ]
    ],

    'headphones' => [
        [
            'name' => 'Sony Headphones',
            'brand' => 'Sony',
            'price' => 2999,
            'image' => 'headphones.jpg'
        ],
        [
            'name' => 'JBL Headphones',
            'brand' => 'JBL',
            'price' => 2499,
            'image' => 'headphones.jpg'
        ],
        [
            'name' => 'boAt Headphones',
            'brand' => 'boAt',
            'price' => 1499,
            'image' => 'headphones.jpg'
        ]
    ],

    'cameras' => [
        [
            'name' => 'Canon Camera',
            'brand' => 'Canon',
            'price' => 35999,
            'image' => 'camera.jpg'
        ],
        [
            'name' => 'Nikon Camera',
            'brand' => 'Nikon',
            'price' => 39999,
            'image' => 'camera.jpg'
        ],
        [
            'name' => 'Sony Camera',
            'brand' => 'Sony',
            'price' => 42999,
            'image' => 'camera.jpg'
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

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo htmlspecialchars($categoryNames[$category]); ?>
        | ReTech
    </title>

    <link rel="stylesheet"
          href="assets/css/style.css">

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

    <a href="cart.php" class="cart">
        🛒 Cart
    </a>

</header>

<section class="products-section">

    <div class="products-heading">

        <p class="tagline">
            OUR COLLECTION
        </p>

        <h1>
            <?php echo htmlspecialchars($categoryNames[$category]); ?>
        </h1>

        <p>
            Explore our latest products.
        </p>

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

                <p class="product-price">

                    ₹<?php echo number_format($product['price']); ?>

                </p>

                <a href="login.php"
                   class="category-explore">

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

