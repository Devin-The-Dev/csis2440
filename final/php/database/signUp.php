<?php
  // DB Connection
  // if ($_SERVER['HTTP_HOST'] == 'localhost')
  // {
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '1550');
    define('DB', 'final');
  // }
  // else
  // {
  //   define('HOST', 'localhost');
  //   define('USER', 'devintor_myself');
  //   define('PASS', '?XV8m1961b-yBWrGh6Dc');
  //   define('DB', 'devintor_final');
  // }

  $conn = mysqli_connect(HOST, USER, PASS, DB);

  // Sign Up web form
  $signUp = '<form method="post">
              <input type="text" name="create-username" placeholder="Username">
              <br>
              <br>
              <input type="submit" name="sign-up" value="Sign Up">
              <input type="reset">
            </form>';

  // Create account
  if(isset($_POST['sign-up']))
  {
    $un = $_POST['create-username'];

    // MySQL queries for the secret code and username
    $unSQL = "SELECT username FROM users WHERE username = '$un';";

    //isset test
    $debug = "<h2>Passes isset condition</h2>";
    echo $unSQL;
    // echo $conn;

    //Data Validation. Empty string(s) for corrections
    //There's something wrong with this condition...
    //It's the query... no, it's the $conn...
    if ($un == mysqli_query($conn, $unSQL))//Username already exists
    {
      $debug = '<h2>Passes post and query condition</h2>';
    }
  }


?>
