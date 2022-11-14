<?php
// This is the vehicle controller
session_start();

require_once '../library/connections.php';
require_once '../library/functions.php';
require_once '../model/main-model.php';
require_once '../model/vehicle-model.php';

$classifications = getClassifications(); // from main-model.php

$navList = showNavList($classifications);


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
  case 'add-classification':
    include '../view/add-classification.php';
    break;

  case 'add-vehicle':
    include '../view/add-vehicle.php';
    break;

  case 'vehicles-man':
    header('Location: /phpmotors/vehicles/');
    break;

  case 'adding-classification':
    $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    if (empty($classificationName)) {
      $message = '<p class="warning-message">Please, do not let empty the field</p>';
      include '../view/add-classification.php';
      exit;
    }
    $regOutcome = addClassification($classificationName); // from vehicle-model.php
    if ($regOutcome === 1) {
      header('Location: /phpmotors/vehicles/index.php');
      exit;
    } else {
      $message = "<p class='warning-message'>Sorry, adding $classificationName classification failed. Please try again.</p>";
      include '../view/add-classification.php';
      exit;
    };
    break;

  case 'adding-vehicle':
    $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
    $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT));
    $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $classificationId = trim(filter_input(INPUT_POST, 'carClassification', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)) {
      $message = '<p class="warning-message">Please, provide information for all empty form fields.</p>';
      include '../view/add-vehicle.php';
      exit;
    }
    $regOutcome = addVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId); // from vehicle-model.php
    if ($regOutcome === 1) {
      $message = "<p class='success-message'>The $invMake $invModel was added successfully!</p>";
      header('Location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p class='warning-message'>Sorry, adding vehicle failed. Please try again.</p>";
      include '../view/add-vehicle.php';
      exit;
    };
    break;

  // Get vehicles by classificationId / used for starting Update & Delete process
  case 'getInventoryItems':
    // Get the classificationId
    $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT);

    // Fetch the vehicles by classificationId from the DB
    $inventoryArray = getInventoryByClassification($classificationId);

    // Convert the array to a JSON object and send it back
    echo json_encode($inventoryArray);
    break;

  case 'mod':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);

    // check if invInfo hay any data
    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found';
    }
    include '../view/vehicles-update.php';
    exit;
    break;

  case 'del':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }
    include '../view/vehicles-delete.php';
    exit;
    break;

  case "updateVehicle":
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
    $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $classificationId = filter_input(INPUT_POST, 'carClassification', FILTER_SANITIZE_NUMBER_INT);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

    if (empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($invId)) {
      $message = '<p>Please complete all information for the new item! Double check the classification of the item.</p>';
      include '../view/vehicles-update.php';
      exit;
    }
    $updateResult = updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);
    echo $updateResult;
    if ($updateResult == 1) {
      $message = "<p class='success-message'>Congratulations, the $invMake $invModel was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('Location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p class='warning-message'>Error. The new vehicle was not updated.</p>";
      include '../view/vehicles-update.php';
      exit;
    }
    break;

    case 'deleteVehicle':
      $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

      $deleteResult = deleteVehicle($invId);
      if ($deleteResult) {
        $message = "<p class='success-message'>Congratulations, the $invMake $invModel was successfully deleted.</p>";
        $_SESSION['message'] = $message;
        header('Location: /phpmotors/vehicles/');
        exit;
      }

    break;

  default:
    $classificationList = buildClassificationList($classifications);
    include '../view/vehicles-man.php';
    exit;
    break;
}
