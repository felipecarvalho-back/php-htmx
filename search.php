<?php
$q = htmlspecialchars($_GET['q'] ?? '', ENT_QUOTES, 'UTF-8');

if ($q === '') {
    echo '';
    exit;
}

echo "<p>Você buscou por: <strong>{$q}</strong></p>";