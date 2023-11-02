<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bot</title>
    <style>
        ul {
            list-style: none;
        }
        li{
            display: inline-block;
        }
    </style>
</head>

<body>
    <form action="handleAddBot.php" method="POST">
        <ul class="ul_add">
            <li class="li_add">
                <label for="">Nhập IP bot cần thêm</label>
            </li>
            <li class="li_add">
                <input type="text" name="ipBot">
            </li>
        </ul>
        <ul class="ul_add">
            <li class="li_add">
                <label for="">Nhập Port</label>
            </li>
            <li class="li_add">
                <input type="text" name="portBot">
            </li>
        </ul>
        <ul class="ul_add">
            <li class="li_add">
                <input type="submit" value="Thêm bot">
            </li>
        </ul>
    </form>
</body>
</html> -->
<?php
    $db = new mysqli('localhost', 'root', '', 'pbl4');
    if (mysqli_connect_errno()) {
        // kiểm tra xem có lỗi khi kết nối đến cơ sở dữ liệu hay không
        exit;
    }
    $ip = $_REQUEST["ip"];
    $port = $_REQUEST["port"];
    $query = "INSERT INTO botes(ip, port) VALUES(?,?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $ip, $port);
    $stmt->execute();
    $db->close();
?>