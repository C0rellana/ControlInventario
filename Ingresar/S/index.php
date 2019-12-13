
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PRODUCTOS</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
<body background="../Imagenes/FONDO1.jpg">

<br>
<br>
<div class="group">
  <form action="registro.php" method="POST">
  <h2><em>INGRESAR PRODUCTO</em></h2>

     <label for="ID">N° BOLETA <span><em>(requerido)</em></span></label>
      <input type="text" name="ID" class="form-input" required/>

     <label for="STOCKS">CANTIDAD <span><em>(requerido)</em></span></label>
      <input type="text" name="STOCK" class="form-input" required/>           
      


     <center> <input class="form-btn" name="submit" type="submit" value="Agregar" /></center>
    </p>
  </form>
</div>
</body>
</html>