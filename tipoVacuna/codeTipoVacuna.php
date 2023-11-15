<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas

$id_tipo_vacuna = (isset($_POST['id_tipo_vacuna'])) ? $_POST['id_tipo_vacuna'] : "";
$Nom_tipo_vacuna = (isset($_POST['Nom_tipo_vacuna'])) ? $_POST['Nom_tipo_vacuna'] : "";




$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':


        $insercionTipoAlimentacion = $conn->prepare(
            "INSERT INTO tipo_vacuna (Nom_tipo_vacuna) 
                VALUES ('$Nom_tipo_vacuna')"
        );


        $insercionTipoAlimentacion->execute();
        $conn->close();


        header('location: index.php');

        break;

    case 'btnModificar':

        $editarTipoAlimentacion = $conn->prepare("UPDATE tipo_vacuna SET Nom_tipo_vacuna = '$Nom_tipo_vacuna'
        WHERE id_tipo_vacuna = '$id_tipo_vacuna'");

        $editarTipoAlimentacion->execute();
        $conn->close();

        header('location: index.php');

        break;



    case 'btnEliminar':

        $eliminarTipoAlimentacion = $conn->prepare("DELETE FROM tipo_vacuna
         WHERE id_tipo_vacuna = '$id_tipo_vacuna'");

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

$consultaTipoVacuna = $conn->prepare("SELECT * FROM tipo_vacuna");
$consultaTipoVacuna->execute();
$listaTipoVacuna = $consultaTipoVacuna->get_result();

//Al final de todas las consultas se cierra la conexion
$conn->close();

?>