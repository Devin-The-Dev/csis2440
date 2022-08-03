<?php
session_start();

//DB Connections
  if ($_SERVER['HTTP_HOST'] == 'localhost')
  {
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '1550');
    define('DB', 'catalog');
  }
  else
  {
    define('HOST', 'localhost');
    define('USER', 'devintor_myself');
    define('PASS', '?XV8m1961b-yBWrGh6Dc');
    define('DB', 'devintor_catalog');
  }

  $conn = mysqli_connect(HOST, USER, PASS, DB);

  if(!$conn) die("Database Connection Error: ".mysqli_connect_error());
?>
