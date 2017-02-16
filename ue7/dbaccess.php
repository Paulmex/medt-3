<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title></title>
	<style>
	tr:nth-of-type(even){
		background-color: lightblue;
	}
	th{
		background-color: lightgrey;		
	}	
	</style>
	<!-- Workaround für Cursoranzeige bei den Icons
	a{
		cursor: pointer;
	}
	-->
</head>
<body>
<div class="container">
	<?php  	
	// DB Settings
	$host ='localhost';
	$dbname='medt3';
	include '../users.php';
	//Establish connection
	try {
		$db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pwd);
	} catch (PDOException $e) {
		exit("<p>System nicht verfügbar</p>");
	}	
	echo "<h1><b>Successfull</b></h1>";	
	if (isset($_GET['delete'])) {
	  	$var=$_GET['delete'];	  	
	  	$res=$db->query ( "DELETE FROM project WHERE id=$var" );		
	}
	//$res: PDOStatement
	$res=$db->query ( "SELECT name,description,createDate, id FROM project" );	
	//$tmp: array	
	$tmp=$res->fetchAll(PDO::FETCH_OBJ); //FETCH_OBJ in die Klammern wenn man objektorientiert arbeiten will
	?>		
	<table>
	  <tr>
	    <th>Name</th>
	   	<th>Beschreibung</th> 
	   	<th>Datum</th>
	   	<th>Operationen</th>
	  </tr>      
	  <?php foreach ($tmp as $row) :?>
	  <tr>
		<td><?php echo $row->name;?></td>
		<td><?php echo $row->description;?></td>	
		<td><?php echo $row->createDate;?></td>
		<?php echo '<td><a href="dbaccess.php?delete='.$row->id.'" style="color:black"><span class="glyphicon glyphicon-trash"></span></a><a href="#" style="color:black"><span class="glyphicon glyphicon-pencil"></span></a></td>'; ?>
      </tr>
	  <?php endforeach; 	  
	?>
</div>
</body>
</html>