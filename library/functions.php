<?php

function checkEmail($clientEmail)
{
  $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character||
function checkPassword($clientPassword)
{
  $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
  return preg_match($pattern, $clientPassword);
}

// this function receives an array of nav items as parameter, and returns it as an ul html element
function showNavList($classifications)
{
  $navList = '<ul>';
  $navList .= "<li class='clean-li'><a href='/phpmotors/index.php?action=home' title='View the PHP Motors home page' class='link-onDark'>Home</a></li>";
  foreach ($classifications as $classification) {
    $navList .= "<li class='clean-li'><a class='link-onDark' href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
  }
  $navList .= '</ul>';
  return $navList;
}

// Build the classifications select list
function buildClassificationList($classifications){
  $classificationList = '<select name="classificationId" id="classificationList">';
  $classificationList .= "<option>Choose a Classification</option>";
  foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
  }
  $classificationList .= '</select>';
  return $classificationList;
}
