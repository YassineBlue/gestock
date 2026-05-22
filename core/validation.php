<?php 


require('config.php');
session_start();

if (!isset($_POST['send'])) {
    header("Location: ajout_form.php");
    exit;
}

$sql = "SELECT Code_produit from produit";
$res = $cnx->prepare($sql);
$res->execute();
$codes = array_column($res->fetchAll(PDO::FETCH_NUM), 0);

$errors =[];


    
if(trim($_POST['code']) === ''){
$errors['code'] = '*Champ obligatoire';
}
elseif(is_numeric($_POST['code'])){
    if(in_array((int)$_POST['code'], $codes)){
        $errors['code'] = '*Code already exits';
    }
}

if(trim($_POST['designation']) === ''){
$errors['designation'] = '*Champ obligatoire';
}

if(trim($_POST['prix']) === ''){
$errors['prix'] = '*Champ obligatoire';
}
elseif(filter_var($_POST['prix'], FILTER_VALIDATE_INT) === false){
    $errors['prix'] = '*Valeur doit être numérique';
}

if(trim($_POST['stock']) === ''){
$errors['stock'] = '*Champ obligatoire'; 
}
elseif(filter_var($_POST['stock'], FILTER_VALIDATE_INT)===false){
$errors['stock'] = '*Valeur doit être numérique';
}

$_SESSION['errors'] = $errors;

if(empty($errors)){
    $_SESSION['status'] ='valid';

    $sql = "INSERT INTO produit(Code_produit, Designation, Prix_Unitaire,stock) VALUES(:code,:designation,:prix,:stock)";

    $res = $cnx->prepare($sql);
    $res->execute([":code"=>$_POST['code'], ":designation"=>$_POST['designation'], ":prix"=>$_POST['prix'], ":stock"=>$_POST['stock']]);

    }
else{
     $_SESSION['old']=$_POST;
    $_SESSION['status'] = 'invalid';
}
    header("Location:ajout_form.php");
    exit;

?>