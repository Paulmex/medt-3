<?php
session_start();
$user="brunner";
$pwd="brunner";
if(!empty($_POST['username'])&&!empty($_POST['password'])){
	if ($_POST['username']==$user && $_POST['password']==$pwd) {
		$_SESSION["username"]=$_POST['username'];
		$_SESSION["password"]=$_POST['password'];		
		header("Location: project-list.php");	
	} else {
		header("Location: index.php");	
	}

} else {
	header("Location: index.php");
}
?>