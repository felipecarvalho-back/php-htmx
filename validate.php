<?php
$username = trim($_POST['username'] ?? '');
$taken = ['admin', 'root', 'felipe', 'teste'];

if ($username === '') {
    echo '';
    exit;
}

if (strlen($username) < 3) {
    echo '<span style="color: orange;">Mínimo de 3 caracteres.</span>';
} elseif (in_array(strtolower($username), $taken, true)) {
    $safe = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    echo "<span style=\"color: red;\">Usuário <strong>{$safe}</strong> já está em uso.</span>";
} else {
    $safe = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    echo "<span style=\"color: green;\">Usuário <strong>{$safe}</strong> disponível!</span>";
}
