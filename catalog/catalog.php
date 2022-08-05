<?php
  include './includes/db.php';

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $loggedIn = '<nav>
                <a href="./index.php">Home</a>
                <a href="#">Catalog</a>
                <a href="#">Cart</a>
                <a href="logout.php">Log Out</a>
              </nav>';
  $loggedOut = "<p>It appears you're not signed in. Please go to the <a href=".'./index.php'.">homepage</a> and log in.";

  // Product arrays
  $proteinArr = array();
  $proteinDescriptionArr = array();
  $proteinImageArr = array();
  $proteinPriceArr = array();
  $proteinTypeArr = array();

  $accessoryArr = array();
  $accessoryDescriptionArr = array();
  $accessoryImageArr = array();
  $accessoryPriceArr = array();
  $accessoryTypeArr = array();

  $subscriptionArr = array();
  $subscriptionDescriptionArr = array();
  $subscriptionImageArr = array();
  $subscriptionPriceArr = array();
  $subscriptionTypeArr = array();

  // Printing all products on screen
  $sql = "SELECT * FROM product;";
  $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css" rel="text/css">
    <title>Chad's Gym | Catalog</title>
  </head>
  <body>
    <main>
      <?php
        if (isset($_SESSION['username']))
        {
          echo '<pre>'.print_r($_SESSION).'</pre>';

          echo $loggedIn;

          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
          {
            switch ($row['type'])
            {
              case 'protein':
                $proteinArr[] = $row['name'];
                $proteinDescriptionArr[] = $row['description'];
                $proteinImageArr[] = $row['image'];
                $proteinPriceArr[] = $row['price'];
                $proteinTypeArr[] = $row['type'];
                break;
              case 'accessory':
                $accessoryArr[] = $row['name'];
                $accessoryDescriptionArr[] = $row['description'];
                $accessoryImageArr[] = $row['image'];
                $accessoryPriceArr[] = $row['price'];
                $accessoryTypeArr[] = $row['type'];
                break;
              case 'subscription':
                $subscriptionArr[] = $row['name'];
                $subscriptionDescriptionArr[] = $row['description'];
                $subscriptionImageArr[] = $row['image'];
                $subscriptionPriceArr[] = $row['price'];
                $subscriptionTypeArr[] = $row['type'];
                break;
            }
          }
        }
        else
        {
          echo $loggedOut;
        }
        echo '<div class="items">';
          echo '<div class="protein"> <h2>Protein</h2>';
          for ($i = 0; $i < count($proteinArr); $i++)
          {
            echo '<div class="item">';
            echo '<p>'.$proteinArr[$i].'</p>';
            echo '<img src="./img/'.$proteinImageArr[$i].'">';
            echo '<p>$'.$proteinPriceArr[$i].'</p>';
            echo '<p>'.$proteinDescriptionArr[$i].'</p>';
            echo '</div>';
          }
          echo '</div>';

          echo '<div class="accessory"> <h2>Accessories</h2>';
          for ($i = 0; $i < count($accessoryArr); $i++)
          {
            echo '<div class="item">';
            echo '<p>'.$accessoryArr[$i].'</p>';
            echo '<img src="./img/'.$accessoryImageArr[$i].'">';
            echo '<p>$'.$accessoryPriceArr[$i].'</p>';
            echo '<p>'.$accessoryDescriptionArr[$i].'</p>';
            echo '</div>';
          }
          echo '</div>';

          echo '<div class="subscription"> <h2>Subscription</h2>';
          for ($i = 0; $i < count($subscriptionArr); $i++)
          {
            echo '<div class="item">';
            echo '<p>'.$subscriptionArr[$i].'</p>';
            echo '<img src="./img/'.$subscriptionImageArr[$i].'">';
            echo '<p>$'.$subscriptionPriceArr[$i].'</p>';
            echo '<p>'.$subscriptionDescriptionArr[$i].'</p>';
            echo '</div>';
          }
          echo '</div>';
        echo '</div>';
      ?>
    </main>
  </body>
</html>
