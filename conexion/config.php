<?php
 class database {


    private $hostname = "localhost";
    private $database = "e_ecommerse";
    private $username = "root";
    private $pasword = "344741";
    private $charset = "utf-8";

    function conectar () {

        try{

            $conexion = "mysql: hostname =" . $this -> hostname . "; database = " . $this -> database . "; charset= " . $this -> charset;

            $options = [

                //generar exceptiones en caso de que halla un error con la conexion.

                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

                //Evitar que las preocupaciones que se hagan para las consultas no sean emuladas y sean reales y tengan seguridad

                PDO::ATTR_EMULATE_PREPARES => false 

            ];

            $pdo  = new PDO($conexion, $this -> username, $this  -> pasword, $options);
         
                //Proceso para verificar si hay error de conexion.


            return $pdo;

         
        } catch (PDOException $e){
         
            echo 'Error capturado' . $e -> getMessage();
         
            exit;
        }

    }

 }

?>
