<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_information_user";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
