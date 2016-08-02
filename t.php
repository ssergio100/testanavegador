<?php
session_start();
$ie11 = strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0');
$ie = !!preg_match('/MSIE/', $_SERVER['HTTP_USER_AGENT']);

$arrUri =  explode('/',$_SERVER['SCRIPT_NAME']);
$pag = end($arrUri);
$pag = 't_.php';
if(isset($_GET['login'])&&$_GET['login']){
 if(!isset($_COOKIE["logado"]))setcookie('logado',TRUE,0);
}else{
	 setcookie('logado',FALSE);
}
if(isset($_COOKIE["logado"]))echo "Você está logado";
else echo "Você NãO esta logado!";

?>

<!DOCTYPE html>
<html>
<head>
<script src="sweetalert/dist/sweetalert.min.js"></script>
 <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
</head>

<?php 

if(isset($_COOKIE["logado"])&& !$ie && !$ie11){
	if($pag == 't.php' ) {
		alert('Você está logado e verá esta mensagem todas as vezes nesta página t.php porquê não esta utilizando o Internet Explorer!');
	}else{
		if(!isset($_COOKIE['alert'])){
			alert('Você está logado e verá esta mensagem apenas uma vez porquê não esta utilizando o Internet Explorer!');
			setcookie('alert',TRUE,0);
		}
	}
 }else{
 	if(isset($_COOKIE['alert']))setcookie('alert',FALSE);
 }

function alert($frase = 'Nenhuma mensagem foi definida para este campo :('){
	echo '<script type="text/javascript">swal({   title: "Atenção!",   text: "'.$frase.'",   type: "info",   confirmButtonText: "Entendi" });</script>';
}
?>

<body>

</body>
</html>

