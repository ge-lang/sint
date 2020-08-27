<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', DS . 'wamp64' . DS . 'www' . DS . 'sint');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');
defined('IMAGES_PATH') ? null : define('IMAGES_PATH', SITE_ROOT.DS.'admin'.DS.'img');


require_once(INCLUDES_PATH.DS."functions.php");
require_once(INCLUDES_PATH.DS."config.php");
require_once(INCLUDES_PATH.DS."Database.php");
require_once(INCLUDES_PATH.DS."Db_object.php");
require_once(INCLUDES_PATH.DS."User.php");
require_once(INCLUDES_PATH.DS."Comment.php");
require_once(INCLUDES_PATH.DS."Session.php");
require_once(INCLUDES_PATH.DS."Role.php");
require_once(INCLUDES_PATH.DS."Paginate.php");
require_once(INCLUDES_PATH.DS."Product.php");
require_once(INCLUDES_PATH.DS."Categorie.php");
require_once(INCLUDES_PATH.DS."Brand.php");
require_once(INCLUDES_PATH.DS."Dienst.php");
require_once(INCLUDES_PATH.DS."Teamlead.php");
require_once(SITE_ROOT.DS."includes". DS. "PayPal.php");



?>