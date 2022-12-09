<?php
$clientData = $_SESSION['clientData'];
$clientId = $clientData['clientId'];

$reviewsClient = getReviewsByClient($clientId);
if (count($reviewsClient) > 0) {
  $displayReviewsClient = buildReviewsClient($reviewsClient);
  echo $displayReviewsClient;
}
?>