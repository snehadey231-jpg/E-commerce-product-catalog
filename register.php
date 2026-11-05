<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if ($name != "" && $email != "" && $password != "") {
        $_SESSION["user"] = $email;
        $_SESSION["name"] = $name;

        header("Location: index.php");
        exit;
    } else {
        $message = "Please fill all fields!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - ReTech</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #00c6ff, #ff72c6, #a18cd1);
        }

        .register-container {
            width: 350px;
            max-width: 85%;
            padding: 35px;
            background: rgba(255,255,255,0.95);
            border-radius: 25px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        }

        .register-container h2 {
            text-align: center;
            color: #764ba2;
            font-size: 30px;
            margin-bottom: 10px;
        }

        .register-container p {
            text-align: center;
            color: #666;
        }

        .register-container input {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            box-sizing: border-box;
            border: 2px solid #e5d8ff;
            border-radius: 12px;
            outline: none;
            font-size: 15px;
        }

        .register-container input:focus {
            border-color: #ff72c6;
            box-shadow: 0 0 8px #ffb5e0;
        }

        .register-container button {
            width: 100%;
            padding: 14px;
            margin-top: 15px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(90deg, #6c3fc5, #ff72c6);
            color: white;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .register-container button:hover {
            transform: scale(1.04);
        }

        .message {
            color: red;
            text-align: center;
        }

        .register-container a {
            color: #764ba2;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="register-container">

    <h2>Create Account</h2>

    <p>Join ReTech Today!</p>

    <?php if ($message != "") { ?>
        <p class="message">
            <?php echo htmlspecialchars($message); ?>
        </p>
    <?php } ?>

    <form method="POST">

        <input
            type="text"
            name="name"
            placeholder="Enter Your Name"
            required
        >

        <input
            type="email"
            name="email"
            placeholder="Enter Your Email"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Create Password"
            minlength="6"
            required
        >

        <button type="submit">Register</button>

    </form>

    <p>
        Already have an account?
        <a href="login.php">Login</a>
    </p>

</div>

</body>
</html>