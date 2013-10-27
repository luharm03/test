<!doctype html>
<html>
  <meta charset=utf-8>
  <title>jQuery Resize Plugin Demo</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="../src/jquery.ae.image.resize.js"></script>
  <script>
 //var w= $('#widthid').val();
    $(function() {
      $( ".resizeme" ).aeImageResize({ height: 250, width: 250 });
    });
  </script>

<body>
   
      <h3>Sample 1</h3>

      <h4>Original</h4>
      <img alt="Original Sample Image 2 - 300px x 400px" height=400 src="sample2.jpg" width=300>

      <h4>Resized to 250px x 250px</h4>
      <img alt="Resized Sample Image" class=resizeme height=400 src="sample2.jpg" width=300>
  
</body>
</html>
