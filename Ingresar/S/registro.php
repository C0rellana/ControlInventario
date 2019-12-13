
<?php

$var=0;
$P=1;
require_once "config.php";

 $db_connection = mysql_connect($hostname, $username, $password);

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}

mysql_select_db('INFO',$db_connection);


$subs_BOLETA = utf8_decode($_POST['ID']);
$subs_cant = utf8_decode($_POST['STOCK']);





//echo (string) mysql_insert_id();

$varD = rand ( 1 ,9999999 );


//CREAR BOLETA
if ($subs_BOLETA==0) {

	mysql_query("INSERT INTO DETALLES (ID,PRODUCTO,CANTIDAD) VALUES ($varD,$P,$subs_cant)",$db_connection);


	mysql_query("INSERT INTO BOLETA (ID,DETALLES) VALUES ('',$varD)",$db_connection);

}



//OBTENER ID DE DETALLES DE SEGUN CODIGO DE BOLETA
$varX="SELECT DETALLES FROM BOLETA where ID = $subs_BOLETA";

	$resultado_consulta_mysql=mysql_query($varX,$db_connection);
	while($registro=mysql_fetch_array($resultado_consulta_mysql)){
	 $varX= $registro['DETALLES']."
	";
	}


//COMPROBAR SI EXISTE EL PRODUCTO 1 EN DETALLES

$consulta_mysql="SELECT PRODUCTO FROM DETALLES where PRODUCTO like '%$P%' and ID=$varX";

$resultado_consulta_mysql=mysql_query($consulta_mysql,$db_connection);

while($registro=mysql_fetch_array($resultado_consulta_mysql)){
 $var= $registro['PRODUCTO']."
";
}




//MODIFICAR BOLETA

if ($subs_BOLETA !=0) {

if ($var==$P) {
	//echo "ya existe";

	

	$update1= "UPDATE detalles SET CANTIDAD=(CANTIDAD + $subs_cant)  where ID=$varX and PRODUCTO=$P";
	mysql_query($update1,$db_connection);

}
	else
	{
		//echo "no existe";
		mysql_query("INSERT INTO DETALLES (ID,PRODUCTO,CANTIDAD) VALUES ($varX,$P,$subs_cant)",$db_connection);
	}

}





// MODIFICAR STOCK
$update2= "UPDATE productos SET STOCK=STOCK+ $subs_cant  where ID=$P";


mysql_query($update2,$db_connection);


if ($subs_BOLETA==0) {

	//OBTENER ID DE BOLETA DE SEGUN DETALLES
	$varX="SELECT ID FROM BOLETA where DETALLES = $varD";

	$resultado_consulta_mysql=mysql_query($varX,$db_connection);
	while($registro=mysql_fetch_array($resultado_consulta_mysql)){
	 $varX= $registro['ID']."
	";
	}
	mysql_close($db_connection);

	header("Location: ../boleta.php?varB=$varX");

}

else {

	mysql_close($db_connection);

	header("Location: ../boleta.php?varB=$subs_BOLETA");
}


?>

