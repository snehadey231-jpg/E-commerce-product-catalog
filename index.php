<?php
$categories = [
    [
        'name' => 'Smartphones',
        'icon' => '📱',
        'slug' => 'smartphones'
    ],
    [
        'name' => 'Laptops',
        'icon' => '💻',
        'slug' => 'laptops'
    ],
    [
        'name' => 'Headphones',
        'icon' => '🎧',
        'slug' => 'headphones'
    ],
    [
        'name' => 'Cameras',
        'icon' => '📷',
        'slug' => 'cameras'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ReTech | Give Technology a Second Life</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* HOME NAVBAR */

        .home-header {
            background: #101828;
            color: white;
            padding: 18px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .home-header .logo {
            color: white;
            font-size: 28px;
        }

        .home-header nav {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .home-header nav a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .home-header nav a:hover {
            color: #20c997;
        }

        .home-search {
            display: flex;
            background: white;
            border-radius: 7px;
            overflow: hidden;
        }

        .home-search input {
            width: 220px;
            padding: 12px;
            border: none;
            outline: none;
        }

        .home-search button {
            background: #087f5b;
            color: white;
            border: none;
            padding: 12px 16px;
            cursor: pointer;
        }

        /* HERO */

        /* HERO - GREEN NATURE BACKGROUND */

.home-hero {
    min-height: 500px;
    padding: 70px 8%;

    display: flex;
    align-items: center;

    background:
        linear-gradient(
            rgba(0, 35, 20, 0.40),
            rgba(0, 35, 20, 0.40)
        ),
        url("assets/images/eco.jpg");

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    color: white;
}

.home-hero-content {
    max-width: 650px;
    position: relative;
    z-index: 2;
}

.home-hero .tagline {
    color: #a8f5b9;
    font-size: 14px;
    letter-spacing: 3px;
}

.home-hero h1 {
    font-size: 58px;
    line-height: 1.15;
    margin: 20px 0;
    color: white;
}

.home-hero h1 span {
    color: #80ed99;
}

.home-hero p {
    color: white;
    font-size: 17px;
    line-height: 1.8;
    margin-bottom: 25px;
}

.home-hero .btn {
    background: #08a85b;
}

.hero-symbol {
    margin-left: auto;
    font-size: 130px;
    padding: 30px;
}

        .home-hero-content {
            max-width: 650px;
        }

        .home-hero .tagline {
            color: #20c997;
            font-size: 14px;
            letter-spacing: 3px;
        }

        .home-hero h1 {
            font-size: 58px;
            line-height: 1.15;
            margin: 20px 0;
        }

        .home-hero h1 span {
            color: #20c997;
        }

        .home-hero p {
            color: #d0d5dd;
            font-size: 17px;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .home-hero .btn {
            background: #087f5b;
        }

        .hero-symbol {
            margin-left: auto;
            font-size: 130px;
            padding: 30px;
        }

        /* CATEGORY */

        .home-categories {
            padding: 60px 8%;
            background: #f5f7fa;
        }

        .home-section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .home-section-heading h2 {
            font-size: 30px;
            color: #172033;
        }

        .home-section-heading a {
            color: #087f5b;
            text-decoration: none;
            font-weight: bold;
        }

        .home-category-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
        }

        .home-category-card {
            background: white;
            padding: 25px 15px;
            text-align: center;
            border-radius: 14px;
            text-decoration: none;
            color: #172033;
            box-shadow: 0 5px 20px #10182810;
            transition: 0.3s;
        }

        .home-category-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px #10182818;
        }

        .home-category-icon {
            height: 110px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eaf5f0;
            border-radius: 10px;
            font-size: 65px;
            margin-bottom: 18px;
        }

        .home-category-card h3 {
            font-size: 17px;
        }

        /* FEATURED */

        .home-featured {
            padding: 60px 8%;
            background: white;
            text-align: center;
        }

        .home-featured h2 {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .home-featured p {
            color: #667085;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        /* BENEFITS */

        .home-benefits {
            padding: 25px 8%;
            background: #087f5b;
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
            color: white;
        }

        .home-benefit {
            text-align: center;
            padding: 12px;
        }

        .home-benefit span {
            font-size: 28px;
        }

        .home-benefit h3 {
            font-size: 15px;
            margin: 10px 0 5px;
        }

        .home-benefit p {
            color: #d9f5e9;
            font-size: 12px;
        }

        /* MOBILE */

        @media (max-width: 900px) {
            .home-category-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .home-benefits {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .home-hero h1 {
                font-size: 42px;
            }

            .hero-symbol {
                font-size: 80px;
            }
        }

        @media (max-width: 600px) {
            .home-header {
                justify-content: center;
            }

            .home-header nav {
                justify-content: center;
            }

            .home-search input {
                width: 180px;
            }

            .home-hero {
                padding: 50px 6%;
            }

            .home-hero h1 {
                font-size: 36px;
            }

            .hero-symbol {
                display: none;
            }

            .home-categories,
            .home-featured {
                padding: 45px 5%;
            }

            .home-category-grid {
                grid-template-columns: 1fr;
            }

            .home-benefits {
                grid-template-columns: 1fr 1fr;
                padding: 20px 5%;
            }
        }
    </style>
</head>

<body>

<header class="home-header">

    <div class="logo">
        ReTech<span>.</span>
    </div>

    <form class="home-search" action="product.php" method="GET">
        <input
            type="text"
            name="search"
            placeholder="Search products..."
        >
        <button type="submit">🔍</button>
    </form>

    <nav>
        <a href="index.php">Home</a>
        <a href="product.php">Categories</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        <a href="cart.php">🛒 Cart</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </nav>

</header>

<!-- HERO -->

<section class="home-hero">

    <div class="home-hero-content">

        <p class="tagline">BUY • REUSE • BE SUSTAINABLE</p>

        <h1>
            ReTech<br>
            Give Technology<br>
            <span>a Second Life.</span>
        </h1>

        <p>
            Discover quality smartphones, laptops and electronics
            at affordable prices. Choose smarter technology
            and help create a sustainable future.
        </p>

        <a href="product.php" class="btn">
            Shop Now →
        </a>

    </div>

    <div class="hero-symbol">
        ♻️
    </div>

</section>

<!-- CATEGORIES -->

<section class="home-categories">

    <div class="home-section-heading">

        <h2>Shop by Category</h2>

        <a href="product.php">View All →</a>

    </div>

    <div class="home-category-grid">

        <?php foreach ($categories as $category): ?>

            <a
                href="category.php?category=<?php echo urlencode($category['slug']); ?>"
                class="home-category-card"
            >

                <div class="home-category-icon">
                    <?php echo $category['icon']; ?>
                </div>

                <h3>
                    <?php echo htmlspecialchars($category['name']); ?>
                </h3>

            </a>

        <?php endforeach; ?>

    </div>

</section>

<!-- FEATURED -->

<section class="home-featured" id="about">

    <h2>Explore Our Products</h2>

    <p>
        Find your next favorite device at ReTech.
        Quality electronics, affordable prices,
        and a better choice for the planet.
    </p>

    <a href="product.php" class="btn">
        Explore Products →
    </a>

</section>

<!-- BENEFITS -->

<section class="home-benefits">

    <div class="home-benefit">
        <span>🛡️</span>
        <h3>Trusted Quality</h3>
        <p>Quality Checked Products</p>
    </div>

    <div class="home-benefit">
        <span>💰</span>
        <h3>Affordable Price</h3>
        <p>Best Deals for You</p>
    </div>

    <div class="home-benefit">
        <span>♻️</span>
        <h3>Eco-Friendly</h3>
        <p>Reuse Electronics</p>
    </div>

    <div class="home-benefit">
        <span>🚚</span>
        <h3>Fast Delivery</h3>
        <p>Convenient Shopping</p>
    </div>

</section>

<!-- FOOTER -->

<footer id="contact">

    <h2>ReTech<span>.</span></h2>

    <p>Give Technology a Second Life.</p>

    <p>Buy • Reuse • Be Sustainable</p>

    <p>© 2026 ReTech. All Rights Reserved.</p>

</footer>

</body>
</html>