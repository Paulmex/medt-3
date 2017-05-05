<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
<div class="container">
	<h1>Herzlich Willkommen!</h1>
  <?php 
  if (isset($_GET['logoutBtn'])) {
    echo "<p>Sie wurden erfolgreich ausgeloggt!</p>";
    session_destroy();
  }
  ?>
	<label><b>Anmelden:</b></label>
	<form action="main.php" method="post">
              <div class="form-group form-inline">
                  <label>Benutzername</label>
                  <input type="text" class="form-control" name="username">
              </div>
              <div class="form-group form-inline">
                  <label>Passwort</label>
                  <input type="text" class="form-control" name="password">
              </div>       
              <br>              
              <button type="submit" class="btn btn-default" name="loginBtn">Login</button>
          </form>
</div>
</body>
</html>