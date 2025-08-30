<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'controllers/template.controller.php';

require_once 'controllers/portfolio.controller.php';

require_once 'models/portfolio.model.php';

require_once 'controllers/email.controller.php';
require_once 'extensions/vendor/autoload.php';


$template = new ControllerTemplate();
$template -> ctrShowTemplate();
