<?php
// This is the account controller for the site

// create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';

// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the accounts model
require_once '../model/account-model.php';

// Get the function library
require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();

$navList = showNavList($classifications);

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
    // filter and store the data
    $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);

    // checking an existing address
    $existingEmail = checkExistingEmail($clientEmail);

    if ($existingEmail) {
      $message = '<p class="success-message">That email address already exists. <br>Do you want to login instead?</p>';
      include '../view/login.php';
      exit;
    }

    // check for missing data
    if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
      $message = '<p class="warning-message">Please, provide information for all empty form fields</p>';
      include '../view/registration.php';
      exit;
    }

    // hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

    // attempt the insert
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

    // find out the result
    if ($regOutcome === 1) {
      setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
      $_SESSION['message'] = "<p class='success-message'>Thank you for registering $clientFirstname. <br>Please use your email and password to login.</p>";
      header('Location: /phpmotors/accounts/?action=login');
      exit;
    } else {
      $message = "<p class='warning-message'>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
      include '../view/registration.php';
      exit;
    };
    break;

  case 'Login':
    $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);

    // check for missing data
    if (empty($clientEmail) || empty($checkPassword)) {
      $message = '<p class="warning-message">Provided information is not correct. Please, enter again.</p>';
      include '../view/login.php';
      exit;
    }

    // A valid password exists, proceed with the login process
    // Query the client data based on the email address
    $clientData = getClient($clientEmail);

    // Compare the password just submitted against
    // the hashed password for the matching client
    $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);

    // If the hashes don't match create an error
    // and return to the login view
    if (!$hashCheck) {
      $message = '<p class="warning-message">Please, check your password and try again.</p>';
      include '../view/login.php';
      exit;
    }

    // A valid user exists, log them in
    $_SESSION['loggedin'] = TRUE;

    // Remove the password from the array
    // the array_prop function removes the last
    // element from an array
    array_pop($clientData);

    // Store the array into a session
    $_SESSION['clientData'] = $clientData;

    // Send them to the admin view
    include '../view/admin.php';
    exit;
    break;
  default:
    include '../view/login.php';
}
