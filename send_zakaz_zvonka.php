<?php
if(isset($_POST['fio1']));
if(isset($_POST['phone1']));
$name1 = htmlspecialchars(stripslashes($_POST['fio1']));
$phone1 = htmlspecialchars(stripslashes($_POST['phone1'])); 
$submit1 = $_POST['zvonok_submit'];

if(isset($submit1) and ($phone1 != "")){
	

/*формируем переменные, которые содержат данные, полученные с html-формы*/
		// $to = 'denjob@mail.ru';
	 $to = 'xyz@tanais.ru';
	//$to = 'v.abramov@tanais.ru, rasart.pro@gmail.com';
	// $to = 'i.paveliev@tanais.ru';
	// $to = 'rasart.pro@gmail.com';
	$subject = 'LP ECM. Заказ звонка'; 

/* формируем кодировку правильную*/
$boundary = "--".md5(uniqid(time()));
$headers ="MIME-Version:1.0\n";
$headers .="From: web@tanais.ru\n";
$headers .="Content-Type:multipart/mixed; boundary=\"$boundary\"\n";
$multipart ="--$boundary\n";
$kod ='UTF-8';
$multipart .="Content-Type: text/html; charset=$kod\n";
$multipart .="Content-Transfer-Encoding: Quot-Printed\n\n";

	// формируем расширенные заголовки
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		$body = '<html>
		<head></head>
		<body><p>Адрес страницы: '.$_SERVER['SERVER_NAME'].'/ecm/'.'</p><p>Имя: '.$_POST['fio1'].'</p><p>Телефон: '.$_POST['phone1'].'</p></body>';

$multipart .="$body\n\n";
	
   if (!mail($to,$subject,$body,$headers))
     echo "Ошибка при отправке сообщения.";

	 print"
<script language='Javascript' type='text/javascript'>
<!--
function reload()
{location = \"index.php?action=send_callback\"}; 
setTimeout('reload()', 0);
-->
</script>";
}
?> 
