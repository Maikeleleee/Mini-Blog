<?php

// Fonction qui récupère tous les articles.
function getArticles() {
    require('config/connect.php');      // Get the connect file which connects us to the database.
    $req = $bdd->prepare('SELECT id, title, date FROM articles Order BY id DESC');
    $req->execute();        // Execute la requête.
    $data = $req->fetchAll(PDO::FETCH_OBJ);     // On récupère sous forme d'objet.
    return $data;       // On retourne la valeur de $data.
    $req->closeCursor();        // Ferme le curseur.
}

// Fonction qui récupère un article.
function getArticle($id) {
    require('config/connect.php');
    $req = $bdd->prepare('SELECT * FROM articles WHERE id = ?');    //prepare la requête a tous séléctionner.
    $req->execute(array($id));      //

    if($req->rowCount() == 1) {     // Si il y a une correspondance.
        $data = $req->fetch(PDO::FETCH_OBJ);        // On récupère sous forme d'objet.
        return $data;
    }
    else {
        header('Location: index.php');      // Retour a l'index.
        $req->closeCursor();
    }
}

function addComment($articleId, $author, $comment) {
    require('config./connect.php');
    $req = $bdd->prepare('INSERT INTO comments (articleId, author, comment, date) VALUES
    (?, ?, ?, NOW())');
    $req->execute(array($articleId, $author, $comment));
    $req->closeCursor();
}


