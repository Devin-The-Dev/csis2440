<?php
  $logIn = '<nav>
              <a href="#">Home</a>
              <a href="./create-account.php">Create Account</a>
            </nav>';
  $logOut = '';
  $webForm = '<h1>Log In</h1>
              <div class="">
                <form class="" method="post">
                  <input type="text" name="username" placeholder="Username">
                  <input type="password" name="password" placeholder="Password">
                  <input type="submit" name = "submit" value="Log In">
                  <input type="reset" name="">
                </form>
              </div>';
  // DB Connection
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

  $sql = "SELECT * FROM users";

  if(isset($_POST['submit']))
  {
    //Input from user
    $userName = $_POST['username'];
    $password = $_POST['password'];

    // //Hash and salt password
    $salt = 'afhkljbadvoihaw0237kljabfdvp978';
    $salt2 = 'faoiuhvneoihsf2dg456j8n23gasds';
    $password = $salt.$password.$salt2;
    $password = hash('sha512', $password);

    //Check in DB for match
    $sql = "SELECT * FROM users WHERE username = '".$userName."' AND password = '".$password."';";
    $result = mysqli_query($conn, $sql);

    // Display results if login credentials are correct
    if(mysqli_num_rows($result))
    {
      // Display results
      echo "<h1>Welcome to Chad's Gym!</h1>";
      echo "<h2>Start Lifting!</h2>";

      //Set display and link variables to empty string
      $logIn = '';
      // Use cookie to log out user
      $logOut = '<nav>
                  <a href="#">Home</a>
                  <a href="#">Cart</a>
                  <a href="#" onclick="">Log Out</a>
                </nav>';
      $webForm = '';
    }
    else
    {
      echo "<h1>Access Denied</h1>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css" rel="text/css">
    <title></title>
  </head>
  <body>
    <?php
      echo $logIn;
      echo $logOut;
    ?>
    <main>
      <section>
        <?php echo $webForm; ?>
      </section>
    </main>
  </body>
</html>
