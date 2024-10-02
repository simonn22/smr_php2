Simón

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
		color:red;
	}
	h1{
		
	}
	body{
		font-family: "Verdana";
	text-align: center;
	}
	.formulario input,button{
		margin: 5px;
		border-radius: 30px;
		padding: 10px;
		text-align: center;
		font-size: 16px;
	}

}
</style>
</head>
<body>

<h1>Login</h1>
	
<?php

if(!isset($_SESSION['id_user'])){

	if (isset($_POST['passwd']) and $_POST['passwd']=='enchegado' and $_POST['user']=='smr'){
		$_SESSION['id_user']=1;
	}
	
	
	else{
		echo '<form method="post" class="formulario">'
		.'<input placeholder="Usuario" name="user" type "user">'
		.'<input placeholder="Contraseña" name="passwd" type "password">'
		.'<div><button>Envía usuario y contraseña</button></div>'
		.'</form>';
}	
}

if(isset($_SESSION['id_user'])){
	echo '<div><img src = "CHEMA.png" width=400>';
	echo '<a href="?logout=1">Cerrar sesión</a>';

}
?>
</body>