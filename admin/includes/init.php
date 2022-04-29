<?php ob_start();?>

<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// define('SITE_ROOT', DS . 'Aplication (C:)' . DS . 'xampp ' . DS . 'htdocs' .DS. 'Art_gallery' );
define('SITE_ROOT', DS . 'C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'ecommerce' );

defined('INCLUDES_PATH') ? null :  define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');


defined('IMAGES_PATH') ? null : define('IMAGES_PATH', SITE_ROOT.DS.'admin'.DS.'upload');

require_once("db_object.php"); 
require_once('category.php');
require_once('user.php');
require_once('new_config.php');
require_once('database.php');
require_once('function.php');
require_once('session.php');
require_once('product.php');
require_once('subscriber.php');
require_once('review.php');
require_once('pagination.php');
require_once('cart.php');
?>