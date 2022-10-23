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

// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php?action=home' title='View the PHP Motors home page' class='link-onDark'>Home</a></li>";
foreach ($classifications as $classification) {
  $navList .= "<li><a class='link-onDark' href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

// echo $navList;
// exit;


$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
  case 'template':
    include 'view/template.php';
    break;
  case 'home':
    include 'view/home.php';
    break;
  default:
    include 'view/vehicles-man.php';
}
