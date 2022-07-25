<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/users.css">
    <title>Chad's Gym</title>
  </head>
  <body>
   <header>
     <nav>
       <ul>
         <li><a href="./../index.php">Home</a></li>
         <li><a href="./subscription.php">Subscriptions</a></li>
         <li><a href="./products.php">Products</a></li>
         <li><a href="./about.php">About</a></li>
         <li><a href="#">Log In/Sign Up</a></li>
       </ul>
     </nav>
   </header>
   <main>
     <section>
       <div class="left">
         <h2>Sign up</h2>
         <br>
         <?php
           include './database/signUp.php';
           echo $signUp;
           echo $debug;
         ?>
       </div>
       <div class="right">
         <h2>Log In</h2>
         <br>
         <form method="post">
           <input type="text" name="login" placeholder="Username">
           <br>
           <input type="password" name="password" placeholder="Password">
           <br>
           <br>
           <input type="submit" name="log-in" value="Log In">
           <input type="reset">
         </form>
       </div>
     </section>
     <?php
       include './database/login.php';
       echo $display;
       echo $database;
       echo $em;
     ?>
   </main>
  </body>
</html>
