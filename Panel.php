<!DOCTYPE html>
<html lang="es">

<?php
session_start();
// Regenera el Id es decir lo cambia evaluadamente para seguridad de hackeos con el PHPSESSID.
session_regenerate_id(true);
// Si el usuario unde en el boton cerrar sesion direccionar al login.php //
if (isset($_REQUEST['sesion']) && $_REQUEST['sesion'] == "cerrar") {
  session_destroy();
  header("location: login.php");
}
// Si un usuario entra al panel sin un usuario existente re-direccionar al login.php //
if (isset($_SESSION['Id']) == false) {
  header("location: login.php");
}
$modulo = $_REQUEST['modulo'] ?? '';


?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SportsWearline</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/editor.dataTables.min.css">








</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>
      <!--  Menu -->
      <ul class="navbar-nav ml-auto">
        <!-- Editar el usuario de ADMIN desde su  caratula llamando la siguiente funcion. -->
        <a class="nav-link" title="Editar perfil" href="Panel.php?modulo=EditarU&Id= <?php echo $_SESSION['Id'] ?>">
          <i class="far fa-user"></i>

        </a>
        <a class="nav-link text-danger" href="Panel.php?modulo=&sesion=cerrar " title="Cerrar sesion">
          <i class="fas fa-door-closed"></i>

        </a>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <!--poner logo-->
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SportsWearline</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['Nombre']; ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="fas fa-shopping-cart nav-icon" adian-hidden="true"></i>
                <p>
                  SportsWearline
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <!-- Al dar a un clic de usuario o ventas se active -->
                  <a href="Panel.php?modulo=Estadisticas" class="nav-link <?php echo ($modulo == "Estadisticas" || $modulo == "") ? "active" : " "; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <i class="fas fa-chart-bar  nav-icon  "></i>
                    <p>Estadisticas</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <!-- Al dar a un clic de usuario o ventas se active -->
                  <a href="Panel.php?modulo=Usuarios" class="nav-link <?php echo ($modulo == "Usuarios" || $modulo == "CrearU") || $modulo == "EditarU" ? "active" : " "; ?>">
                    <i class="far fa-user nav-icon"></i>
                    <p>Usuarios</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <!-- Al dar a un clic de usuario o ventas se active -->
                  <a href="Panel.php?modulo=Productos" class="nav-link <?php echo ($modulo == "Productos" || $modulo == "") ? "active" : " "; ?> ">

                    <i class="fa fa-shopping-bag nav-icon" aria-hidden="true"></i>
                    <p>Productos</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <!-- Al dar a un clic de usuario o ventas se active -->
                  <a href="Panel.php?modulo=Ventas" class="nav-link <?php echo ($modulo == "Ventas" || $modulo == "") ? "active" : " "; ?> ">

                    <i class="fa fa-table nav-icon" aria-hidden="true"></i>
                    <p>Ventas</p>
                  </a>
                </li>
              </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <?php
    // Sentencia de crar usuario lanzar un mensaje (SE CREO EL PERFIL EXITOSAMENTE) sentencia if
    if (isset($_REQUEST['mensaje'])) {
    ?>
      <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <?php echo $_REQUEST['mensaje'] ?>
      </div>
    <?php
    }


    // Llamar contenido, llamar la estadistica.
    if ($modulo == "Estadisticas" || $modulo == "") {
      include_once "Estadisticas.php";
    }
    if ($modulo == "Usuarios") {
      include_once "Usuarios.php";
    }
    if ($modulo == "Productos") {
      include_once "Productos.php";
    }
    if ($modulo == "Ventas") {
      include_once "Ventas.php";
    }
    if ($modulo == "CrearU") {
      include_once "CrearU.php";
    }
    if ($modulo == "EditarU") {
      include_once "EditarU.php";
    }

    ?>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- DataTables  & Plugins -->
  <!-- script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->

  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
  <script src="js/dataTables.editor.min.js"></script>
  <script>
    $(function() {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
      
      editor = new $.fn.dataTable.Editor({
        ajax: "controllers/producs.php",
        table: "#tablaProductos",
        fields: [{
          label: "Nombre:",
          name: "Nombre"
        }, {
          label: "Precio:",
          name: "Precio"
        }, {
          label: "Cantidad:",
          name: "Cantidad"
        }, {
                label: "Imagenes:",
                name: "files[].id",
                // subir varias imagenes con las caracteristicas.
                type: "uploadMany",
                display: function ( fileId, counter ) {
                    return '<img src="'+editor.file( 'files', fileId ).web_path+'"/>';
                },
                // especificar que no hay imagenes
                noFileText: 'No hay imagenes.'
            }]
      });

      $('#tablaProductos').DataTable({
        dom: "Bfrtip",
        ajax: "controllers/producs.php",
        columns: [
          {
            data: "Nombre"
          },
          {
            data: "Precio", render: $.fn.dataTable.render.number(',', '.', 0, '$')
          },
          {
            data: "Cantidad" 
          },
            {
              //Vinculo con el data files, para hacer un rendereo y muestre la cantidad de imagenes.
                data: "files",
                render: function ( d ) {
                    return d.length ?
                        d.length+' imagn(es)' :
                        'No hay imagenes';
                },
                title: "Imagen"
            },
        ],
        select: true,
        buttons: [{
            extend: "create",
            editor: editor
          },
          {
            extend: "edit",
            editor: editor
          },
          {
            extend: "remove",
            editor: editor
          }
        ]
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $(".borrar").click(function(e) {
        e.preventDefault();
        var res = confirm("¿Seguro que quieres eliminar el usuario?");
        if (res == true) {
          var link = $(this).attr("href");
          //console.log(link); Metodo de prueba en busca de erorres.
          window.location = link;

        }
      });
    });
  </script>



  <footer class="main-footer" style="background:radial-gradient(circle at 24.1% 68.8%, rgb(50, 50, 50) 0%, rgb(0, 0, 0) 99.4%)">
    <strong>SportsWearline &copy; 2015-2022 <a href="https://sportswearline.netlify.app" target="_blank" style="color:white">Tienda Virtual Aqui.</a></strong>
    <div class="float-right d-none d-sm-inline-block">
      <b style="color:red">SportsWearline</b>
    </div>
  </footer>
</body>

</html>
