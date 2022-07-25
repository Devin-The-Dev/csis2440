<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/main.css">
    <title>Chad's Gym</title>
  </head>
  <body>
   <header>
     <nav>
       <ul>
         <li><a href="./../index.php">Home</a></li>
         <li><a href="./subscription.php">Subscriptions</a></li>
         <li><a href="./products.php">Products</a></li>
         <li><a href="#">About</a></li>
         <li><a href="./users.php">Log In/Sign Up</a></li>
       </ul>
     </nav>
   </header>
   <main>
     <div class="left">
       <h2>Sign up</h2>
       <br>
       <?php
         include './database/signUp.php';
         echo $signUp;
         echo $debug;
       ?>
     </div>
   </main>
  </body>
</html>
