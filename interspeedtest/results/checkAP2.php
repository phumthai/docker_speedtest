<?php
    session_start();
    function checkap2($ip){
        $servername = '';
        $username = '';
        $password = '';
        $dbname = '';
    $userid = $_SESSION['sUserid'];
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM  WHERE ip='$ip' ORDER BY `time` DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $data;
      while($row = $result->fetch_assoc()) {
        if($userid)
        $data =  $row["apName"];
      }
      return $data;
    } else {
      return "no data";
    }
    $conn->close();
    }


?>