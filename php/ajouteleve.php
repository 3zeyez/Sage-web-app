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

	$query = "SELECT ideleve FROM eleve";
	$res = mysqli_query($conn, $query);

	$n = mysqli_num_rows($res);

	if ($n == 0) {
		$ideleve = 'E001';
	} else {
		while ($t = mysqli_fetch_array($res)) {
			$ideleve = $t['ideleve'];
		}
		$num = strval(intval(substr($ideleve, 1, strlen($ideleve) - 1)) + 1);

		while (strlen($num) != 3) {
			$num = '0' . $num;
		}

		$ideleve = 'E' . $num;
	}

	$np = $_POST['nom'] . ' ' . $_POST['pr'];
	$niv = $_POST['niv'];
	$section = $_POST['section'];
	$tel = $_POST['tel'];

	echo $section;

	if ($section <> '') {
		$query1 = "INSERT INTO eleve VALUES('$ideleve', '$np', '$niv', '$section', '$tel');";
		$res1 = mysqli_query($conn, $query1);
	} else {
		$query1 = "INSERT INTO eleve VALUES('$ideleve', '$np', '$niv', 0, '$tel');";
		$res1 = mysqli_query($conn, $query1);
	}
	 
	
	if ($res1) {
?>

		<script>
			window.location.href = '/html/conf_eleve.html';
		</script>

	<?php
	} else {
	?>

		<script>
			window.location.href = '/html/echec_eleve.html';
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