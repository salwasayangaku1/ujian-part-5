<?php
include 'about.php';

// Ambil ID artikel dari URL
$id = $_GET['id'] ?? 0;

// Query untuk mendapatkan detail artikel
$sql = "SELECT title, image, content FROM articles WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article['title']; ?> - Hafidzpedia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Hafidzpedia</h1>
        <p>Temukan pengetahuan bersamaku</p>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">Tentang</a></li>
            <li><a href="contact.html">Kontak</a></li>
        </ul>
    </nav>

    <main>
        <section id="article">
            <h2><?= $article['title']; ?></h2>
            <img src="<?= $article['image']; ?>" alt="<?= $article['title']; ?>">
            <p><?= $article['content']; ?></p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Blog Pribadi | Dikembangkan dengan 💙 oleh Hafidzz</p>
    </footer>
</body>
</html>
