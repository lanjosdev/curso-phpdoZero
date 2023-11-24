<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
</head>
<body>
    <?php 

    include('connection.php'); //Inclui o script de conexao com BD
    $id = intval($_GET['id']); // força em deixar o valor em int que veio como parametro na url
    $error = false;
    $sucess = false;

    $sqlcode_cliente = "SELECT * FROM clientes WHERE id = '$id'";
    $read_cliente = $mysqli->query($sqlcode_cliente) or die($mysqli->error);
    $cliente = $read_cliente->fetch_assoc(); //o dado do cliente da query acima
    // var_dump($cliente);
    $nome = $cliente['nome'];
    $email = $cliente['email'];
    $telefone = $cliente['telefone'];
    $nascimento = $cliente['nascimento'];       
    
    function sodeixa_numeros($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }


    if(count($_POST) > 0) { // entra nesse if apos o submit (clique no btn enviar, que alimenta a array $_POST)
        $nome = $_POST['nome'] ?? $cliente['nome'];
        $email = $_POST['email'] ?? $cliente['email'];
        $telefone = $_POST['telefone'] ?? $cliente['telefone'];
        $nascimento = $_POST['nascimento'] ?? $cliente['nascimento'];    
        $erro = false;        

        // Validação de inputs
        if(!empty($nascimento)) {
            if(strcspn($nascimento, "-") != 4) {
                $pedacos = explode('/', $nascimento); // 13/01/1995 = 13, 01, 1995 (vira array)
                
                if(count($pedacos) == 3) {
                    $nascimento = implode('-', array_reverse($pedacos)); // 1995-01-13 exemplo
                } else {
                    $erro = "A data de nascimento deve seguir o padrão dd/mm/aaaa";
                }
            }
        } else {
            $erro = "Preencha a data de nascimento";
        }

        if(!empty($telefone)) {
            $telefone = sodeixa_numeros($telefone);
            if(strlen($telefone) != 11) {
                $erro = "O telefone deve ser preenchido no padrão (11)98888-8888";
            }
        }

        if(empty($email)) {
            $erro = "Preencha o email";
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erro = "Preencha um email válido!";
        }

        if(empty($nome)) {
            $erro = "Preencha o nome";
        } else if(strlen($nome) < 3) {
            $erro = "O nome deve conter a partir de 3 caracteres";
        }


        if($erro) {
            $error = "<p style='color: red'><b>ERRO: $erro</b></p>";
        } else {
            // Envio para o Banco de Dados (UPDATE registro):
            $sqlcode_edit = "UPDATE clientes SET nome='$nome', email='$email', telefone='$telefone', nascimento='$nascimento' WHERE id=$id";

            $edit_cliente = $mysqli->query($sqlcode_edit) or die($mysqli->error);

            if($edit_cliente) {
                $sucess = "<p style='color: green'><b>Cliente atualizado com sucesso!!!</b></p>";
                unset($_POST); //Limpa o formulario
            }
        }
    }
    ?>

    <h1>Editar Cliente</h1>

    <a href="clientes.php">Voltar para a lista de Clientes</a>
    <br><br><br>

    <form action="" method="POST">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="nome" value="<?=$nome?>" > *
        <br><br>

        <label for="mail">E-mail:</label>
        <input type="email" id="mail" name="email" value="<?=$email?>" > *
        <br><br>

        <label for="tel">Telefone:</label>
        <input type="tel" placeholder="(11)98888-8888" id="tel" name="telefone" value="<?=formatar_tel($telefone)?>">
        <br><br>

        <label for="nasc">Data de Nascimento:</label>
        <input type="date" placeholder="dd/mm/aaaa" id="nasc" name="nascimento" value="<?=$nascimento?>" > *
        <br><br>


        <button type="submit">Editar Cliente</button>
    </form>

    <?php 
    if($error) {
        echo $error;
    }
    if($sucess) {
        echo $sucess;
    }
    ?>   

</body>
</html>