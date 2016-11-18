<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP Form Demo 1</title>
</head>
<body>
	<h1>UE6</h1>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		<label><input type="radio" name="alter" value="cat1">18-30<br></label>
		<label><input type="radio" name="alter" value="cat2">30-50<br></label>
		<label><input type="radio" name="alter" value="cat3">50-80<br></label>
		<label><input type="checkbox" name="agb" value="agb">AGB gelesen<br></label>
		<label><input type="checkbox" name="agb1">AGB1 gelesen<br></label>
		<label><input type="checkbox" name="city[]" value="NYC">New York City</input></label> <!-- [] -->
		<label><input type="checkbox" name="city[]" value="Boston">Boston</input></label>
		<label><input type="checkbox" name="city[]" value="SF">San Francisco</input></label>
		<label><input type="checkbox" name="city[]" value="DC">Washington DC</input></label>
		<br>
		<label><input type="checkbox" name="city[NY]">New York City</input></label>
		<label><input type="checkbox" name="city[B]">Boston</input></label>
		<label><input type="checkbox" name="city[SF]">San Francisco</input></label>
		<label><input type="checkbox" name="city[DC]">Washington DC</input></label>
		<br>
		<select size="3" name="auto1">
			<option>Audi</option>
			<option>BMW</option>
			<option>Renault</option>
			<option>Seat</option>
			<option>VW</option>
		</select>
		<br>
		<select name="auto[]" size="6" multiple>
			<option>Audi</option>
			<option>BMW</option>
			<option>Renault</option>
			<option>Seat</option>
			<option>VW</option>
		</select>
				
		<p><input type="submit" name="submitBtn" value="Daten senden"></p>
	</form>
	<?php
	if (isset($_POST['submitBtn'])){ 
		echo "Alter:".$_POST['alter']."<br>";	
	}
	if (isset($_POST['agb'])) {
		echo "AGB akzeptiert!<br>";
	}
	if (isset($_POST['agb1'])) {
		if ($_POST['agb1']=='on') {
			echo "AGB1 akzeptiert!<br>";
		}
	}
	if (isset($_POST['city'])) {
		var_dump($_POST['city']);
		echo "<br>";
	}
	if (isset($_POST['city'])) {
		foreach ($_POST['city'] as $city) {
			echo "$city <br>";
		}
	}	
	if (isset($_POST['city']['NY'])) {
		echo "It's NYC!<br>";
	}
	if (isset($_POST['city']['B'])) {
		echo "It's B!<br>";
	}
	if (isset($_POST['city']['SF'])) {
		echo "It's SF!<br>";
	}
	if (isset($_POST['city']['DC'])) {
		echo "It's DC!<br>";
	}
	if (isset($_POST['auto1'])) {
		echo "Es wurde folgende Auswahl getroffen: ".$_POST['auto1']."<br>";
	}
	
	if (isset($_POST['auto'])) {
		var_dump($_POST['auto']);
		echo "<br>";
	}
	if (isset($_POST['auto'])) {
		foreach ($_POST['auto'] as $auto) {
			echo "$auto <br>";
		}
	}		

	?>
</body>
</html>