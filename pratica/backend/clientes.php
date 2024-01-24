<?php 
require('index.php');

function readAllClientes($con_sqli) {
    $sql_code = "SELECT * FROM clientes";
    $query_read = $con_sqli->query($sql_code);
    $qtdClientes = $query_read->num_rows; // quantidade de clientes 
    // $cliente = $query_read->fetch_assoc();
    $ranking_data = array();

    if($qtdClientes > 0) {
        while($cliente = $query_read->fetch_assoc()) {
            if(empty($cliente['telefone'])) {
                $cliente['telefone'] = null;
            }

            $ranking_data[] = $cliente;
        }
    }
    
    echo json_encode($ranking_data);
}

function readClienteId($con_sqli, $idCliente) {
    $sql_code = "SELECT * FROM clientes WHERE id=$idCliente";
    $query_read = $con_sqli->query($sql_code);

    $cliente_data = $query_read->fetch_assoc();
    if($cliente_data) {
        echo json_encode($cliente_data);
    } else {
        http_response_code(404);
    }
}


if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $idCliente = $_GET['id'] ?? null;
    if($idCliente) {
        readClienteId($con_sqli, $idCliente);
    } else {
        readAllClientes($con_sqli);
    }
} else {
    // Se a requisição não for do tipo GET, retorna um erro
    http_response_code(405); // Método não permitido
    echo json_encode(['erro' => 'Método não permitido']); // retorna um objeto
    // http_response_code(400); // Bad Request
    // echo "Erro!";
}

$con_sqli->close();