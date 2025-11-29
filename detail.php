<?php
global $posts;
require "data.php";
$post = $posts[$_GET["id"]-1];
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Článek – Jednoduchý blog</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<header>
    <nav>
        <a href="index.php">Domů</a>
        <a href="#">Kontakt</a>
    </nav>
</header>

<h1 style="text-align: center">Můj Blog</h1>
<main class="article">

    <h2 class="title"><?php echo $post["title"] ?> </h2>

    <p class="text">
        <?php echo $post["content"]; ?>
    </p>
</main>

</body>
</html>

