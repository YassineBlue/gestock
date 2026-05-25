<?php 
require 'config.php';
if(isset($_GET['code'])){
    echo $_GET['code'] ;
    $sql = "DELETE FROM produit WHERE Code_produit =? ";
    $stm = $cnx->prepare($sql);
    $stm->execute([$_GET['code']]);
    header("Location:lister.php");
    exit;
}
?>