<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contacts</title>
<head>
    <style type="text/css">
<!--
-->
    </style>
     <meta charset="UTF-8" />

</head>

   

<body>

</div>
	<div id="main">
   
		<h1>Upload Your Images</h1>
       
            
		<form method="post" enctype="multipart/form-data"  action="upload.php">
    		<input type="file" name="images" id="images" multiple />
    		<button type="submit" id="btn">Upload Files!</button>
       
    	</form>

  	<div id="response"></div>
		<ul id="image-list">

		</ul>
	</div>
	<?php if(isset($_POST['image'])) { echo $_POST['image']; }?>
<img alt="Resized Sample Image" id="resultimage" height=0 src="<?php if(isset($_POST['image'])) { echo $_POST['image'];}?>" width=0>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="../src/upload.js"></script>
    <script src="../src/jquery.ae.image.resize.js"></script>
    <script>
 //var w= $('#widthid').val();
    $(function() { alert('hi');
      $( "#resultimage" ).aeImageResize({ height: 250, width: 250 });
    });
  </script>
</body>
</html>
