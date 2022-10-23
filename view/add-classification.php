<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Classification | PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/style.css?v=2" media="screen">
</head>

<body>
  <div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
    <main class="content">
      <h1>Add Classification</h1>
      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <form class="form" method="post" action="/phpmotors/vehicles/index.php">
        <label for="classificationName">Add a new car classification
          <input type="text" placeholder="E.g. School Bus, Family Car" id="classificationName" name="classificationName">
        </label>
        <input class="submitBtn" type="submit" id="add-classification-submit" name="add-classification-submit" value="Add Classification">
        <input type="hidden" name="action" value="adding-classification">
      </form>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
</body>

</html>