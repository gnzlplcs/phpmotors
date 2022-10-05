<?php
// This is the main controller for the site

// Get the database connection file
require_once 'library/connections.php';

// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';

// Get the array of classifications
$classifications = getClassifications();

// Testing (like JS's console.log)
// var_dump($classifications);
//   exit;


$action = filter_input(INPUT_POST, 'action');

if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
  case 'template':
    include 'view/template.php';
    break;
  default:
    include 'view/home.php';
}
