<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios</title>
</head>
<body>
    <form action="" method="POST">
        <label for="name">Nome:</label>
        <input type="text" name="nome" id="name"> <br><br>

        <label for="old">Idade:</label>
        <input type="number" name="idade" id="old"> <br><br>

        <label for="mail">E-mail:</label>
        <input type="email" name="email" id="mail"> <br><br>

        <button type="submit">Enviar</button>
    </form>

    <pre>
        <?php
        var_dump($_POST);

        $idade = (int)$_POST['idade'];
        var_dump($idade);
        ?>
    </pre>
</body>
</html>