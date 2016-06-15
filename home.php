<?php include("header.php") ?>
	<div id="content">
		<div class="container" id="containerhome">
			<?php include("menu.php") ?>
			<?php include("sidebar.php") ?>
			<div class="two-third column">
				<div class="backblanco">
					<div id="espaciopublicaciones">
						<form id="publicacion" action="procesar/publicar.php" method="post">
						<!--<form id="publicacion" action="api/?m=publicar" method="post">-->
							<textarea name="textopublicacion" id="inputpublicar" cols="30" rows="10" placeholder="¿En qué estás pensando?" required></textarea>
							<input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario'] ?>">
							<p><input type="submit" class="botoniniciar" value="Publicar"></p>
						</form>
						<p class="mensajepublicaciones">
							<?php if(isset($_GET['m'])){echo base64_decode($_GET['m']);} ?>
						</p>
					</div>
					<ul id="tipopublicacion">
						<li><a href=""><i class="fa fa-pencil" aria-hidden="true" id="triggerestado"></i><span>Estado</span></a></li>
						<li><a href="#" id="triggerfoto"><i class="fa fa-camera" aria-hidden="true"></i><span>Foto</span></a></li>
						<li><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i><span>Video</span></a></li>
						<li><a href=""><i class="fa fa-calendar" aria-hidden="true"></i><span>Evento</span></a></li>
					</ul>
					<div class="clear"></div>
					<form action="api/index.php?m=subirArchivo" class="dropzone" id="formulariodropzone">
						<input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario'] ?>">
					</form>
				</div>
				
				<?php 
					/* OBTENER PRIMERAS 10 PUBLICACIONES */
					$url = "http://localhost/ygiisNuevo/api/?m=timeline&o=0&l=10";
					$ch = curl_init();
					curl_setopt_array(
					    $ch, array( 
					    CURLOPT_URL => $url,
					    CURLOPT_RETURNTRANSFER => true,
					    CURLOPT_RETURNTRANSFER => 1

					));
					$result = curl_exec($ch);
					$result = json_decode($result);
					foreach($result as $r){
						?>
								<!-- publicacion -->
				<div class="backblanco mt10 p5 publicacion">
					<div class="titulopublicacion">
						<div class="avatarpublicacion">
							<img src="images/avatarthumb.jpg" alt="" class="avatar">
						</div>
						<div class="contenidotitulopublicacion">
							<div class="nombrepublicacion">
								<?php echo $r->nombres ?>
								<span></span>
								<br>
								<span class="cuando"><?php echo $r->fecha_subida ?></span>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="contenidopublicacion">
						<?php echo $r->texto ?>
					</div>
					<?php 
						if(!empty($r->multimedia)){
							$fotos = explode(",",$r->multimedia);
							foreach($fotos as $f){
								if(!empty($f)){
								?>
					<div class="imagenpublicacion">
						<a href="<?php echo $f; ?>" class="enlaceimagen fancybox"><img src="<?php echo $f; ?>" alt=""></a>
					</div>
								<?php
								}
							}
					?>

					<?php
						}
					?>
					<ul class="megustacompartir">
						<li><a href="procesar/megusta.php?id=<?php echo $r->id ?>" class="megusta">Me gusta</a></li>
						<li><a href="procesar/compartir.php?id=<?php echo $r->id ?>" class="compartir">Compartir</a></li>
					</ul>
					<br>
					<span class="cantidadmegusta">1 personas les gusta esto</span>
					<!--<div class="comentarios">
						<div class="comentario">
							<div class="avatarpublicacion">
								<img src="images/avatarthumb.jpg" alt="" class="avatar">
							</div>
							<div class="contenidotitulopublicacion">
								<div class="nombrepublicacion">
									Test User 
									<span>Hola amigos</span>
									<br>
									<span class="cuando">ayer</span>
								</div>
								<ul class="megustacompartir">
									<li><a href="#" class="megusta">Me gusta</a></li>
								</ul>
							</div>
						</div>
						<div class="comentario">
							<div class="avatarpublicacion">
								<img src="images/avatarthumb.jpg" alt="" class="avatar">
							</div>
							<div class="contenidotitulopublicacion">
								<div class="nombrepublicacion">
									Test User 
									<span>Hola amigos</span>
									<br>
									<span class="cuando">ayer</span>
								</div>
								<ul class="megustacompartir">
									<li><a href="#" class="megusta">Me gusta</a></li>
								</ul>
							</div>
						</div>
						<div class="comentario">
							<div class="avatarpublicacion">
								<img src="images/avatarthumb.jpg" alt="" class="avatar">
							</div>
							<div class="contenidotitulopublicacion">
								<div class="nombrepublicacion">
									Test User 
									<span>Hola amigos</span>
									<br>
									<span class="cuando">ayer</span>
								</div>
								<ul class="megustacompartir">
									<li><a href="#" class="megusta">Me gusta</a></li>
								</ul>
							</div>
						</div>
						<form action="">
							
						</form>
					</div>-->
					<div class="clear"></div>
				</div>
				<!-- fin publicacion -->
						<?php
					}
					//print_r($result);
				?>

				
				<!-- publicacion -->
				<div class="backblanco mt10 p5 publicacion">
					<div class="titulopublicacion">
						<div class="avatarpublicacion">
							<img src="images/avatarthumb.jpg" alt="" class="avatar">
						</div>
						<div class="contenidotitulopublicacion">
							<div class="nombrepublicacion">
								Test User 
								<span>Subió un avatar nuevo</span>
								<br>
								<span class="cuando">ayer</span>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="contenidopublicacion">
						Lorem ipsum dolor sit amet.
					</div>
					<div class="imagenpublicacion">
						<a href="images/dummy2.jpg" class="enlaceimagen fancybox"><img src="images/dummy2.jpg" alt=""></a>
					</div>
					<ul class="megustacompartir">
						<li><a href="#" class="megusta">Me gusta</a></li>
						<li><a href="#" class="compartir">Compartir</a></li>
					</ul>
					<br>
					<span class="cantidadmegusta">1 personas les gusta esto</span>
					<div class="clear"></div>
				</div>
				<!-- fin publicacion -->
				<!-- publicacion -->
				<div class="backblanco mt10 p5 publicacion">
					<div class="titulopublicacion">
						<div class="avatarpublicacion">
							<img src="images/avatarthumb.jpg" alt="" class="avatar">
						</div>
						<div class="contenidotitulopublicacion">
							<div class="nombrepublicacion">
								Test User 
								<span>Subió un avatar nuevo</span>
								<br>
								<span class="cuando">ayer</span>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="contenidopublicacion">
						Lorem ipsum dolor sit amet.
					</div>
					<div class="video-container">
						<iframe width="420" height="315" src="https://www.youtube.com/embed/roIjvEKib3E" frameborder="0" allowfullscreen></iframe>
					</div>
					<ul class="megustacompartir">
						<li><a href="#" class="megusta">Me gusta</a></li>
						<li><a href="#" class="compartir">Compartir</a></li>
					</ul>
					<br>
					<span class="cantidadmegusta">1 personas les gusta esto</span>
					<div class="clear"></div>
				</div>
				<!-- fin publicacion -->
			</div>
			<div class="clear"></div>
		</div>
	</div>
<?php include("footer.php") ?>