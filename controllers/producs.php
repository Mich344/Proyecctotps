<?php

//Implementacion a nuesra tabla productos, conectantado los dataTABLES editables en nuestro admin.

// DataTables PHP library
include( "../lib/DataTables.php" );


// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

          $db->sql( 'set names utf8' ); 
// Build our Editor instance and process the data coming from _POST
include_once("../Basedata.php");
	Editor::inst( $db, 'productos' )
		->fields(
			Field::inst( 'Nombre' )
			// validar 
				->validator( Validate::notEmpty( ValidateOptions::inst()
					->message( 'Por favor ingresa el nombre del producto' )	
				) ),
			Field::inst( 'Precio' )
				->validator( Validate::numeric() )
				->setFormatter( Format::ifEmpty(null) ),
			Field::inst( 'Cantidad' )
				->validator( Validate::numeric() )
				->setFormatter( Format::ifEmpty(null) )
		)
		->join(
        Mjoin::inst( 'files' )
		//Union de las tablas creadasd en la base de datos y que se compile en solo 1.
            ->link( 'productos.id', 'productos_files.producto_id' )
            ->link( 'files.id', 'productos_files.file_id' )
            ->fields(
		    //Llamar la extancia Id que tenemos en nuestro panel [files].
                Field::inst( 'id' )
                    ->upload( Upload::inst( $_SERVER['DOCUMENT_ROOT'].'/Admin/upload/__ID__.__EXTN__' )
                        ->db( 'files', 'id', array(
                            'filename'    => Upload::DB_FILE_NAME,
                            'filesize'    => Upload::DB_FILE_SIZE,
                            'web_path'    => Upload::DB_WEB_PATH,
                            'system_path' => Upload::DB_SYSTEM_PATH
                        ) )
                        ->validator( Validate::fileSize( 5000000, 'Files must be smaller that 5M' ) )
                        ->validator( Validate::fileExtensions( array( 'png', 'jpg', 'jpeg', 'gif' ), "Please upload an image" ) )
                    )
            )
    )
		->process( $_POST )
		->json();

?>
