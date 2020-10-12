<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log in</title>
  </head>
  <body>
    <?php
      if(isset($_POST['submit'])) {
        require "config.inc.php";

        //zoekt de wachtwoorden in de form in de html
        $gebruikersnaam = $_POST['username'];
        $wachtwoord = $_POST['password'];

        //maakt er strings van zonder gekke tekens
        $username = $gebruikersnaam;
        $username = mysqli_real_escape_string($mysql, $username);

        $password = $wachtwoord;
        $password = mysqli_real_escape_string($mysql, $password);

        //de query om de gebruiker te zoeken in de database
        $query = "SELECT * FROM back2_users WHERE username = '$username' AND password = '".md5($password)."'";

        if (strlen($username) > 0 &&
            strlen($password) > 0)
        {
          //resultaat als de user gevonden is in de db
          $resultaat = mysqli_query($mysql, $query);

          //checked of het resultaat overeenkomt
          if (!$resultaat || mysqli_num_rows($resultaat) > 0)
          {
            //start een session om altijd te kunnen checken wie er in gelogd is.
            session_start();

            $_SESSION['username'] = $username;

            header("location:home.php");
          } else
          {
            echo "<p>Naam en/of wachtwoord zijn onjuist ingevoerd!</p>";
            echo "<p><a href='index.php'>ga terug</a></p>";
          }
        } else
        {
          echo "<p> De velden zijn leeg!";
          echo "<p><a href='index.php'>Terug</a> naar inlog pagina.</p>";
        }
      }
     ?>
     <form method="post">
       <p>
         <label for="username">Gebruiker:</label>
         <input type="text" name="username" id="username" required>
       </p>
       <p>
         <label for="password">Wachtwoord:</label>
         <input type="password" name="password" id="password" required>
       </p>
       <p>
         <input type="submit" name="submit" id="submit" value="Inloggen">
       </p>
     </form>
  </body>
</html>
