<?php
session_start();
ob_start();

?>
<?php
$param_host ="localhost";
$param_database = "restaurant";
$param_user = "root";
$param_password ="";

try{
    $bdd=new PDO("mysql:host=$param_host;dbname=$param_database",$param_user,$param_password);
    $bdd->exec('SET NAMES utf8');
}
catch(Exception $e){
    echo'Error : '.$e->getMessage().'<br>';
    echo'N° : '.$e->getCode().'<br>';
}
?>