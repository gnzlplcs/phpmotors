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
