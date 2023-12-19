<?php 
require('connection.php');

function createCliente($con_sqli) {
    // Capturando os dados do Formulario
    $nome = $_POST['nome'] ?? null;
    $email = $_POST['email'] ?? null;
    $telefone = $_POST['telefone'] ?? null;
    $nascimento = $_POST['nascimento'] ?? null; 

    // Envio para o Banco de Dados (CREATE registro):
    $sql_code = "INSERT INTO clientes (nome, email, telefone, nascimento, data_cadastro) VALUES ('$nome', '$email', '$telefone', '$nascimento', NOW())";

    $query_create = $con_sqli->query($sql_code) or die($con_sqli->error);
    // unset($_POST); //Limpa o formulario
    if(!$query_create) {
        http_response_code(404);
    } 
    // else {
    //     echo json_encode($query_create); /////
    // }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    createCliente($con_sqli);
}

$con_sqli->close();