<?php 
// $nomes = ["João", "Maria", 'Pedro', 'Zé'];

// foreach($nomes as $idx=>$item) {
//     echo "<p>$idx - $item<br>";
// }

$alternativas = [
    'a'=>'João', 
    'b'=>'Maria', 
    'c'=>'Pedro', 
    'd'=>'Zé'
];

echo "<p>Marque a alternativa correta:</p>";
foreach($alternativas as $idx=>$item) {
    echo "<b>$idx)</b> $item.<br>";
}