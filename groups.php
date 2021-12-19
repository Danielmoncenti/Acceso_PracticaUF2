<?php

require("template.php");
require("config.php");

session_start();

if(!isset($_SESSION["id_user"])){
echo "User not logged";
exit();
}

if(intval($_SESSION["id_user"]) != 1){
echo "User is not admin";
exit();
}


$content="";
$content= <<<EOD
<form method="post" action="groups_req.php" id="group_form">
<h3>Inserte Grupo<h3>
<p><label for="group">Group<label><input type="text" name="group" id="group" /></p>
<p><label for="course">Course</label><input type="text" name="course" id="course" /></p>
<p><label for="jamyear">JamYear </label><input typr="text" name="jamyear" id="jamyear" /></p>
<p><label for="mark">Mark</label><input type="text" name="mark" id="mark" /></p>
<p><input type="submit" value="send"/></p>
EOD;


showHeader("Insert Group");
showContent($content);
showFooter();

?>
