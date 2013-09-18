<?php

    session_start();
    $lasttime=date("Y-m-d");
    //$datetime=date("d");
    if (isset($_GET['name'])): 
    
      require_once("../dbcon.php");
   	$chatprsn = $_GET['name'];
	$username = $_SESSION['userid'];
	$now = time();
	$room = 'Room'.$now;
	 $findUser = "SELECT * FROM `chat_users_rooms` WHERE `username` = '$chatprsn' AND `uesrname2` ='$username' ";

$case = 0;
    if(!renQry($findUser))
	{$case = 1;
		  $insertUser = "INSERT INTO `chat_users_rooms` (`id`, `username`, `room`, `mod_time`,`uesrname2`,`last_time`) VALUES ( NULL , '$chatprsn', '$room', '$now','$username','$lasttime'),( NULL , '$username', '$room', '$now','$chatprsn','$lasttime')";
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
       //echo  strtotime($res[0]->last_time);
      // echo "<pre>";
      // echo  strtotime($lasttime);
       // / print_r($_SERVER);
        $todayState='';
        $temptime = '';
        if(isset($_POST['history']) && $_POST['history']!='')
        {
            echo $hday = $_POST['history'];echo "<br>";
            echo $temptime = date("Y-m-d",mktime(0,0,0,date('d')-$hday,date('m'),date('Y')));
        }
        if (file_exists($file)) {
               $lines = file($file);
               if ($temptime == '') 
               {
                $temptime =  $lasttime;
               }
               
               foreach ($lines as $key => $value) {
                //echo $value."<br>";
                  if(trim($value)==$temptime )
                  {
                  //  echo $key."date is find";
                    $todayState=$key;
                  }
               }
             }
        if(strtotime($lasttime) > strtotime($res[0]->last_time)){
            $case = 2;
            mysql_query("UPDATE `chat_users_rooms` SET `last_time`= '".$lasttime."'WHERE `username` = '$chatprsn' AND `uesrname2` ='$username' ");
        }
		if ($case == 1 ) 
        {
            fwrite(fopen($file, 'a'), "\n".$lasttime . "\n"); 
        }elseif ($case == 2 ) 
        {
            fwrite(fopen($file, 'a'), "\n".$lasttime . "\n"); 
        }else
        {
            //echo "neend aa rhi hai";
        }
	   

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Welcome to: <?php echo $chatprsn; ?></title>
    
    <link rel="stylesheet" type="text/css" href="../main.css"/>
    
   <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>-->
    <script type="text/javascript" src="../jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
        var todayState = '<?php echo $todayState;?>';
console.log(todayState);
    	var chat = new Chat('<?php echo $file; ?>',todayState);
    	chat.init();
    	chat.getUsers(<?php echo "'" . $chatprsn ."','" .$_SESSION['userid'] . "'"; ?>);
    	var name = '<?php echo $_SESSION['userid'];?>';
    </script>
    <script type="text/javascript" src="settings.js"></script>

</head>

<body>

    <div id="page-wrap"> 
    
    	<div id="header">
    	
        	<h1><a  href="#">Chat</a></h1>
        	
        	<div id="you"><span>Logged in as:</span> <?php echo $_SESSION['userid']?></div>
        	
        </div>
        
    	<div id="section">
    
            <h2><?php echo $chatprsn; ?></h2>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">
                     <select name="history" onchange="this.form.submit();" >
                        <option value="">-Select-</option>
                        <option value="1">24 Hours</option>
                        <option value="2">2 Days</option>
                        <option value="3">3 Days</option>
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
