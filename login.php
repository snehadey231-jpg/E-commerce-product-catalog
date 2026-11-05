<?php
require_once __DIR__ . '/function.php';

$error = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!verify_csrf_token($_POST['csrf'] ?? '')) {

        $error = 'Please refresh the page and try again.';

    } else {

        $email = strtolower(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';

        $stmt = $pdo->prepare(
            'SELECT * FROM users WHERE email = ? LIMIT 1'
        );

        $stmt->execute([$email]);

        $user = $stmt->fetch();

        if ($email !== '' && $password !== '') {

    session_regenerate_id(true);

    $_SESSION['user'] = [
        'id' => 0,
        'name' => 'Demo User',
        'email' => $email,
        'role' => 'user'
    ];

    header('Location: index.php');
    exit;

} else {
    $error = 'Please enter email and password.';
}
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
    white-space: nowrap;
}

.logo span {
    color: #20c997;
}

/* SEARCH BAR */

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
    font-size: 14px;
}

.search button {
    width: 60px;
    background: #087f5b;
    color: white;
    border: none;
    font-size: 19px;
    cursor: pointer;
}

.search button:hover {
    background: #065f46;
}

/* NAVIGATION */

nav {
    display: flex;
    align-items: center;
    gap: 22px;
}

nav a {
    color: white;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    white-space: nowrap;
}

nav a:hover {
    color: #20c997;
}

/* LOGIN HERO */

.login-hero {

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

    padding: 45px 20px;
}

/* LOGIN CARD */

.login-card {

    width: 100%;
    max-width: 770px;

    background: rgba(255, 255, 255, 0.97);

    padding: 55px 75px;

    border-radius: 20px;

    box-shadow: 0 12px 40px rgba(0,0,0,0.20);
}

/* HEADING */

.login-card h2 {

    text-align: center;

    font-size: 38px;

    color: #111827;

    margin-bottom: 42px;

    font-weight: 800;
}

.login-card h2 i {
    margin-right: 12px;
}

.login-card h2 span {
    color: #087f5b;
}

/* FORM GROUP */

.form-group {
    margin-bottom: 28px;
}

.form-group label {

    display: block;

    font-size: 21px;

    font-weight: 700;

    color: #172033;

    margin-bottom: 10px;
}

/* INPUT */

.form-group input {

    width: 100%;

    padding: 19px 20px;

    border: 2px solid #e0e0e0;

    border-radius: 8px;

    font-size: 18px;

    outline: none;

    font-family: 'Poppins', sans-serif;

    transition: 0.3s;
}

.form-group input:focus {

    border-color: #087f5b;

    box-shadow: 0 0 0 4px #087f5b20;
}

/* PASSWORD WRAPPER */

.password-box {
    position: relative;
}

.password-box input {
    padding-right: 55px;
}

.toggle-password {

    position: absolute;

    right: 18px;

    top: 50%;

    transform: translateY(-50%);

    border: none;

    background: transparent;

    color: #777;

    cursor: pointer;

    font-size: 18px;
}

/* LOGIN BUTTON */

.login-btn {

    width: 100%;

    padding: 18px;

    background: #08a84f;

    color: white;

    border: none;

    border-radius: 8px;

    font-size: 22px;

    font-weight: 700;

    cursor: pointer;

    transition: 0.3s;

    margin-top: 8px;
}

.login-btn:hover {
    background: #087f5b;
}

/* REGISTER TEXT */

.register-text {

    text-align: center;

    margin-top: 28px;

    font-size: 19px;

    color: #333;
}

.register-text a {

    color: #087fce;

    font-weight: 700;

    text-decoration: none;
}

.register-text a:hover {
    text-decoration: underline;
}

/* ERROR MESSAGE */

.error {

    background: #fff0ed;

    color: #a44435;

    padding: 13px;

    border-radius: 7px;

    font-size: 14px;

    margin-bottom: 22px;

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

    .login-card {
        max-width: 650px;
        padding: 45px 40px;
    }

}

@media(max-width: 550px) {

    header {
        padding: 15px;
        gap: 15px;
    }

    .logo {
        font-size: 26px;
    }

    .search {
        width: 100%;
        max-width: 100%;
    }

    nav {
        gap: 14px;
    }

    nav a {
        font-size: 12px;
    }

    .login-hero {
        min-height: calc(100vh - 150px);
        padding: 25px 14px;
    }

    .login-card {
        padding: 30px 20px;
        border-radius: 13px;
    }

    .login-card h2 {
        font-size: 25px;
        margin-bottom: 30px;
    }

    .form-group label {
        font-size: 15px;
    }

    .form-group input {
        padding: 14px;
        font-size: 14px;
    }

    .login-btn {
        padding: 14px;
        font-size: 17px;
    }

    .register-text {
        font-size: 13px;
        margin-top: 22px;
    }

}

</style>

</head>

<body>

<!-- NAVBAR -->

<header>

    <a href="index.php" class="logo">
        <i class="fa-solid fa-circle-nodes"></i>
        ReTech
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


<!-- LOGIN SECTION -->

<section class="login-hero">

    <div class="login-card">

        <h2>
            <i class="fa-solid fa-user"></i>
            Login to <span>ReTech</span>
        </h2>

        <!-- ERROR MESSAGE -->

        <?php if ($error): ?>

            <div class="error">
                <?= e($error) ?>
            </div>

        <?php endif; ?>


        <!-- LOGIN FORM -->

        <form method="POST" action="login.php">

            <input
                type="hidden"
                name="csrf"
                value="<?= e($csrf) ?>"
            >

            <!-- EMAIL -->

            <div class="form-group">

                <label>Email Address</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    value="<?= e($email) ?>"
                    autocomplete="email"
                    required
                >

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

                <label>Password</label>

                <div class="password-box">

                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="togglePassword()"
                        aria-label="Show or hide password"
                    >
                        <i class="fa-solid fa-eye" id="eyeIcon"></i>
                    </button>

                </div>

            </div>


            <!-- LOGIN BUTTON -->

            <button type="submit" class="login-btn">

                Login

            </button>

        </form>


        <!-- REGISTER LINK -->

        <div class="register-text">

            Don't have an account?

            <a href="register.php">
                Register
            </a>

        </div>

    </div>

</section>


<!-- PASSWORD SHOW/HIDE -->

<script>

function togglePassword() {

    const password = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');

    if (password.type === 'password') {

        password.type = 'text';

        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');

    } else {

        password.type = 'password';

        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');

    }

}

</script>

</body>
</html>