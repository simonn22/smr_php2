<?php
session_start();
if(isset($_GET['logout'])){
	session_destroy();
	session_start();
}
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<head>
/*stylesheet*/<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">

/* FUENTES DE GOOGLE*/<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

<h1>Login</h1>
	
<?php

if(!isset($_SESSION['id_user'])){

	if (isset($_POST['passwd'])){
		$conn = new mysqli('localhost','root','','smr');

		$r=$conn->query("
			SELECT id_usuario,passwd FROM usuarios
			  WHERE usuario='".$_POST['user']."'
			  AND length(usuario);
		")->fetch_assoc();
		//echo '----->'.$r['id_usuario'].'<-----';
		if(isset($r['id_usuario'])){
			if(isset($_POST['passwd']) and $_POST['passwd']==$r['passwd']){
				$_SESSION['id_user']=$r['id_usuario'];
			}
			else echo '<div class="error">Contraseña incorrecta</div>';
		}
		else echo '<div class="error">Usuario incorrecto</div>';
	


}
}	

if(!isset($_SESSION ['id_user'])){
	echo '<form method="post" class="formulario">'
	.'<input placeholder="Usuario" name="user" type "user">'
	.'<input placeholder="Contraseña" name="passwd" type ="password">'
	.'<div><button>Envía usuario y contraseña</button></div>'
	.'</form>';



}

if(isset($_SESSION['id_user'])){
	echo '<div><img src = "CHEMA.png" width=400>';
	echo '<div><a href="?logout=1">Cerrar sesión</a></div>';

}
