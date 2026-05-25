
<?php
    require 'config.php';
    session_start();

    $errors = $_SESSION['errors']??'';
    $status = $_SESSION['status']??'' ;
    unset($_SESSION['errors'] , $_SESSION['status']);
    $edit = $_GET['code']??'';
    if(isset($edit)){
        $sql = 'SELECT * FROM produit WHERE Code_produit = ?';
        $res = $cnx->prepare($sql);
        $res->execute([$edit]);
        $user = $res-> fetch(); 
        $_SESSION['edit']=$edit;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Ajouter produit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="px-3 py-3 bg-black text-white d-flex justify-content-between align-items-center">
        <a href="index.php">
        <h2 class="logo">Gestock</h2>
        </a>
        <div class="d-flex gap-5 justify-content-between ">
            <a href="ajout_form.php" class="bg-danger px-4 ">Ajouter</a>
            <?php if (isset($_SESSION['user'])): ?>
             <a href="lister.php" class="bg-white text-dark px-4">Produits</a>
            <?php endif; ?>
            <a href="login.php" class="bg-white text-dark px-4 ">Se connecter</a>
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
        <form action="validation.php" method="post" enctype="multipart/form-data" class="form-card">
            <label for="code" class="form-label">Saisir le code du produit: </label>
            <input type="number" name="code" id="code" class="form-control" value="<?php if(isset($_SESSION['old']['code'])){echo $_SESSION['old']['code'] ;} elseif($user){echo $user['Code_produit'] ;} ?>">
            <span class="text-danger"><?= $errors['code']??''; ?></span>
            <br>
            <label for="designation" class="form-label">Saisir la désignatino du produit: </label>
            <input type="text" name="designation" id="designation" class="form-control"  
            value="<?php if(isset($_SESSION['old'])){echo $_SESSION['old']['designation'] ;} elseif($user){echo $user['Designation'];} ?>">
            <span class="text-danger"><?= $errors['designation']??''; ?></span>
            <br>
            <label for="prix" class="form-label">Saisir le prix du produit: </label>
            <input type="number" name="prix" id="prix" class="form-control" value="<?php if(isset($_SESSION['old']['prix'])){echo $_SESSION['old']['prix'] ;} elseif($user){echo $user['Prix_Unitaire'];} ?>">
            <span class="text-danger"><?= $errors['prix']??''; ?></span>
            <br>
            <label for="stock" class="form-label">Saisir le stock du produit: </label>
            <input type="number" name="stock" id="stock" class="form-control" value="<?php if(isset($_SESSION['old']['stock'])){echo $_SESSION['old']['stock'] ;} elseif($user){echo $user['stock'] ;} ?>">
            <span class="text-danger"><?= $errors['stock']??''; ?></span>
            <br>
            <label for="photo" class="form-label">Photo de produit:</label>
            <input type="file" name="photo" id="photo" class="form-control" value="<?php if(isset($_SESSION['old']['stock'])){echo $_SESSION['old']['stock'] ;} elseif($user){echo $user['stock'] ;} ?>">
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
        <a href="index.php">Accueil</a> |
        <a href="lister.php">Produits</a> |
        <a href="ajout_form.php">Ajouter</a>
    </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>