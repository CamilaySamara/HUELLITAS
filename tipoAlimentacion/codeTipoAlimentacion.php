<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas

$id_tipo_alimentacion = (isset($_POST['id_tipo_alimentacion'])) ? $_POST['id_tipo_alimentacion'] : "";
$Nom_tipo_alim = (isset($_POST['Nom_tipo_alim'])) ? $_POST['Nom_tipo_alim'] : "";




$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':


        $insercionTipoAlimentacion = $conn->prepare(
            "INSERT INTO tipo_alimentacion (Nom_tipo_alim) 
                VALUES ('$Nom_tipo_alim')"
        );


        $insercionTipoAlimentacion->execute();
        $conn->close();


        header('location: index.php');

        break;

    case 'btnModificar':

        $editarTipoAlimentacion = $conn->prepare("UPDATE tipo_alimentacion SET Nom_tipo_alim = '$Nom_tipo_alim'
        WHERE tipo_alimentacion.id_tipo_alimentacion = '$id_tipo_alimentacion'");

        $editarTipoAlimentacion->execute();
        $conn->close();

        header('location: index.php');

        break;



    case 'btnEliminar':

        $eliminarTipoAlimentacion = $conn->prepare("DELETE FROM tipo_alimentacion
         WHERE id_tipo_alimentacion = '$id_tipo_alimentacion'");

        // $consultaFoto->execute();
        $eliminarTipoAlimentacion->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;
}




/* Consultamos todas las clientes */

$consultaTipoAlimentacion = $conn->prepare("SELECT * FROM tipo_alimentacion");
$consultaTipoAlimentacion->execute();
$listaTipoAlimento = $consultaTipoAlimentacion->get_result();

//Al final de todas las consultas se cierra la conexion
$conn->close();

?>