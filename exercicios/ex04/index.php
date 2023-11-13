<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <?php 
    // Capturando os dados do Formulario Retroalimentado
    $nome = $_POST['nome'] ?? null;
    $email = $_POST['email'] ?? null;
    $site = $_POST['website'] ?? null;
    $comentario = $_POST['comentario'] ?? null;    
    $genero = $_POST['genero'] ?? 'Não selecionado';   
    ?>

    <h1>Formulário com PHP</h1>

    <form action="" method="POST">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="nome" value="<?=$nome?>" required> *
        <br><br>

        <label for="mail">E-mail:</label>
        <input type="email" id="mail" name="email" value="<?=$email?>" required> *
        <br><br>

        <label for="web">Website:</label>
        <input type="url" id="web" name="website">
        <br><br>

        <label for="texto">Comentário:</label>
        <textarea name="comentario" id="texto" cols="30" rows="3"></textarea>
        <br><br>

        <p><b>Gênero:</b></p>
        <input type="radio" name="genero" value="masculino" id="masc">
        <label for="masc">Masculino</label>

        <input type="radio" name="genero" value="feminino" id="feme">
        <label for="feme">Feminino</label>

        <input type="radio" name="genero" value="outros" id="other">
        <label for="other">Outros</label>

        <br><br>
        <button type="submit" name="enviado">Enviar</button>
    </form>


    <h1>Dados enviados:</h1>

    <?php 
    if(isset($_POST['enviado'])) { //só resulta depois que tiver enviado o form

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

    }    
    ?>

</body>
</html>