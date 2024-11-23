<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'storage.php';

$error = '';
$username = '';
$password = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = 'Пожалуйста, заполните все поля.';
    } else {
        if (isset($users[$username]) && $users[$username] === $password) {
            $_SESSION['username'] = $username;
            header('Location: about.php');
            exit;
        } else {
            $error = 'Неверное имя пользователя или пароль.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; 
        }
        .form-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background-color: #fff; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px; 
            text-align: center; 
        }
        .form-container h1 {
            margin: 0 0 15px; 
        }
        .form-container input {
            width: 90%; 
            padding: 10px; 
            margin: 5px 0; 
            border: 1px solid #ccc; 
            border-radius: 3px; 
        }
        .form-container button {
            padding: 10px; 
            background-color: #28a745; 
            color: white; 
            border: none; 
            border-radius: 3px; 
            cursor: pointer; 
        }
        .form-container button:hover {
            background-color: #218838; 
        }
</style>
</head>
<body>
    <div class="form-container">
        <h1>Форма авторизации</h1>
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="post">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>" required>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Войти</button>
        </form>
</div>
</body>
</html>
