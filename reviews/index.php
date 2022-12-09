<?php
// reviews controller

session_start();
require_once '../library/functions.php';
require_once '../library/connections.php';
require_once '../model/main-model.php';
require_once '../model/reviews-model.php';

// show nav
$classifications = getClassifications();
$navList = showNavList($classifications);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
  case 'add-review':
    include '../view/vehicle-detail.php';
    break;

  case 'adding-review':
    $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_SPECIAL_CHARS));
    $invId = trim(filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT));
    $clientId = trim(filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT));
    if (empty($reviewText)) {
      $message = '<p class="warning-message">Please, do not let empty the field</p>';
      include '../view/vehicle-detail.php';
      exit;
    }
    $regOutcome = addReview($reviewText, $invId, $clientId);
    if ($regOutcome === 1) {
      $message = "<p class='success-message'>The review was added successfully!</p>";
      $_SESSION['message'] = $message;
      header("Location: /phpmotors/vehicles/?action=details&invId=$invId");
      exit;
    } else {
      $message = "<p class='warning-message'>Sorry, adding review failed. Please try again.</p>";
      include '../view/vehicle-detail.php';
      exit;
    };
    break;

  case 'edit-review':
    break;
  case 'update-review';
    break;
  case 'delete-review';
    break;
  default:
    if ($_SESSION['logged']) {
      include '../view/admin.php';
    } else {
      include '../view/home.php';
    }
    exit;
}
