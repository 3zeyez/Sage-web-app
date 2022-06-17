<?php
session_start();

if (isset($_POST['connecter'])) {
  include('connect.php');

  $user = $_POST['user'];
  $pwd = $_POST['pwd'];

  $_SESSION['user'] = $user;
  $_SESSION['pwd'] = $pwd;

  $query = "SELECT * FROM user WHERE username = '$user'";
  $res = mysqli_query($conn, $query);

  if (mysqli_num_rows($res) == 0) {
?>

    <script>
      alert("Non d'utilisateur non trouvé!");
      window.location.href = "/index.html";
    </script>

    <?php
  } else {
    $t = mysqli_fetch_array($res);
    if ($t['pwd'] != $pwd) {
    ?>

      <script>
        alert("Mot de passe incorrect!");
        window.location.href = "/index.html";
      </script>

    <?php
    } else {
    ?>
      <script>
        window.location.href = '/html/home.html';
      </script>

    <?php
    }
  }
} else if (isset($_SESSION['user'])) {
  include('connect.php');

  $usersession = $_SESSION['user'];
  $pwdsession = $_SESSION['pwd'];

  $query1 = "SELECT * FROM user WHERE username = '$usersession' AND pwd = '$pwdsession';";
  $res1 = mysqli_query($conn, $query1);

  if (mysqli_num_rows($res1) == 1) {
    ?>

    <script>
      window.location.href = '/html/home.html';
    </script>

  <?php
  }
} else {
  ?>

  <script>
    window.location.href = '/index.html';
  </script>

<?php
}
?>