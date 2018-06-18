<?php
session_start();
 ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign In</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custome Style for log in page -->
    <link href="css/signin.css" rel="stylesheet">
  </head>



  <body class="text-center">
    <form class="form-signin" method="post" action="login.php">
      <h1>Hotel System</h1>
      <h1 class="h5 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" id="input" name="email" class="form-control" placeholder="Email address" required autofocus
      <?php if(isset($_POST['email'])) {
       echo htmlentities ($_POST['email']); }?>
      >
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="Password" required>
      <?php
        if (isset($_POST['submit'])) {
            if ($_POST['email'] == "admin" && $_POST['pwd'] == "admin" ) {
                $_SESSION['uid'] = "admin";
                header("Location: index.php");
            }
            else {
              echo '<div class="alert alert-warning" role="alert">
                  User Name and Password is Incorrect!!!!
              </div>';
            }
        }
       ?>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
    </form>
  </body>
</html>
