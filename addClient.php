<?php
   $db = new mysqli('localhost', 'root','', 'pbl4');
   if(mysqli_connect_errno()) {  
      // kiểm tra xem có lỗi khi kết nối đến cơ sở dữ liệu hay không
      exit;
   }
   $ip = $_POST["ip"];
   $port= $_POST["port"];
   $query = "INSERT INTO botes(ip, port) VALUES(?,?)";
   $stmt = $db->prepare($query);
   $stmt->bind_param('ss',$ip,$port);
   $stmt->execute();
   $db->close();
?>