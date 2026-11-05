<?php

require_once __DIR__ . '/function.php';

$message = '';
$name = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!verify_csrf_token($_POST['csrf'] ?? '')) {

        $message = 'Please refresh the page and try again.';

    } else {

        $name = trim($_POST['name'] ?? '');
        $email = strtolower(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';

        if ($name === '' || $email === '' || $password === '') {

            $message = 'Please fill all fields!';

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $message = 'Please enter a valid email address.';

        } elseif (strlen($password) < 6) {

            $message = 'Password must be at least 6 characters.';

        } else {

            try {

                $check = $pdo->prepare(
                    "SELECT id FROM users WHERE email = ? LIMIT 1"
                );

                $check->execute([$email]);

                if ($check->fetch()) {

                    $message = 'This email is already registered.';

                } else {

                    $hashedPassword = password_hash(
                        $password,
                        PASSWORD_DEFAULT
                    );

                    $stmt = $pdo->prepare(
                        "INSERT INTO users (name, email, password, role)
                         VALUES (?, ?, ?, 'user')"
                    );

                    $stmt->execute([
                        $name,
                        $email,
                        $hashedPassword
                    ]);

                    $userId = (int)$pdo->lastInsertId();

                    session_regenerate_id(true);

                    $_SESSION['user'] = [
                        'id' => $userId,
                        'name' => $name,
                        'email' => $email,
                        'role' => 'user'
                    ];

                    header('Location: index.php');
                    exit;
                }

            } catch (PDOException $e) {

                error_log($e->getMessage());

                $message = 'Registration failed. Please try again.';

            }
        }
    }
}

$csrf = csrf_token();

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register | ReTech</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background: #f5f7fa;
    min-height: 100vh;
}

/* NAVBAR */

