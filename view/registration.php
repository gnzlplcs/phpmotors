<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration | PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/style.css?v=2" media="screen">
</head>

<body>
  <div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
    <main class="content">
      <section class="registration">
        <h1>Registration</h1>
        <?php
        if (isset($message)) {
          echo $message;
        }
        ?>
        <form class="form" method="post" action="/phpmotors/accounts/index.php">
          <label for="registration-firstname">First name<br>
            <input type="text" name="clientFirstname" id="registration-firstname" placeholder="John" required>
          </label>
          <label for="registration-lastname">Last name<br>
            <input type="text" name="clientLastname" id="registration-lastname" placeholder="Doe" required>
          </label>
          <label for="registration-email">Email<br>
            <input type="email" name="clientEmail" id="registration-email" placeholder="john.doe@email.com" required>
          </label>
          <p class="registration-password--instructions">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter, and 1 special character</p>
          <label for="registration-password">Password<br>
            <input type="password" name="clientPassword" id="registration-password" placeholder="Enter a password" required>
          </label>
          <a class="link-onLight" href="#">Show password</a>
          <input class="submitBtn" type="submit" id="registration-submit" name="submit" value="Register">
          <!-- Add the action name - value pair -->
          <input type="hidden" name="action" value="register">
          <a href="/phpmotors/accounts/index.php?action=login" class="link-onLight">Already have an account? <strong>Log in</strong></a>
        </form>
      </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
</body>

</html>