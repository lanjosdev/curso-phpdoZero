<?php 
require('connection.php');

if(count($_POST) > 0) {
    $arquivo = $_FILES['arquivo'] ?? null;
    
    if($arquivo['error'])
        die('Falha ao enviar arquivo');
    if($arquivo['size'] > 2097152)
        die('Arquivo muito grande! Max:2MB');

    $pasta = 'arquivos/';
    $nomeOriginalFile = $arquivo['name'];
    $nomeUnicoFile = uniqid();
    $extensaoFile = strtolower(pathinfo("$nomeOriginalFile", PATHINFO_EXTENSION));

    $pathFile = "$pasta$nomeUnicoFile.$extensaoFile";

    if($extensaoFile != 'jpg' && $extensaoFile != 'png' && $extensaoFile != 'mp4')
        die('Tipo de arquivo não aceito');


    $statusFileSubmit = move_uploaded_file($arquivo['tmp_name'], $pathFile);
    if($statusFileSubmit) {
        $query_code = "
            INSERT INTO 
            arquivos 
            (nome_original, path)
            VALUES 
            ('$nomeOriginalFile', '$pathFile')
        ";

        $query_exec = $con_sqli->query($query_code) or die($con_sqli->error);

        echo "
        <p>Arquivo enviado com sucesso! Para acessa-lo, <a href=\"$pathFile\" target=\"_blank\">clique aqui</a></p>
        ";
    } 
    else {
        echo "
        <p>Falha ao enviar arquivo!</p>
        ";
    }
}

$query_code = "SELECT * FROM arquivos";
$query_exec = $con_sqli->query($query_code) or die($con_sqli->error);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Files</title>
</head>
<body>
    <h1>Upload de Arquivos</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="" style="display: block;">
            <strong>Selecione o Arquivo:</strong>
            <input type="file" name="arquivo" accept='image/png, image/jpeg, video/mp4'>
        </label>

        <button name="submit">Upload</button>
    </form>


    <h2>Lista de Arquivos:</h2>

    <table border="1" cellpadding='10'>
        <thead>
            <th>Preview</th>
            <th>Arquivo</th>
            <th>Data de Envio</th>
        </thead>
        <tbody>
            <?php 
            while($element = $query_exec->fetch_assoc()) { 
            ?>
                <tr>
                    <td><img width=50 src=<?=$element['path']?>></td>

                    <td><a href=<?=$element['path']?> target="_blank"><?=$element['nome_original']?></a></td>

                    <td><?=date('d/m/Y H:i', strtotime($element['data_upload']))?></td>
                </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
</body>
</html>