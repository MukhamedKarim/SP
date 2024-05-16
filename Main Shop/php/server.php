<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "Shop";

// Создание соединения с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
