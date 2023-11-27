<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Cliente</title>
</head>
<body>
    <?php 
    include('connection.php');
    $id = intval($_GET['id']);

    $confirma = $_POST['confirmar'] ?? null;
    if($confirma) {
        $sqlcode_delete = "DELETE FROM clientes WHERE id = $id";
        $delete_cliente = $mysqli->query($sqlcode_delete);
        if($delete_cliente) {
            echo "
            <h1>Cliente deletado com sucesso!</h1>
            <p><a href='clientes.php'>Clique aqui</a> para voltar para a lista de clientes.</p>
            ";
            die();
        } else {
            die("Falha ao executar a query: $mysqli->error");
        }
    }
    ?>

    <h1>Deletar Cliente</h1>
    <p>Tem certeza que deseja deletar este cliente?</p>

    <form action="" method="post">
        <a href="clientes.php" style="margin-right: 20px;">Não</a>
        <button name="confirmar" value="1">Sim</button>
    </form>
</body>
</html>