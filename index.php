<?php
include 'about.php';

// Query untuk mendapatkan data artikel
$sql = "SELECT id, title, image, excerpt FROM articles";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Pribadi</title>
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
        <section id="home">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <article>
                        <h2><?= $row['title']; ?></h2>
                        <img src="<?= $row['image']; ?>" alt="<?= $row['title']; ?>">
                        <p><?= $row['excerpt']; ?> 
                            <a href="detail.php?id=<?= $row['id']; ?>">Baca selengkapnya...</a>
                        </p>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Tidak ada artikel yang ditemukan.</p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Blog Pribadi | Dikembangkan dengan 💙 oleh Hafidzz</p>
    </footer>
</body>
</html>
