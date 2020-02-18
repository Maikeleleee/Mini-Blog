<?php
require_once('config/functions.php');

$articles = getArticles();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Blog</title>
</head>


<body>
    <h1>Articles : </h1>

    <?php foreach($articles as $article): ?>
        <h2> <?= $article->title ?> </h2>       <!-- Récupère tout les titres -->
        <time> <?= $article->date ?> </time>
        <br></br>
        <a href="article.php?id=<?= $article->id ?>" >Lire la suite</a>
    <?php endforeach; ?>
</body>

</html>