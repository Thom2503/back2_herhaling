<?php
  require_once 'session.inc.php';
  require "config.inc.php";

  //lees het id uit de url
  $id = $_GET['id'];

  //is het nummer een id?
  if (is_numeric($id))
  {
    //de verwijder query
    $query = "DELETE FROM back2_leden WHERE id = $id";

    //neem het resultaat op
    $resultaat = mysqli_query($mysql, $query);

    //check of er een resultaat is
    if ($resultaat)
    {
      header("location:home.php");
      exit;
    } else
    {
      echo "Er ging wat mis met het verwijderen!";
    }
  } else
  {
    //als er geen id is gevonden
    echo "Onjuist ID";
    exit;
  }
 ?>
