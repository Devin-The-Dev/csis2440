<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/subscription.css">
    <title>Chad's Gym</title>
  </head>
  <body>
   <header>
     <nav>
       <ul>
         <li><a href="./../index.php">Home</a></li>
         <li><a href="#">Subscriptions</a></li>
         <li><a href="./products.php">Products</a></li>
         <li><a href="./about.php">About</a></li>
         <li><a href="./users.php">Log In/Sign Up</a></li>
       </ul>
     </nav>
   </header>
   <main>
     <h1>Subscriptions</h1>
     <section>
       <!-- Cards for subscriptions -->
       <?php
        include './classes/subscription.php';
        for ($i = 0; $i < 3; $i++){
          echo '<div class="card"><a href="./users.php">
                  <h2>'.$tierArr[$i].' Tier </h2>
                  '.$descriptionArr[$i].'
                  <h3>'.$priceArr[$i].'</h3></a>
                </div>';
        }
       ?>
     </section>
   </main>
  </body>
</html>
