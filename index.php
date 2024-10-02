Hola <b>mundo</b>

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
<?php

if(!isset($_SESSION['id_user'])){

	if (isset($_POST['passwd']) and $_POST['passwd']=='enchegado' and $_POST['user']=='smr'){
		$_SESSION['id_user']=1;
	}
	
	else{
		echo '<form method="post">'
		.'<input placeholder="usuario" name="user" type "user">'
		.'<input placeholder="contraseña" name="passwd" type "password">'
		.'<button>Envía usuario y contraseña</button>'
		.'</form>';
}	

}
if(isset($_SESSION['id_user'])){
	echo '<div><img src = "CHEMA.png">';
	echo '<a href="?logout=1">Cerrar sesión</a>';

}
?>
	