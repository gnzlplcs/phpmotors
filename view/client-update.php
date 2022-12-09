<?php
if (!$_SESSION['loggedin']) {
  header('Location: /phpmotors/');
  exit;
}
$clientData = $_SESSION['clientData'];
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
}
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Account | PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/style.css?ts=<?= time() ?>" media="screen">
</head>

<body>
  <div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
    <main class="content">
      <h1>Update account</h1>
      <?php if (isset($message)) { echo $message; } ?>
      <section class="section section-grid">

        <!-- Update account information Form -->
        <form class="form" method="post" action="/phpmotors/accounts/index.php">
          <h2>Update name and email account</h2>
          <label for="clientFirstname">First name
            <input type="text" name="clientFirstname" id="clientFirstname" required <?php if (isset($clientFirstname)){
                echo "value='$clientFirstname'";
              } elseif (isset($clientData['clientFirstname'])) {
                echo "value='$clientData[clientFirstname]'";
              }?> >
          </label>
          <label for="clientLastname">Last name
            <input type="text" name="clientLastname" id="clientLastname" required <?php if (isset($clientLastname)){
                echo "value='$clientLastname'";
              } elseif (isset($clientData['clientLastname'])) {
                echo "value='$clientData[clientLastname]'";
              }?> >
          </label>
          <label for="clientEmail">Email
            <input type="email" name="clientEmail" id="clientEmail" required <?php if (isset($clientEmail)) {
                echo "value='$clientEmail'";
              } elseif (isset($clientData['clientEmail'])) {
                echo "value='$clientData[clientEmail]'";
              } ?> >
          </label>
          <input class="submitBtn" type="submit" name="submit" value="Update changes">
          <input type="hidden" name="action" value="updateClient">
          <input type="hidden" name="clientId" value="<?php if(isset($clientData['clientId'])) {
              echo $clientData['clientId'];
            } elseif (isset($clientId)) {
              echo $clientId;
            } ?>" >
        </form>
      </section>

      <section class="section section-grid">
      <!-- Update password Form -->
      <form class="form" method="post" action="/phpmotors/accounts/index.php">
        <h2>Update password</h2>
        <p class="password--instructions">There must be 8 characters, any of which may be numbers, any may be non-alphanumeric characters, they may be in any order and can include any number of capital and lower case letters.</p>
        <label for="clientPassword">New password
          <input type="password" name="clientPassword" id="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="Enter a new password" >
        </label>
        <input class="submitBtn" type="submit" name="submit" value="Update password">
        <input type="hidden" name="action" value="updatePassword">
        <input type="hidden" name="clientId" value="<?php if(isset($clientData['clientId'])) {
            echo $clientData['clientId'];
          } elseif ($clientId) {
            echo $clientId;
          } ?>" >

      </section>

      </form>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
</body>

</html>
<?php unset($_SESSION['message']); ?>
