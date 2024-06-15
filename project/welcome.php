<?php
if (!isset($_GET['username'])) {
    die("No username provided");
}

$username = htmlspecialchars($_GET['username']);

session_start();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
            </nav>
        </header>

        <section class="home">
            <div class="content-info">
                <h2>Welcome, <?php echo $username; ?>!</h2>
                <p>Thank you for signing up. We're glad to see you here.</p>
            </div>

            <div class="categories">
                <a href="history.php" class="card">
                    <img src="images/history.jpg" alt="History">
                    <p>History</p>
                </a>
                <a href="geography.php" class="card">
                    <img src="images/geography.jpg" alt="Geography">
                    <p>Geography</p>
                </a>
                <a href="math.php" class="card">
                    <img src="images/math.jpg" alt="Math">
                    <p>Math</p>
                </a>
                <a href="films.html" class="card">
                    <img src="images/films.jpg" alt="Films">
                    <p>Films</p>
                </a>
            </div>
        </section>
    </main>
    
    <script src="index.js"></script>
</body>
</html>
