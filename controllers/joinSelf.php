<?php

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


/*
 * Example PHP implementation used for the joinSelf.html example - the basic idea
 * here is that the join performed is simply to get extra information about the
 * 'manager' (in this case, the name of the manager). To alter the manager for
 * a user, you would change the 'manager' value in the 'users' table, so the
 * information from the join is read-only.
 */
Editor::inst( $db, 'users' )
	->debug( true )
	->field( 
		Field::inst( 'users.first_name' ),
		Field::inst( 'users.last_name' ),
		Field::inst( 'users.manager' )
            ->options( Options::inst()
                ->table( 'users' )
                ->value( 'id' )
                ->label( array('first_name', 'last_name') )
            ),
		Field::inst( 'manager.first_name' ),
		Field::inst( 'manager.last_name' )
	)
	->leftJoin( 'users as manager', 'users.manager', '=', 'manager.id' )
	->process($_POST)
	->json();
