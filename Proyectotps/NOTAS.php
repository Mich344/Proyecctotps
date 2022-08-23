
 aria-label="search" name="nombre" value="<?php echo $_REQUEST['nombre']??'';?>
 <input type="hidden" name="modulo" value="productos">
// HOLA
<!-- HOLI -->
 <?php 	include_once "Basedata.php";
								$con = mysqli_connect($host, $user, $pasword, $db);
								$query = "SELECT productos.Id, productos.Nombre, productos.Precio, productos.Cantidad FROM productos;";
								$res = mysqli_query($con, $query);
								while($row = mysqli_fetch_assoc($res)){
								?>
								<div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
									<a href="single.php"><img src="images/g9.png" class="img-responsive" alt=""/></a>
									<div class="gallery-text simpleCart_shelfItem">
										<h5><a class="name" href="single.php"> <?php echo $row['Nombre'] ?> </a></h5>
										<p><span class="item_price"><?php echo $row['Precio'] ?></span></p>
										<h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
										<ul>
											<li><a href="productos.php" title="Otros productos"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
											<li><a class="item_add" title="Añadir al carrito" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
							
										</ul>
									</div>
								</div>
								<?php
								}
						 ?>		

gallery-grid gallery-grid1 //ACOMODAR EL CUADRITO