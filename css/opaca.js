/*
			<input type="text" id="in" name="in" value="YAAAAAAA"></input>
			<select id="sel" onchange="opaca()">
			  <option value="saab">Saab</option>
			  <option value="volvo">Volvo</option>
			  <option value="mercedes">Mercedes</option>
			  <option value="audi">Audi</option>
			</select>
			<input type="submit" value="Try it" onclick="this.form.action ='pag2.php'"></input>
		</form>*/




		
			function opaca(){
				if (document.getElementById('tipo').value=="sanitario"){
					
					document.getElementById('dosis').disabled = true;
					document.getElementById('familia').disabled = true;
					document.getElementById('via').disabled = true;
					document.getElementById('receta').disabled = false;
					document.getElementById('cubierto').disabled = false;
					document.getElementById('receta2').disabled = false;
					document.getElementById('cubierto2').disabled = false;
				
				}else if (document.getElementById('tipo').value=="parafarmaco"){
					document.getElementById('receta').disabled = true;
					document.getElementById('cubierto').disabled = true;
					document.getElementById('receta2').disabled = true;
					document.getElementById('cubierto2').disabled = true;
					document.getElementById('dosis').disabled = true;
					document.getElementById('familia').disabled = true;
					document.getElementById('via').disabled = true;
					
				}else{
					document.getElementById('receta').disabled = false;
					document.getElementById('cubierto').disabled = false;
					document.getElementById('receta2').disabled = false;
					document.getElementById('cubierto2').disabled = false;
					document.getElementById('dosis').disabled = false;
					document.getElementById('familia').disabled = false;
					document.getElementById('via').disabled = false;
					
					
				}
			}
