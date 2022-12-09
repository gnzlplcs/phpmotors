<?php
if (!$_SESSION['loggedin']) {
  header('Location: /phpmotors/');
  exit;
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/model/vehicle-model.php';
$invInfo = getInvItemInfo($review['invId']);
$clientData = $_SESSION['clientData'];
$nameToShow = substr($clientData['clientFirstname'], 0, 1) . $clientData['clientLastname'];
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit review | PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/style.css?v=2" media="screen">
</head>

<body>
  <div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
    <main class="content">
      <section class="add-vehicle grid-section">
        <?php
        if (isset($message)) {
          echo $message;
        }
        ?>
        <h1>Edit review for <?php echo $invInfo['invMake']. " " .$invInfo['invModel']; ?></h1>
        <p>Reviewed on <?php echo date("M j, Y", (int) strtotime($review['reviewDate'])); ?></p>
        <form method='post' action='/phpmotors/reviews/' class='form'>
          <label>Name
            <input type='text' disabled value="<?php echo $nameToShow ?>">
          </label>
          <label for='reviewText'>Review
            <textarea name='reviewText' rows='10' disabled><?php echo $review['reviewText']?></textarea>
          </label>
          <input type='submit' class='submitBtn' name='delete-submit' value='Delete review'>
          <input type='hidden' name='action' value='delete-review'>
          <input type='hidden' name='reviewId' value='<?php echo $review['reviewId']; ?>'>
        </form>
      </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
</body>

</html>
<?php unset($_SESSION['message']); ?>