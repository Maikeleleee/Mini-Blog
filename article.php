<?php

if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
    header('Location: index.php');
else {
    extract($_GET);
    $id = strip_tags($id);

    require_once('config/functions.php');

    if(!empty($_POST)) {    // => Si le post n'est pas vide
        extract($_POST);    // Extrait le post
        $errors = array();  // Tableau qui contient la liste d'erreur possible

        $author = strip_tags($author); // Sécurise les variables du post avec la fonction strip_tags
        $comment = strip_tags($comment);

        if(empty($author)) {    // Si le pseudo est vide 
            array_push($errors, 'Entrez un pseudo');    // On push l'érreur dans le tableau 
        }
            if(empty($comment)) {   // Si le commentaire est vide 
                array_push($errors, 'Entrez un commentaire');   // On push l'érreur dans le tableau
            }
                if(count($errors) == 0) {   //
                    $comment = addComment($id, $author, $comment);

                    $success = "Votre commentaire a été publié";

                    unset($author);     // Vide le champ du pseudo
                    unset($comment);    // Vide le champ des commentaires

                }
    }

    $article = getArticle($id);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $article->title ?> </title>
</head>
<body>
    <h1> <?= $article->title ?> </h1>
    <time> <?= $article->date ?> </time>
    <p> <?= $article->content ?> </p>
    <hr/>

    <?php
    if(isset($success)) // Si a l'envoi le formulaire est bon, on affiche la variable succès
        echo $success;
    
    if(!empty($errors)):?>     <!-- Si a l'envoi le formulaire est pas bon, on affiche la variable error -->

        <?php foreach($errors as $error): ?>
            <p> <?= $error ?> </p>
        <?php endforeach; ?>
    
    <?php endif; ?>
    

    <form action="article.php?id=<? $article->id ?>" method="POST">
        <label for="author">Pseudo :</label>
        <input type="text" name="author" id="author"><br></br>
        <label for="comment">Commentaire :</label><br></br>
        <textarea name="comment" id="comment" cols="30" rows="8"></textarea><br></br>
        <button type="submit">Envoyer</button>
    </form>

</body>
</html>