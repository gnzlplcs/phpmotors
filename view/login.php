<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/style.css?v=2" media="screen">
</head>

<body>
  <div class="container">
    <header class="header">
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    </header>
    <nav class="navbar">
      <!-- <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?> -->
      <?php echo $navList; ?>
    </nav>
    <main class="content">
      <section class="login">
        <h1>Sign in</h1>
        <form class="form">
          <?php
          if (isset($message)) {
            echo $message;
          }
          ?>
          <label for="user-email">Email<br>
            <input type="text" name="user-email" id="user-email" placeholder="john.doe@email.com" required>
          </label>
          <label for="user-password">Password<br>
            <input type="password" name="user-password" id="user-password" required>
          </label>
          <input class="submitBtn" type="submit" id="login-submit" value="Sign-in">
          <a href="/phpmotors/accounts/index.php?action=registration" class="link-onLight">Not a member yet?</a>
        </form>
      </section>
    </main>
    <footer class="footer">
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
  </div>
</body>

</html>