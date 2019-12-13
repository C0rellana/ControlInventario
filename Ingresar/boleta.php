
<!DOCTYPE html>
<html>
	<head>

		<title>BOLETA CREADA 'INGRESO' </title>	
		<link rel="stylesheet" type="text/css" href="../Consulta_Stock/style.css">
		<script>
			function check()
            {
                var searchtext = document.getElementById("txt").value;
                if(searchtext=='')
                {
                    alert('Enter string to search');
                   
                }
				else{
					document.myform.submit();
				}
            }
			function reset_table()
			{
				document.myform.submit();
			}
		</script>

	
	</head>



<body>


<div>
<?php 
	$ID= $_GET['varB']; 

	error_reporting(0);
	require_once "../Consulta_Stock/config.php";
	$db_connection = mysql_connect($hostname, $username, $password);

	if (!$db_connection) {
		die('No se ha podido conectar a la base de datos');
	}

	mysql_select_db('INFO',$db_connection);


	//OBTENER ID DE DETALLES DE SEGUN CODIGO DE BOLETA
	$varX="SELECT DETALLES FROM BOLETA where ID = $ID";

	$resultado_consulta_mysql=mysql_query($varX,$db_connection);
	while($registro=mysql_fetch_array($resultado_consulta_mysql)){
	 $varX= $registro['DETALLES']."
	";
	}





	echo "<div align='center' class='resp_code'>";
	echo "<h5><b>BOLETA N° $ID   |    Tipo: INGRESO </b></h5>";
	echo "<div align='center'>";
	    
		  echo "<table class='table'>
		
			<th>NOMBRE PRODCUTO</th>
			<th>CANTIDAD</th>
			</tr>";	   

		    $query = mysql_query("SELECT * FROM DETALLES where ID=$varX");

		    while($row=mysql_fetch_array($query))
		    {
			$nam = $row['ID'];
			$clg = $row['NOMBRE'];
			$email = $row['STOCK'];


			switch ($row[1]) {
			    case 1:
			       	$XD= "SEPARADORES";
			        break;
			    case 2:
			        $XD= "ETIQUETAS";
			        break;
			    case 3:
			        $XD= "CAJAS";
			        break;
			    case 4:
			        $XD= "BOTELLAS";
			        break;

			}
			
			echo "<tr>
			<td id='NOMBRE'>$XD</td>
			<td id='STOCK'>$row[2]</td>
			</tr>";		
		    }
	 
	    
	    echo "</table>";
	    echo "</div>";
		echo "<div style='font-weight:bold;color:red;'>$op</div>";
	    echo "<div id='dumdiv' align='center' style=' font-size: 10px;color: #dadada;'>
	    <a id='dum' style='padding-right:0px; text-decoration:none;color: #dadada;text-align:center;' href='https://www.hscripts.com'>&copy;h</a>
	  </div>";
	     echo "</div>";
?>



      <div align='center'>
      	<input type='submit' name='submit' value='VOLVER' onclick="history.back(-1)">

      	<input type='submit' name='submit' value='CERRAR' onclick="window.close()">
        </div>
        </div>



</div>


</body>
</html>


