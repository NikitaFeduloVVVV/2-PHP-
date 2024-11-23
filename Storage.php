<?php
$users = [];
//Генерация 100 юзеров с паролями
for ($i = 1; $i <= 100; $i++) {
    $username = 'user' . $i;
    $password = 'password' . $i; 
    $users[$username] = $password;
}
?>
