<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
  header('Location: /phpmotors/');
  exit;
}
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if (isset($invInfo['invMake'])) {
            echo "Delete $invInfo[invMake] $invInfo[invModel]";
          } ?> | PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/style.css?ts=<?= time() ?>" media="screen">
</head>

<body>
  <div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
    <main class="content">
      <section class="add-vehicle grid-section">
        <h1>
          <?php
          if (isset($invInfo['invMake'])) {
            echo "Delete $invInfo[invMake] $invInfo[invModel]";
          }
          ?>
        </h1>
        <?php
        if (isset($message)) {
          echo $message;
        }
        ?>
        <form class="form" method="post" action="/phpmotors/vehicles/index.php">
          <!-- <label>Select a class car<br>
            <?php echo $classificationsList; ?>
          </label> -->
          <label for="invMake">Add a maker<br>
            <input type="text" name="invMake" id="invMake" readonly <?php
                                                                    if (isset($invInfo['invMake'])) {
                                                                      echo "value='$invInfo[invMake]'";
                                                                    } ?>>
          </label>
          <label for="invModel">Add a model<br>
            <input type="text" name="invModel" id="invModel" readonly <?php
                                                                      if (isset($invInfo['invModel'])) {
                                                                        echo "value='$invInfo[invModel]'";
                                                                      } ?>>
          </label>
          <label for="invDescription">Add a description<br>
            <textarea name="invDescription" id="invDescription" rows="10" readonly>
              <?php
              if (isset($invInfo['invDescription'])) {
                echo $invInfo['invDescription'];
              } ?>
            </textarea>
          </label>
          <input class="submitBtn" type="submit" id="add-vehicle-submit" name="delete-vehicle-submit" value="Delete vehicle">
          <input type="hidden" name="action" value="deleteVehicle">
          <input type="hidden" name="invId" value="<?php
                                                    if (isset($invInfo['invId'])) {
                                                      echo $invInfo['invId'];
                                                    } ?>">
        </form>
      </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
</body>

</html>