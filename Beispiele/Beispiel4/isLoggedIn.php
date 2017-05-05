<?php
function sessionStarted(){
	if (isset($_SESSION["username"])&&isset($_SESSION["password"])){
		return true;
	} else {
		return false;
	}
}

?>