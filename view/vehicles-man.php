<?php
$clientLevel = $_SESSION['clientData']['clientLevel'];
if ($clientLevel < 2) {
  header('Location: /phpmotors/');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehicle Management | PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/style.css?v=2" media="screen">
</head>

<body>
  <div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
    <main class="content">
      <section class="vehicles-man grid-section">
        <h1>Vehicles Management</h1>
        <?php
        if (isset($message)) {
          echo $message;
        }
        if (isset($classificationList)) {
          echo '<h2>Vehicles By Classification</h2>';
          echo '<p>Choose a classification to see those vehicles</p>';
          echo $classificationList;
        }
        ?>
        <noscript>
          <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
        </noscript>
        <table id="inventoryDisplay"></table>
        <ul>
          <li class="clean-li"><a href="/phpmotors/vehicles/index.php?action=add-classification" class="link-onLight">Add Classification</a></li>
          <li class="clean-li"><a href="/phpmotors/vehicles/index.php?action=add-vehicle" class="link-onLight">Add Vehicle</a></li>
        </ul>
      </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
  <script src="../js/inventory.js"></script>
</body>

</html>