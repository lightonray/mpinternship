<!DOCTYPE html>
<html>
<head>
<style>
  /* Center the content vertically and horizontally */
  .center-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Adjust this for your needs */
  }
</style>
</head>
<body>

<div class="center-container">
  <?php
  session_start(); // Start the session if not already started
  
  if (isset($_SESSION["username"])) {
      echo '<h1>Welcome ' . $_SESSION["username"] . '</h1>';
  } 
  ?>
</div>

</body>
</html>