<?php 
$host = 'localhost';
$db = 'crud_clientes';
$user = 'root';
$pass = 'Ennad1995#root';


$mysqli = new mysqli($host, $user, $pass, $db); // Comando para conectar com BD MySQL

if($mysqli->connect_errno) { // se tem numero de erro.
    // echo "Falha ao conectar com o banco de dados (". $mysqli->connect_errno ."): ". $mysqli->connect_error; 
    die("Falha ao conectar com o banco de dados (". $mysqli->connect_errno ."): ". $mysqli->connect_error);
}