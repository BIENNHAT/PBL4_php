<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm Bot</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            /* justify-content: center; */
            text-align: center;
            margin: 18% 0;
        }

        ul {
            list-style: none;
        }

        li {
            display: inline-block;
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <form name="form_search" method="POST" action="handleSearchBot.php">
        <ul class="ul_search">
            <li class="li_search">
                <label for="">Tìm kiếm theo</label>
            </li>
            <li class="li_search">
                <select name="select_search" id="">
                    <option value="ID">ID Bot</option>
                    <option value="ip">IP</option>
                    <option value="port">Port</option>
                    <option value="cmd">Lệnh đã điều khiển</option>
                    <option value="retstr">Đoạn mã trả về cmd</option>
                    <option value="keylogger">Đoạn mã keylogger</option>
                    <option value="cookies">Đoạn mã cookie</option>
            </li>
        </ul>
        <ul class="ul_search">
            <li class="li_search">
                <label for="">Nhập thông tin</label>
            </li>
            <li class="li_search">
                <input type="text" name="infor_search">
            </li>
        </ul>
        <ul class="ul_search">
            <li class="li_search">
                <input type="submit" name="butSearch" value="Tìm kiếm">
            </li>
        </ul>
    </form>
</body>

</html>