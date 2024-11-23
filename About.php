<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'storage.php';
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информация о пользователе</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; 
            text-align: center; 
        }
        h1, h2 {
            margin: 20px 0; 
        }
        .server-info {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
            background-color: #fff; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            white-space: pre-wrap; 
            text-align: left; 
            width: 80%; 
            max-width: 600px; 
            margin-left: auto; 
            margin-right: auto; 
        }
        .button {
            display: inline-block; 
            padding: 15px 20px; 
            background-color: #28a745; 
            color: white; 
            text-decoration: none; 
            border: none; 
            border-radius: 0; 
            cursor: pointer; 
            transition: background-color 0.3s; 
            margin: 5px; 
        .button:hover {
            background-color: #218838; 
        }
    </style>
</head>
<body>
    <h1>Добро пожаловать, <?= htmlspecialchars($username) ?>!</h1>
    <h2>Данные из $_SERVER:</h2>
    <div class="server-info">
        <pre><?php print_r($_SERVER); ?></pre>
    </div>
    <a href="account.php" class="button">Список пользователей</a>
    <a href="index.php" class="button">Выйти</a>
</body>
</html>
