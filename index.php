<?php
// This is the main controller for the site
// Create or access a Session
session_start();

require_once 'model/account-model.php';

// Get the database connection file
require_once 'library/connections.php';

// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';

// get custom functions just in case
require_once 'library/functions.php';

// Get the array of classifications
$classifications = getClassifications();

$navList = showNavList($classifications);

$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

if(isset($_COOKIE['firstname'])) {
  $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

switch ($action) {
  case 'template':
    include 'view/template.php';
    break;
  case 'vehicles':
    include 'view/vehicles.php';
    break;
  default:
    include 'view/home.php';
}
