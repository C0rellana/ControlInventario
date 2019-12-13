<!DOCTYPE html>
<html>
	<head>

		<title>Consulta de Stockt</title>	
		<link rel="stylesheet" type="text/css" href="Consulta_Stock/style.css">
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
	error_reporting(0);
	require_once "Consulta_Stock/config.php";
	$link = mysql_connect($hostname, $username,$password);
	$dbcon = mysql_select_db($dbname);
	 echo "<div align='center' class='resp_code'>";
	 echo "<h5><b>CONSULTA DE STOCK </b></h5>";
	echo "<div align='center'>";
	    
		  echo "<table class='table'>
			<tr><th>ID</th>
			<th>NOMBRE</th>
			<th>STOCK</th>
			</tr>";	   

		    $query = mysql_query("SELECT * FROM productos");

		    while($row=mysql_fetch_array($query))
		    {
			$nam = $row['ID'];
			$clg = $row['NOMBRE'];
			$email = $row['STOCK'];
			
			echo "<tr>
			<td id='ID'>$row[0]</td>
			<td id='NOMBRE'>$row[1]</td>
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



      <div align='center'><input type='submit' name='submit' value='VOLVER' onclick="history.back(-1)">
        </div>



</div>


</body>
</html>


