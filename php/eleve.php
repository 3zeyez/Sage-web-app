<?php
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un élève</title>
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/form.css">
  <script src="https://kit.fontawesome.com/53b45ec73e.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <h1>Sage scolaire</h1>
  </header>

  <div class="wrapper">
  <nav class="sidebar">
      <ul>
        <a href="/html/home.html">
          <li><i class="fas fa-home"></i>Page d'acceuil</li>
        </a>
        <a href="/html/prof.html">
          <li><i class="fas fa-chalkboard-teacher"></i>Ajouter un professeur</li>
        </a>
        <a href="/php/eleve.php">
          <li><i class="fas fa-user-graduate"></i>Ajouter un élève</li>
        </a>
        <a href="/php/addgrp1.php">
          <li><i class="fa-solid fa-people-group"></i>Ajouter un groupe</li>
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
        <a href="/php/logout.php">
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
      <h2>Ajouter un élève</h2>
      <form action="/php/ajouteleve.php" method="post" onsubmit="return check_eleve();">
        <table class="center">
          <tr>
            <td><label for="nom">Nom:</label></td>
            <td><input type="text" id="nom" name="nom" placeholder="Nom" required></td>
          </tr>
          <tr>
            <td><label for="pr">Prénom:</label></td>
            <td><input type="text" name="pr" id="pr" placeholder="Prénom" required></td>
          </tr>
          <tr>
            <td><label for="niv">Niveau scolaire:</label>    </td>
            <td>
              <select name="niv" id="niv" onchange="allow();" required>
                <option value="">---------------</option>
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
              <select name="section" id="section" required disabled>
                <option value="">---------------</option>
                <option value="1">Sciences informatiques</option>
                <option value="2">Mathématique</option>
                <option value="3">Sciences techniques</option>
                <option value="4">Sciences expérimentales</option>
                <option value="5">Economie et gestion</option>
                <option value="6">Lettres</option>
              </select>
            </td>
          </tr>
          <!-- <tr>
            <td>Matières:
              <br>(Appuyer sur alt ou ctrl<br> pour un chois multiple)
            </td>
            <td>
              <select name="mat" id="mat" size="4" multiple onfocus="mat();">
                <option value="1">Informatique</option>
                <option value="2">Mathématique</option>
                <option value="3">Physique</option>
                <option value="4">Science naturelle</option>
              </select>
            </td>
          </tr>
        </table>
        <table class="center" style="border: 2px solid black;">
          <?php
          $query = "SELECT * FROM prof WHERE idmat = 1;";
          $res = mysqli_query($conn, $query);

          echo "<tr><td colspan='2' style='text-align: center;'><h2>choisir vos professeurs</h2>";
          echo "<br>(Appuyer sur alt ou ctrl pour un chois multiple)</td></tr>";
          echo "<tr><td>Matière</td><td>Les professeurs</td></tr>";

          $n = mysqli_num_rows($res);

          if ($res && $n > 0) {
            echo "<tr><td>Informatique</td><td><select size='" . $n . "' multiple>";

            while ($t = mysqli_fetch_array($res)) {
              echo "<option value='" . $t['np'] . "'>" . $t['np'] . "</option>";
            }
            echo "<select></td></tr>";
          }

          $query = "SELECT * FROM prof WHERE idmat = 2;";
          $res = mysqli_query($conn, $query);

          $n = mysqli_num_rows($res);

          if ($res && $n > 0) {
            echo "<tr><td>Mathématique</td><td><select size='" . $n . "' multiple>";

            while ($t = mysqli_fetch_array($res)) {
              echo "<option value='" . $t['np'] . "'>" . $t['np'] . "</option>";
            }
            echo "<select></td></tr>";
          }

          $query = "SELECT * FROM prof WHERE idmat = 3;";
          $res = mysqli_query($conn, $query);

          $n = mysqli_num_rows($res);

          if ($res && $n > 0) {
            echo "<tr><td>Physique</td><td><select size='" . $n . "' multiple>";

            while ($t = mysqli_fetch_array($res)) {
              echo "<option value='" . $t['np'] . "'>" . $t['np'] . "</option>";
            }
            echo "<select></td></tr>";
          }

          $query = "SELECT * FROM prof WHERE idmat = 4;";
          $res = mysqli_query($conn, $query);

          $n = mysqli_num_rows($res);

          if ($res && $n > 0) {
            echo "<tr><td>Science</td><td><select size='" . $n . "' multiple>";

            while ($t = mysqli_fetch_array($res)) {
              echo "<option value='" . $t['np'] . "'>" . $t['np'] . "</option>";
            }
            echo "<select></td></tr>";
          }
          ?>
        </table>
        <table class="center">
        -->

          <tr>
            <td>Numéro du téléphone:</td>
            <td>
              <input type="tel" name="tel" id="tel" required pattern="[2-9]{1}[0-9]{7}">
            </td>
          </tr>

          <tr>
            <td style="text-align: center;">
              <input type="reset" name="reset" id="reset" value="Annuler" onclick="cancel_eleve();">
            </td>
            <td style="text-align: center;">
              <input type="submit" name="submit" value="Ajouter">
            </td>
          </tr>
        </table>
      </form>
    </section>
  </div>
  <script src="/js/script.js"></script>
</body>

</html>