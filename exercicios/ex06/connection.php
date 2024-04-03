<?php 
header('Access-Control-Allow-Origin: *');
$host = 'localhost';
$db = 'crud_clientes';
$user = 'root';
$pass = '';

$con_sqli = new mysqli($host, $user, $pass, $db); // Comando para conectar com BD MySQL

if($con_sqli->connect_error) {
    die("Falha ao conectar com o banco de dados (". $con_sqli->connect_errno ."): ". $con_sqli->connect_error);
} 
// else {
//     echo 'Sucesso';
// }