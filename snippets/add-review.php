<?php
  if (isset($_SESSION['clientData'])) {
    $clientData = $_SESSION['clientData'];
    $nameToShow = substr($clientData['clientFirstname'], 0, 1) . $clientData['clientLastname'];
  }
?><section>
  <h2>Customer Reviews</h2>
  <?php
  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
  }
  if (isset($_SESSION['loggedin'])) {
    echo "
      <form method='post' action='/phpmotors/reviews/' class='form'>
        <label for='name'>Name
          <input id='name' type='text' disabled value='$nameToShow' >
        </label>
        <label for='reviewText'>Review
          <textarea id='reviewText' name='reviewText' rows='10' required></textarea>
        </label>
        <input type='submit' class='submitBtn' name='add-review-submit' value='Add review'>
        <input type='hidden' name='action' value='adding-review'>
        <input type='hidden' name='invId' value='$invInfo[invId]'>
        <input type='hidden' name='clientId' value='$clientData[clientId]'>
      </form>";
  } else {
    echo "
      <h4>Please, <u><a href='/phpmotors/accounts/?action=login' class='link-onLight'>Log in</a></u> to add a review</h4>

    ";
  }
  ?>
</section>
<?php unset($_SESSION['message']); ?>