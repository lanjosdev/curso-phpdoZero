<?php
// Mostrar a data atual em timestamp:
$resul = time();
echo "<p>A data atual em timestamp é: $resul</p>";


// Transformar timestamp em data atual:
$resul = date('d/m/Y', time());
echo "<p>A data atual em (dd/mm/YYYY) é: $resul</p>";


// Transformar data atual em timestamp:
$resul = strtotime('2023-11-28');
echo "<p>A data 2023-11-28 em timestamp é: $resul</p>";


// Somar 10 dias em uma data:
$data = '2023-11-28';
$novaData = strtotime($data) + (10*86400); //em timestamp

$resul = date('d/m/Y', $novaData); //Deixa formatado em dd/mm/yyyy
echo "<p>10 dias a mais na data $data é: $resul</p>";


// Subtrair 10 dias em uma data:
$data = '2023-11-28';
$novaData = strtotime($data) - (10*86400); //em timestamp

$resul = date('d/m/Y', $novaData); //Deixa formatado em dd/mm/yyyy
echo "<p>10 dias antes da data $data é: $resul</p>";


// Convertendo o timestamp pro banco de dados (padrao americano):
$data = time(); //timestamp
$resul = date('Y-m-d H:i:s', $data); //Deixa formatado em dd/mm/yyyy
echo "<p>Timestamp pro banco de dados é: $resul</p>";

// Descobrir dia da semana de uma data:
$data = '13-01-1995'; 
$resul = date('D', strtotime($data)); //função date só funciona com timestamp
echo "<p>O dia da semana de $data é: $resul</p>";