<!DOCTYPE html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<html>
<head>
  <meta charset="utf-8">
  <title>PHP Form Demo 1_Bootstrap</title>
</head>
<body>
<div class="container" style="border:1px black solid">
 <form action="http://localhost/medt/ue5/hue/index.php">
 <h3> Anmeldeinfos bitte eingeben:</h3> 
  <div class="form-group form-inline">
    <label>Vorname: </label>
    <input type="text" class="form-control" placeholder="Vorname" name="vn">
  </div>
  <div class="form-group form-inline">
    <label>Nachname: </label>
    <input type="text" class="form-control" placeholder="Nachname" name="nn">
  </div> 
  <div class="form-group form-inline">
    <label>E-Mail: </label>
    <input type="text" class="form-control" placeholder="E-Mail" name="mail">
  </div>    
  <div class="form-group form-inline">    
    <label>Green</label>
    <input type="radio" name="rb" value="green">    
    <label>Blue</label>
    <input type="radio" name="rb" value="blue">
  </div>
  <button type="submit" class="btn btn-default" name="submitBtn">OK</button>  
</form>
<?php
  if(isset($_GET['submitBtn'])){  
    echo "<br>";
    echo '<div style="border:1px black solid; padding-left:5px">';     
    echo "<p>Ihre Eingabe:</p><br>";        
    if ($_GET['rb']=="green") {
      echo "<p style =color:green><strong>Vorname: ".$_GET['vn']."</p>";
      echo "<p style =color:green> Nachname: ".$_GET['nn']."</p>";
      echo "<p style =color:green> E-Mail: ".$_GET['mail']."</strong></p>";
    }
    if ($_GET['rb']=="blue") {
      echo "<p style =color:blue><strong>Vorname: ".$_GET['vn']."</p>";
      echo "<p style =color:blue> Nachname: ".$_GET['nn']."</p>";
      echo "<p style =color:blue> E-Mail: ".$_GET['mail']."</strong></p>";
    }
    echo "</div>";
    echo "<br>";
    }    
  ?>  
</div>
</body>
</html>