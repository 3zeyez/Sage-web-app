<?php
  if (isset($_POST['supp'])) {
    include('connect.php');

    $affected = 0;
    foreach ($_POST as $idprof) {
      $req = "DELETE FROM prof WHERE idprof = '$idprof';";
      $res = mysqli_query($conn, $req);

      if (mysqli_affected_rows($conn)) {
        $affected++;
      }
    }

    if ($affected == count($_POST) - 1) {
      ?>
        <script>window.location.href = '/html/supp_prof_done.html';</script>
      <?php
    } else {
      ?>
        <script>window.location.href = '/html/supp_prof_echec.html';</script>
      <?php
    }
  }
?>