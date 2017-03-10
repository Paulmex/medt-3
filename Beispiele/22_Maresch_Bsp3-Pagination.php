<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <?php
    // DB Settings
    $host ='localhost';
    $dbname='classicmodels';
    include '../users_1.php';
    //Establish connection
    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pwd);
    } catch (PDOException $e) {
        exit("<p>System nicht verfügbar</p>");
    }
    $startval;
    $addval=20;
    if(isset($_GET['page']))
    {
    $startval=$_GET['page']*20;
    }	else  {
    $startval=0;
    }
    $res=$db->query ( "SELECT customerName, contactLastName, contactFirstName, postalCode, city FROM customers LIMIT $startval,$addval" );
    $tmp=$res->fetchAll(PDO::FETCH_OBJ);
    ?>
    <h1>Kundenübersicht</h1>
	<table class="table table-striped table-hover">
		<thead>
			<tr style="background-color: lightgrey;">
				<th>Firma</th>
				<th>Nachname</th>
				<th>Vorname</th>
				<th>PLZ</th>
                <th>Ort</th>
			</tr>
		</thead>
	    <tbody>
			<?php foreach ($tmp as $row) :?>
        <tr>
            <td><?php echo $row->customerName;?></td>
            <td><?php echo $row->contactLastName;?></td>
            <td><?php echo $row->contactFirstName;?></td>
            <td><?php echo $row->postalCode;?></td>
            <td><?php echo $row->city;?></td>
        </tr>
    <?php endforeach; 	 ?>
    </tbody>
    </table>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="22_Maresch_Bsp3-Pagination.php?page=0" aria-label="First">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li>
                <?php
                if(isset($_GET['page'])){ if(($_GET['page'])!=0) {
                    echo '<a href="22_Maresch_Bsp3-Pagination.php?page='.(($_GET['page'])-1).'" aria-label="Previous">';
                    echo '<span aria-hidden="true">&lt;</span>';
                    echo '</a>'; }
                if(($_GET['page'])==0){
                    echo '<a href="22_Maresch_Bsp3-Pagination.php?page=0" aria-label="Previous">';
                    echo '<span aria-hidden="true">&lt;</span>';
                    echo '</a>'; }
                }
                else {
                    echo '<a href="22_Maresch_Bsp3-Pagination.php?page=0" aria-label="Previous">'; ?>
                        <span aria-hidden="true">&lt;</span>
                    </a>
                <?php }
                ?>
            </li><?php
            $lastpage;
            $res=$db->query ( "SELECT COUNT(customerNumber) FROM customers" );
            $tmp=$res->fetchColumn();
            $num=$tmp/20;
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
                    echo '<li><a href="22_Maresch_Bsp3-Pagination.php?page='.$i.'">'.$displayi.'</a></li>';
                }
                else
                {
                    echo '<li class="active"><a href="22_Maresch_Bsp3-Pagination.php?page='.$i.'">'.$displayi.'</a></li>';
                }
                $lastpage=$i;
            }
            ?>
            <li>
                <?php
                if(isset($_GET['page'])){ if($_GET['page']!=$lastpage){
                    echo '<a href="22_Maresch_Bsp3-Pagination.php?page='.(($_GET['page'])+1).'" aria-label="Next">';
                    echo '<span aria-hidden="true">&gt;</span>';
                    echo '</a>';}
                if($_GET['page']==$lastpage){
                    echo '<a href="22_Maresch_Bsp3-Pagination.php?page='.$_GET['page'].'" aria-label="Next">';
                    echo '<span aria-hidden="true">&gt;</span>';
                    echo '</a>';}
                }
                else {
                    echo '<a href="22_Maresch_Bsp3-Pagination.php?page=1" aria-label="Next">'; ?>
                        <span aria-hidden="true">&gt;</span>
                    </a>
                <?php }
                ?>
            </li>
            <li>
                <?php echo '<a href="22_Maresch_Bsp3-Pagination.php?page='.$lastpage.'" aria-label="Last">'; ?>
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
</body>
</html>