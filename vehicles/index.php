<?php
// This is the vehicle controller

require_once '../library/connections.php';
require_once '../model/main-model.php';
require_once '../model/vehicle-model.php';

$classifications = getClassifications(); // from main-model.php

$navList = '<ul>';
$navList .= "<li class='clean-li'><a href='/phpmotors/index.php?action=home' title='View the PHP Motors home page' class='link-onDark'>Home</a></li>";
foreach ($classifications as $classification) {
  $navList .= "<li class='clean-li'><a class='link-onDark' href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

$classificationsList = '<select name="carClassification">';
foreach ($classifications as $classification) {
  $classificationsList .= '<option value="' . $classification['classificationId'] . '">' . $classification['classificationName'] . '</option>';
}
$classificationsList .= '</select>';

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

  case 'adding-classification':
    $classificationName = filter_input(INPUT_POST, 'classificationName');
    if (empty($classificationName)) {
      $message = '<p class="warning-message">Please, do not let empty the field</p>';
      include '../view/add-classification.php';
      exit;
    }
    $regOutcome = addClassification($classificationName); // from vehicle-model.php
    if ($regOutcome === 1) {
      // $message = "<p>Thanks for adding $classificationName classification.</p>";
      include '../view/vehicles-man.php';
      exit;
    } else {
      $message = "<p class='warning-message'>Sorry, adding $classificationName classification failed. Please try again.</p>";
      include '../view/add-classification.php';
      exit;
    };
    break;

  case 'adding-vehicle':
    $invMake = filter_input(INPUT_POST, 'invMake');
    $invModel = filter_input(INPUT_POST, 'invModel');
    $invDescription = filter_input(INPUT_POST, 'invDescription');
    $invImage = filter_input(INPUT_POST, 'invImage');
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
    $invPrice = filter_input(INPUT_POST, 'invPrice');
    $invStock = filter_input(INPUT_POST, 'invStock');
    $invColor = filter_input(INPUT_POST, 'invColor');
    $classificationId = filter_input(INPUT_POST, 'carClassification');
    if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)) {
      $message = '<p class="warning-message">Please, provide information for all empty form fields.</p>';
      include '../view/add-vehicle.php';
      exit;
    }
    $regOutcome = addVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId); // from vehicle-model.php
    if ($regOutcome === 1) {
      $message = "<p  class='success-message'>The $invMake $invModel was added successfully!</p>";
      include '../view/add-vehicle.php';
      exit;
    } else {
      $message = "<p class='warning-message'>Sorry, adding vehicle failed. Please try again.</p>";
      include '../view/add-vehicle.php';
      exit;
    };
    break;

  default:
    include '../view/vehicles-man.php';
}
