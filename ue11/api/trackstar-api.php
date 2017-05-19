<?php
    include '../../users.php';
    require "../db/db.php";
    
    //API: DELETE Project by ID
    if(isset($_POST['deleteProId'])){
        $var=$db->quote($_POST['deleteProId']);            
        $res=$db->query ( "DELETE FROM project WHERE id=$var" );    
        $response=["deleteResponse"=>$res->rowCount()];  
        echo json_encode($response);                     
        exit;
    }
    if (isset($_GET['editProId'])) {   
        $id=$_GET['editProId'];         
        $res=$db->query ( "SELECT name,description,createDate, id FROM project WHERE id=$id" );   
        $tmp=$res->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($tmp);   
    }
    if(isset($_POST['updateProData'])){         
        $data = json_decode($_POST['updateProData'], true);   
        $res=$db->query ( "UPDATE project SET name='$data[updateProName]', description='$data[updateProDesc]', createDate='$data[updateProDate]' WHERE id=$data[updateProId]" );            
    }
?>

