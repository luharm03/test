<?php
require_once("../Chat2/dbcon.php");
    session_start();
	
	 	$username = $_POST['userid'];
    	
    		$getUsers = "SELECT *
    					 FROM chat_users
    					 WHERE username = '$username'";
    					 $row=renQry($getUsers);
    		if (!empty($row)) { 
			$_SESSION['userid']=$row[0]->username;
            header('Location: ./chatrooms.php');   		
    } else {
	 header('Location:index.php?msg'); 
	 	}
    
   ?>
