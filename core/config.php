<?php 
$host ='127.0.0.1';
$dbName ='stock';
$user = 'root';
$password = '';
try{
    $cnx = new PDO(
        "mysql:host=$host;dbname=$dbName",
        $user, 
        $password);

    $cnx ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
    die("DB connection failed: ".$e->getMessage());
}
?>
