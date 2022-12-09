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
    exit;
    break;

  case 'edit-review':
    $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
    $review = getReview($reviewId);
    if (empty($review)) {
      $message = '<p class="warning-message">Sorry, review not found</p>';
      exit;
    }
    $_SESSION['review'] = $review;
    include '../view/review-edit.php';
    exit;
    break;

  case 'update-review';
    $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
    $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

    if (empty($reviewText)) {
      $message = '<p class="warning-message">No changes detected.</p>';
      include '../view/review-edit.php';
      exit;
    }

    $updateResult = updateReview($reviewId, $reviewText, $clientId);
    if ($updateResult == 1) {
      $message = "<p class='success-message'>Congratulations, the review was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('Location: /phpmotors/accounts/');
      exit;
    } else {
      $message = "<p class='warning-message'>Error. The review was not updated.</p>";
      $_SESSION['message'] = $message;
      include '../view/review-edit.php';
      exit;
    }

    break;

  case 'del':
    $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
    $review = getReview($reviewId);
    // $_SESSION['review'] = $review;
    if (count($review) < 1) {
      $message = "<p class='warning-message'>Sorry, review no founded</p>";
      header('Location: /phpmotors/accounts/');
      exit;
    }

    $message = "<p class='warning-message'>This action cannot be undone!</p>";
    $_SESSION['message'] = $message;
    include '../view/review-delete.php';
    exit;
    break;
  case 'delete-review':
    $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);

    $deleteResult = deleteReview($reviewId);
    if ($deleteResult) {
      $message = "<p class='success-message'>Congratulations, the review was successfully deleted.</p>";
      $_SESSION['message'] = $message;
      header('Location: /phpmotors/accounts/');
      exit;
    }

    break;

  default:
    if ($_SESSION['loggedin']) {
      include '../view/admin.php';
    } else {
      include '../view/home.php';
    }
    exit;
}
