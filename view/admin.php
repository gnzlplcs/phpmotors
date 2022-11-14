<?php
if (!$_SESSION['loggedin']) {
  header('Location: /phpmotors/index.php');
  exit;
}
$clientData = $_SESSION['clientData'];
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

      <?php
      $clientFirstname = $clientData['clientFirstname'];
      $clientLastname = $clientData['clientLastname'];
      $clientEmail = $clientData['clientEmail'];
      $clientLevel = $clientData['clientLevel'];
      echo "<section class='admin grid-section'><h1>$clientFirstname $clientLastname</h1>";
      echo "<p>You are logged in</p>";
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
      };
      $userData = '<ul>';
      $userData .= "<li class='clean-li'>Name: $clientFirstname $clientLastname</li>";
      $userData .= "<li class='clean-li'>Email: $clientEmail</li>";
      if ($clientLevel > 1) {
        $userData .= "<li class='clean-li'>Level: $clientLevel</li>";
      }
      $userData .= "<li class='clean-li linkCTA'><a class='link-onLight' href='/phpmotors/accounts/index.php?action=client-update' >Update account information</a></li>";
      $userData .= '</ul></section>';
      echo $userData;
      if ($clientLevel > 1) {
        echo "<section class='admin grid-section'><h2>Admin Zone</h2>";
        $adminZone = "<ul>";
        $adminZone .= "<li class='clean-li'>Click to administer inventory</li>";
        $adminZone .= "<li class='clean-li linkCTA'><a class='link-onLight' href='/phpmotors/vehicles/index.php?action=vehicles-man' >Vehicle Management</a></li>";
        $adminZone .= "</ul></section>";
        echo $adminZone;
      }
      ?>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
</body>

</html>
<?php unset($_SESSION['message']); ?>