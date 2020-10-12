<?php
  require_once 'session.inc.php';
  require "config.inc.php";

  //lees ID uit vanuit het URL
  $id = $_GET['id'];

  //checked of het id een nummer is
  if (is_numeric($id))
  {
    //query voor het zoeken van users in tabel
    $query = "SELECT * FROM back2_leden WHERE id = $id";

    //lees de query
    $resultaat = mysqli_query($mysql, $query);

    //checked of je een resultaat hebt
    if (mysqli_num_rows($resultaat) == 1)
    {
      //lees de dataset als er een lid is gevonden
      $row = mysqli_fetch_array($resultaat);
    } else
    {
      //er is geen lid gevonden met dat ID
      echo "Geen lid gevonden";
      exit;
    }
  } else
  {
    //id was geen nummer
    echo "ID is onjuist";
    exit;
  }

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Lid verwijderen</title>
   </head>
   <body>
     <h1>Lid verwijderen</h1>
     <p>
       Weet je zeker dat je het lid
       <strong> <?php echo $row['first_name']. " " .$row['last_name']; ?></strong>
       wilt verwijderen?
     </p>
     <p>
       <a href="lid_verwijder_verwerk.php?id=<?php echo $id; ?>">Ja, verwijder</a>
       /
       <a href="home.php">Nee, terug</a>
     </p>
   </body>
 </html>
