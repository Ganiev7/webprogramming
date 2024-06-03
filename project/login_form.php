
<?php
// Стартуем сессию
session_start();

// Подключаемся к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверяем, отправлена ли форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Проверяем, зарегистрирован ли пользователь
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Пользователь найден, теперь проверим пароль
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Пароль верный, пользователь авторизован
            $_SESSION['user_id'] = $user['id'];
            echo "Welcome, " . $user['email'];
        } else {
            // Пароль неверный
            echo "Incorrect password";
        }
    } else {
        // Пользователь не найден
        echo "u don't sign up";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post" action="">
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz website</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="main">
        <header class="header">
            <a href="#" class="logo">Clover</a>
            <img src="images/clover.png" alt="Icon" class="icon">

            <nav class="navbar">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </nav>
        </header>

        <section class="home">
            <div class="home-content">
            <div class="login_form" id="loginForm" style="display: block;">
                <h1>Login</h1>
                <form action="index.php" method="post">
                    <div class="userinfo">
                        <input type="text" name="username" id="loginUsername" placeholder="Username" required>
                        <i class='bx bx-user' ></i>
                    </div>
                    <div class="userinfo">
                        <input type="password" name="password" id="loginPassword" placeholder="Password" required>
                        <i class='bx bx-lock-alt' ></i>
                    </div>    
                    <div class="info">
                        <input type="submit"  name="submit" value="login" required>
                    </div>
                    <div class="link">
                        <p>Don't have an account?</p>
                        <a href="signup_form.php" id="showSignup">Signup Now</a>
                    </div>
                </form>
    </div>
            </div>
        </section> 
    </main>

    

    <script src="index.js"></script>
</body>
</html>

