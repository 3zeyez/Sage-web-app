<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Information d'un élève</title>
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
      <table class="center bord">


        <?php
        $server = "localhost";
        $user = "root";
        $pwd = "";
        $dbname = "galois";

        $conn = mysqli_connect($server, $user, $pwd, $dbname);
        if (!$conn) {
          die("connection echoue!!!!" . mysqli_connect_error());
        }

        if (isset($_POST['submit'])) {
        ?>


          <?php
          $np = $_POST['submit'];
          $query = "SELECT * FROM eleve WHERE np = '$np';";
          $res = mysqli_query($conn, $query);

          if ($res) {
            $t = mysqli_fetch_array($res);
          ?>
            <tr>
              <th style="color: #fff; background: #000;" colspan="2">
                Information d'élève
              </th>
            </tr>

            <tr>
              <td>Nom et prénom:</td>
              <td>
                <?php
                echo $t['np'];
                ?>
              </td>
            </tr>

            <tr>
              <td>Numero du téléphone:</td>
              <td>
                <?php echo $t['tel']; ?>
              </td>
            </tr>

            <tr>
              <td>Niveau scolaire:</td>
              <td>
                <?php
                if ($t['niveau'] == 1) {
                  echo $t['niveau'] . "ère";
                } else {
                  echo $t['niveau'] . "<sup>ème</sup> " . $t['section'];
                }
                ?>
              </td>
            </tr>
          <?php
          }
          ?>

          <tr>
            <td colspan="4" style="text-align: center; border: none">
              <a href="/html/home.html">
                <input type="button" name="return" id="return" value="Retour">
              </a>
            </td>
          </tr>

        <?php
        } else {
        ?>

          <script>
            window.location.href = '/php/afficher.php';
          </script>

        <?php
        }
        ?>
      </table>
    </section>
  </div>

</body>

</html>