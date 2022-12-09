<?php
// Reviews Model

function addReview($reviewText, $invId, $clientId)
{
  $db = phpmotorsConnect();
  $sql = "INSERT INTO reviews (reviewText, invId, clientId) VALUES (:reviewText, :invId, :clientId)";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();

  return $rowsChanged;
}

function getReviewsByInventory($invId)
{
  $db = phpmotorsConnect();
  $sql = "SELECT * FROM reviews WHERE invId IN (SELECT invId FROM inventory WHERE invId = :invId) ORDER BY reviews.reviewDate DESC";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
  $stmt->execute();
  $reviewArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $reviewArray;
}

function getReviewsByClient($clientId)
{
  $db = phpmotorsConnect();
  $sql = "SELECT * FROM reviews WHERE clientId IN (SELECT clientId FROM clients WHERE clientId = :clientId) ORDER BY reviews.reviewDate DESC";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
  $stmt->execute();
  $reviewArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $reviewArray;
}

function getReview($reviewId)
{
  $db = phpmotorsConnect();
  $sql = 'SELECT * FROM reviews WHERE reviewId = :reviewId';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
  $stmt->execute();
  $reviewInfo = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $reviewInfo;
}

function updateReview($reviewId, $reviewText, $clientId)
{
  $db = phpmotorsConnect();
  $sql = "UPDATE reviews SET reviewText = :reviewText, clientId = :clientId WHERE reviewId = :reviewId";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
  $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
  $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();

  return $rowsChanged;
}

function deleteReview($reviewId)
{
  $db = phpmotorsConnect();
  $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}
