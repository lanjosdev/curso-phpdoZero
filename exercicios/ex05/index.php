<?php
echo "Função time(): ". time() ."</br>"; // comando time() retorna o timestamp ATUAL em segundos
// Retorna o horário atual medido como o número de segundos desde a Época Unix (1 de janeiro de 1970 00:00:00 GMT). Timestamps Unix não contêm nenhuma informação sobre fuso horário local. Recomenda-se usar a classe DateTimeImmutable para lidar com informações de data e horário para evitar as armadilhas que vêm com o uso exclusivo de timestamps Unix. OBS: Esta função não possui parâmetros e é no padrão AAAA-MM-DD.

// Exemplo 1: Verificar quantos dias de diferença tem em relação a data 21/02/2020 e a data atual do sitema(time()):
$dif_segundos = (time() - strtotime("2020-02-21")); // strtotime transforma uma data(usando como parametro) em segundos para fazer calculos com Timestamps (e aceita só no padrao americano)
$dif_dias = $dif_segundos / 86400; // 86400 é 1dia sem segundos
echo $dif_dias; //mostra a diferença de dias
echo "<br>";

// Exemplo 2: Verificar qual dia da semana foi em uma data especifica (usando a função date):
echo date("D", strtotime('1995-01-13')); // o D é p parametro que significa o dia da semana
echo "<br>";

// Exemplo 3: Mudar o formato de exibição de data (usando a função date):
echo date('d/m/Y', strtotime('1995-01-13'));
echo "<br>";

// Veja mais exemplos na tarefa t04...