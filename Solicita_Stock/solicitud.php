
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PRODUCTOS</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
</head>

<body>

<br>
<br>
<div class="group">
  <form action="registro.php" method="POST">
  <h2><em>SOLICITAR STOCK DE  PRODUCTO</em></h2>

     <label for="ID">NOMBRE DEL PRODUCTO<span><em>(requerido)</em></span></label>
      <input type="text" name="ID" class="form-input" required/>

     <label for="STOCKS">CANTIDAD DEL PRODUCTO<span><em>(requerido)</em></span></label>
      <input type="text" name="STOCK" class="form-input" required/>           
      


     <center> <input class="form-btn" name="submit" type="submit" value="SOLICITAR" /></center>
    </p>
  </form>
</div>
</body>
</html>