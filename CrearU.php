<?php 
 if (isset($_REQUEST['guardar'])){
  include_once "Basedata.php";
  // Llamar la base de datos desde el include_once.
  $con = mysqli_connect($host, $user, $pasword, $db);
  
  $email = mysqli_real_escape_string($con, $_REQUEST['email']?? '');
  $pasword = mysqli_real_escape_string($con, $_REQUEST['pass']?? '');
  $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre']?? '');

  $query = "INSERT INTO usuario (email,pasword,nombre) VALUES ('".$email."' , '".$pasword."' , '".$nombre."'); ";
  //Restultados 
  $res = mysqli_query($con, $query);
  if($res){
    echo '<meta http-equiv= "refresh" content="0; url=Panel.php?modulo=Usuarios&mensaje=Usuario creado correctamente" />';
  }
  else {
?>
 <div class="alert alert-danger" role="alert">
   Error al crear usuario <?php echo mysqli_error($con)?>
 </div>
<?php
  }
 }



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
              <form action="Panel.php?modulo=CrearU" method="post">
                <div class="for-group">
                  <label>Email</label>
                  <input type="email" name="email"  class="form-control" required = "Completa tu correo" >
                </div>
                  <div class="for-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" required = "Completa tu Contraseña" >
                  </div>
                  <div class="for-group">
                  <label>Nombre</label>
                  <input type="text" name="nombre"  class="form-control" required = "Completa tu Nombre" >
                </div>
                <div class="for-group">
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