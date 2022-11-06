<header class="header">
  <img src="/phpmotors/images/site/logo.png" alt="PHP Motors logo">
  <div class="header__login">
    <?php if (isset($_SESSION['clientData'])) {
      $clientFirstname = $_SESSION['clientData']['clientFirstname'];
      $welcomeMessage = "<span><a href='/phpmotors/accounts/index.php?action=admin' class='link-onLight'>Welcome $clientFirstname</a> | </span>";
      $welcomeMessage .= "<a href='/phpmotors/accounts/index.php?action=Logout' class='link-onLight'>Log out</a>";
      echo $welcomeMessage;
    } else {
      $noLoggedMessage = "<a href='/phpmotors/accounts/index.php?action=login' class='link-onLight'>My Account</a>";
      echo $noLoggedMessage;
    }
    ?>
  </div>
</header>
