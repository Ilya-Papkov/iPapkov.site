<?php
@session_start();
// Массив доступных для выбора языков
$LangArray = array("ru", "en", "ro");
// Язык по умолчанию
$DefaultLang = "ru";
// Если язык уже выбран и сохранен в сессии отправляем его скрипту
if(@$_SESSION['NowLang']) {
	// Проверяем если выбранный язык доступен для выбора
	if(!in_array($_SESSION['NowLang'], $LangArray)) {
		// Неправильный выбор, возвращаем язык по умолчанию
		$_SESSION['NowLang'] = $DefaultLang;
	}
}
 else {
 	$_SESSION['NowLang'] = $DefaultLang;
 }
// Выбранный язык отправлен скрипту через GET
$language = addslashes($_GET['lang']);
if($language) {
	// Проверяем если выбранный язык доступен для выбора
	if(!in_array($language, $LangArray)) {
		// Неправильный выбор, возвращаем язык по умолчанию
		$_SESSION['NowLang'] = $DefaultLang;
	}elseif(isset($_COOKIE['lang'])){
            //подключаем выбранную языковую библиотеку
            include 'lang/'.$_COOKIE['lang'].'/index.php';
    }
    //если нет то выбираем язык браузера

	 else {
	 	// Сохраняем язык в сессии
	 	$_SESSION['NowLang'] = $language;
	 }
}
// Открываем текущий язык
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang.".$CurentLang.".php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>iPapkov | PHP Задание 1 | <?php echo $Lang['title']; ?></title>
<style type="text/css">
body {margin:0; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#000000; background-color:#F8F8FF;}
h1, h2, h3 {margin:0;}
a {color:#FFFFFF; text-decoration:none;}
img {border:0;}
.header {height:100px; text-align:center; padding:25px; background:#F8F8FF;}
.menu {background:#A9A9A9; height:30px; text-align:center;}
.content {padding-left:100px; padding:50px; width:100%;}
footer { background:#A9A9A9; padding-top:30px; padding-bottom:30px; text-align:center; position:absolute; width:100%; bottom: 0;}
</style>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header">
		<h1><?php echo $Lang['header_title']; ?></h1>
		<h3><?php echo $Lang['site_slogan']; ?></h3>
	</td>
  </tr>
  <tr>
    <td class="menu"><a href="index.php"><?php echo $Lang['index_menu']; ?></a> | <a href="index.php"><?php echo $Lang['contact_menu']; ?></a> | 
	<a href="index.php"><?php echo $Lang['site_map']; ?></a> | <a href="index.php"><?php echo $Lang['advertisement']; ?></a>
	<a href="index.php?lang=ru"><img src="images/russia.png" style="height:18px; margin-bottom:-4px;"></a> 
	<a href="index.php?lang=en"><img src="images/english.png" style="height:18px; margin-bottom:-4px;"></a> 
	<a href="index.php?lang=ro"><img src="images/romania.png" style="height:18px; margin-bottom:-4px;"></a>
	</td>
  </tr>
  <tr>
    <td class="content"><?php echo $Lang['site-content']; ?></td>
  </tr>
</table>
   <footer>
      <span stylr="display: block;"><?php echo $Lang['footer-content']; ?></span>
   </footer>
</body>
</html>