<?php 
header('Access-Control-Allow-Origin: *');
$host = 'database-1.crocuoiuc11a.us-east-2.rds.amazonaws.com';
$db = 'testeDB';
$user = 'admin';
$pass = $_ENV['DB_PASS'];

$con_sqli = new mysqli($host, $user, $pass, $db); // Comando para conectar com BD MySQL

if($con_sqli->connect_error) { // se tem numero de erro.
    die("Falha ao conectar com o banco de dados (". $con_sqli->connect_errno ."): ". $con_sqli->connect_error);
}