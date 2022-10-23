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
      <section class="vehicle-man">
        <h1>Vehicles Management</h1>
        <?php
        if (isset($message)) {
          echo $message;
        }
        ?>
        <ul>
          <li><a href="/phpmotors/vehicles/index.php?action=add-classification">Add Classification</a></li>
          <li><a href="/phpmotors/vehicles/index.php?action=add-vehicle">Add Vehicle</a></li>
        </ul>
      </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
</body>

</html>