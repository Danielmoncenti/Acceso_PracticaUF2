<?php

session_start();

require("config.php");
require("template.php");

//$conn = mysqli_connect($db_server, $db_user, $db_pass, $db);

$content = <<<EOD
<form method="post" action="register_req.php">
<h2>¡Regístrate!</h2>
<p><label for="register-user">Usuario:</label> <input type="text" name="user" id="register-user"/></p>
<p><label for="register-pass">Password:</label> <input type="password" name="pass" id="register-pass"/></p>
<p><label for="register-pass">Repassword:</label> <input type="password" name="repass" id="register-repass"/></p>
<p><label for="register-name">Nombre:</label> <input type="text" name="name" id="register-name"/></p>
<p><label for="register-surname">Apellidos:</label> <input type="text" name="surname" id="register-surname"/></p>
<p><label for="register-email">e-mail:</label> <input type="email" name="email" id="register-email"/></p>
<p><label for="register-birthdate">Birthdate:</label> <input type="date" name="birthdate" id="register-birthdate"/></p>
<p><input type="submit" id="register-submit" value="Register" /></p>
</form>
EOD;


showHeader("ENTIenda: HOME");

showContent($content);

showFooter();

?>
