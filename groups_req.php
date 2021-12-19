<?php

session_start();

require("config.php");

if (!isset($_SESSION["id_user"])){
	echo "Incicia sessión";
	exit();
}


if ($_SESSION["id_user"] != 1){
	echo "Usuario incorrecto";
	exit();
}
if (!isset($_POST["group"]) || !isset($_POST["course"]) || !isset($_POST["jamyear"]) || !isset($_POST["mark"])){
	echo "ERROR 1: Formulario inclompleto";
	exit();
}

$group = $_POST["group"];
$course = $_POST["course"];
$jamyear = $_POST["jamyear"];
$mark = $_POST["mark"];

$query = <<<EOD
INSERT INTO groups (`group`, course, jam_year, mark) VALUES ('{$group}', {$course},'{$jamyear}','{$mark}');
EOD;

echo $query;
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db);


$res = $conn->query($query);

if (!$res){
	echo "Error al insertar";
	exit();
}

Header("Location: index.php");
?>
