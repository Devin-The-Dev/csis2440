<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include './includes/db.php';

  $loggedOut = '<nav>
              <a href="#">Home</a>
              <a href="./create-account.php">Create Account</a>
            </nav>';
  $loggedIn = '';
  $webForm = '<h1>Log In</h1>
              <div class="">
                <form class="" method="post">
                  <input type="text" name="username" placeholder="Username">
                  <input type="password" name="password" placeholder="Password">
                  <input type="submit" name = "submit" value="Log In">
                  <input type="reset" name="">
                </form>
              </div>';

  $sql = "SELECT * FROM users";

  if(isset($_POST['submit']))
  {
    // Input from user
    $userName = mysqli_real_escape_string($conn,htmlentities($_POST['username']));
    $password = mysqli_real_escape_string($conn,htmlentities($_POST['password']));

    // Storing username into it's global-session variable
    if (isset($userName))
    {
      $_SESSION['username'] = $userName;
      echo '<pre>'.print_r($_SESSION).'</pre>';
    }

    // Hash and salt password
    $salt = 'afhkljbadvoihaw0237kljabfdvp978';
    $salt2 = 'faoiuhvneoihsf2dg456j8n23gasds';
    $password = $salt.$password.$salt2; //This may be a problem when trying to login with the 'include' on line 1
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
      $loggedOut = '';
      // Use cookie to log out user
      $loggedIn = '<nav>
                  <a href="#">Home</a>
                  <a href="./catalog.php">Catalog</a>
                  <a href="#">Cart</a>
                  <a href="logout.php">Log Out</a>
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
      echo $loggedOut;
      echo $loggedIn;
    ?>
    <main>
      <section>
        <?php echo $webForm; ?>
      </section>
    </main>
  </body>
</html>
