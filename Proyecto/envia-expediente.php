<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		if(isset($_POST['Expediente'])){
			$fecha= $_POST['fecha'];
			$tratamientoini= $_POST['tratamientoini'];
			$name = $_POST['name'];
			$apep = $_POST['apep'];
			$apem = $_POST['apem'];
			$domicilio = $_POST['domicilio'];
			$telefono = $_POST['Telefono'];
			$edad = $_POST['edad'];
			$ocupacion = $_POST['ocupacion'];
			$sexo = $_POST['sexo'];
			
			$trat = $_POST['trat'];
			$trattext = $_POST['trattext'];
			$meditext = $_POST['meditext'];
			$motivoconsult = $_POST['motivoconsult'];
			$enfermedades = $_POST['Enfermedades'];
			$alergias = $_POST['Alergias'];
			$higiene = $_POST['Higiene'];
			$alimentacion = $_POST['alimentacion'];
			$color = $_POST['color'];
			$usuario = $_SESSION['usuario'];
			$dent = $usuario['Nombre'];
			$idu= $usuario['id_Dentista'];
			
			$link = mysqli_connect("localhost", "DrBot", "MyClinic@", "myclinic") or die("Error en " . mysqli_error($link));
			
			echo "entro";
			$sql= "INSERT INTO paciente VALUES(0,$idu,'$name','$apep','$apem',$sexo,$domicilio,'$telefono','$ocupacion',$edad)";
			$result= mysqli_query($link,$sql);
			$error= mysqli_error($link);
			$p = mysqli_affected_rows($link); 
			$query= mysqli_query($link,"SELECT LAST_INSERT_ID();");
 			$row = mysqli_fetch_row($query);
 			$id= trim($row[0]);
			if($p==1){
				echo "entro p";
				$query= "INSERT INTO expediente VALUES(0,$id,'$trat','$trattext','$meditext','$motivoconsult','$enfermedades','$higiene','$alergias','$alimentacion','$color','$fecha','$tratamientoini');";
				$result= mysqli_query($link,$query);
				$error= mysqli_error($link);
				$c = mysqli_affected_rows($link); 
				mysqli_close($link);

				/* SI EL VALOR = 1, REGISTRO EXITOSO
					SINO, NO SE PUDO INSERTAR EL USUARIO
				*/
				if($c == 1){
					header ("location: expedientes.php");
				}
				else{
					//include ("Expediente.php");
					echo "<label id=\"error\" class=\"text-danger\">Error al ingresar usuario: $error</label>";
				}
			}
			else{
					//include ("Expediente.php");
					echo "<label id=\"error\" class=\"text-danger\">Error al ingresar usuario: $error</label>";
			}
			
		}
	}
	





?>

