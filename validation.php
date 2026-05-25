<?php 
require('config.php');
session_start();
$sql = "SELECT Code_produit from produit";
$res = $cnx->prepare($sql);
$res->execute();
$codes = array_column($res->fetchAll(PDO::FETCH_NUM),0);
$errors =[];
if(isset($_POST['send']) && !isset($_SESSION['edit'])){
   
    if(trim($_POST['code']) == ''){
        $errors['code'] = '*Champ obligatoire';
    }
    if(!empty(trim($_POST['code'])) && is_numeric($_POST['code'])){
        if(in_array((int)$_POST['code'], $codes)){
        $errors['code'] = '*Code déjà utilisé';  }
    }
    if(trim($_POST['designation']) == ''){
        $errors['designation'] = '*Champ obligatoire';
    }
    if(trim($_POST['prix']) == ''){
        $errors['prix'] = '*Champ obligatoire';
    }
    if(trim($_POST['stock']) == ''){
        $errors['stock'] = '*Champ obligatoire'; 
    }
    if(filter_var($_POST['prix'], FILTER_VALIDATE_INT) === false){
         $errors['prix'] = '*valeur doit être un entier';
    }
    if(filter_var($_POST['stock'], FILTER_VALIDATE_INT)===false){
        $errors['stock'] = '*Valeur doit être un entier';
    }
    if($_POST['photo'])

    $_SESSION['errors']= $errors;
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
    }
    elseif(isset($_POST['send']) && isset($_SESSION['edit'])){
        if(trim($_POST['code']) == ''){
        $errors['code'] = '*Champ obligatoire';
    }
    if(trim($_POST['designation']) == ''){
        $errors['designation'] = '*Champ obligatoire';
    }
    if(trim($_POST['prix']) == ''){
        $errors['prix'] = '*Champ obligatoire';
    }
    if(trim($_POST['stock']) == ''){
        $errors['stock'] = '*Champ obligatoire'; 
    }
    if(filter_var($_POST['prix'], FILTER_VALIDATE_INT) === false){
         $errors['prix'] = '*valeur doit être un entier';
    }
    if(filter_var($_POST['stock'], FILTER_VALIDATE_INT)===false){
        $errors['stock'] = '*Valeur doit être un entier';
    }

    $_SESSION['errors']= $errors;
    if(empty($errors)){
        $_SESSION['status'] ='valid';
        $sql = "UPDATE produit SET Designation=?,Prix_Unitaire=?,stock=? WHERE Code_produit =?";
        $res = $cnx->prepare($sql);
        $res->execute([$_POST['designation'],$_POST['prix'],$_POST['stock'],$_POST['code']]);
    }
else{
     $_SESSION['old']=$_POST;
    $_SESSION['status'] = 'invalid';
}
    header("Location:ajout_form.php");
    exit;

    }
?>