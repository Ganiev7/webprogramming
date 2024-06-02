<?php
include 'database.php';
var_dump($conn);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

    if (!$stmt) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        $showAlert = true;
    } else {
        $showError = "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>


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
                <div class="login_form" id="signupForm" style="display: block">
                    <h1>SignUp</h1>
                    <form action="signup_form.php" method="post">
                        <div class="userinfo">
                            <input type="text" name="username" id="signupUsername" placeholder="Username" required>
                            <i class='bx bx-user'></i>
                        </div>
                        <div class="userinfo">
                            <input type="text" name="email" id="signupEmail" placeholder="Email" required>
                            <i class='bx bx-envelope'></i>
                        </div>
                        <div class="userinfo">
                            <input type="password" name="password" id="signPassword" placeholder="Password" required>
                            <i class='bx bx-lock-alt'></i>
                        </div>    
                        <div class="info">
                            <input type="submit" name="submit" value="SignUp">
                        </div>
                        <div class="link">
                            <p>Already have an account?</p>
                            <a href="login_form.php" id="showLogin">Login Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </section> 
    </main>

    <script src="index.js"></script>
</body>
</html>