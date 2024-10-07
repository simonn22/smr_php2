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
<style>
	b{
		color:darkgreen;
	}
	h1{
		
	}
	body{
	font-family: "Verdana";
	color: aliceblue;
	text-align: center;
	background-color: black;
	}
	.formulario input,button{
		margin: 5px;
		border-style: solid;
		border-radius: 30px;
		border-color: black;
		padding: 10px;
		text-align: center;
		font-size: 16px;
		background-color: lightblue;
	}
	.error{
	color:white;
	background-color: darkred;
	}


</style>
</head>
<body>

<h1>Login</h1>
	
<?php

if(!isset($_SESSION['id_user'])){

	if (isset($_POST['passwd'])){
		$conn = new mysqli('localhost','root','','smr');
		if(0) echo "
			SELECT id_usuario,passwd FROM usuarios
			  WHERE usuario='".$_POST['user']."';
		";
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
	

		/*
		if( $_POST['passwd']=='enchegado' and $_POST['user']=='smr'){
		$_SESSION['id_user']=1;
	}
	
	else
		echo '<div class="error">Usuario o contraseña incorrectos</div>';
	*/
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
