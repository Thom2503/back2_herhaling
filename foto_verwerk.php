<?php
// if (isset($_POST['submit']))
// {
//   //alle inc files ingevoegd
//   require_once 'session.inc.php';
//
//   //lees het bestand wat in de form word gegeven
//   // $bestand = $_FILES['fotoNaam'];
//   //had gegoogled waarom de eerste niet werkte en kwam er achter dat ik dit moest gebruiken
//   $bestand = (isset($_FILES['fotoNaam']) ? $_FILES['fotoNaam'] : null);
//
//   //test een dump van de file
//   echo "<pre>";
//   var_dump($bestand);
//   echo "</pre>";
// }
//controleer of de upload goed is gegaan
if (isset($_FILES['fotoNaam']) && $_FILES['fotoNaam']['error'] == 0)
{
  if ($_FILES['fotoNaam']['type'] == 'image/jpg' ||
      $_FILES['fotoNaam']['type'] == 'image/jpeg' ||
      $_FILES['fotoNaam']['type'] == 'image/pjepg')
  {
      //wat is de fysieke map voor de foto's
      $map = __DIR__ . "/uploads/";

      //om de foto aan een persoon te koppelen
      $bestand = $_POST['id']. '.jpg';

      //verplaats de upload naar de map met de juiste naam
      move_uploaded_file($_FILES['fotoNaam']['tmp_name'], $map . $bestand);

      //stuur de gebruiker terug naar de fotopagina
      header("location:foto.php?id=". $_POST['id']);
  } else
  {
    //als het een verkeerde type bestand is
    echo "<p>Het bestand is van het verkeerde type</p>";
  }
} else
{
  //als het niet goed gegaan is met het uploaden
  echo "<p> Er is iets fout gegaan met het uploaden</p>";
}

?>
