<?php
$users = require 'users.php';
// Проверка пароля
preg_match('~^\w+(@)\w+\.[a-z]{2,3}$~', $_POST['email'], $matches);
$checkPass = boolval(in_array('@', $matches));

// Проверка на заполнение
$isSet = boolval($_POST['firstname'] && $_POST['secondname'] && $_POST['email'] && $_POST['password'] && $_POST['password2']);

// проверка совпадения пароля
$confirmPassword = boolval($_POST['password'] == $_POST['password2']);

foreach ($users as $user) {
    if ($_POST['email'] == $user['email']) {
        $log = "Пользователь найден в базе данных УЗ, " . date('d-m-Y H:i:s') . PHP_EOL . print_r($user,true);
        file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
    }
}
if ($isSet && $checkPass && $confirmPassword) {
    echo json_encode(['success' => 1]);
} elseif (!$isSet) {
    echo json_encode(['success' => 2]);
} elseif (!$confirmPassword) {
    echo json_encode(['success' => 3]);
} elseif ($checkPass === false) {
    echo json_encode(['success' => 4]);
}
