<?php

    session_start();

    if (isset($_GET['name'])): 
    
      require_once("../dbcon.php");
   	$chatprsn = $_GET['name'];
	$username = $_SESSION['userid'];
	$now = time();
	$room = 'Room'.$now;
	 $findUser = "SELECT * FROM `chat_users_rooms` WHERE `username` = '$chatprsn' AND `uesrname2` ='$username' ";
	if(!renQry($findUser))
	{
		  $insertUser = "INSERT INTO `chat_users_rooms` (`id`, `username`, `room`, `mod_time`,`uesrname2`) VALUES ( NULL , '$chatprsn', '$room', '$now','$username'),( NULL , '$username', '$room', '$now','$chatprsn')";
		mysql_query($insertUser) or die(mysql_error());
	}
	  $res = renQry($findUser);
      $getRooms = "SELECT * FROM chat_rooms WHERE name = '".$res[0]->room."'";
      $file = $res[0]->room.'.txt';
	  	if(!renQry($getRooms)){
			$numofuser = 2;
          $postUsers = "INSERT INTO `chat_rooms` (`id`, `name`, `numofuser`, `file`) VALUES (NULL, '".$res[0]->room."', '$numofuser', '$file');";	
    		    mysql_query($postUsers);
		}
	    $roomResults = renQry($getRooms);
		if(!is_file($file)){
		    $handle = fopen($file, 'w');
		}
        

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Welcome to: <?php echo $chatprsn; ?></title>
    
    <link rel="stylesheet" type="text/css" href="../main.css"/>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
    	var chat = new Chat('<?php echo $file; ?>');
    	chat.init();
    	chat.getUsers(<?php echo "'" . $chatprsn ."','" .$_SESSION['userid'] . "'"; ?>);
    	var name = '<?php echo $_SESSION['userid'];?>';
    </script>
    <script type="text/javascript" src="settings.js"></script>

</head>

<body>

    <div id="page-wrap"> 
    
    	<div id="header">
    	
        	<h1><a href="/examples/Chat2/">Chat v2</a></h1>
        	
        	<div id="you"><span>Logged in as:</span> <?php echo $_SESSION['userid']?></div>
        	
        </div>
        
    	<div id="section">
    
            <h2><?php echo $chatprsn; ?></h2>
                     
            <div id="chat-wrap">
                <div id="chat-area"></div>
            </div>
            
            <div id="userlist"></div>
                
                <form id="send-message-area" action="">
                    <textarea id="sendie" maxlength='100'></textarea>
                </form>
            
        </div>
        
    </div>
        
</body>

</html>

<?php
    else:
          
    endif; 
?>
