<?php
	if(isset($_POST["envio"])){
		//echo "Iniciamos con el registro del usuario" ;
		
		// RECUPERAR LA INFORMACION DEL FORMULARIO	
		echo "Entra";	
		$name = $_POST["rname"];
		$correo = $_POST["rcorreo"];
		$pass1= $_POST['rpass1'];
		$pass2= $_POST['rpass2'];
		if(strcmp($pass1, $pass2)==0){
			echo "<br>Entra pass";
			$link = mysqli_connect("localhost", "DrBot", "MyClinic@", "MyClinic") or die("Error en " . mysqli_error($link));

			$max= "SELECT id_Dentista FROM dentista WHERE id_Dentista=(select max(id_Dentista) from dentista);";
			$result= mysqli_query($link,$max);
			$row= mysqli_fetch_array($result);
			$id= $row['id_Dentista'];
			$id=$id+1;
			$SQL = "insert into dentista values($id,'$name','$correo', '$pass1', 1);";
			$row = mysqli_query($link, $SQL);
			
			// VERIFICAMOS SI SE INSERTO O NO
			$c = mysqli_affected_rows($link); 
			mysqli_close($link);

			/* SI EL VALOR = 1, REGISTRO EXITOSO
				SINO, NO SE PUDO INSERTAR EL USUARIO
			*/
			if($c == 1){
				session_start();
                $_SESSION["usuario"]=$row;
                header("Location: index-login.php");
			}
			// el usuario ya existe
			else{
				echo "<label id=\"Error\">Error al ingresar Informacion<label>";
				header("Location: Registro.php");
				
			}
		}
		else{
				
				header("Location: Registro.php");
				echo "<br><label id=\"Error\">Contraseñas diferentes<label>";
				
			}
	}
		
		
?>