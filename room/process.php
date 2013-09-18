<?php
	
//http://localhost/Chat2/room/update.php?_=1379402749622&state=-1&file=Room1379154988.txt

  $function = htmlentities(strip_tags($_POST['function']), ENT_QUOTES);
	$file = htmlentities(strip_tags($_POST['file']), ENT_QUOTES);
    
  $log = array();
    $date = date("l jS  F Y");
 $lines = file($file);

 
    switch ($function) {
    
    	 case ('getState'):
    	 
        	 if (file_exists($file)) {
               $lines = file($file);
        	 }
             $log['state'] = count($lines);
              
        	 break;	
        	 
    	 case ('send'):
    	 
		     $nickname = htmlentities(strip_tags($_POST['nickname']), ENT_QUOTES);
		     $patterns = array("/:\)/", "/:D/", "/:p/", "/:P/", "/:\(/");
			 $replacements = array("<img src='smiles/smile.gif'/>", "<img src='smiles/bigsmile.png'/>", "<img src='smiles/tongue.png'/>", "<img src='smiles/tongue.png'/>", "<img src='smiles/sad.png'/>");
			 $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
			 $blankexp = "/^\n/";
			 $message = htmlentities(strip_tags($_POST['message']), ENT_QUOTES);
			
    		 if (!preg_match($blankexp, $message)) {
            	
    			 if (preg_match($reg_exUrl, $message, $url)) {
           			$message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
    			 } 
    			 $message = preg_replace($patterns, $replacements, $message);
			 //fwrite(fopen($file, 'a'),"\n".date("Y-m-d")."\n");
			    	   include("test.php");
            	 fwrite(fopen($file, 'a'),"[".date("h:i:s A")."]<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n"); 
    		 }
    		break;
    	
    }
    
    echo json_encode($log);

?>
