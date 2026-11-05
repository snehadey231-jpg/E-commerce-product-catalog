
<?php
require_once __DIR__ . '/functions.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) {
        $error = 'Please refresh the page and try again.';
    } else {

        $email = strtolower(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';

        // Continue your existing login code here
    }
}

$csrf = csrf_token();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) {
        $error = 'Please refresh the page and try again.';
    } else {

        $email = strtolower(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';

        $stmt = $pdo->prepare(
            'SELECT * FROM users WHERE email = ? LIMIT 1'
        );

        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {

            session_regenerate_id(true);

            $_SESSION['user'] = [
                'id' => (int)$user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role']
            ];

            header('Location: index.php');
            exit;

        } else {
            $error = 'Email or password is incorrect.';
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

<title>Login | ReTech</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
    background: #101828;
    color: white;
    min-height: 65px;
    padding: 12px 5%;

    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
    flex-wrap: wrap;
}

.logo {
    color: white;
    font-size: 25px;
    font-weight: 800;
    text-decoration: none;
}

.logo span {
    color: #20c997;
}

.search {
    display: flex;
    background: white;
    border-radius: 5px;
    overflow: hidden;
}

.search input {
    width: 200px;
    padding: 10px;
    border: none;
    outline: none;
}

.search button {
    background: #087f5b;
    color: white;
    border: none;
    padding: 10px 14px;
    cursor: pointer;
}

nav {
    display: flex;
    align-items: center;
    gap: 18px;
}

nav a {
    color: white;
    text-decoration: none;
    font-size: 12px;
    font-weight: 500;
}

nav a:hover {
    color: #20c997;
}

/* LOGIN BACKGROUND */

.login-hero {

    min-height: calc(100vh - 65px);

    background:
        linear-gradient(
            rgba(10, 30, 20, 0.28),
            rgba(10, 30, 20, 0.28)
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

/* LOGIN CARD */

.login-card {

    width: 100%;
    max-width: 380px;

    background: white;

    padding: 30px 28px;

    border-radius: 12px;

    box-shadow: 0 10px 35px rgba(0,0,0,0.20);
}

/* LOGIN HEADING */

.login-card h2 {

    text-align: center;

    font-size: 23px;

    color: #172033;

    margin-bottom: 25px;

    font-weight: 700;
}

.login-card h2 span {
    color: #087f5b;
}

/* FORM */

.form-group {
    margin-bottom: 17px;
}

.form-group label {

    display: block;

    font-size: 13px;

    font-weight: 600;

    color: #172033;

    margin-bottom: 6px;
}

.form-group input {

    width: 100%;

    padding: 12px;

    border: 1px solid #d0d5dd;

    border-radius: 6px;

    font-size: 13px;

    outline: none;

    font-family: 'Poppins', sans-serif;

    transition: 0.3s;
}

.form-group input:focus {

    border-color: #087f5b;

    box-shadow: 0 0 0 3px #087f5b20;
}

/* LOGIN BUTTON */

.login-btn {

    width: 100%;

    padding: 12px;

    background: #087f5b;

    color: white;

    border: none;

    border-radius: 6px;

    font-size: 14px;

    font-weight: 700;

    cursor: pointer;

    transition: 0.3s;

    margin-top: 5px;
}

.login-btn:hover {
    background: #065f46;
}

/* REGISTER */

.register-text {

    text-align: center;

    margin-top: 18px;

    font-size: 12px;

    color: #667085;
}

.register-text a {

    color: #087f5b;

    font-weight: 700;

    text-decoration: none;
}

.register-text a:hover {
    text-decoration: underline;
}

/* ERROR */

.error {

    background: #fff0ed;

    color: #a44435;

    padding: 10px;

    border-radius: 6px;

    font-size: 12px;

    margin-bottom: 16px;

    text-align: center;
}

/* RESPONSIVE */

@media(max-width: 850px) {

    header {
        justify-content: center;
    }

    nav {
        justify-content: center;
        flex-wrap: wrap;
    }

}

@media(max-width: 550px) {

    header {
        padding: 15px;
    }

    .search input {
        width: 170px;
    }

    nav {
        gap: 12px;
    }

    nav a {
        font-size: 11px;
    }

    .login-hero {
        min-height: calc(100vh - 120px);
        padding: 25px 15px;
    }

    .login-card {
        padding: 27px 22px;
    }

}

</style>

</head>

<body>

<!-- NAVBAR -->

<header>

    <a href="index.php" class="logo">
        ReTech<span>.</span>
    </a>

    <form class="search" action="product.php" method="GET">

        <input
            type="text"
            name="search"
            placeholder="Search products..."
        >

        <button type="submit">
            🔍
        </button>

    </form>

    <nav>

        <a href="index.php">Home</a>

        <a href="product.php">Products</a>

        <a href="cart.php">🛒 Cart</a>

        <a href="login.php">Login</a>

        <a href="register.php">Register</a>

    </nav>

</header>


<!-- LOGIN SECTION -->

<section class="login-hero">

    <div class="login-card">

        <h2>
            👤 Login to <span>ReTech</span>
        </h2>

        <?php if ($error): ?>

            <div class="error">
                <?= e($error) ?>
            </div>

        <?php endif; ?>

        <form method="POST">

            <input
                type="hidden"
                name="csrf"
                value="<?= e($csrf) ?>"
            >

            <div class="form-group">

                <label>Email Address</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    autocomplete="email"
                    required
                >

            </div>

            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    autocomplete="current-password"
                    required
                >

            </div>

            <button type="submit" class="login-btn">
                Login
            </button>

        </form>

        <div class="register-text">

            Don't have an account?

            <a href="register.php">
                Register
            </a>

        </div>

    </div>

</section>

</body>
</html>