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
    if(isset($_POST['deleteProId'])){
        try{
            $var=$db->quote($_POST['deleteProId']);            
            $res=$db->query ( "DELETE FROM project WHERE id=$var" );    
            echo "1";                       
            exit;
        } catch (Exception $e){
            echo "0";
            exit;
        }
    }


?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
    if(isset($_POST['deleteProId'])){
        echo "Hallo, du!";
        exit;
    }
    //$res: PDOStatement
    $res=$db->query ( "SELECT name,description,createDate, id FROM project" );
    //$tmp: array
    $tmp=$res->fetchAll(PDO::FETCH_OBJ); //FETCH_OBJ in die Klammern wenn man objektorientiert arbeiten will
    ?>
    <h1>Projektübersicht</h1>
    <p id="info-box"></p>
    <br>
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
        <?php echo '<tr id="'.$row->id.'">' ?>
            <td><?php echo htmlspecialchars($row->name);?></td>
            <td><?php echo $row->description;?></td>
            <td><?php echo $row->createDate;?></td>
            <?php echo '<td><a><span class="glyphicon glyphicon-trash delete-icon" style="color:black"></span></a>
				<a style="color:black"><span class="glyphicon glyphicon-pencil"></span></a>				
				</td>';
            ?>
        </tr>
    <?php endforeach; 	 ?>
    </tbody>
    </table>

</div>
<!-- Latest compiled and minified JavaScript -->
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/app.js"></script>
</body>
</html>