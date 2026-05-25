<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil</title>
</head>
<body>
    <header class="px-3 py-3 bg-black text-white d-flex justify-content-between align-items-center">
        <a href="index.php">
        <h2 class="logo">Gestock</h2>
        </a>
        <div class="d-flex gap-5 justify-content-between ">
            <a href="ajout_form.php" class="bg-white text-dark px-4 ">Ajouter</a>
            <?php if (isset($_SESSION['user'])): ?>
             <a href="lister.php" class="bg-white text-dark px-4">Produits</a>
            <?php endif; ?>
            <a href="login.php" class="bg-white text-dark px-4 ">Se connecter</a>
            <?php if (isset($_SESSION['user'])): ?>
             <a href="logout.php" class="bg-dark px-4 text-white">Logout</a>
            <?php endif; ?>
        </div>
    </header>
    <div class="hero  text-center my-5">
        <?php 
            if(isset($_SESSION['user'])){
                echo "<h1 class='text-white bg-secondary'>Heureux de vous revoir '".$_SESSION['user']."'</h1>";
            }
        ?>
        <h1 class="text-dark my-5 move">Gérez votre stock facilement</h1>
        <p class="h4 move">Suivez vos produits, ajoutez de nouveaux articles et gérez efficacement votre inventaire.</p>
        <div class="d-flex mt-5 justify-content-center gap-3">
            <a href="lister.php" class="btn btn-dark"> Voir les produits</a>
            <a href="ajout_form.php" class="btn btn-dark">Ajouter un produit</a>
        </div>
        
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