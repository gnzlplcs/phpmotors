<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Template | PHP Motors</title>
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
      <h1>Content goes here</h1>
    </main>
    <footer class="footer">
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
  </div>
</body>

</html>