<?php
$server = "localhost";
$root = "root";
$password = "";
$database = "galois";

$conn = mysqli_connect($server, $root, $password, $database);
if (!$conn) {
  die("connection echoue!!!" . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un groupe</title>
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/form.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
  <header>
    <h1>Sage scolaire</h1>
  </header>

  <div class="wrapper">
    <nav class="sidebar">
      <ul>
        <a href="home.html">
          <li><i class="fas fa-home"></i>Page d'acceuil</li>
        </a>
        <a href="prof.html">
          <li><i class="fas fa-chalkboard-teacher"></i>Ajouter un professeur</li>
        </a>
        <a href="/php/eleve.php">
          <li><i class="fas fa-user-graduate"></i>Ajouter un élève</li>
        </a>
        <a href="">
          <li><i class="fas fa-trash-alt"></i>Supprimer un professeur</li>
        </a>
        <a href="">
          <li><i class="fas fa-trash"></i>Supprimer un élève</li>
        </a>
        <a href="#">
          <li><i class="fas fa-user"></i>Votre profile</li>
        </a>
        <a href="/index.html">
          <li><i class="fas fa-sign-out-alt"></i>Se déconnecter</li>
        </a>
      </ul>

      <div class="span">Développé par ABBASSI&nbsp;Ahmed&nbsp;Aziz</div>

      <div class="social_media">
        <a href="#"><i class="fab fa-linkedin"></i></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-github"></i></a>
      </div>
    </nav>

    <section class="main_content">
      <h2>Ajouter un nouveau groupe</h2>
      <form action="/php/addgrp2.php" method="POST" class="center">
        <table class="center">
          <!-- <tr>
            <td>
              Niveau:
            </td>
            <td>
              <div id="niveau">
                <input type="radio" name="niv" id="niv" value="1">1
                <input type="radio" name="niv" id="niv" value="2">2
                <input type="radio" name="niv" id="niv" value="3">3
                <input type="radio" name="niv" id="niv" value="4">4
              </div>
            </td>
          </tr> -->
          <tr>
            <td><label for="niv">Niveau scolaire:</label> </td>
            <td>
              <select name="niv" id="niv" onchange="allow();">
                <option value="0">---------------</option>
                <option value="1">1ère</option>
                <option value="2">2éme</option>
                <option value="3">3éme</option>
                <option value="4">4éme</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="section">Section:</label></td>
            <td>
              <select name="section" id="section" disabled>
                <option value="0">---------------</option>
                <option value="1">Sciences informatiques</option>
                <option value="2">Mathématique</option>
                <option value="3">Sciences techniques</option>
                <option value="4">Sciences expérimentales</option>
                <option value="5">Economie et gestion</option>
                <option value="6">Lettres</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Matière:</td>
            <td style="text-align: center;">
              <select name="mat" id="mat" size="4">
                <?php
                $query = "SELECT * FROM mat;";
                $res = mysqli_query($conn, $query);

                // echo "<option value='0' selected>---------------</option>";

                while ($t = mysqli_fetch_array($res)) {
                ?>
                  <?php
                  echo "<option value='" . $t['idmat'] . "'>" . $t['mat'] . "</option>";
                  ?>
                <?php
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td style="text-align: center;">
              <input type="reset" name="annuler" onclick="cancel_eleve();" value="Annuler">
            </td>
            <td style="text-align: center;">
              <input type="submit" name="suivant" value="Suivant" onclick="return check_eleve();">
            </td>
          </tr>
        </table>
      </form>
    </section>

    <script src="/js/script.js"></script>
</body>

</html>