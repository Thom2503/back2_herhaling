
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Foto toevoegen</title>
  </head>
  <body>
    <?php
      //alle inc files ingevoegd
      require_once 'session.inc.php';

      //zoekt naar een id uit de url
      $id = $_GET['id'];

      if (file_exists(__DIR__ . '/uploads/' . $id . '.jpg'))
      {
        echo "<p><img src='uploads/" . $id . ".jpg' alt='foto'></p>";
      }
     ?>
     <form action="foto_verwerk.php" method="post" enctype="multipart/form-data">
       <input type="hidden" name="id" value="<?php echo $id; ?>">
       <p>
         <label for="foto">Foto:</label>
         <input type="file" name="fotoNaam" id='foto' required>
       </p>
       <p>
         <input type="submit" name="submit" id='submit' value="Uploaden">
         <button onclick="history.back(); return false">Annuleren</button>
       </p>
     </form>
  </body>
</html>
