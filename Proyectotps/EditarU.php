<?php

include_once "Basedata.php";
  // Llamar la base de datos desde el include_once.
  $con = mysqli_connect($host, $user, $pasword, $db);

 if (isset($_REQUEST['guardar'])){
  
  
  $email = mysqli_real_escape_string($con, $_REQUEST['email']?? '');
  $pasword = mysqli_real_escape_string($con, $_REQUEST['pass']?? '');
  $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre']?? '');
  $Id = mysqli_real_escape_string($con, $_REQUEST['Id']?? '');

  $query = "UPDATE usuario SET 
  email = '" . $email . "' ,pasword=  '" . $pasword . "' ,nombre = '" . $nombre . "' where  Id= '" . $Id . "';

  ";
  //Restultados 
  $res = mysqli_query($con, $query);
  if($res){
    echo '<meta http-equiv= "refresh" content="0; url=Panel.php?modulo=Usuarios&mensaje=Usuario '.$nombre.' Editado correctamente" />';
  }
  else {
?>
 <div class="alert alert-danger" role="alert">
   Error al crear usuario <?php echo mysqli_error($con)?>
 </div>
<?php
  }
 }
 // Leer los usuarios 
 // ((mysqli_real_escape_string)) Significado llama consultas preparadas 
$Id= mysqli_real_escape_string ($con, $_REQUEST['Id']??'');
// Seleccionar los datos //
$query = "SELECT Id, email, nombre, pasword from usuario where  Id = '".$Id."';";
// Pasar la conexion $con, $query y almacenar en la variable $res. //
$res = mysqli_query($con , $query);
// (mysqli_fetch_assoc) Entregar un registro con el almacenamiento de la variable $res
$row = mysqli_fetch_assoc($res);

?> 
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><strong>Crear Usuarios</strong></h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <form action="Panel.php?modulo=EditarU" method="post">
                <div class="for-group">
                  <label>Email</label>
                  <input type="email" name="email"  class="form-control" value="<?php echo $row['email']?>">
                </div>
                  <div class="for-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control">
                  </div>
                  <div class="for-group">
                  <label>Nombre</label>
                  <input type="text" name="nombre"  class="form-control" value="<?php echo $row['nombre']?>">
                </div>
                 /*<div class="for-group">
                  <label>Apellido</label>
                  <input type="text" name="apellido"  class="form-control" value="<?php echo $row['apellido']?>">
                </div>
                 <div class="for-group">
                  <label>Direccion</label>
                  <input type="" name="direccion"  class="form-control" value="<?php echo $row['direccion']?>">
                </div>
                 <div class="for-group">
                  <label>Email</label>
                  <input type="text" name="ciudad"  class="form-control" value="<?php echo $row['ciudad']?>">
                </div>
                 <div class="for-group">
                  <label>Email</label>
                  <input type="number" name="telefono"  class="form-control" value="<?php echo $row['telefono']?>">
                </div>*/ //elegible.
                
                <div class="for-group">
                    <input type="hidden" name="Id" value="<?php echo $row['Id'] ?>">
                  <button type="submit" class="btn btn-primary" name="guardar">guardar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
