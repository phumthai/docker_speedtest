<?php
  session_start();
  function checkap2(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_REAL_IP'])) {
      $ip = $_SERVER['HTTP_X_REAL_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      $ip = preg_replace('/,.*/', '', $ip); # hosts are comma-separated, client is first
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $servername = '';
    $username = '';
    $password = '';
    $dbname = '';
    $userid = $_SESSION['sUserid'];
    
    $date = date('Ymd');

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
      return "No AP data";
    }
    $conn->close();
  }

  function checktime(){
    return date("Y-m-d h:i:sa");
  }

?>