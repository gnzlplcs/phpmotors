<?php
  if($_SESSION['loggedin'] != TRUE || $_SESSION['clientData']['clienteLevel'] < 2) {
    header("Location: ../");
  }
  $classificationsList = '<select name="carClassification" >';
  $classificationsList .= '<option>Choose an option</option>';
  foreach ($classifications as $classification) {
    $classificationsList .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
      if($classification['classificationId'] == $classificationId) {
        $classificationsList .= ' selected ';
      } elseif (isset($invInfo['classificationId'])) {
        if($classification['classificationId'] == $invInfo['classificationId']) {
          $classificationsList .= ' selected ';
        }
      };
    }
    $classificationsList .=  ">$classification[classificationName]</option>";
  }
  $classificationsList .= '</select>';
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
    echo "Modify $invInfo[invMake] $invInfo[invModel]";
  } elseif (isset($invMake) && isset($invModel)) {
    echo "Modify $invMake $invModel";
  }?> | PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/style.css?v=2" media="screen">
</head>

<body>
  <div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
    <main class="content">
      <section class="add-vehicle grid-section">
      <h1>
        <?php
          if(isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
            echo "Modify $invInfo[invMake] $invInfo[invModel]";
          } elseif(isset($invMake) && isset($invModel)) {
            echo "Modify$invMake $invModel";
          }
        ?>
      </h1>
        <?php
          if (isset($message)) {
            echo $message;
          }
        ?>
        <form class="form" method="post" action="/phpmotors/vehicles/index.php">
          <label>Select a class car<br>
            <?php echo $classificationsList; ?>
          </label>
          <label for="invMake">Add a maker<br>
            <input
              type="text"
              name="invMake"
              id="invMake"
              required
              <?php
                if(isset($invMake)){
                  echo "value='$invMake'";
                } elseif (isset($invInfo['invMake'])) {
                  echo "value='$invInfo[invMake]'";
                } ?> >
          </label>
          <label for="invModel">Add a model<br>
            <input
              type="text"
              name="invModel"
              id="invModel"
              required
              <?php
                if(isset($invModel)){
                  echo "value='$invModel'";
                } elseif (isset($invInfo['invModel'])) {
                  echo "value='$invInfo[invModel]'";
                }
              ?>
            >
          </label>
          <label for="invDescription">Add a description<br>
            <textarea
              name="invDescription"
              id="invDescription"
              rows="10"
              required
            ><?php
                if(isset($invDescription)){
                  echo $invDescription;
                } elseif (isset($invInfo['invDescription'])) {
                  echo $invInfo['invDescription'];
                }
              ?></textarea>
          </label>
          <label for="invImage">Add an image path<br>
            <input type="text" name="invImage" id="invImage" value="/images/no-image.png" required>
          </label>
          <label for="invThumbnail">Add an image thumbnail<br>
            <input type="text" name="invThumbnail" id="invThumbnail" value="/images/no-image.png" required>
          </label>
          <label for="invPrice">Add the car's price<br>
            <input type="number" name="invPrice" id="invPrice" min="0" step="5"
            required
            <?php
                if(isset($invPrice)){
                  echo "value='$invPrice'";
                } elseif (isset($invInfo['invPrice'])) {
                  echo "value='$invInfo[invPrice]'";
                }
              ?>
            >
          </label>
          <label for="invStock">Add the car's stock<br>
            <input type="number" name="invStock" id="invStock" min="0" step="1"
            required
            <?php
                if(isset($invStock)){
                  echo "value='$invStock'";
                } elseif (isset($invInfo['invStock'])) {
                  echo "value='$invInfo[invStock]'";
                }
              ?>
            >
          </label>
          <label for="invColor">Add a color<br>
            <input type="text" name="invColor" id="invColor" placeholder="E.g. Orange, Black, White, etc."
            required
            <?php
                if(isset($invColor)){
                  echo "value='$invColor'";
                } elseif (isset($invInfo['invColor'])) {
                  echo "value='$invInfo[invColor]'";
                }
              ?>
            >
          </label>
          <input class="submitBtn" type="submit" id="add-vehicle-submit" name="update-vehicle-submit" value="Update vehicle">
          <input type="hidden" name="action" value="updateVehicle">
          <input type="hidden" name="invId" value="<?php
            if(isset($invInfo['invId'])){
              echo $invInfo['invId'];
            } elseif(isset($invId)){
              echo $invId;
              } ?>" >
        </form>
      </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
</body>

</html>