<?php
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Management | PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/style.css?ts=<?= time() ?>" media="screen">
</head>

<body>
  <div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
    <main class="content">
      <section class="section">

        <h1>Image Management</h1>
        <h2>Add New Vehicle Image</h2>
        <?php
        if (isset($message)) {
          echo $message;
        } ?>

        <form class="form" action="/phpmotors/uploads/" method="post" enctype="multipart/form-data">
          <label for="invItem">Vehicle</label>
          <?php echo $prodSelect; ?>
          <fieldset class="fieldsetForm">
            <label>Is this the main image for the vehicle?</label><br>
            <label for="priYes" class="pImage">Yes<input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1"></label>
            <br>
            <label for="priNo" class="pImage">No&nbsp;<input type="radio" name="imgPrimary" id="priNo" class="pImage" checked value="0"></label>
          </fieldset>
          <label>Upload Image:</label>
          <input type="file" name="file1">
          <input class="submitBtn" type="submit" class="regbtn" value="Upload">
          <input type="hidden" name="action" value="upload">
        </form>
      </section>
      <hr>
      <section class="section">

        <h2>Existing Images</h2>
        <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
        <?php
        if (isset($imageDisplay)) {
          echo $imageDisplay;
        } ?>
      </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
</body>

</html>
<?php unset($_SESSION['message']); ?>