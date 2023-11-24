<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    <?php 
    include('connection.php');

    $sqlcode_read = "SELECT * FROM clientes";
    $read_clientes = $mysqli->query($sqlcode_read) or die($mysqli->error);
    // var_dump($read_clientes);
    $qtdClientes = $read_clientes->num_rows; // quantidade de clientes 
    ?>

    <h1>Lista de Clientes</h1>
    <p>Estes são os clientes cadastrados no seu sistema:</p>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Nascimento</th>
                <th>Cadastrado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
            if($qtdClientes == 0) { ?>
                <tr>
                    <td colspan="7" style="text-align: center;">Nenhum cliente foi cadastrado</td>
                </tr>
            <?php 
            } else { 
                while($cliente = $read_clientes->fetch_assoc()) {
                    // var_dump($cliente);

                    if(empty($cliente['telefone'])) {
                        $format_tel = "Não informado";
                    } else {
                        $format_tel = formatar_tel($cliente['telefone']);
                    }

                    $format_nascimento = implode('/', array_reverse(explode('-', $cliente['nascimento'])));

                    $format_cadastro =date("d/m/Y H:i", strtotime($cliente['data_cadastro']));
                ?>
                <tr>
                    <td><?=$cliente['id']?></td>
                    <td><?=$cliente['nome']?></td>
                    <td><?=$cliente['email']?></td>
                    <td><?=$format_tel?></td>
                    <td><?=$format_nascimento?></td>
                    <td><?=$format_cadastro?></td>
                    <td>
                        <a href="editar_cliente.php?id=<?=$cliente['id']?>">Edit</a>
                        <a href="deletar_cliente.php?id=<?=$cliente['id']?>">X</a>
                    </td>
                </tr>
            <?php } 
            }?>

        </tbody>
    </table>
</body>
</html>