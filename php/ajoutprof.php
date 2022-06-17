<?php
if (isset($_POST['submit'])) {
  $server = "localhost";
  $root = "root";
  $password = "";
  $database = "galois";

  $conn = mysqli_connect($server, $root, $password, $database);
  if (!$conn) {
    die("connection echoue!!!" . mysqli_connect_error());
  }

  $query = "SELECT * FROM prof";
  $res = mysqli_query($conn, $query);

  if (mysqli_num_rows($res) == 0) {
    $idprof = 'P001';
  } else {
    while ($t = mysqli_fetch_array($res)) {
      $idprof = $t['idprof'];
    }
    $num = strval(intval(substr($idprof, 1, strlen($idprof) - 1)) + 1);

    while (strlen($num) != 3) {
      $num = '0' . $num;
    }

    $idprof = 'P' . $num;
  }

  $np = $_POST['nom'] . ' ' . $_POST['pr'];
  $mat = intval($_POST['mat']);
  $tel = $_POST['tel'];

  $query1 = "INSERT INTO prof VALUES('$idprof', '$np', '$tel', '$mat');";
  $res1 = mysqli_query($conn, $query1);

  if ($res1) {
?>

    <script>
      window.location.href = '/html/conf_prof.html';
    </script>

  <?php
  } else {
  ?>

    <script>
      window.location.href = '/html/echec_prof.html';
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

</html>
