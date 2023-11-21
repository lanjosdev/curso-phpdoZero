<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
</head>
<body>
    <?php 
    // Capturando os dados do Formulario Retroalimentado
    $nome = $_POST['nome'] ?? null;
    $email = $_POST['email'] ?? null;
    $telefone = $_POST['telefone'] ?? null;
    $nascimento = $_POST['nascimento'] ?? null;    

    function sodeixa_numeros($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }
    ?>

    <h1>Cadastrar Cliente</h1>

    <a href="">Voltar para a lista de Clientes</a> <!-- href="clientes.php"-->
    <br><br><br>

    <form action="" method="POST">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="nome" value="<?=$nome?>" > *
        <br><br>

        <label for="mail">E-mail:</label>
        <input type="email" id="mail" name="email" value="<?=$email?>" > *
        <br><br>

        <label for="tel">Telefone:</label>
        <input type="tel" placeholder="(11)98888-8888" id="tel" name="telefone" value="<?=$telefone?>">
        <br><br>

        <label for="nasc">Data de Nascimento:</label>
        <input type="date" placeholder="dd/mm/aaaa" id="nasc" name="nascimento" value="<?=$nascimento?>" > *
        <br><br>


        <button type="submit">Salvar Cliente</button>
    </form>

    <?php 
    $erro = false;
    if(count($_POST) > 0) { // entra nesse if apos o envio post (clique no btn enviar)

        // Validação de inputs
        if(!empty($nascimento)) {
            if(strcspn($nascimento, "-") != 4) {
                $pedacos = explode('/', $nascimento); // 13/01/1995 = 13, 01, 1995 (vira array)
                
                if(count($pedacos) == 3) {
                    $nascimento = implode('-', array_reverse($pedacos)); // 1995-01-13
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
        }


        if($erro) {
            echo "<p style='color: red'><b>ERRO: $erro</b></p>";
        } else {
            // Envio para o Banco de Dados:
        }
    }
    ?>

    <!-- ?php  -->
    <!-- if(isset($_POST['enviado'])) { //só resulta depois que tiver enviado o form

        if($nome && $email) {
            if((strlen($nome) < 3 || strlen($nome) > 60) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

                echo "<p style=\"color: red\">Campo de Nome e/ou Email inválido(s)!</p>";

            } else {

                if($site && !filter_var($site, FILTER_VALIDATE_URL)) {
                    $site = '<span style="color: red">URL inválida!</span>';
                } else if($site == null){
                    $site = 'Vazio';
                }

                if($comentario == null) {
                    $comentario = 'Vazio';
                }

                if($genero == 'Não selecionado' || $genero == 'masculino' || $genero == 'feminino' || $genero == 'outros') {
                    echo "
                    <p><b>Nome: </b>$nome</p>
                    <p><b>E-mail: </b>$email</p>
                    <p><b>Website: </b>$site</p>
                    <p><b>Comentário: </b>$comentario</p>
                    <p><b>Genero: </b>$genero</p>
                    ";
                } else {
                    echo '<p style="color: red">Preencha corretemente o Gênero!</p>';
                }
                                
            }
        } else {
            echo "<p style=\"color: red\">Preencha os campos obrigatórios!</p>";
        }

    }     -->
    

</body>
</html>