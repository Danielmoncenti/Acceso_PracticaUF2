<?php

session_start();

if (!isset($_SESSION["id_user"])){
	echo "Incicia sessión";
	exit();
}


if ($_SESSION["id_user"] != 1){
	echo "Usuario incorrecto";
	exit();
}



if (!isset($_POST["product"]) || !isset($_POST["description"]) || !isset($_POST["price"]) || !isset($_POST["reference"]) || !isset($_POST["website"]) || !isset($_POST["id_group"]) || !isset($_POST["id_engine_version"])){
	echo "ERROR 1: Formulario inclompleto";
	exit();
}



$product = $_POST["product"];


$description = $_POST["description"];
$price = $_POST["price"];
$reference = $_POST["reference"];
$website = $_POST["website"];
$id_group = intval($_POST["id_group"]);
$id_engine_version = intval($_POST["id_engine_version"]);



$query = <<<EOD
INSERT INTO products (product, description, price, reference, website, id_group, id_engine_version)
VALUES ("{$product}", "{$description}", "{$price}", "{$reference}", "{$website}", {$id_group}, {$id_engine_version});
EOD;

echo $query;
require("config.php");

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db);


$res = $conn->query($query);

if (!$res){
	echo "Error al insertar";
	exit();
}


$id_product = mysqli_insert_id($conn);

header("Location: shop.php?id_product=".$id_product);

exit();

?>                                                                       
