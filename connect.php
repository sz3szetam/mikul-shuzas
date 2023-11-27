<?php
$server = 'localhost';
$db = 'diakok';
$user = 'root';
$pwd = '';

try{
    $connect = new PDO("mysql:host=$server;dbname=$db", $user, $pwd);
}
catch(Exception $e){
    print($e -> getMessage());
}
?>