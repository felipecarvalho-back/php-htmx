<?php
session_start();

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
}

$action = $_GET['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'inc') {
        $_SESSION['count']++;
    } elseif ($action === 'dec') {
        $_SESSION['count']--;
    } elseif ($action === 'reset') {
        $_SESSION['count'] = 0;
    }
}

echo $_SESSION['count'];
