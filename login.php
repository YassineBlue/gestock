<?php 
    require('config.php');
    session_start();
    if (isset($_POST['send'])){
        $usr = $_POST['name'];
        $pwd = $_POST['pwd'];
        $res = $cnx->prepare("select * from users where usr = ? ");
        $res -> execute([$usr]);
        $user = $res->fetch();
        if($user && $user['pwd'] === $pwd){
            //session initializing
            $_SESSION['user'] = $user['usr'];
            header("Location:index.php");
            exit;

        }else{
            echo "Login failed " ;
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        form{
            background:#fff;
        }
        input{
            background: transparent!important;
            border:1px solid #000!important;
        }
    </style>
</head>
<body>
    <header class="px-3 py-3 bg-black text-white d-flex justify-content-between align-items-center">
        <a href="index.php">
        <h2 class="logo">Gestock</h2>
        </a>
        <div class="d-flex gap-5 justify-content-between ">
            <a href="ajout_form.php" class="bg-white text-dark px-4 ">Ajouter</a>
            <?php if (isset($_SESSION['user'])): ?>
             <a href="lister.php" class="bg-white text-dark px-4 ">Produits</a>
            <?php endif; ?>
            <a href="login.php" class="bg-danger px-4 ">Se connecter</a>
        </div>
    </header>
    <div class="container m-5 p-5" style="flex:1">
        <form method="POST" action="" class="shadow mx-auto p-5 border border-3 border-dark rounded " style="max-width:540px">
            <div class="mb-3">
                <label for="name" class="mb-1">USER NAME</label>
                <input id="name" name="name" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="pwd"  class="mb-1">PASSWORD</label>
                <input type="password" name="pwd" id="pwd" class="form-control" required>
            </div>
            <button type="submit" name="send" class="btn btn-dark d-block mx-auto">Se connecter</button>
        </form>
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