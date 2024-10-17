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
<link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">


<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>

<div class = "container">
	<div class = "box">

	
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
			if(isset($_POST['passwd']) and md5($_POST['passwd'])==$r['passwd']){
				$_SESSION['id_user']=$r['id_usuario'];
			}
			else echo '<div class="error">Contraseña incorrecta</div>';
		}
		else echo '<div class="error">Usuario incorrecto</div>';
	
}
}	

if(!isset($_SESSION ['id_user'])){
	
	echo '<h1>INICIO DE SESIÓN</h1>';
	
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
	if(!isset($_SESSION['id_user'])){
		echo '<div class = "div_button"><a href="register.php"><button>Registrarse</button></a></div>';
	}
	
