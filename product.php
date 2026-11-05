<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$categories = [
    [
        'name' => 'Smartphones',
        'slug' => 'smartphones',
        'image' => 'vivo.jpg',
        'description' => 'Explore Vivo, Redmi, Motorola, iPhone and more.'
    ],
    [
        'name' => 'Laptops',
        'slug' => 'laptops',
        'image' => 'laptop.jpg',
        'description' => 'Explore HP, Dell, Lenovo, ASUS and more.'
    ],
    [
        'name' => 'Headphones',
        'slug' => 'headphones',
        'image' => 'headphones.jpg',
        'description' => 'Explore Sony, JBL, boAt and more.'
    ],
    [
        'name' => 'Cameras',
        'slug' => 'cameras',
        'image' => 'camera.jpg',
        'description' => 'Explore Canon, Nikon, Sony and more.'
    ]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Explore Categories | ReTech</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<header>

    <div class="logo">
        ReTech<span>.</span>
    </div>

    <nav>
        <a href="index.php">Home</a>
        <a href="products.php">Products</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </nav>

    <a href="cart.php" class="cart">🛒 Cart</a>

</header>

<section class="products-section">

    <div class="products-heading">

        <p class="tagline">OUR COLLECTION</p>

        <h1>Explore Categories</h1>

        <p>Choose your favorite electronics category.</p>

    </div>

    <div class="category-container">

        <?php foreach ($categories as $category): ?>

            <div class="category-card">

                <div class="category-icon">

                    <img
                        src="assets/images/<?php echo htmlspecialchars($category['image']); ?>"
                        alt="<?php echo htmlspecialchars($category['name']); ?>"
                    >

                </div>

                <h3>
                    <?php echo htmlspecialchars($category['name']); ?>
                </h3>

                <p class="category-description">
                    <?php echo htmlspecialchars($category['description']); ?>
                </p>

                <a
                    href="category.php?category=<?php echo urlencode($category['slug']); ?>"
                    class="category-explore"
                >
                    Explore →
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