<?php
//Web form
$webForm = '<form method="post">
              <input type="text" id="username" name="username" placeholder="Username" required>
              <input type="password" id="psw" name="password" placeholder="Password" pattern="/(?=.*\d)(?=.*[a-zA-Z]).{8, }/" required>
              <input type="password" id="psw2" name="verify-password" placeholder="Verify password" required>
              <input type="submit" name="submit" value="Create Account" id="create-account" disabled>
              <input type="reset">
            </form>';
$message = "";

$passwordNum = '<p id="number" class="invalid">Password must contain a number</p>';
$passwordLetters = '<p id="letter" class="invalid">Password must contain at least 1 letter</p>';
$passwordLen = '<p id="length" class="invalid">Password must be 8 characters long</p>';
$passwordsMatch = '<p id="match" class="invalid">Password and "Verify Password" must match</p>';


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

// Creating new account
  if(isset($_POST['submit']))
  {
    //Checks username, password, verify password, and secret code are filled in
    $username = ((isset($_POST['username']) ? $_POST['username'] : false));
    $password = ((isset($_POST['password']) ? $_POST['password'] : false));
    $verifyPassword = ((isset($_POST['verify-password']) ? $_POST['verify-password'] : false));

    //Create HTML entities to prevent HTML cyber attacks
    $username = htmlentities($username);
    $password = htmlentities($password);
    $verifyPassword = htmlentities($verifyPassword);

    //Force entire fields ina  string to prevent MySQL cyber attacks
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $verifyPassword = mysqli_real_escape_string($conn, $verifyPassword);

    //MySQL query for username
    $userNameSQL = "SELECT username FROM users WHERE username = '".$username."';";
    $result = mysqli_query($conn, $userNameSQL);

    if ($username == mysqli_fetch_array($result, MYSQLI_ASSOC)['username'])//Username already exists
    {
      $message = "<h2>Username already taken. Please choose a different username</h2>";
      $webForm = '<form method="post">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="password" id="psw" name="password" placeholder="Password" value="'.$password.'" pattern="/(?=.*\d)(?=.*[a-zA-Z]).{8, }/" required>
        <input type="password" name="verify-password" placeholder="Verify password" value="'.$verifyPassword.'" required>

        <input type="submit" name="submit" value="Create Account" id="create-account">
        <input type="reset">
      </form>';
    }
    else
    {
      //Salt and hash the password and the verified password
      $salt = 'afhkljbadvoihaw0237kljabfdvp978';
      $salt2 = 'faoiuhvneoihsf2dg456j8n23gasds';
      $password = $salt.$password.$salt2;
      $password = hash('sha512', $password);

      //Adding new account into users table
      $newAccount = "INSERT INTO users (username, password) VALUES ('$username', '$password');";
      mysqli_query($conn, $newAccount);

      // Update HTML
      $message = "<h2>Account created! Click home to log in</h2>";
      $webForm = "";
      $passwordNum = "";
      $passwordLetters = "";
      $passwordLen = "";
      $passwordsMatch = "";
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css" rel="text/css">
    <script type="text/javascript" defer src="./js/script.js"></script>
    <title>Chad's Gym | Create Account</title>
  </head>
  <body>
    <nav>
      <nav>
        <a href="./index.php">Home</a>
      </nav>
    </nav>
    <main>
      <h1>Create Account</h1>
      <?php
        echo $webForm;
        echo $message;
        // echo $newAccount;

        // Account validations
        echo $passwordNum;
        echo $passwordLetters;
        echo $passwordLen;
        echo $passwordsMatch;
      ?>
    </main>
  </body>
</html>
