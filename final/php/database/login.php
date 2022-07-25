<?php
// DB Connection
if ($_SERVER['HTTP_HOST'] == 'localhost')
{
  define('HOST', 'localhost');
  define('USER', 'root');
  define('PASS', '1550');
  define('DB', 'final');
}
else
{
  define('HOST', 'localhost');
  define('USER', 'devintor_myself');
  define('PASS', '?XV8m1961b-yBWrGh6Dc');
  define('DB', 'devintor_final');
}

$conn = mysqli_connect(HOST, USER, PASS, DB);
  // Log into existing account
  if(isset($_POST['log-in']))
  {
    // Login credentials
    $un = $_POST['login'];
    $pw = $_POST['password'];

    // Check in DB for match
    $sql = "SELECT * FROM users WHERE username = '".$un."' AND password = '".$pw."';";
    $result = mysqli_query($conn, $sql);

    // //Display result if login credentials are correct
    if(mysqli_num_rows($result))
    {
      $display = "<h1>Access Granted</h1>";
    }
    else
    {
      $display = "<h1>Access Denied</h1>";
    }
  }

  // Test Connection
  // This will appear in the Sign Up section too.
  // Don't worry about it. This is just to test our connection
  $database = '<form method="post">
      <input name="test" type="submit" value="Database">
  </form>';
  if(isset($_POST['test']))
  {
    $sql = 'SELECT username, password from users;';
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      echo "<p>".$row['username']." -> ".$row['password']."</p>";
    }
  }
?>
