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



if (!isset($_POST["id_product"]) || !isset($_POST["product"]) || !isset($_POST["description"]) || !isset($_POST["price"]) || !isset($_POST["reference"]) || !isset($_POST["website"]) || !isset($_POST["id_group"]) || !isset($_POST["id_engine_version"])){
	echo "ERROR 1: Formulario inclompleto";
	exit();
}


$id_product = intval($_POST["id_product"]);
$product = $_POST["product"];
$description = $_POST["description"];
$price = $_POST["price"];
$reference = $_POST["reference"];
$website = $_POST["website"];
$id_group = intval($_POST["id_group"]);
$id_engine_version = intval($_POST["id_engine_version"]);



$query = <<<EOD
UPDATE products
SET product="{$product}", description="{$description}", price="{$price}", reference="{$reference}", website="{$website}", id_group={$id_group}, id_engine_version={$id_engine_version}
WHERE id_product={$id_product};
EOD;


require("config.php");

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db);


$res = $conn->query($query);

if (!$res){
	echo "Error al actualizar";
	exit();
}


header("Location: shop.php?id_product=".$id_product);

exit();

?>
