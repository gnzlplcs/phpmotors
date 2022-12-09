<?php
  $classificationsList = '<select name="carClassification" required>';
  $classificationsList .= '<option value="" disabled >Choose an option</option>';
  foreach ($classifications as $classification) {
    $classificationsList .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
      if($classification['classificationId'] == $classificationId) {
        $classificationsList .= ' selected ';
      };
    };
    $classificationsList .=  ">$classification[classificationName]</option>";
  }
  $classificationsList .= '</select>';
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Vehicle | PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/style.css?ts=<?= time() ?>" media="screen">
</head>

<body>
  <div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
    <main class="content">
      <section class="add-vehicle section grid-section">
        <h1>Add Vehicle</h1>
        <?php
        if (isset($message)) {
          echo $message;
        }
        ?>
        <form class="form" method="post" action="/phpmotors/vehicles/index.php">
          <label>Select a class car. <br>(If the class is not in the list, <a href="/phpmotors/vehicles/index.php?action=add-classification" class="link-onLight">Click here to add a new class</a>)<br>
            <?php echo $classificationsList; ?>
          </label>
          <label for="invMake">Add a maker<br>
            <input
              type="text"
              name="invMake"
              id="invMake"
              placeholder="E.g. Ford, GMC, Jeep, etc."
              required
              <?php if(isset($invMake)){echo "value='$invMake'";} ?>
            >
          </label>
          <label for="invModel">Add a model<br>
            <input
              type="text"
              name="invModel"
              id="invModel"
              placeholder="E.g. Ranger, Cherokee, etc."
              required
              <?php if(isset($invModel)){echo "value='$invModel'";} ?>
            >
          </label>
          <label for="invDescription">Add a description<br>
            <textarea
              name="invDescription"
              id="invDescription"
              rows="10"
              required
            ><?php if(isset($invDescription)){echo $invDescription;} ?></textarea>
          </label>
          <label for="invImage">Add an image path<br>
            <input type="text" name="invImage" id="invImage" value="/phpmotors/images/vehicles/no-image.png" required>
          </label>
          <label for="invThumbnail">Add an image thumbnail<br>
            <input type="text" name="invThumbnail" id="invThumbnail" value="/phpmotors/images/vehicles/no-image.png" required>
          </label>
          <label for="invPrice">Add the car's price<br>
            <input type="number" name="invPrice" id="invPrice" min="0" step="5"
            required
            <?php if(isset($invPrice)){echo "value='$invPrice'";} ?>
            >
          </label>
          <label for="invStock">Add the car's stock<br>
            <input type="number" name="invStock" id="invStock" min="0" step="1"
            required
            <?php if(isset($invStock)){echo "value='$invStock'";} ?>
            >
          </label>
          <label for="invColor">Add a color<br>
            <input type="text" name="invColor" id="invColor" placeholder="E.g. Orange, Black, White, etc."
            required
            <?php if(isset($invColor)){echo "value='$invColor'";} ?>
            >
          </label>
          <input class="submitBtn" type="submit" id="add-vehicle-submit" name="add-vehicle-submit" value="Add vehicle">
          <input type="hidden" name="action" value="adding-vehicle">
        </form>
      </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
</body>

</html>