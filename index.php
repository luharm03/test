<?php 
    session_start();

    if (!isset($_SESSION['userid'])): 
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
        <div id="reg"><a href="regitration.php" style="text-decoration:none"><span>Registration</span></a></div>
    	<div id="section">
        	<form method="post" action="jumpin123.php">
			<?php if(isset($_REQUEST['msg'])) { echo "<div class='message'>Sorry! You have to register first.</div>"; }
			    if(isset($_REQUEST['regmsg'])) { echo "<div class='message'>Thanks!User is register.</div>"; }     
			?>
            	<label>Desired Username:</label>
                <div>
                	<input type="text" id="userid" name="userid" />
                    <input type="submit" value="Check" id="jumpin" />
            	</div>
            </form>
        </div>
        
        <div id="status">
        	<?php if (isset($_GET['error'])): ?>
        		<!-- Display error when returning with error URL param? -->
        	<?php endif;?>
        </div>
        
    </div>
    
</body>

</html>

<?php 
    else:
        require_once("chatrooms.php");
    endif; 
?>
