<?php
if (isset($_POST['suivant'])) {
  $server = 'localhost';
  $user = 'root';
  $pwd = '';
  $dbname = 'galois';

  $conn = mysqli_connect($server, $user, $pwd, $dbname);
  if (!$conn) {
    die("Connection echoue " . mysqli_connect_error());
?>

    <script>
      alert("Connection echoue")
      window.location.href = '/php/addgrp1.php';
    </script>

  <?php
  } else {
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
          <form action="/php/addgrp3.php" method="POST">
            <table class="center">
              <tr>
                <td>Professeur:</td>
                <td>

                  <?php
                  $idmat = $_POST['mat'];
                  $query = "SELECT * FROM prof WHERE idmat = '$idmat';";
                  $res = mysqli_query($conn, $query);

                  $n = mysqli_num_rows($res);

                  echo "<select name='prof' size='$n'>";

                  while ($t = mysqli_fetch_array($res)) {
                    $idprof = $t['idprof'];
                    $np = $t['np'];

                    echo "<option value='$idprof'> $np </option>";
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
                  <input type="submit" name="suiv" id="suiv" value="Suivant">
                </td>
              </tr>
            </table>
          </form>
        </section>
    </body>

    </html>

  <?php
  }
} else {
  ?>

  <script>
    window.location.href = '/index.html';
  </script>

<?php
}
