<?php
if (!$_SESSION['loggedin']) {
  header('Location: /phpmotors/index.php');
  exit;
}
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/style.css?v=2" media="screen">
</head>

<body>
  <div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
    <main class="content">
      <section class="admin grid-section">
        <?php
        $clientFirstname = $_SESSION['clientData']['clientFirstname'];
        $clientLastname = $_SESSION['clientData']['clientLastname'];
        $clientEmail = $_SESSION['clientData']['clientEmail'];
        $clientLevel = $_SESSION['clientData']['clientLevel'];
        echo "<h1>$clientFirstname $clientLastname</h1>";
        $userData = '<ul>';
        $userData .= "<li class='clean-li'>Name: $clientFirstname $clientLastname</li>";
        $userData .= "<li class='clean-li'>Email: $clientEmail</li>";
        if ($clientLevel > 1) {
          $userData .= "<li class='clean-li'>Level: $clientLevel</li>";
          $userData .= "<li class='clean-li'><a href='/phpmotors/vehicles/index.php?action=vehicles-man' class='link-onLight'>Vehicle Management</a></li>";
        }
        $userData .= '</ul>';
        echo $userData;
        ?>
      </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
</body>

</html>