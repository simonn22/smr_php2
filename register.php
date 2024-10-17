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

	<script>
function redirectToIndex() {
    setTimeout(function() {
        window.location.href = 'index.php';
    }, 3000); // Redirige después de unos segundos
}
</script>
</head>
<body>

<div class = "container">
	<div class = "box">
<?php

if(!isset($_SESSION['id_user'])){

	if (isset($_POST['passwd'])){
		$conn = new mysqli('localhost','root','','smr');
		$r=$conn->query("
			INSERT INTO usuarios (usuario, passwd) VALUES
            ('".$_POST['user']."', '".$_POST['passwd']."');
		");
		if ($r) {
            echo '<p class = registro_completo>Registro completo, se redirigirá al inicio de sesión.</p>';
            echo '<script>redirectToIndex();</script>'; // Redirige después de mostrar el mensaje
        } 
		else {
            echo '<p>Hubo un error en el registro. Inténtalo de nuevo.</p>';
        }
}
}	

if(!isset($_SESSION ['id_user']) and !isset($r)){
	echo '<h1>REGISTRARSE</h1>';
	echo '<form method="post" class="formulario">'
	.'<input placeholder="Usuario" name="user" type "user">'
	.'<div><input placeholder="Contraseña" name="passwd" type ="password">'
	.'<div class = "div_button">
		<button>Registrarse</button>
		
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
	echo '<div><a href="index.php"><button>Prefiero iniciar sesión</button></a></div>';
	
