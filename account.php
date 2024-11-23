<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'storage.php';
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
//Список всех пользователей
$userList = array_keys($users);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список пользователей</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; 
            text-align: center; 
        }
        h1 {
            margin-bottom: 20px; 
        }
        ul {
            list-style-type: none; 
            padding: 0; 
        }
        li {
            margin: 10px 0; 
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
        }
        .button:hover {
            background-color: #218838; 
        }
    </style>
</head>
<body>
    <h1>Список пользователей</h1>
    <ul>
        <?php foreach ($userList as $user): ?>
            <li><?= htmlspecialchars($user) ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="about.php" class="button">Вернуться к информации о пользователе</a>
</body>
</html>
