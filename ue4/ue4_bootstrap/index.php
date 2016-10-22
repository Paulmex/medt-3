<!DOCTYPE html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<html>
<head>
  <meta charset="utf-8">
  <title>PHP Form Demo 1_Bootstrap</title>
</head>
<body>
 <form action="http://localhost/medt/ue4/ue4_bootstrap/index.php">
 <h3> Anmeldeinfos bitte eingeben:</h3>
  <div class="form-group">
    <label for="exampleInputEmail1">Vorname: </label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Vorname" name="vn">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nachname: </label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nachname" name="nn">
  </div> 
  <button type="submit" class="btn btn-default">Anmelden</button>
</form>
</body>
</html>