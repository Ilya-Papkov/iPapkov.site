<?php
session_start();
echo "<meta charset='utf-8'>";
echo "<title>iPapkov | PHP Задание 2</title>";
//Получаем данные из глобальной переменной $_POST, так как мы передаем данные методом POST
$_SESSION['capital'] = $_POST['capital']; // Вытаскиваем ответ на первый вопрос в переменную
$_SESSION['matematic'] = $_POST['matematic']; // Вытаскиваем ответ на второй вопрос в переменную
$_SESSION['happy'] = $_POST['happy']; // Вытаскиваем ответ на третий вопрос в переменную

/* Вопрос четвёртый с несколькими вариантами ответов */

$_SESSION['hgender1'] = $_POST['gender1'];
$_SESSION['hgender2'] = $_POST['gender2'];
$_SESSION['hgender3'] = $_POST['gender3'];
$_SESSION['hgender4'] = $_POST['gender4'];
$_SESSION['hgender5'] = $_POST['gender5'];
$result = 0; // результат будет в процентах правильных ответов

/* проверяем первый вопрос */
IF ($_SESSION['capital'] == "Москва") {
$result += 25;
}

/* проверяем второй вопрос */
IF ($_SESSION['happy'] == "Да") {
$result += 25;
}

/* проверяем третий вопрос */
IF ($_SESSION['matematic'] == "15") {
$result += 25;
}

/* Проверяем четвёртый вопрос */
$subresult = 0; // дополнительная переменная для подсчёта правильности ответов на 4 вопрос
 
/* если мужское имя выбрано правильно то увеличиваем счётчик */
IF ($_SESSION['hgender1'] != '') {
$subresult++;
}

IF ($_SESSION['hgender3'] != '') {
$subresult++;
}
/* если выбрано женсмкое имя уменьшаем счётчик */
IF ($_SESSION['hgender2'] != '') {
$subresult--;
}

IF ($_SESSION['hgender4'] != '') {
$subresult--;
}

IF ($_SESSION['hgender5'] != '') {
$subresult--;
}
 
IF ($subresult == 2) {
$result += 25;
}

echo "<center>Вы прошли тест на <strong>$result%</strong></center>";
session_destroy();
?>

