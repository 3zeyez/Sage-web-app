<?php
if (isset($_POST['suivant'])) {
  include('connect.php');
  $eleves = $_POST['eleves'];

  if (isset($_COOKIE['niv']) && isset($_COOKIE['section'])
    && isset($_COOKIE['mat']) && isset($_COOKIE['prof'])) {
      $niv = $_COOKIE['niv'];
      $idprof = $_COOKIE['prof'];
      $idmat = $_COOKIE['mat'];

      $req = "SELECT np FROM prof WHERE idprof='$idprof';";
      $res = mysqli_query($conn, $req);

      $nomprof = mysqli_fetch_array($res)[0];

      $req = "SELECT mat FROM mat WHERE idmat='$idmat';";
      $res = mysqli_query($conn, $req);

      $mat = mysqli_fetch_array($res)[0];

      if ($niv == '1') {
        $nomgrp = $niv.'ere ';
      } else {
        $idsec = $_COOKIE['section'];

        $req = "SELECT sec FROM section WHERE idsec='$idsec';";
        $res = mysqli_query($conn, $req);

        $section = mysqli_fetch_array($res)[0];

        $nomgrp = $niv.'eme '.$section.' ';
      }

      $nomgrp .= '- '.$mat.' - '.$nomprof.' - groupe 1';

      $req = "SELECT * from grps;";
      $res = mysqli_query($conn, $req);

      $n = mysqli_num_rows($res);

      if ($n == 0) {
        $idgrp = 'G001';
      } else {
        while ($t = mysqli_fetch_array($res)) {
          $idgrp = $t[0];
          if ($t[1] == $nomgrp) {
            $numgrp = strval(intval($nomgrp[strlen($nomgrp) - 1]));
            $nomgrp = substr($nomgrp, 0, strlen($nomgrp) - 1) . $numgrp;
          }
        }
        $num = strval(intval(substr($idgrp, 1, strlen($idgrp) - 1)) + 1);

		    while (strlen($num) != 3) {
			    $num = '0' . $num;
		    }

        $idgrp = 'G' . $num;
      }

      $req = "INSERT INTO grps VALUES('$idgrp', '$nomgrp');";
      $res = mysqli_query($conn, $req);

      $added = False;
      if (mysqli_affected_rows($conn) == 1) {
        foreach ($eleves as $eleve) {
          $req = "INSERT INTO grp VALUES('$idgrp', '$idprof', '$eleve');";
          $res = mysqli_query($conn, $req);

          if (mysqli_affected_rows($conn) == 1) {
            $added = True;
          }
        }
      }
  }

  if ($added) {
    ?>
      <script>window.location.href = '/html/conf_grp.html';</script>
    <?php
  } else {
    ?>
      <script>window.location.href = '/html/echou_grp.html';</script>
    <?php
  }
} else {
?>
<script>window.location.href = '/';</script>
<?php
}
?>