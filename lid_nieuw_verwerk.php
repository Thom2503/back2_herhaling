<?php
  require_once 'session.inc.php';
  //lees het config bestand
  require 'config.inc.php';

  $gender         = $_POST['gender'];
  $first_name     = $_POST['first_name'];
  $last_name      = $_POST['last_name'];
  $birth_date     = $_POST['birth_date'];
  $member_since   = $_POST['member_since'];

  /* eerst alles checken */
  if (strlen($gender) > 0 &&
      strlen($first_name) > 0 &&
      strlen($last_name) > 0 &&
      strlen($birth_date) > 0 &&
      strlen($member_since) > 0)
  {

      //controleer of de data wel correct zijn
      $checkB = strtotime($birth_date);
      $checkM = strtotime($member_since);
      if (date('Y-m-d', $checkB) == $birth_date &&
          date('Y-m-d', $checkM) == $member_since)
      {
        //de query om een nieuw lid toe te voegen
        $query = "INSERT INTO back2_leden
                  (gender, first_name, last_name, birth_date, member_since)
                  VALUES ('$gender', '$first_name', '$last_name', '$birth_date', '$member_since')";

        //voer de query uit
        $resultaat = mysqli_query($mysql, $query);

        //controleer het resultaat
        if ($resultaat)
        {
          header("location:home.php");
          exit;
        } else
        {
          echo "Er is wat mis gegaan met het toevoegen!";
        }
      } else
      {
        //als een van de data niet goed is ingevuld
        echo "Een van de ingevulde data was ongeldig!";
        echo "<p><a href='lid_nieuw.php'> Terug </a> naar nieuw lid toevoegen.</p>";
      }
  } else
  {
    echo "Niet alle velden zijn goed ingevuld!";
    echo "<p><a href='lid_nieuw.php'> Terug </a> naar nieuw lid toevoegen.</p>";
  }
 ?>
