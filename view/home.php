<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/style.css?v=2" media="screen">
</head>

<body>
  <div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
    <main class="content content-home">
      <section class="hero">
        <h1>Welcome to PHP Motors!</h1>
        <div class="hero__container">
          <div class="hero__description">
            <h3>DMC Delorean</h3>
            <p>3 Cup holders</p>
            <p>Superman doors</p>
            <p>Fuzzy dice!</p>
            <div class="hero__btnContainer--two">
              <img src='/phpmotors/images/site/own_today.png' alt="Own Today button" />
            </div>
          </div>
          <div class="hero__imgContainer">
            <img src='/phpmotors/images/vehicles/delorean.jpg' alt="Delorean model outline" />
          </div>
          <div class="hero__btnContainer--one">
            <img src='/phpmotors/images/site/own_today.png' alt="Own Today button" />
          </div>
        </div>
      </section>

      <section class="reviews">
        <h2>DMC Delorean Reviews</h2>
        <ul class="reviews__list">
          <li class="reviews__list--item">"So fast its almost like traveling in time." (4/5)</li>
          <li class="reviews__list--item">"Coolest ride on the road." (4/5)</li>
          <li class="reviews__list--item">"I'm feeling Marty McFly!" (5/5)</li>
          <li class="reviews__list--item">"The most futuristic ride of our day." (4.5/5)</li>
          <li class="reviews__list--item">"80's livin and I love it!" (5/5)</li>
        </ul>
      </section>

      <section class="upgrades">
        <h2>Delorean Upgrades</h2>
        <div class="upgrades__container">
          <div class="upgrade">
            <div class="upgrade__imgContainer">
              <img src="/phpmotors/images/upgrades/flux-cap.png" alt="Flux cap diagram">
            </div>
            <a href="#" class="link-onLight">Flux Capacitor</a>
          </div>
          <div class="upgrade">
            <div class="upgrade__imgContainer">
              <img src="/phpmotors/images/upgrades/flame.jpg" alt="Big and orange flame">
            </div>
            <a href="#" class="link-onLight">Flame Decals</a>
          </div>
          <div class="upgrade">
            <div class="upgrade__imgContainer">
              <img src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="Bumper sticker">
            </div>
            <a href="#" class="link-onLight">Bumper Stickers</a>
          </div>
          <div class="upgrade">
            <div class="upgrade__imgContainer">
              <img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="Silver hub cap image">
            </div>
            <a href="#" class="link-onLight">Hub Caps</a>
          </div>
        </div>
      </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
</body>

</html>