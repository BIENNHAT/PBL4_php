<?php
if(isset($_POST['bot']) && !empty($_POST['bot'])){
	$bot = $_POST['bot'];
	$retstr = $_POST['retstr'];
	$db = new mysqli('localhost', 'root','', 'pbl4');
	if(mysqli_connect_errno()) exit;
	//-- bot sends result to server
	$query = "UPDATE botes SET retstr=? WHERE ip=?";
	$stmt = $db->prepare($query);
	$stmt->bind_param('ss', $retstr, $bot); 
	$stmt->execute();
	$db->close();	
}