header {
    width: 100%;
    min-height: 85px;
    background: #101828;
    padding: 12px 3%;

    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.logo {
    color: white;
    font-size: 30px;
    font-weight: 800;
    text-decoration: none;
}

.logo span {
    color: #20c997;
}

/* SEARCH */

.search {
    display: flex;
    width: 450px;
    max-width: 40%;
    height: 48px;
    background: white;
    border-radius: 5px;
    overflow: hidden;
}

.search input {
    flex: 1;
    min-width: 0;
    padding: 12px 18px;
    border: none;
    outline: none;
    font-family: inherit;
}

.search button {
    width: 60px;
    background: #087f5b;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 18px;
}

/* NAVIGATION */

nav {
    display: flex;
    align-items: center;
    gap: 20px;
}

nav a {
    color: white;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
}

nav a:hover {
    color: #20c997;
}

/* HERO BACKGROUND */

.register-hero {

    min-height: calc(100vh - 85px);

    background:
        linear-gradient(
            rgba(10, 30, 50, 0.28),
            rgba(10, 30, 50, 0.28)
        ),
        url('https://images.unsplash.com/photo-1498049794561-7780e7231661?w=1600&q=85');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    display: flex;
    justify-content: center;
    align-items: center;

    padding: 40px 20px;
}

/* REGISTER CARD */

.register-card {

    width: 100%;
    max-width: 770px;

    background: rgba(255,255,255,0.97);

    padding: 45px 75px;

    border-radius: 20px;

    box-shadow: 0 12px 40px rgba(0,0,0,0.20);
}

/* HEADING */

.register-card h2 {

    text-align: center;

    font-size: 36px;

    color: #111827;

    margin-bottom: 12px;

    font-weight: 800;
}

.register-card h2 i {
    margin-right: 10px;
}

.register-card h2 span {
    color: #087f5b;
}

.subtitle {
    text-align: center;
    color: #667085;
    font-size: 15px;
    margin-bottom: 30px;
}

/* FORM */

.form-group {
    margin-bottom: 22px;
}

.form-group label {
    display: block;
    font-size: 19px;
    font-weight: 700;
    color: #172033;
    margin-bottom: 9px;
}

.form-group input {
    width: 100%;
    padding: 17px 20px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 16px;
    outline: none;
    font-family: inherit;
    transition: 0.3s;
}

.form-group input:focus {
    border-color: #087f5b;
    box-shadow: 0 0 0 4px #087f5b20;
}

/* REGISTER BUTTON */

.register-btn {
    width: 100%;
    padding: 17px;
    background: #08a84f;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 21px;
    font-weight: 700;
    cursor: pointer;
    transition: 0.3s;
    margin-top: 8px;
}

.register-btn:hover {
    background: #065f46;
}

/* LOGIN LINK */

.login-text {
    text-align: center;
    margin-top: 25px;
    font-size: 17px;
    color: #333;
}

.login-text a {
    color: #087fce;
    font-weight: 700;
    text-decoration: none;
}

.login-text a:hover {
    text-decoration: underline;
}

/* ERROR */

.error {
    background: #fff0ed;
    color: #a44435;
    padding: 12px;
    border-radius: 7px;
    font-size: 13px;
    margin-bottom: 20px;
    text-align: center;
}

/* RESPONSIVE */

@media(max-width: 900px) {

    header {
        justify-content: center;
        flex-wrap: wrap;
    }

    .search {
        max-width: 100%;
        width: 450px;
    }

    nav {
        justify-content: center;
        flex-wrap: wrap;
    }

    .register-card {
        padding: 40px;
    }
}

@media(max-width: 550px) {

    header {
        padding: 15px;
    }

    .logo {
        font-size: 26px;
    }

    .search {
        width: 100%;
    }

    nav {
        gap: 14px;
    }

    nav a {
        font-size: 11px;
    }

    .register-hero {
        min-height: calc(100vh - 150px);
        padding: 25px 14px;
    }

    .register-card {
        padding: 30px 20px;
        border-radius: 13px;
    }

    .register-card h2 {
        font-size: 25px;
    }

    .subtitle {
        font-size: 13px;
    }

    .form-group label {
        font-size: 15px;
    }

    .form-group input {
        padding: 14px;
        font-size: 14px;
    }

    .register-btn {
        padding: 14px;
        font-size: 17px;
    }

    .login-text {
        font-size: 13px;
    }
}

</style>

</head>

<body>

<!-- NAVBAR -->

<header>

    <a href="index.php" class="logo">
        <i class="fa-solid fa-circle-nodes"></i>
        ReTech<span>.</span>
    </a>

    <form class="search" action="product.php" method="GET">

        <input
            type="text"
            name="search"
            placeholder="Search products..."
        >

        <button type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>

    </form>

    <nav>

        <a href="index.php">Home</a>

        <a href="product.php">Products</a>

        <a href="cart.php">
            <i class="fa-solid fa-cart-shopping"></i>
            Cart
        </a>

        <a href="login.php">
            <i class="fa-solid fa-user"></i>
            Login
        </a>

    </nav>

</header>

<!-- REGISTER SECTION -->

<section class="register-hero">

    <div class="register-card">

        <h2>
            <i class="fa-solid fa-user-plus"></i>
            Create <span>Account</span>
        </h2>

        <p class="subtitle">
            Join ReTech Today!
        </p>

        <?php if ($message): ?>

            <div class="error">
                <?= e($message) ?>
            </div>

        <?php endif; ?>

        <form method="POST" action="register.php">

            <input
                type="hidden"
                name="csrf"
                value="<?= e($csrf) ?>"
            >

            <div class="form-group">

                <label>Full Name</label>

                <input
                    type="text"
                    name="name"
                    placeholder="Enter your full name"
                    value="<?= e($name) ?>"
                    maxlength="100"
                    required
                >

            </div>

            <div class="form-group">

                <label>Email Address</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    value="<?= e($email) ?>"
                    maxlength="150"
                    required
                >

            </div>

            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Create your password"
                    minlength="6"
                    required
                >

            </div>

            <button type="submit" class="register-btn">
                Register
            </button>

        </form>

        <div class="login-text">

            Already have an account?

            <a href="login.php">Login</a>

        </div>

    </div>

</section>

</body>
</html>