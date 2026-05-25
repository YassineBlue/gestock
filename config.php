<?php 
$host ='127.0.0.1';
$dbName ='stock';
$user = 'root';
$password = '';
try{
    $cnx = new PDO("mysql:host=$host;port=3307;dbname=$dbName",$user, $password);
    //handle the cnx failed case 
    $cnx ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "Connection succeeded";
}catch(PDOException $e){
    die("connexion to db failed : ".$e->getMessage());
}
?>
