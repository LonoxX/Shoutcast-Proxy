<?php 
  header('Content-Type: audio/mpeg');
  if (isset($_SERVER['HTTP_ORIGIN'])) {
      header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
  }
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
      if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
          header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");         
      if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
          header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
  }
  $server = "IP";
  $port = "PORT";

  $url = "http://".$server.":".$port;
  $f=fopen($url,'r');
  if(!$f) exit;
  while(!feof($f)){
    echo fread($f,128);  
    flush();
  }
  fclose($f);
?>