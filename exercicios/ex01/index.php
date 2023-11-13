<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 01</title>
</head>
<body>
    <p>O seu IMC está na faixa:
        <b>
            <?php
            $altura = 1.74;
            $peso = 80;
            $imc = $peso / ($altura * $altura);
            // echo $imc;

            $faixa = "";

            if($imc < 18.5) {
                $faixa = "Magreza";
            } else if($imc >= 18.5 && $imc < 25) {
                $faixa = "Normal";
            } else if($imc >= 25 && $imc < 30) {
                $faixa = "Sobrepeso";
            } else {
                $faixa = "Obesidade";
            }

            echo $faixa;
            ?>
        </b>
    </p>
</body>
</html>