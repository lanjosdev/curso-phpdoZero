<?php 
require('index.php');

function sodeixa_numeros($str) {
    return preg_replace("/[^0-9]/", "", $str);
}

function updateCliente($con_sqli) {
    $idCliente = intval($_POST['id']); //força ser inteiro

    $sql_code = "SELECT * FROM clientes WHERE id=$idCliente";
    $query_read = $con_sqli->query($sql_code) or die(http_response_code(404));
    $cliente_data = $query_read->fetch_assoc(); // os dados do cliente da query acima (em array)
    // var_dump($cliente_data);
    $nome = $_POST['nome'] ?? $cliente_data['nome'];
    $email = $_POST['email'] ?? $cliente_data['email'];
    $telefone = $_POST['telefone'] ?? $cliente_data['telefone'];
    $nascimento = $_POST['nascimento'] ?? $cliente_data['nascimento'];
    // var_dump($nome, $email, $telefone, $nascimento);


    if(!empty($telefone)) {
        $telefone = sodeixa_numeros($telefone);
        if(strlen($telefone) != 11) {
            die(http_response_code(404));
        }
    }
    

    // Envio para o Banco de Dados (UPDATE registro):
    $sql_code = "UPDATE clientes SET nome='$nome', email='$email', telefone='$telefone', nascimento='$nascimento' WHERE id=$idCliente";

    $query_update = $con_sqli->query($sql_code) or die($con_sqli->error);
    if(!$query_update) {
        http_response_code(404);
    } 
    // else {
    //     echo json_encode($query_create); /////
    // }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateCliente($con_sqli);
}

$con_sqli->close();