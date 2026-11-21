<?php
$quotes = [
    'Simplicidade é a sofisticação máxima. — Leonardo da Vinci',
    'Menos JavaScript, mais HTML.',
    'O servidor continua sendo o melhor lugar para renderizar HTML.',
    'Feito é melhor que perfeito.',
];

$quote = $quotes[array_rand($quotes)];
$time = date('H:i:s');

echo "<p><strong>[{$time}]</strong> {$quote}</p>";
