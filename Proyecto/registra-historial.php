<?php 
      if(isset($_POST["historial"])){
       
        $fecha=$_POST['fecha'];
        $tratamiento=$_POST['tratamiento'];
        $costo=$_POST['Costo'];
        $cuenta=$_POST['Cuenta'];
        $saldo=$_POST['Saldo'];
        $idpaciente= $_GET['id'];
        $link = mysqli_connect("localhost", "root", "Pegubo105@", "MyClinic") or die("Error en " . mysqli_error($link));

        $max= "SELECT Cita_id FROM historial WHERE Cita_id=(select max(Cita_id) from historial);";
        $result= mysqli_query($link,$max);
        $row= mysqli_fetch_array($result);
        $id= $row['Cita_id'];
        $id=$id+1;
        //echo "$id";

        $query= "INSERT INTO historial VALUES($id,'$fecha','$tratamiento',$costo,$cuenta,$saldo,$idpaciente);";
        $result= mysqli_query($link,$query);
        $error= mysqli_error($link);
        $c = mysqli_affected_rows($link);
        mysqli_close($link);
        if($c == 1){
          header ("location: historial-clinico.php?id=".$idpaciente);
        }
        else{
          echo "<label id=\"error\" class=\"text-danger\">Error al ingresar cita ".$error."</label>";
        }
      }

  ?>