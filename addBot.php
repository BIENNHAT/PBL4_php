<?php
$db = new mysqli('localhost', 'root', '', 'pbl4_v2');
if (mysqli_connect_errno()) {
    // kiểm tra xem có lỗi khi kết nối đến cơ sở dữ liệu hay không
    exit;
}
$ip = $_REQUEST["ip"];
$port = $_REQUEST["port"];

$check_exist_list_bot = 'SELECT * FROM botes where ip="' . $ip . '" and port=' . $port . ';';

$rs_check_exist_list_bot = $db->query($check_exist_list_bot);

if ($rs_check_exist_list_bot->num_rows > 0) {

    $query = '  UPDATE botes
                SET status = 1, remove = 0
                where ip="' . $ip . '" and port=' . $port . ';';
    $db->query($query);
} else {
    $query = "INSERT INTO botes(ip, port, status, remove ) VALUES(?,?, 1, 0)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $ip, $port);
    $stmt->execute();
}
$db->close();
?>