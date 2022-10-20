<?php
// This is the account controller for the site

// Get the database connection file
require_once '../library/connections.php';

// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the accounts model
require_once '../model/account-model.php';

// Get the array of classifications
$classifications = getClassifications();

// Testing (like JS's console.log)
// var_dump($classifications);
//   exit;

// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page' class='link-onDark'>Home</a></li>";
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
  case 'login':
    include '../view/login.php';
    break;
  case 'registration':
    include '../view/registration.php';
    break;
  case 'register':
    // time to test
    // echo 'You are in the register case'

    // filter and store the data
    $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
    $clientLastname = filter_input(INPUT_POST, 'clientLastname');
    $clientEmail = filter_input(INPUT_POST, 'clientEmail');
    $clientPassword = filter_input(INPUT_POST, 'clientPassword');

    // check for missing data
    if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)) {
      $message = '<p>Please, provide information for all empty form fields</p>';
      include '../view/registration.php';
      exit;
    }
    // attempt the insert
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);

    // find out the result
    if($regOutcome === 1) {
      $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login. </p>";
      include '../view/login.php';
      exit;
    } else {
      $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
      include '../view/registration.php';
      exit;
    };

    break;
  default:
    include '../view/login.php';
}
