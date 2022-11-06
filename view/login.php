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
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
    <main class="content">
      <section class="login grid-section">
        <h1>Sign in</h1>
        <?php
        if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
        }
        ?>
        <form class="form" method="post" action="/phpmotors/accounts/">
          <label for="clientEmail">Email<br>
            <input type="email" name="clientEmail" id="clientEmail" placeholder="john.doe@email.com" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> >
          </label>
          <p class="password--instructions">There must be 8 characters, any of which may be numbers, any may be non-alphanumeric characters, they may be in any order and can include any number of capital and lower case letters.</p>
          <label for="clientPassword">Password<br>
            <input
              type="password"
              name="clientPassword"
              id="clientPassword"
              required
              pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
          </label>
          <input class="submitBtn" type="submit" id="login-submit" value="Sign-in">
          <input type="hidden" name="action" value="Login">
          <a href="/phpmotors/accounts/index.php?action=registration" class="link-onLight">Not a member yet?</a>
        </form>
      </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
</body>

</html>