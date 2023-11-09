<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_historial_clinico = (isset($_POST['id_historial_clinico'])) ? $_POST['id_historial_clinico'] : "";
$id_cliente  = (isset($_POST['id_cliente '])) ? $_POST['id_cliente '] : "";
$id_mascota = (isset($_POST['id_mascota'])) ? $_POST['id_mascota'] : "";
$Observacion = (isset($_POST['Observacion'])) ? $_POST['Observacion'] : "";
$Diagnostico = (isset($_POST['Diagnostico'])) ? $_POST['Diagnostico'] : "";





$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':



       


                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionhistorial_clinico = $conn->prepare(
                    "INSERT INTO chistorial_clinico(id_historial_clinico,id_cliente , id_mascota,Observacion, Diagnostico) 
                VALUES ('$id_historial_clinico','$id_cliente ','$id_mascota','$Observacion','$Diagnostico')"
                );



                $insercionhistorial_clinico->execute();
                $conn->close();
               
             

                

                header('location: index.php');
           




        break;

    case 'btnModificar':

        $editarhistorial_clinico = $conn->prepare(" UPDATE historial_clinico 
        SET id_cliente  = '$id_cliente ',id_mascota= '$id_mascota', Observacion = '$Observacion', 
        Diagnostico= '$Diagnostico'
        WHERE id_historial_clinico= '$id_historial_clinico' ");

     


        
        /* 
        $consultaFoto = $conn->prepare(" SELECT foto FROM historial_clinico
        WHERE id_historial_clinico = 'id_historial_clinico' "); */

        $eliminarhistorial_clinico = $conn->prepare(" DELETE FROM historial_clinico
        WHERE id_historial_clinico = '$id_historial_clinico' ");

        // $consultaFoto->execute();
        $eliminarhistorial_clinico->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;

    default:
        # code...
        break;
}



/* Consultamos todos los historial_clinico  */
$consultahistorial_clinico = $conn->prepare("SELECT * FROM historial_clinico");
$consultahistorial_clinico->execute();
$listahistorial_clinico = $consultahistorial_clinico->get_result();
$conn->close();