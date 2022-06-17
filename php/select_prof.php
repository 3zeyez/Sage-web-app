<?php
  if (isset($_POST['supp'])) {
    include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supprimer un professeur</title>
  <link rel="stylesheet" href="/css/style.css">
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
      <h2>Supprimer un professeur</h2>
      <form action="/php/supp_prof.php" method="post">
        <table class="center">
          <?php
            $np = $_POST['prof'];
            $req = "SELECT idprof, np FROM prof WHERE np like '%$np%';";
            $res = mysqli_query($conn, $req);

            $i = 1;
            while ($t = mysqli_fetch_array($res)) {
              echo "<tr><td><span class='c$i'>$t[1]</span></td><td><input type='checkbox' name='c$i' class='c$i' value='$t[0]' onclick='cross(\"c$i\");'>";
              $i++;
            }
          ?>
          <tr>
            <td colspan="2"><input type="submit" name="supp" value="Confirmer"></td>
          </tr>
        </table>
      </form>
    </section>
  </div>

  <script src="/js/script.js"></script>
</body>
</html>

<?php
  }
?>