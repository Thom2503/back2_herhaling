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
     <title>Bewerk lid</title>
   </head>
   <body>
     <h1>Lid bewerken met ID: <?php echo $id; ?> </h1>
     <form action="lid_bewerk_verwerk.php" method="post">
       <input type="hidden" name="id" value="<?php echo $id; ?>">
       <p>
         <label>
           <input type="radio" name="gender" id="gender_m" value="M"
           <?php if ($row['gender'] == 'M') {
             echo 'checked="checked"';
           } ?>> Man
         </label>
       </p>
       <p>
         <label>
           <input type="radio" name="gender" id="gender_f" value="F"
           <?php if ($row['gender'] == 'F') {
             echo 'checked="checked"';
           } ?>> Vrouw
         </label>
       </p>
       <p>
        <label for="first_name">Voornaam:</label>
        <input type="text" name="first_name" id='first_name' required
        value=" <?php echo $row['first_name']; ?> ">
       </p>
       <p>
        <label for="last_name">Achternaam:</label>
        <input type="text" name="last_name" id='last_name' required
        value=" <?php echo $row['last_name']; ?> ">
       </p>
       <p>
        <label for="birth_date">Geboortedatum:</label>
        <input type="date" name="birth_date" id='birth_date' required
        value=" <?php echo $row['birth_date']; ?> ">
       </p>
       <p>
        <label for="member_since">Lid sinds:</label>
        <input type="text" name="member_since" id='member_since' required
        value=" <?php echo $row['member_since']; ?> ">
       </p>
       <p>
         <input type="submit" name="submit" id="submit" value="Opslaan">
         <button onclick="history.back(); return false;">Annuleren</button>
       </p>
     </form>
   </body>
 </html>
