<?php 

$conexion=mysqli_connect("localhost","root","","vera_e1");

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <title>Registro de Cliente</title>
  <link href="estilos.css" rel="stylesheet" type="text/css"> 

</head>
<body>

  <h5> <a href="index.php"> Volver</a></h5>

  <h1 style="text-align: center;">REGISTRO DEL CLIENTE</h1>


<div class="group">
  <form  class="form" action="registro_cliente.php" style="padding-left: 20px;">


    <div class="form">
    <label for="">Cédula: <span><em>(*)</em></span></label>
      <input type="int" id="cedula_cli" title="Ingrese solo numeros" name="ci_cliente" minlength="10" maxlength="10" required pattern="[0-9]{2,48}" onkeypress="return valideKeynum(event);" onblur="validar()" placeholder="Ingresar c&eacute;dula de identidad" value="" class="form-input" required/><div id="salida"></div>  

      <div class="form">
      <label for="">Nombres: <span><em>(*)</em></span></label>
      <input type="text" name="Nombres" title="Ingrese solo letras" onkeypress="return valideKeytext(event);" placeholder="Ingrese sus nombres" class="form-input" required/></div>

<div class="form">
      <label for="">Apellidos: <span><em>(*)</em></span></label>
      <input type="text" name="Apellidos" title="Ingrese solo letras" onkeypress="return valideKeytext(event);" placeholder="Ingrese sus apellidos" class="form-input" required/></div>

<div class="form">
      <label for="inputPassword6" class="col-form-label">Fecha de Nacimiento: <span><em>(*)</em></span></label>
      <input type="date" name="fecha_nacimiento" placeholder="1999-12-30" class="form-input" required></div>
    
    <div class="form">
      <label for="">Telefono: <span><em>(*)</em></span></label>
      <input type="int" name="telefono" minlength="10" maxlength="10" title="Ingrese solo numeros" onkeypress="return valideKeynum(event);" placeholder="ingrese su telefono" class="form-input" required/></div>
  
  <div class="form">
      <label for="">Correo: <span><em>(*)</em></span></label>
      <input type="email" name="correo" placeholder="Ingrese su correo electronico " class="form-input" required/></div>
  
  <div class="form">
      <label for="">Dirección: <span><em>(*)</em></span></label>
      <input type="text" name="direccion" title="Ingrese solo letras" onkeypress="return valideKeytext(event);" placeholder="Ingrese su direccion" class="form-input" required/></div>

<div class="form">
      <label for="">Tipo de cuenta: <span><em>(*)</em></span></label>
      <input type="int" name="id_cuenta" title="Ingrese solo numeros" onkeypress="return valideKeynum(event);" placeholder="ingrese su tipo de cuenta"class="form-input" required/></div>

<div class="form">
      <label for="">Numero de cuenta: <span><em>(*)</em></span></label>
      <input type="int" name="numero_cuenta" minlength="15" maxlength="15" title="Ingrese solo numeros" onkeypress="return valideKeynum(event);" placeholder="ingrese su numero de cuenta" class="form-input" required/></div>

<div class="form">
    <label for="">Banco: <span><em>(*)</em></span></label>
      <input type="int" name="id_banco" title="Ingrese solo numeros" onkeypress="return valideKeynum(event);" placeholder="ingrese id del banco " class="form-input" required/></div>
  
<center>
      <input class="form-btn" name="submit" type="submit" value=" Registrar">
</center>

  </form>
