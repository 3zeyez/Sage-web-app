<?php
if (isset($_POST['suivant'])) {
  include('connect.php');
  setcookie('prof', $_POST['prof'], time() + (86400 * 30), "/") or die('pb cookie prof');
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un groupe</title>
    <link rel="stylesheet" href="/css/form.css">
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
        <h2>Ajouter un nouveau groupe</h2>
        <form action="/php/grp.php" method="POST">
          <table class="center">
            <tr>
              <td>Liste d'élèves:</td>
              <td>

                <?php
                  if (isset($_COOKIE['niv']) && isset($_COOKIE['section'])) {
                    $niv = $_COOKIE['niv'];
                    if ($_COOKIE['section'] <> 'no section') {
                      $section = $_COOKIE['section'];
                    } else {
                      $section = 0;
                    }
                    
                  } else {
                    die("Niveau et section sont unset!");
                  }

                  // echo $niv . $section;
                  $query = "SELECT * FROM eleve WHERE niveau = '$niv' AND idsec = '$section';";
                  $res = mysqli_query($conn, $query);
                  // echo "it's correct";

                  $n = mysqli_num_rows($res);

                  echo "<select name='eleves[]' size='$n' multiple>";

                  while ($t = mysqli_fetch_array($res)) {
                    $ideleve = $t['ideleve'];
                    $np = $t['np'];

                    echo "<option value='$ideleve'> $np </option>";
                  }

                  echo "</select>";
                ?>
              </td>
            </tr>
            <tr>
              <td style="text-align: center;">
                <input type="reset" name="annuler" id="annuler" value="Annuler">
              </td>
              <td style="text-align: center;">
                <input type="submit" name="suivant" id="suiv" value="Suivant">
              </td>
            </tr>
          </table>
        </form>
      </section>
  </body>

  </html>

  <?php
    # removing cookies
    # setcookie('niv', $niv, time() - 1, "/");
    # setcookie('section', $section, time() - 1, "/"); 
} else {
  ?>

  <script>
    window.location.href = '/';
  </script>

<?php
}
