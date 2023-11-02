
<?php
if(isset($_POST['ip']) && isset($_POST['port']) && !empty($_POST['ip']) && !empty($_POST['port'])){
	$ip = $_POST['ip'];
	$port = $_POST['port'];
	$db = new mysqli('localhost', 'root','', 'pbl4');
	if(mysqli_connect_errno()) exit;
	//-- fetch command from server
	$query = "SELECT cmd FROM botes WHERE ip=? AND port=?";
	$stmt = $db->prepare($query);
	$stmt->bind_param('s',$ip,$port);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($cmd);
	$stmt->fetch();			
	echo $cmd;	
	//-- then remove command from server
	$queryupdate = "UPDATE botes SET cmd='nocmd' WHERE ip=? AND port=?";
		// set lại "nocmd" vì vòng while(true) trong Program.cs -> Không ghi đè file retString
	$stmtupdate = $db->prepare($queryupdate);
	$stmtupdate->bind_param('ss',$ip,$port); 
	$stmtupdate->execute();	
	$db->close();	
}
