<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"	></script>
	<title></title>
	<style>		
	</style>
</head>
<body>
<div class="container">
	<nav class="navbar navbar-inverse">
  		<div class="container-fluid">
    		<!-- Brand and toggle get grouped for better mobile display -->
    		<div class="navbar-header">
      			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        			<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
      			</button>
      			<a class="navbar-brand" href="#">Maresch</a>
    		</div>
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
      				<li><a href="#">Beispiel 1<span class="sr-only">(current)</span></a></li>   
        			<li class="active"><a href="#">Beispiel 2<span class="sr-only">(current)</span></a></li>     
        		</ul>      
      			<ul class="nav navbar-nav navbar-right">        
        			<li class="dropdown">
          				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Technologies<span class="caret"></span></a>
          				<ul class="dropdown-menu">
            				<li><a href="#">PHP</a></li>
            				<li><a href="#">HTML</a></li>
           					<li><a href="#">CSS</a></li>                   
          				</ul>
        			</li>
        			<li class="dropdown">
          				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Frameworks<span class="caret"></span></a>
          				<ul class="dropdown-menu">            
            				<li><a href="#">Bootstrap</a></li>               
          				</ul>
        			</li>
      			</ul>
    		</div>
  		</div>
	</nav>
	<main>	
		<h1>Grid Generator</h1>
 		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
 			<div class="checkbox">
  				<label><input type="checkbox" name="day[]" value="Sunday">Sunday</label>
			</div>
			<div class="checkbox">
  				<label><input type="checkbox" name="day[]" value="Monday">Monday</label>
			</div>
			<div class="checkbox">
  				<label><input type="checkbox" name="day[]" value="Tuesday">Tuesday</label>
			</div>
			<div class="checkbox">
  				<label><input type="checkbox" name="day[]" value="Wednesday">Wednesday</label>
			</div>
			<div class="checkbox">
  				<label><input type="checkbox" name="day[]" value="Thursday">Thursday</label>
			</div>
			<div class="checkbox">
  				<label><input type="checkbox" name="day[]" value="Friday">Friday</label>
			</div>
			<div class="checkbox">
  				<label><input type="checkbox" name="day[]" value="Saturday">Saturday</label>
			</div>
    		<div class="form-group form-inline">
        		<label for="input">Enter number of fields</label>
        		<input type="text" class="form-control" id="input" name="numOfInputFields">
    		</div>
    		<button type="submit" class="btn btn-default" name="genbtn">Generate...</button> 
		</form>
		<?php
		if (isset($_POST['genbtn'])) {
			$breaker =0;
			echo '<table class="table table-striped">';
			echo "<thead>";
			echo "<tr>";
			echo "<th>Day</th>";
			for ($i=1; $i < $_POST['numOfInputFields']+1; $i++) { 
				echo "<th>Event ".$i."</th>";
			}
			echo "</tr>";
			echo "</thead>";			
			echo "<tbody>";
			foreach ($_POST['day'] as $day) {			
				echo "<tr><td>".$day."</td>";
				$breaker++;
				for ($i=1; $i < $_POST['numOfInputFields']+1; $i++) { 

					echo "<td>event ".$breaker.".".$i." </td>";
				}				
				echo "</tr>";
				
			}
			echo "</tbody>";
			echo "</table>";
		}			
		?>	
	</main>
	<nav aria-label="Page navigation">
  		<ul class="pagination">
    		<li>
      			<a href="#" aria-label="Previous">
        			<span aria-hidden="true">&laquo;</span>
      			</a>
    		</li>
    		<li><a href="#">1</a></li>
    		<li class="active"><a href="#">2<span class="sr-only">(current)</span></a></li>
    		<li><a href="#">3</a></li>
    		<li><a href="#">4</a></li>
    		<li><a href="#">5</a></li>
    		<li>
      			<a href="#" aria-label="Next">
        			<span aria-hidden="true">&raquo;</span>
      			</a>
    		</li>
  		</ul>
	</nav>
</div>
</body>
</html>