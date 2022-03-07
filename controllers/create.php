<?php
// import du fichier database.php
require '../db/database.php';

// Si il y a une method post
if (!empty($_POST)) {
    // On définit nos variables à envoyer
    $articlenameError = null;
    $imageError = null;
    $contentError = null;
    $linkError = null;

    // On définit la valeur de nos variable au résultat de la method post
    $articlename = $_POST['articlename'];
    $image = $_FILES['image']['name'];
    $content = $_POST['content'];
    $link = $_POST['link'];

    // On check nos variable input:
    $valid = true;
    // On check notre articlename
    if (empty($articlename)) {
        // variable de l'err
        $articlenameError = 'Please enter articlename';
        // si il n'y a pas de articlename alors
        $valid = false;
    }

    if (empty($image)) {
        // variable de l'err
        $imageError = 'Please enter image';
        // si il n'y a pas de articlename alors
        $valid = false;
    }

    if (empty($content)) {
        // variable de l'err
        $contentError = 'Please enter content';
        // si il n'y a pas de articlename alors
        $valid = false;
    }

    // Si tout est valid alors
    if ($valid) {
        // insert data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO articles (articlename, image, content, link) values(?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($articlename, $image, $content, $link));
        Database::disconnect();
        header("Location: ../index.php");
    }
}
?>