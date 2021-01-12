<?php 

$conexion=mysqli_connect("localhost","root","","vera_e1");

 ?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registro de Banco</title>
	<link href="estilos.css" rel="stylesheet" type="text/css">


</head>
<body>

	<h5 style="color:#110ACD"> <a href="right-sidebar.html"> Volver</a></h5>
	
	<h1 style="text-align: center;">REGISTRO DE BANCO</h1>

	<div class="group">

	<form action="registro_banco.php" style="padding-left: 20px;">
	
	<label for="">Código: <span><em>(*)</em></span></label>
      <input type="numero" name="id" title="Ingrese solo numeros" onKeyPress="return soloNumeros(event)" placeholder="ingrese codigo"class="form-input" required/>   
      
    <label for="">Nombre: <span><em>(*)</em></span></label>
      <input type="text" name="nombre" title="Ingrese solo letras" onKeyPress="return soloLetras(event)" placeholder="Ingrese nombre"class="form-input" required/>  

      <label for="">Dirección: <span><em>(*)</em></span></label>
      <input type="text" name="direc" title="Ingrese solo letras" onKeyPress="return soloLetras(event)" placeholder="Ingrese su direccion"class="form-input" required/>            
      
      <label for="">Email <span><em>(*)</em></span></label>
      <input type="email" name="correo" placeholder="Ingrese su correo electronico " class="form-input" />

		<label for="">Telefono:<span><em>(*)</em></span></label>
      <input type="numero" name="telef" title="Ingrese solo numeros" onKeyPress="return soloNumeros(event)" placeholder="ingrese su telefono" class="form-input" />

	
		<center>
			<input class="form-btn" name="submit" type="submit" value=" Registrar">
</center>

	</form>
</div>

	<?php
	if ($_REQUEST) {

		$Codigo = $_REQUEST['id'];
		$Nombre = $_REQUEST['nombre'];
		$Direccion = $_REQUEST['direc'];
		$Correo = $_REQUEST['correo'];
		$Telefono = $_REQUEST['telef'];
		


	$consulta = "INSERT INTO `banco` (`id_banco`, `nombre_entidad`, `direccion`, `correo`, `telefono`) VALUES ('$Codigo', '$Nombre', '$Direccion', '$Correo', '$Telefono');";


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
