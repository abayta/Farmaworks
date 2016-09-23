<?php
///////Configuración/////
$mail_destinatario = 'juanan.betis@gmail.com';
///////Fin configuración// 

if (isset ($_POST['enviar'])) {
$headers .= "From: ".$_POST['email']. "";
if ( mail ($mail_destinatario, $_POST['asunto'], "".$_POST['nombre']."".stripcslashes ($_POST['mensaje']), $headers )) echo '

Su mensaje a sido enviado correctamente. Gracias por contactar con FarmaWorks.

'; 

else echo '

Error al enviar el formulario. Por favor, inténtelo de nuevo mas tarde.

'; } 

echo '
<form action="?" method="post" class="formularioClass">
 
<p><label for="nombre">Nombre y apellidos : </label></p>  
<input type="text" name="nombre" size="50" maxlength="80"><br> 
<p><label for="email">Email : </label></p>
<input type="text" name="email" size="50" maxlength="60"><br> 
<p><label for="asunto">Asunto : </label></p>
<input type="text" name="asunto" size="50" maxlength="60"><br> 
<p><label for="mensaje">Mensaje : </label></p>  
<textarea name="mensaje" cols="31" rows="5"></textarea> <br>

<label for="enviar">
<input type="submit" name="enviar" value="Enviar consulta"></label>
 </form>

&nbsp;

';
?>
