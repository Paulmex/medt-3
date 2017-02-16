<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	tr:nth-of-type(even){
		background-color: lightblue;
	}
	th{
		background-color: lightgrey;		
	}	
	</style>
</head>
<body>
<div class="container">
	<?php  
	// DB Settings
	$host ='localhost';
	$dbname='medt3';
	include '../users.php';
	//$pwd='error';
	//Establish connection
	try {
		$db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pwd);
	} catch (PDOException $e) {
		exit("<p>System nicht verfügbar</p>");
	}	
	echo "<h1><b>Successfull</b></h1>";	
	//Select table with query
	$res=$db->query ( "SELECT * FROM project" );	
	$tmp=$res->fetchAll(PDO::FETCH_ASSOC); 
	?>		
	<table>
	  <tr>
	    <th>Name</th>
	   	<th>Beschreibung</th> 
	   	<th>Datum</th>
	   	<th>Ersteller</th>
	  </tr>      
	  <?php foreach ($tmp as $row) :?>
	  <tr>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['description'];?></td>	
		<td><?php echo $row['createDate'];?></td>
		<td><?php echo $row['id'];?></td>
      </tr>
	  <?php endforeach; 	 	  
	?>
</div>
</body>
</html>