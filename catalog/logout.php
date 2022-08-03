<?php
  // Removing all session variables
  session_unset();

  // Destroying the session
  session_destroy();

  // Redirect user to homepage
  header('location: .');
?>