</div>
  <?php
  if ($_REQUEST) {

    $Cedula = $_REQUEST['ci_cliente'];
    $Nombres = $_REQUEST['Nombres'];
    $Apellidos = $_REQUEST['Apellidos'];
    $Fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
    $Telefono = $_REQUEST['telefono'];
    $Correo = $_REQUEST['correo'];
    $Direccion = $_REQUEST['direccion'];
    $Cuenta = $_REQUEST['id_cuenta'];
    $Numero_cuenta = $_REQUEST['numero_cuenta'];
    $Banco = $_REQUEST['id_banco'];


  $consulta = "INSERT INTO `clientes` (`ci_cliente`, `Nombres`, `Apellidos`, `fecha_nacimiento`, `telefono`, `correo`, `direccion`, `id_cuenta`, `numero de cuenta`, `id_banco`) VALUES ('$Cedula', '$Nombres', '$Apellidos', '$Fecha_nacimiento', '$Telefono', '$Correo', '$Direccion', '$Cuenta', '$Numero_cuenta', '$Banco');";


$resul = mysqli_query($conexion, $consulta);
      if ($resul) {
         ?> 
        <label for="inputPassword6" class="col-form-label"><h3><?php echo "EL CLIENTE HA SIDO REGISTRADO EXITOSAMENTE !!!";?> </h3></label>  

        <?php 
      }else{
        ?> 
       
        <label for="inputPassword6" class="col-form-label"><h3><?php echo "EL CLIENTE NO HA SIDO REGISTRADO X";?></h3></label>  

        <?php 
      }

      mysqli_close($conexion);



  }

   ?>

<script type="text/javascript">

  function valideKeynum(evt){
      
      // code is the decimal ASCII representation of the pressed key.
      var code = (evt.which) ? evt.which : evt.keyCode;
      
      if(code==8) { // backspace.
        return true;
      } else if(code>=48 && code<=57) { // is a number.
        return true;
      } else{ // other keys.
        return false;
      }
    }

    function valideKeytext(evt){
      
      // code is the decimal ASCII representation of the pressed key.
      var code = (evt.which) ? evt.which : evt.keyCode;
      
      if(code==8) { // backspace.
        return true;
      } else if(code>=65 && code<=122) { // is a number.
        return true;
      } else{ // other keys.
        return false;
      }
    }


    function validar() {
        var cad = document.getElementById("cedula_cli").value.trim();
        var total = 0;
        var longitud = cad.length;
        var longcheck = longitud - 1;
        if(cad == 2222222222){
document.getElementById("cedula_cli").value=("");
                document.getElementById("salida").innerHTML = ("Cedula Inválida");
                document.getElementById("salida").style.color = "red";
        }else{


        if(cad.charAt(0) == 0 || cad.charAt(0) == 1 || cad.charAt(0) == 2 ){
           //Revisa si esta vacia y si estan los 10 digitos
        if (cad !== "" && longitud <10){
            document.getElementById("cedula_cli").innerHTML = ("Inválida");
        } 
        if (cad !== "" && longitud === 10){
          //For para revisar cada numero de la cedula desde 0 a 9 , total 10 numeros
          for(i = 0; i < longcheck; i++){
            //If se ejecuta si los numeros son pares
            if (i%2 === 0) {
              //lo multiplica por 2 si es par
              var aux = cad.charAt(i) * 2;
              //si resulta mayor a nueve se le resta 9
              if (aux > 9) aux -= 9;
              // se guarda en total para sumarlo todo
              total += aux;
          } else {
              //en caso de que sea impar se multiplica por 1 , en este caso se suma en total
              total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
          }
      }
            //Si es un multiplo de 10 sera 0 si no el modulo.
            total = total % 10 ? 10 - total % 10 : 0;

            if (cad.charAt(longitud-1) == total) {
                document.getElementById("salida").innerHTML = ("Cedula Válida");
                document.getElementById("salida").style.color = "green";
           
            }else{
                document.getElementById("ccedula_cli").value=("");
                document.getElementById("salida").innerHTML = ("Cedula Inválida");
                document.getElementById("salida").style.color = "red";
            }
        }

        }else{
          document.getElementById("cedula_cli").value=("");
                document.getElementById("salida").innerHTML = ("Cedula Inválida");
                document.getElementById("salida").style.color = "red";
        }
         }

       
    }
</script>



</body>
</html>
    
   