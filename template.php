<?php

function showHeader ($title)
{

	$logout_link = "";
	$register_link = "";
	$admin_link = "";
	$group_link = "";
	if (isset($_SESSION["id_user"])){
		$logout_link = '<li><a href="logout.php">Logout</a></li>';

		if ($_SESSION["id_user"] == 1)
			$admin_link = '<li><a href="admin.php">Admin</a></li>';
			$group_link = '<li><a href="groups.php">Insert Group</a></li>';
	}
	else
		$register_link = '<li><a href="register.php">Registro</a></li>';

echo <<<EOD
<html>
<head>
<title>{$title}</title>
<link rel="stylesheet" href="estilo.css" />
</head>
<body>
<header>
<h1>{$title}</h1>
</header>
<nav>
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="shop.php">Tienda</a></li>
{$admin_link}
{$register_link}
{$logout_link}
{$group_link}
</ul>
</nav>
EOD;

}


function showContent ($content)
{
echo <<<EOD
<main>
{$content}
</main>
EOD;
}


function showFooter ()
{

echo <<<EOD
<footer>
<p>Todos los derechos reservados (c) 2021</p>
</footer>
</body>
</html>
EOD;
}
?>
