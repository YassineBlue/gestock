
<?php
    session_start();
    $errors = $_SESSION['errors']??'';
    $status = $_SESSION['status']??'' ;
    unset($_SESSION['errors'] , $_SESSION['status']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Ajouter produit</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="px-3 py-3 bg-black text-white d-flex justify-content-between align-items-center">
        <a href="accueil.php">
        <h2 class="logo">Gestock</h2>
        </a>
        <div class="d-flex gap-5 justify-content-between ">
            <a href="ajout_form.php" class="bg-danger px-4 ">Ajouter</a>
            <a href="lister.php" class="bg-danger px-4">Produits</a>
        </div>
    </header>

    <div class="container-fluid py-5 ">
         <?php if($status === 'valid'){
        echo "<h4 class='msg bg-white alert alert-success p-2 text-success text-center'>Produit Enregistré</h4>";
    }
    if($status === 'invalid'){
        echo "<h4 class='msg alert alert-danger bg-white text-danger p-2 text-center'>Invalid Form</h4>";
    } ?>
        <h3 class="text-dark p-2 text-center mb-3">Nouveau produit</h3>
        <form action="validation.php" method="post" class="form-card">
            <label for="code" class="form-label">Saisir le code du produit: </label>
            <input type="number" name="code" id="code" class="form-control" value="<?= $_SESSION['old']['code']??''?>">
            <span class="text-danger"><?= $errors['code']??''; ?></span>
            <br>
            <label for="designation" class="form-label">Saisir la désignatino du produit: </label>
            <input type="text" name="designation" id="designation" class="form-control" value="<?= $_SESSION['old']['designation']??'' ?>">
            <span class="text-danger"><?= $errors['designation']??''; ?></span>
            <br>
            <label for="prix" class="form-label">Saisir le prix du produit: </label>
            <input type="number" name="prix" id="prix" class="form-control" value="<?= $_SESSION['old']['prix']??'' ?>">
            <span class="text-danger"><?= $errors['prix']??''; ?></span>
            <br>
            <label for="stock" class="form-label">Saisir le stock du produit: </label>
            <input type="number" name="stock" id="stock" class="form-control" value="<?= $_SESSION['old']['stock']??'' ?>">
            <span class="text-danger"><?= $errors['stock']??''; ?></span>
            <br>
            <?php unset($_SESSION['old']); ?>
            <button type="submit" class="btn btn-success d-block w-50 mx-auto " name="send">Ajouter</button>
        </form>
        <a href="lister.php" class="btn btn-primary my-4 d-block w-50 mx-auto ">Produits existants</a>
    </div>
    <footer class="d-flex p-3 justify-content-around align-items-center">
    <div class="">&copy; 2026 Gestock Développé par Yassine </div>
    <div class="d-flex gap-5">
        <a href="accueil.php">Accueil</a> |
        <a href="lister.php">Produits</a> |
        <a href="ajout_form.php">Ajouter</a>
    </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>