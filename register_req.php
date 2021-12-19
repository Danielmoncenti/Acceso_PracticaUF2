<?php

if (!isset($_POST["user"]) || !isset($_POST["pass"]) || !isset($_POST["repass"]) || !isset($_POST["name"]) || !isset($_POST["surname"]) || !isset($_POST["email"]) || !isset($_POST["birthdate"])){
	echo "ERROR 1: Faltan datos";

	exit();
}

//user
//pass
//repass
//name
//surname
//email
//birthdate


if (strlen($_POST["user"]) < 2){
	echo "ERROR 2: el usuario es muy corto";

	exit();
}


if (strlen($_POST["pass"]) < 2){
	echo "ERROR 3: el password es muy corto";

	exit();
}

if ($_POST["pass"] != $_POST["repass"]){
	echo "ERROR 4: el repassword es diferente";

	exit();
}

if (strlen($_POST["name"]) < 2){
	echo "ERROR";

	exit();
}

if (strlen($_POST["surname"]) < 2){
	echo "ERROR";

	exit();
}

if (strlen($_POST["email"]) < 6){
	echo "ERROR";

	exit();
}

if (strlen($_POST["birthdate"]) < 6){
	echo "ERROR";

	exit();
}



$user = addslashes($_POST["user"]);
$pass = md5($_POST["pass"]);
$name = addslashes($_POST["name"]);
$surname = addslashes($_POST["surname"]);
$email = addslashes($_POST["email"]);
$birthdate = addslashes($_POST["birthdate"]);


$query = <<<EOD
INSERT INTO users (user, password, email, name, surname, birthdate)
VALUES ("{$user}", "{$pass}","{$email}","{$name}","{$surname}","{$birthdate}");
EOD;

require("config.php");

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db);

$res = $conn->query($query);
if (!$res){
	echo "ERROR al insertar";

	exit();
}


$id_user = mysqli_insert_id($conn);

session_start();

$_SESSION['id_user'] = $id_user;

header("Location: index.php");

exit();

?>
