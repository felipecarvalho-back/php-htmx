<?php
session_start();

if (!isset($_SESSION['todos'])) {
    $_SESSION['todos'] = [];
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $task = trim($_POST['task'] ?? '');
    if ($task !== '') {
        $id = uniqid();
        $_SESSION['todos'][$id] = $task;
        $safeTask = htmlspecialchars($task, ENT_QUOTES, 'UTF-8');
        echo <<<HTML
        <li>
            {$safeTask}
            <button hx-delete="/todos.php?id={$id}" hx-target="closest li" hx-swap="outerHTML">Remover</button>
        </li>
        HTML;
    }
    exit;
}

if ($method === 'DELETE') {
    $id = $_GET['id'] ?? '';
    unset($_SESSION['todos'][$id]);
    echo '';
    exit;
}

// GET: lista inicial de tarefas
foreach ($_SESSION['todos'] as $id => $task) {
    $safeTask = htmlspecialchars($task, ENT_QUOTES, 'UTF-8');
    $safeId = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
    echo <<<HTML
    <li>
        {$safeTask}
        <button hx-delete="/todos.php?id={$safeId}" hx-target="closest li" hx-swap="outerHTML">Remover</button>
    </li>
    HTML;
}
