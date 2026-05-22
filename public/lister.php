<?php 
require('config.php');
$sql = "select * from produit";
$res = $cnx->query($sql); //execution de requette
$produits = $res->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Produits</title>
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
    <div class="container-fluid text-center mt-5">
    <h3 class="text-dark p-2 text-center mb-3">Liste des produits</h3>
    <table class="table table-bordered table-striped text-center">
        <thead class="table-primary">
            <th>Code</th>
            <th>Désignation</th>
            <th>Prix Unitaire</th>
            <th>Stock</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php foreach($produits as $p):?>
                <tr>
                    <td><?= $p['Code_produit']; ?></td>
                    <td><?= $p['Designation']; ?></td>
                    <td><?= $p['Prix_Unitaire'] ;?></td>
                    <td><?= $p['stock']; ?></td>
                    <td><a href="../core/delete.php?code=<?=$p['Code_produit']?>" class="btn btn-sm btn-danger">Supprimer</a></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <a class="btn btn-primary " href="ajout_form.php">Ajouter produit</a>
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