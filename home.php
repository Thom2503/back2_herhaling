<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require_once 'session.inc.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ledenbeheer</title>
  </head>
  <body>
    <h1>Ledenbeheer</h1>
    <h2>Je bent ingelogd als <?php echo $_SESSION['username'] ?></h2>
    <?php
      require_once 'config.inc.php';

      $query = "SELECT * FROM back2_leden ORDER BY last_name";

      $result = mysqli_query($mysql, $query);

      //start tabel
      echo "<table border='1'>";
      //start een tabelrij voor de kopjes
      echo "<tr>";
      //maak de kopjes aan voor de cellen
      echo "<th>ID</th>";
      echo "<th>Geslacht</th>";
      echo "<th>Voornaam</th>";
      echo "<th>Achternaam</th>";
      echo "<th>Geboortedatum</th>";
      echo "<th>Lid sinds</th>";
      echo "<th></th>";
      echo "<th></th>";
      echo "<th></th>";

      //sluit de tabel rij
      echo "</tr>";

      while ($row = mysqli_fetch_array($result))
      {
        //start de tabelrij
        echo "<tr>";

        //maak de cellen van de onderdelen
        echo "<td>". $row['id'] ."</td>";
        echo "<td>". $row['gender'] ."</td>";
        echo "<td>". $row['first_name'] ."</td>";
        echo "<td>". $row['last_name'] ."</td>";
        echo "<td>". $row['birth_date'] ."</td>";
        echo "<td>". $row['member_since'] ."</td>";
        echo "<td><a href='lid_bewerk.php?id=". $row['id'] ."'>Bewerken</a></td>";
        echo "<td><a href='lid_verwijder.php?id=". $row['id'] ."'>Verwijderen</a></td>";
        echo "<td><a href='foto.php?id=".$row['id']."'>Foto</a></td>";

        //Sluit de tabelrij
        echo "</tr>";
      }
      //sluit de tabel
      echo "</table>";
     ?>
     <p><a href="lid_nieuw.php">Lid toevoegen</a></p>
     <p><a href="loguit.php">Loguit</a></p>
  </body>
</html>
