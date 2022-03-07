<!-- 
    Page Update ID
-->
<?php
// import du fichier database.php
require '../db/database.php';
// on définit par default notre id en null
$id = null;

// on check si on récupère l'id dans notre method get
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

// si il n'y a pas d'id
if (null == $id) {
    // on redirige sur la page index.php
    header("Location: ../index.php");
}

// Si il y a une method post
if (!empty($_POST)) {
    // On définit nos variables à envoyer
    $articlenameError = null;
    $contentError = null;


    // On définit la valeur de nos variable au résultat de la method post
    $articlename = $_POST['articlename'];
    $content = $_POST['content'];

    // On check nos variable input:
    $valid = true;
    if (empty($articlename)) {
        // variable de l'err
        $articlenameError = 'Please enter articlename';
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
        // update data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE articles SET articlename = ?, content = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($articlename, $content, $id));
        Database::disconnect();
        header("Location: ../index.php");
    }
// Sinon on récupère les datas pour les afficher sur la page
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM articles where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $articlename = $data['articlename'];
    $content = $data['content'];
    $link = $data['link'];
    Database::disconnect();
}
?>