<?php
//session_start();
$album_id= 1;


 $name ="";

foreach ($_FILES["images"]["error"] as $key => $error) { 
    if ($error == UPLOAD_ERR_OK) {
        $name .=",". $_FILES["images"]["name"][$key];
	
		
        move_uploaded_file( $_FILES["images"]["tmp_name"][$key], "uploads/" . $_FILES['images']['name'][$key]);
    }
}
	$sql="UPDATE album SET photos='$name' WHERE id='$album_id'";
		
		
		$result=mysql_query($sql);


?>
    <script>
	$.ajax({
				url: "index1.php",
				type: "POST",
				data: { "image" : <?php echo $_FILES["images"]["name"][$key]?> },
				//processData: false,
				//contentType: false,
				success: function (res) { alert(res);
					document.getElementById("resultimage").innerHTML ='<img alt="Resized Sample Image" height=0 src="uploads/<?php echo $_FILES["images"]["name"][$key]?>" width=0>';
				}
			});
			</script>
