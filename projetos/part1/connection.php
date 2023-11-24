<?php 
$host = 'localhost';
$db = 'crud_clientes';
$user = 'root';
$pass = 'Ennad1995';


$mysqli = new mysqli($host, $user, $pass, $db); // Comando para conectar com BD MySQL

if($mysqli->connect_errno) { // se tem numero de erro.
    die("Falha ao conectar com o banco de dados (". $mysqli->connect_errno ."): ". $mysqli->connect_error);
    // echo "Falha ao conectar com o banco de dados (". $mysqli->connect_errno ."): ". $mysqli->connect_error; 
}

// Funções:
function formatar_tel($tel) {
    if($tel) {
        $ddd = substr($tel, 0, 2);
        $part1tel = substr($tel, 2, 5);
        $part2tel = substr($tel, 7); //pega o resto final
        return "($ddd) $part1tel-$part2tel";
    }
}