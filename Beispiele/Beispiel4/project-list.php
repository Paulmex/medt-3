<?php 
session_start();
require("isLoggedIn.php");
$session_started = sessionStarted();
if($session_started==true){
?>
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
	include '../../users.php';
	//Establish connection
	try {
		$db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pwd);
	} catch (PDOException $e) {
		exit("<p>System nicht verfügbar</p>");
	}	
	//echo "<h1><b>Successfull</b></h1>";	
	if (isset($_GET['delete'])) {
	  	$var=$db->quote($_GET['delete']);
		//Ergebnistyp PDOStatement	  	
	  	$res=$db->query ( "DELETE FROM project WHERE id=$var" );	

		//Auswertung, ob dass löschen erfolgreich war

		$feedbackClass="bg-danger";
		$feedbackText="nicht";

		if($res->rowCount())
		{
			$feedbackClass="bg-success";	
			$feedbackText="";
		}
		echo '<p class="'.$feedbackClass.'">Löschen '.$feedbackText.' erfolgreich!</p>';
	}	 

	elseif (isset($_GET['editProject'])) {
		createProjectHTMLTable($db);
 	}
	elseif(isset($_POST['updateBtn']))
	{		
		$id=$_POST['id'];
		$name=$_POST['name'];
		$description=$_POST['desc'];
	    $createDate=$_POST['createDate']." ".$_POST['time'];
		$res=$db->query ( "UPDATE project SET name='$name', description='$description', createDate='$createDate' WHERE id=$id" );	
	}
	elseif (isset($_GET['addProject']))
    {
        createForm($db);
    }
    elseif (isset($_POST['createBtn']))
    {
        $name=$_POST['name'];
        $description=$_POST['desc'];
        $createDate=$_POST['createDate']." ".$_POST['time'];
        $res=$db->query ("INSERT INTO project(name, description, createDate) VALUES('$name','$description','$createDate')");
    }
	$startval;
	$addval=5;
	if(isset($_GET['page']))
	{
			$startval=$_GET['page']*5;
	}	else  {
		$startval=0;
	}
	
	//$res: PDOStatement	
	$res=$db->query ( "SELECT name,description,createDate, id FROM project LIMIT $startval,$addval" );
	//$tmp: array	
	$tmp=$res->fetchAll(PDO::FETCH_OBJ); //FETCH_OBJ in die Klammern wenn man objektorientiert arbeiten will
	?>		
	<h1>Projektübersicht</h1>
    <br>
    <a href="project-list.php?addProject" style="color:black"><h3>+ Projekt erstellen</h3></a>
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
				<td><?php echo htmlspecialchars($row->name);?></td>
				<td><?php echo $row->description;?></td>	
				<td><?php echo $row->createDate;?></td>
				<?php echo '<td><a href="project-list.php?delete='.$row->id.'" style="color:black"><span class="glyphicon glyphicon-trash"></span></a>
				<a href="project-list.php?editProject='.$row->id.'" style="color:black"><span class="glyphicon glyphicon-pencil"></span></a>				
				</td>';
				?>
			</tr>				
	 		<?php endforeach; 	 ?>
	  	</tbody>	  
	  </table> 
	  <nav aria-label="Page navigation">
		<ul class="pagination">
			<li>
			<a href="project-list.php?page=0" aria-label="First">
				<span aria-hidden="true">&laquo;</span>
			</a>
			</li><?php
			$res=$db->query ( "SELECT COUNT(id) FROM project" );	
			$tmp=$res->fetchColumn();
			$num=$tmp/5;
			$num=intval($num);
			$lastpage;
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
				else {
                    if($i==0)
                    {
                        $active=true;
                    }
                }
				if($active==false){
					echo '<li><a href="project-list.php?page='.$i.'">'.$displayi.'</a></li>';
				}
				else
				{
					echo '<li class="active"><a href="project-list.php?page='.$i.'">'.$displayi.'</a></li>';
				}
				$lastpage=$i;
			}
		echo "<li>";
		echo '<a href="project-list.php?page='.$lastpage.'" aria-label="Last">';
        echo '<span aria-hidden="true">&raquo;</span>';
		echo "</a>";
		echo "</li>";
		echo "</ul>";
		echo "</nav>";
		echo '<a href="index.php?logoutBtn="><button type="submit" class="btn btn-default" name="logoutBtn">Logout</button></a>';	  
	?>
</div>
</body>
</html>
<?php 
} else {
	header("Location: index.php");	
} 

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
	  function createForm($db)      {
          echo "<h2>Projekt erstellen</h2>";
          ?>
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
              <div class="form-group form-inline">
                  <label>Name </label>
                  <input type="text" class="form-control" name="name">
              </div>
              <div class="form-group form-inline">
                  <label>Description </label>
                  <input type="text" class="form-control" name="desc">
              </div>
              <div>
                  <label>Date </label>
                  <script>
                      var currentdate = new Date();
                      var datetime = currentdate.getFullYear() + "-"
                          + ("0" + (currentdate.getMonth() + 1)).slice(-2)  + "-"
                          + ("0" + currentdate.getDate()).slice(-2);
                      document.write('<input type="date"  value="'+datetime+'" name="createDate">');
                  </script>
              </div>
              <br>
              <script>
                  var currentdate = new Date();
                  var datetime = currentdate.getHours() + ":"
                      + currentdate.getMinutes()  + ":"
                      + currentdate.getSeconds();
                  document.write(' <input type="hidden" value="'+datetime+'" name="time">');
              </script>
              <button type="submit" class="btn btn-default" name="createBtn">Erstellen</button>
              <button type="submit" class="btn btn-default" name="cancelBtn">Abbrechen</button>
          </form>
          <?php
      }
?>
