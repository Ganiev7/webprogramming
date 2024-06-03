<?php
include 'database.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email_exists="false";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the email is already registered
    $verify_query = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $verify_query->bind_param("s", $email);
    $verify_query->execute();
    $result = $verify_query->get_result();

    if ($result->num_rows > 0) {
        header("location: welcome2.php?username=" .urlencode($username));
        exit();
    } else {
        echo "<div class='message'> This user doesn't exist</div>";
    }

    $verify_query->close();
    $conn->close();
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
            <div class="login_form" id="loginForm" style="display: block;">
                <h1>Login</h1>
                <form action="login_form.php" method="post">
                    <div class="userinfo">
                        <input type="text" name="username" id="loginUsername" placeholder="Username" required>
                        <i class='bx bx-user' ></i>
                    </div>
                    <div class="userinfo">
                            <input type="text" name="email" id="signupEmail" placeholder="Email" required>
                            <i class='bx bx-envelope'></i>
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
                        <a href="signup_form.php">Signup Now</a>
                    </div>
                </form>
    </div>
            </div>
        </section> 
    </main>

    <script>
    window.onload = function() {
        var emailExists = <?php echo $email_exists; ?>;

        if (emailExists) {
            alert('This user does not exist');
        }
    };
    </script>


    <script src="index.js"></script>
</body>
</html>

