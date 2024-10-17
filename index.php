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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet"><style>
	b{
		color:darkgreen;
	}
	h1{
		font-size: 55px;
		color: black;	
		text-shadow: 0 0 5px grey;
	}
	body{
	font-family: "Afacad Flux";
	color: aliceblue;
	text-align: center;
	background-color: black;
	}
	.container{
		display:flex;
		font-family: "Afacad Flux";
		flex-direction: column;
		justify-content: center;
		align-items: center;
		width: 100%;
		height: 100vh;
	}
	.box {
		padding: 50px;
		padding-top: 20px;
		background-color: white; 
		border-radius: 50px;
		border: 0px solid #555; 
		box-shadow: 0px 0px 50px rgb(240, 240, 240); 
		box-sizing: border-box;
	}
	.formulario input,button{
		font-family: "Afacad Flux";
		margin: 10px;
		border-style: solid;
		border-radius: 60px;
		border-color: black;
		width: auto;
		padding: 15px 30px;
		text-align: center;
		font-size: 30px;
		background-color: black;
		color: white;
	}
	.div_button{
		width: auto;
		align-items: center;
	}
	.error{
	color:white;
	background-color: darkred;
	padding: 10px;
	border-radius: 25px;
	margin: 10px;
	font-size: 20px;
	}
	.image{
		border-radius: 20px;
		box-shadow: 0px 0 30px grey;
	}


</style>
</head>
<body>

<div class = "container">
	<div class = "box">
<h1>INICIO DE SESIÓN</h1>
	
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
	.'<div><input placeholder="Contraseña" name="passwd" type ="password">'
	.'<div class = "div_button">
		<button>Iniciar sesión</button>
		
	</div>'
	.'</form>'
	
	;
}

if(isset($_SESSION['id_user'])){
	echo '<div><img class = "image" src = "CHEMA.png" width=400>';
	echo '<div><a class = "logout" href="?logout=1"><button>Cerrar sesión</button></a></div>';

}?>
</div>
	</div>
	<div class = "container">
	<?php
	echo '<div><a href="register.php"><button>Registrarse</button></a></div>';
	
