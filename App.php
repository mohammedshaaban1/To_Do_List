<?php

use Route\ToDo\Classes\Request;
use Route\ToDo\Classes\Session;
use Route\ToDo\Classes\Validation\validation;

require_once 'inc/connection.php';
require_once 'classes/Request.php';
require_once 'classes/Session.php';
require_once 'classes/Validation/Required.php';
require_once 'classes/Validation/Str.php';
require_once 'classes/Validation/Validation.php';

$request= new Request; 
$session= new Session;
$validation= new validation; 