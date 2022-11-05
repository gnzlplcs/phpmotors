<header class="header">
  <img src="/phpmotors/images/site/logo.png" alt="PHP Motors logo">
  <div class="header__login">
    <?php  if(isset($cookieFirstname)) {
      echo "<span>Welcome $cookieFirstname | </span>";
    }?>
    <a href="/phpmotors/accounts/index.php?action=login" class="link-onLight">My Account</a>
  </div>
</header>