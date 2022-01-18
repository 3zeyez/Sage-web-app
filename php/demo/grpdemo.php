<?php
$server = 'localhost';
$user = 'root';
$pwd = '';
$dbname = 'galois';

$conn = mysqli_connect($server, $user, $pwd, $dbname);
if (!$conn) {
  die("Connection echoue " . mysqli_connect_error());
} else {
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
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
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
          <a href="#"><i class="fab fa-linkedin"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-github"></i></a>
        </div>
      </nav>

      <section class="main_content">
        <h2>Ajouter un nouveau groupe</h2>
        <form action="" method="POST">
          <table class="center">
            <tr>
              <td>Nom du groupe</td>
              <td><input type="text" name="grpname" id="grpname" placeholder="Nom du groupe" disabled required></td>
              <td><input type="button" name="change" style="width: auto;" value="Changer nom du groupe"></td>
            </tr>
            <tr>
              <td>Niveau:</td>
              <td>
                <div id="niv">
                  <input type="radio" name="niv" id="niv" value="1">1
                  <input type="radio" name="niv" id="niv" value="2">2
                  <input type="radio" name="niv" id="niv" value="3">3
                  <input type="radio" name="niv" id="niv" value="4">4
                </div>
              </td>
              <td></td>
            </tr>
            <tr>
              <td>Matière:</td>
              <td>
                <select name="mat" id="mat">
                  <?php
                  $query = "SELECT * FROM mat;";
                  $res = mysqli_query($conn, $query);

                  echo "<option value='0' selected>---------------</option>";

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
              <td><input type="button" name="confirm" id="confirm" value="Confirmer votre choix" style="width: auto;"></td>
            </tr>
            <tr>
              <td>Professeur:</td>
              <td>
                <select name="prfname" id="prfname" disabled>
                  <option value='0' selected>---------------</option>
                </select>
              </td>
              <td></td>
            </tr>
            <tr>
              <td>Liste des élèves:</td>
              <td>
                <select name="eleves" id="eleves" multiple disabled>

                </select>
              </td>
              <td><button id="add">+</button></td>
            </tr>
            <tr>
              <td></td>
              <td>
                <input type="reset" name="annuler" value="Annuler">
              </td>
              <td>
                <input type="submit" name="ajout" value="Ajouter">
              </td>
            </tr>
          </table>
        </form>
      </section>

  </body>

  </html>
<?php
}
?>