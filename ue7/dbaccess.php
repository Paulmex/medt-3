<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title></title>
	<!--Workaround für Cursoranzeige bei den Icons
	a{
		cursor: pointer;
	}	
	<style>
	.scrollbar {
    		overflow-y:scroll; 
			overflow-x:hidden;   		
		}   		
	</style>
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
	//echo "<h1><b>Successfull</b></h1>";	
	if (isset($_GET['delete'])) {
	  	$var=$_GET['delete'];	  	
	  	$res=$db->query ( "DELETE FROM project WHERE id=$var" );		
	}	 
	if (isset($_GET['editProject'])) {
		createProjectHTMLTable($db);			
 	}	 
	if(isset($_POST['updateBtn']))
	{		
		$id=$_POST['id'];
		$name=$_POST['name'];
		$description=$_POST['desc'];
	    $createDate=$_POST['createDate']." ".$_POST['time'];
		$res=$db->query ( "UPDATE project SET name='$name', description='$description', createDate='$createDate' WHERE id=$id" );	
	}
	$startval;
	$endval;
	if(isset($_GET['page']))
	{
			$startval=$_GET['page']*5;
			$endval=$startval+5;
	}	else  {
		$startval=0;
		$endval=$startval+5;
	}
	
	//$res: PDOStatement	
	$res=$db->query ( "SELECT name,description,createDate, id FROM project LIMIT $startval,$endval" );	
	//$tmp: array	
	$tmp=$res->fetchAll(PDO::FETCH_OBJ); //FETCH_OBJ in die Klammern wenn man objektorientiert arbeiten will
	?>		
	
	<h1>Projektübersicht</h1>
	<table class="table table-striped table-hover">		
		<thead>
			<tr style="background-color: lightgrey;">
				<th>Name</th>
				<th>Description</th> 
				<th>Date</th>
				<th>Operations</th>
			</tr>      	
		</thead>  		
	    <tbody>			
			<?php foreach ($tmp as $row) :?>	  
			<tr>
				<td><?php echo $row->name;?></td>
				<td><?php echo $row->description;?></td>	
				<td><?php echo $row->createDate;?></td>
				<?php echo '<td><a href="dbaccess.php?delete='.$row->id.'" style="color:black"><span class="glyphicon glyphicon-trash"></span></a><a href="dbaccess.php?editProject='.$row->id.'" style="color:black"><span class="glyphicon glyphicon-pencil"></span></a></td>'; ?>
			</tr>				
	 		<?php endforeach; 	 ?>
	  	</tbody>	  
	  </table> 
	  <nav aria-label="Page navigation">
		<ul class="pagination">
			<li>
			<a href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			</a>
			</li><?php 
			$res=$db->query ( "SELECT COUNT(id) FROM project" );	
			$tmp=$res->fetchColumn();
			$num=$tmp/5;
			$num=intval($num);			
			for($i=0;$i<$num+1;$i++)
			{			
				$active=false;	
				$displayi=$i+1;						
				if(isset($_GET['page']))
				{
					if($i==$_GET['page'])
					{
						$active=true;
					}
				}				
				if($active==false){
					echo '<li><a href="dbaccess.php?page='.$i.'">'.$displayi.'</a></li>';
				}
				else
				{
					echo '<li class="active"><a href="dbaccess.php?page='.$i.'">'.$displayi.'</a></li>';
				}
			}					
			?>	
			<li>
			<a href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
			</li>
		</ul>
		</nav>
	  <?php 
	  
	  function createProjectHTMLTable($db)
	  {			
		$id=$_GET['editProject'];
		$res=$db->query ( "SELECT name,description,createDate, id FROM project WHERE id=$id" );	
		$tmp=$res->fetchAll(PDO::FETCH_OBJ);
	  	
		echo "<h2>Projekt ".$tmp[0]->name." bearbeiten</h2>";
		?>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
			<div class="form-group form-inline">
					<label>Name </label>
					<?php echo '<input type="text" class="form-control" value="'.$tmp[0]->name.'" name="name">' ?>
				</div>
			<div class="form-group form-inline">
					<label>Description </label>
					<?php echo '<input type="text" class="form-control" value="'.$tmp[0]->description.'" name="desc">' ?>
				</div>
			<div>
					<label>Date </label>
					<?php echo '<input type="date" value="'.substr($tmp[0]->createDate,0,10).'" name="createDate">' ?>
				</div>
			<br>
			<?php echo '<input type="hidden" value="'.substr($tmp[0]->createDate,11).'"name="time">'?>
			<?php echo '<input type="hidden" value="'.$tmp[0]->id.'"name="id">'?>
			<button type="submit" class="btn btn-default" name="updateBtn">Aktualisieren</button>
			<button type="submit" class="btn btn-default" name="cancelBtn">Abbrechen</button>		
	    </form>
		
	  	<?php
	  }
	?>
</div>
</body>
</html>