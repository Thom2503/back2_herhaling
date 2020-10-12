<?php
  session_start();

  //controleer of de sesion is opgeslagen
  if (!isset($_SESSION['username']) || strlen($_SESSION['username']) == 0)
  {
    //geen session gevonden word je gelijk terug gestuurd naar de index pagina
    header("location:index.php");
    exit;
  } else
  {
  }
 ?>
