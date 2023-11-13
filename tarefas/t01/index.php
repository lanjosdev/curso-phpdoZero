<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa 01</title>
</head>
<!-- Você precisará de uma única variável para armazenar a temperatura em Celsius e depois
exibir o texto (com essa mesma formatação de exemplo):
A temperatura em Fahrenheit é: 32 °F
OBS:
Para converter graus Celsius em graus Fahrenheit, multiplique o valor em Celsius por 1,8
e some 32 ao resultado. -->
<body>
    <?php 
    $celsius = 24;
    $fahrenheit = $celsius * 1.8 + 32;
    ?>

    <h1>Tarefa 01</h1>

    <p>A temperatura em Fahrenheit é: <?=$fahrenheit?></p>
</body>
</html>