<?php
  require_once 'session.inc.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lid toevoegen</title>
  </head>
  <body>
    <h1>Nieuw lid inschrijven</h1>
    <form action="lid_nieuw_verwerk.php" method="post">
      <p>
        <label>
        <input type='radio' name='gender' id='gender_m' value='M' checked='checked'>
        Man</label>
        <br>
        <label>
        <input type='radio' name='gender' id='gender_f' value='F'>
        Vrouw</label>
      </p>
      <p>
        <label for="first_name">Voornaam:</label>
        <input type="text" name="first_name" id='first_name' required>
      </p>
      <p>
        <label for="last_name">Achternaam:</label>
        <input type="text" name="last_name" id='last_name' required>
      </p>
      <p>
        <label for="birth_date">Geboortedatum:</label>
        <input type="date" name="birth_date" id='birth_date' required>
      </p>
      <p>
        <label for="member_since">Lid sinds:</label>
        <input type="date" name="member_since" id='member_since' required>
      </p>
      <p>
        <input type="submit" name="submit" id='submit' value='opslaan'>
        <button onclick='history.back(); return false;'>Annuleren</button>
      </p>
    </form>
  </body>
</html>
