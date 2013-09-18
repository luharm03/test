<?php

    session_start();

    if (isset($_GET['name'])): 
    
	require_once("../dbcon.php");
   	//print_r($_SERVER);
	    $chatprsn = $_GET['name'];
	    $username = $_SESSION['userid'];
	    $now = time();
	    $room = 'Room'.$now;
	    $lasttime = date("Y-m-d");
	    $case  = 0;
	    $findUser = "SELECT * FROM `chat_users_rooms` WHERE `username` = '$chatprsn' AND `uesrname2` ='$username' ";
	    
	    if (!runQry($findUser))
	    {
		$case  = 1;
		$insertUser = "INSERT INTO `chat_users_rooms` (`id`, `username`, `room`, `mod_time`,`uesrname2`,`last_time`) VALUES ( NULL , '$chatprsn', '$room', '$now','$username','$lasttime'),( NULL , '$username', '$room', '$now','$chatprsn','$lasttime')";
		mysql_query($insertUser) or die(mysql_error());
	    }
	    
	    $res = runQry($findUser);
	    $getRooms = "SELECT * FROM chat_rooms WHERE name = '".$res[0]->room."'";
	    $file = $res[0]->room.'.txt';
	    
	    if (!runQry($getRooms))
	    {
		$numofuser = 2;
		$postUsers = "INSERT INTO `chat_rooms` (`id`, `name`, `numofuser`, `file`) VALUES (NULL, '".$res[0]->room."', '$numofuser', '$file');";	
		mysql_query($postUsers);
	    }
	    //echo strtotime($lasttime) .">=". strtotime($res[0]->last_time);
	    $roomResults = runQry($getRooms);
	    if (strtotime($lasttime) != strtotime($res[0]->last_time))
	    {
		mysql_query("UPDATE `chat_users_rooms` SET `last_time` = '".$lasttime."'  WHERE `username` = '".$chatprsn."' AND `uesrname2` ='".$username."'");
		mysql_query("UPDATE `chat_users_rooms` SET `last_time` = '".$lasttime."'  WHERE `username` = '".$username."' AND `uesrname2` ='".$chatprsn."'");
		$case  = 2;
		
	    }
	  
	  if ($case == 1)
	  {
	     fwrite(fopen($file, 'a'),"\n".$lasttime. "\n"); 
	  }
	  elseif ($case  == 2)
	  {
	    fwrite(fopen($file, 'a'),"\n".$lasttime. "\n"); 
	  }
	    if (file_exists($file)) {
	       $readyState = '';
	       
	       //print_r(file($file));
               $lines = file($file);
	       if (isset($_POST['history']) && $_POST['history']!='')
	       {
		    $date1=strtotime($lasttime);
		    $lastdays = $_POST['history'];
		    $tmpTime = date('Y-m-d',mktime(0, 0, 0, date("m", $date1), date("d", $date1)-$lastdays, date("Y", $date1)));
		   
	       }
	       else
	       {
		    $tmpTime = $lasttime;
	       }
	       // echo $tmpTime;
		foreach($lines as $key => $val ){
		    if(trim($val) == $tmpTime ){
			$readyState = $key;
		    }
		}
	    }
        //echo $readyState;

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
    	var chat = new Chat('<?php echo $file; ?>','<?php echo $readyState; ?>');
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
	    <form method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">
		<select name="history" onchange="this.form.submit();">
		    <option value="">-Select-</option>
		    <option value="1">Last 24 Hour</option>
		    <option value="2">Last 7 Days</option>
		    <option value="3">Last 14 Days</option>
		    <option value="4">Last 30 Days</option>
		</select>
	    </form>
                    
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
