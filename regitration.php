<?php 
     require_once("dbcon.php");
	if(isset($_POST['submit']))
	{
	$username=$_POST['name'];
	  $now = time();
    		
    		   $postUsers = "INSERT INTO `chat_users` (
    					`id` ,
    					`username` ,
    					`status` ,
    					`time_mod`
    					)
    					VALUES (
    					NULL , '$username', '1', '$now'
    					)";
    					
    		   $val= mysql_query($postUsers) or die(mysql_error());    		
    		   if($val==1) { header('Location:index.php?regmsg'); }
	}
	
?>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Chat_G</title>
    
    <link rel="stylesheet" type="text/css" href="main.css" />
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2" type="text/javascript"></script>
    <script type="text/javascript" src="check.js"></script>
</head>

<body>

    <div id="page-wrap"> 
    
    	<div id="header">
        	<h1><a href="/examples/Chat2/">Chat v2</a></h1>
        </div>
    	<div id="section">
        	<form method="post" action="#">
            	<label>Username:</label>
                <div>
                	<input type="text" id="name" name="name" />
                    <input type="submit" value="submit" id="submit" name="submit"/>
            	</div>
            </form>
</body>

</html>
