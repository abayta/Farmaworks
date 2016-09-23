<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Contacto | FarmaWorks</title>
   		<link rel="stylesheet" href="css/stilos.css"/>
   		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700' rel='stylesheet' type='text/css'>
   		<link rel="shortcut icon" href="ico/favicon.ico" />
   		<script src="css/ocultos.js" type="text/javascript"></script>
   		
   		<!-- FACEBOOK SOCIAL PLUGIN -->
   		<div id="fb-root"></div>
		<script>(function(d, s, id) {
  		var js, fjs = d.getElementsByTagName(s)[0];
 		 if (d.getElementById(id)) return;
 		 js = d.createElement(s); js.id = id;
 		 js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
 		 fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
		<!-- CIERRA FACEBOOK SOCIAL PLUGIN -->

   		
	</head>
<body>
<?php
	include('header.php')
?>
<div id="body_comun">
<div id="body_contacto">
	<div id="shadow-top"><img src="ico/shadow-top.png"/></div>

<!-- CONTACTO -->
<div id="contacto" >
	<div id="titulo_contacto">
		<p><img id="icono_contacto" src="ico/contact.png"/>Contacto</p>
	</div>
	<ul class="lista_contactos">
	<li><a href="#" onclick="cambiar('gmail'); return false;">farmaworks@gmail.com (Contacta ahora)</a></li>  
		<div id="gmail" style="display: none;">
		<?php
	include('css/gmail.php')
		?>
		</div>
	<li><a href="#" onclick="cambiar('twitter'); return false;">@farmaworks</a></li>
		<div id="twitter" style="display: none;">
		<div id="twitter_social"><a class="twitter-timeline" href="https://twitter.com/FarmaWorks" data-widget-id="311191139535437824">Tweets por @FarmaWorks</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

		</div>
		</div>
	<li><a href="#" onclick="cambiar('facebook'); return false;">facebook/FarmaWorks</a></li>  
		<div id="facebook" style="display: none;">
		<div id="facebook_social" class="fb-like" data-href="https://www.facebook.com/pages/FarmaWorks/117254448432784?fref=ts" data-send="true" data-width="300" data-show-faces="true"></div>
		</div>
	</ul>
</div>



<div id="separadorContacto"></div>


<!-- COMPONENETES -->
<div id="componentes">
	<div id="titulo_contacto">
		
		<p><img id="icono_contacto" src="ico/users.png"/>Componentes</p>
	</div>
		<ul class="lista_contactos">
			<li><a href="#" onclick="cambiar('abayta'); return false;">Antonio José Gerena Román</a></li>  
				<div id="abayta" style="display: none;">
					<a>Ingeniero informático del software.</a>
					<div class="imagen_contacto"><img src="ico/abayta.png"/></div>
					<a href="https://twitter.com/abayta10" class="twitter-follow-button" data-show-count="false" data-lang="es">Seguir</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</div>
				
			<li><a href="#" onclick="cambiar('juanan'); return false;">Juan Antonio Sánchez Ramírez</a></li>  
				<div id="juanan" style="display: none;">
					<a>Ingeniero informático del software.</a>
					<div class="imagen_contacto"><img src="ico/juanan.png"/></div>
					<a href="https://twitter.com/juananbetis" class="twitter-follow-button" data-show-count="false" data-lang="es">Seguir</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</div>
				
			<li><a href="#" onclick="cambiar('juanlu'); return false;">Juan Luis Casal López</a></li>  
				<div id="juanlu" style="display: none;">
					Ingeniero informático del software y licenciado en Ciencias Físicas.
					<div class="imagen_contacto"><img src="ico/juanlu.png"/></div>
				</div>
				
			<li><a href="#" onclick="cambiar('gabri'); return false;">Gabriel Vázquez Torres</a></li>  
				<div id="gabri" style="display: none;">
					<a>Ingeniero informático del software.</a>
					<div class="imagen_contacto"><img src="ico/gabri.png"/></div>
					<a href="https://twitter.com/Vazquez_Gabriel" class="twitter-follow-button" data-show-count="false" data-lang="es">Seguir</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</div>
		</ul>
	
</div>
</div>
</div>

<?php
	include('footer.php')
?>
</body>
</html>