<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Architecture PHP MySQL</title>
</head>

<body>
    <!-- Titre -->
    <h1 class="text-center">Architecture PHP MySQL CRUD</h1>

    <!-- GET Cards -->
    <div class="container mb-5">
        <div class="row">
            <h2>Method GET</h2>
            <!-- Connexion à la DB -->
            <?php
            // import de la connexion Connexion à la DB
            include_once 'db/database.php';
            // Appel de la class Database et de ça fontion connect()
            $pdo = Database::connect();
            $i = 0;

            $sql = 'SELECT * FROM articles';
            $q = $pdo->query($sql);

            foreach ($q as $row) {
                if (++$i > 4) break;

            ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="./public/images/image.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['articlename'] ?></h5>
                            <p class="card-text"><?php echo "My ID is : {$row['id']}, {$row['content']}" ?></p>
                            <a href="#" class="btn btn-primary"><?php echo $row['link'] ?></a>
                        </div>
                    </div>
                </div>
            <?php };
            Database::disconnect();
            ?>
        </div>
    </div>

    <!-- POST Cards -->

    <div class="container mb-5">
        <div class="row">
            <h2>Method POST</h2>
            <form action="./controllers/create.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="articlename" class="form-label">Article Name</label>
                    <input type="text" class="form-control" name="articlename" id="articlename" placeholder="Article name">
                </div>
                <div>
                    <label for="imageFile" class="form-label">Image here</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input type="text" class="form-control" name="content" id="content" placeholder="Content">
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="Link">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

    <!-- PUT Cards -->
    <div class="container mb-5">
        <div class="row">
            <h2>Method PUT</h2>
            <!-- Connexion à la DB -->
            <?php
            // import de la connexion Connexion à la DB
            include_once 'db/database.php';
            // Appel de la class Database et de ça fontion connect()
            $pdo = Database::connect();
            $i = 0;

            $sql = 'SELECT * FROM articles';
            $q = $pdo->query($sql);

            foreach ($q as $row) {
                if (++$i > 4) break;

            ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="./public/images/imager.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <form action="./controllers/update.php?id=<?php echo $row['id'] ?>" method="POST">
                                <h5>
                                    <label for="articlenameedit" class="form-label">Edit name</label>
                                    <input type="text" class="form-control" placeholder="<?php echo $row['articlename'] ?>" name="articlename">
                                </h5>
                                <h5>
                                    <label for="contentedit" class="form-label">Edit content</label>
                                    <input type="text" class="form-control" placeholder="<?php echo $row['content'] ?>" name="content">
                                    <button type="submit" class="btn btn-success mt-3">Edit</button>
                                </h5>
                            </form>
                        </div>
                    </div>
                </div>
            <?php };
            Database::disconnect();
            ?>
        </div>
    </div>

    <!-- DELETE Cards -->
    <div class="container mb-5">
        <div class="row">
            <h2>Method DELETE</h2>
            <!-- Connexion à la DB -->
            <?php
            // import de la connexion Connexion à la DB
            include_once 'db/database.php';
            // Appel de la class Database et de ça fontion connect()
            $pdo = Database::connect();
            $i = 0;

            $sql = 'SELECT * FROM articles';
            $q = $pdo->query($sql);

            foreach ($q as $row) {
                if (++$i > 4) break;

            ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="./public/images/imaged.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo "Wanna delete Card {$row['id']} ?" ?></h5>
                            <form action="./controllers/delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php };
            Database::disconnect();
            ?>
        </div>
    </div>

    <script src="/public/js/bootstrap.js"></script>
</body>

</html>