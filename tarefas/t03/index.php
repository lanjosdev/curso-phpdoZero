<?php
function potencia($num, $elevado) {
    $resul = $num;
    for($idx = 1; $idx < $elevado; $idx++) {
        $resul *= $num;
    }

    return (int)$resul;
}

echo potencia(2, 5);

