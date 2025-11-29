<?php
global $posts;
require("data.php");
require("function.php");



function addPost(&$posts) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $author = $_POST['author'] ?? '';
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $imgLink = $_POST['image-link'] ?? '';

        $newId = !empty($posts) ? end($posts)['id'] + 1 : 1;

        $posts[] = [
                "id" => $newId,
                "author" => $author,
                "title" => $title,
                "content" => $content,
                "img-link" => $imgLink,
        ];

        file_put_contents('data.php', '<?php $posts = ' . var_export($posts, true) . ';');
    }
}

if (!empty($_POST['title'])) {
    addPost($posts);
}


?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Můj jednoduchý blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <nav>
        <a href="index.php">Domů</a>
        <a href="contact.html">Kontakt</a>
    </nav>
</header>

<h1 style="text-align: center">Můj Blog</h1>

<main>
<?php foreach ($posts as $post): ?>
    <article class="post">
        <div class="content">
            <a class="read-more" href="detail.php?id=<?= $post['id'] ?>">
                <h2 ><?= $post['title'] ?></h2>
            </a>
            <p class="author">Autor: <?= $post['author'] ?></p>
            <p>
                <?= lessTitle($post['content']) . " . . ."?>
            </p>
        </div>
    </article>
    <?php endforeach; ?>
</main>

<form method="post">
    <div class="form-group">
        <h4>Author</h4>
        <input type="text" name="author" placeholder="Author">

        <h4>Title</h4>
        <input type="text" name="title" placeholder="Title">

        <h4>Content</h4>
        <textarea name="content" placeholder="Write something..."></textarea>
        <button>send blog</button>
    </div>
</form>


<footer>
    <p>© 2025 Můj jednoduchý blog</p>
</footer>

</body>
</html>