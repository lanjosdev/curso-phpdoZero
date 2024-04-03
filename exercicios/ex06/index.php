<?php 
require('connection.php');

if(count($_POST) > 0) {
    $email = $_POST['email'] ?? null;
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); //já deixa criptografado

    $sql_code = "INSERT INTO senhas (email, senha) VALUES ('$email', '$senha')";
    $query_exec = $con_sqli->query($sql_code) or die($con_sqli->error);
    
    if($query_exec) {
        echo 'Cadastrado com sucesso';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
    <h1>Cadastrar</h1>

    <form action="" method="post">
        <input type="text" name="email" placeholder="E-mail">
        <input type="text" name="senha" placeholder="Senha">

        <button>Cadastrar</button>
    </form>
</body>
</html>