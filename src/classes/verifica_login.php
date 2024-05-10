<?php

session_start();

if (!isset($_SESSION['id'])) {
    // Redireciona para a página de login
    header("Location: login.php");
    exit;
}
