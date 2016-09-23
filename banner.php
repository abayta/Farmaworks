<div id="bannerApp">
		<!--fecha-->
			<a id="fecha">
				<script>
					document.write(document.title+" | ");
				</script>
				<script>
					var f = new Date();
					document.write(" " + f.getDate() + "/" +(f.getMonth() +1) + "/" + f.getFullYear());
				</script>
			</a>
			<!--<ul class="logOut">
  
				  <li>
				    <a> <?php
							echo $usuario['user'];
						?> 
					</a>
				    	<ul>
				      		<li><a href="phpaba/logout.php"><img src="ico/logOut.png"/> Salir </a></li>
				      		<li><a href="phpaba/logout.php" data-clone="Salir">		<?php
																					echo $usuario['user'];
																					?> </a></li>
						</ul>
				   </li> 
			</ul>-->
			
	<nav id="rolling-nav">
      <ul>
          <li><a href="phpaba/logout.php" data-clone= "Salir"> <?php	echo $usuario['user'];	?></a></li>
          
      </ul>
  	</nav>
			
			
</div>