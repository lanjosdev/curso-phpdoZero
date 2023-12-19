<?php 
require('connection.php');

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

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    readAllClientes($con_sqli);
} else {
    // Se a requisição não for do tipo GET, retorna um erro
    http_response_code(405); // Método não permitido
    echo json_encode(['erro' => 'Método não permitido']);
    // http_response_code(400); // Bad Request
    // echo "Erro!";
}

$con_sqli->close();