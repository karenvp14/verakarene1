<?php 

$conexion=mysqli_connect("localhost","root","","vera_e1");

 ?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registro de Cuenta</title>
	<link href="estilos.css" rel="stylesheet" type="text/css">


</head>
<body style="background-color:#D08FE9">
	<h5 style="color:#110ACD"> <a href="index.php"> Volver</a></h5>
	
<h1 style="text-align: center;">REGISTRO DE CUENTA</h1>
	<div class="group">
	 <form action="registro_cuenta.php" style="padding-left: 20px;">
	

 <label for="nombre">Codigo: <span><em>(*)</em></span></label>
      <input type="text" name="id_cuent" title="Ingrese solo numeros" onKeyPress="return soloNumeros(event)" placeholder="ingrese codigo" class="form-input" required/>   
      
      <label for="apellido">Tipo de cuenta: <span><em>(*)</em></span></label>
      <input type="text" name="tipo_cuent" title="Ingrese solo letras" onKeyPress="return soloLetras(event)" placeholder="Ingrese tipo de cuenta" class="form-input" required/>             
      
			<center>
			<input class="form-btn" name="submit" type="submit" value=" Registrar">
</center>


	</form>
</div>


	<?php 
	if ($_REQUEST) {
		
		$cedula = $_REQUEST['id_cuent'];
		$nombre = $_REQUEST['tipo_cuent'];


		$consulta = "INSERT INTO `cuentas` (`id_cuenta`, `tipo_cuenta`) VALUES ('$cedula', '$nombre');";


			$resul = mysqli_query($conexion, $consulta);
			echo $resul;

			mysqli_close($conexion);

    if($resul)
     {
       echo' LOS DATOS SE HAN REGISTRADO EXITOSAMENTE !!! ';

}else
{
   
}//Cierre Else($ejecutar)

	}

	 ?>
</body>
</html>

<script type="text/javascript">
        function soloNumeros(e){
            var key = window.Event ? e.which : e.keyCode
            return (key >= 48 && key <= 57)
        }
        function soloLetras(e){
            var key = window.Event ? e.which : e.keyCode
            return ((key >= 65 && key <= 90)||(key >= 97 && key <= 122)||key==32)
        }

    </script>