<?php
require('index.php');

$id = intval($_GET['id']) ?? null; //força ser inteiro

function deleteCliente($con_sqli, $id) {
    $sql_code = "DELETE FROM clientes WHERE id=$id";
    $query_delete = $con_sqli->query($sql_code);
    
    if($query_delete) {
        die();
    } else {
        die("Falha ao executar a query: $con_sqli->error");
    }
}

// if($_SERVER['REQUEST_METHOD'] === 'GET') {
if($id) {
    deleteCliente($con_sqli, $id);
}
// }

$con_sqli->close();
