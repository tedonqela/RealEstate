<?php
require( 'vendor/autoload.php' );

spl_autoload_register( function ( $class_name ) {
    if ( file_exists( "../" . $class_name . '.php' ) ) {
        include "../" . $class_name . '.php';
    } else {
        die( "Nuk e gjeta kete klase me autoload!" );
    }
} );

// Start Session
session_start();


// Include Config
require('config.php');

require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/Home.php');
require('controllers/Shares.php');
require('controllers/Profile.php');
require('controllers/Props.php');
require('controllers/Users.php');
require('controllers/Admin.php');




require('models/HomeModel.php');
require('models/ShareModel.php');
require('models/UsersModel.php');
require('models/PropModel.php');
require('models/ProfileModel.php');
require('models/AdminModel.php');

// require('models/post.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}