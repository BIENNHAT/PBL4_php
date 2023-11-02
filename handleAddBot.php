<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4");
        $ip = $_POST["ipBot"];
        $port = $_POST["portBot"];
        $sqlInsert = "INSERT INTO botes(ip, port) VALUES ('$ip','$port')";
            mysqli_query($link, $sqlInsert);
        }
    mysqli_close($link);
    header("Location: ../php/index.php");
