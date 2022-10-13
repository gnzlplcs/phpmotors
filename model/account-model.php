<?php
// this is the Account Model

// new function will handle site registrations
function regCLient($clientFirstname, $clientLastname, $clientEmail, $clientPassword)
{
  // create connection object using the phpmotors connection function
  $db = phpmotorsConnect();
  // the SQL statement
  $sql = 'INSERT INTO clients (clientsFirstname, clientLastname, clientEmail, clientPassword)
              VALUES (:clientFistname, :clientLastname, : clientEmail, :clientPassword)';
  // create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is
  $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
  $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
  $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
  $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
  // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
};
