<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas

$id_razas = (isset($_POST['id_razas'])) ? $_POST['id_razas'] : "";
$Nom_razas = (isset($_POST['Nom_razas'])) ? $_POST['Nom_razas'] : "";
$id_tipo_mascota = (isset($_POST['id_tipo_mascota'])) ? $_POST['id_tipo_mascota'] : "";




$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

        $insercionRaza = $conn->prepare(
            "INSERT INTO razas (Nom_razas, id_tipo_mascota) 
                VALUES ('$Nom_razas','$id_tipo_mascota')"
        );


        $insercionRaza->execute();
        $conn->close();


        header('location: index.php');




        break;

    case 'btnModificar':

        $editarRaza = $conn->prepare("UPDATE razas SET Nom_razas = '$Nom_razas', id_tipo_mascota = '$id_tipo_mascota'
        WHERE razas.id_razas = '$id_razas' ");

        $editarRaza->execute();
        $conn->close();

        header('location: index.php');

        break;



    case 'btnEliminar':

        $eliminarVeterinario = $conn->prepare(" DELETE FROM razas
                                            WHERE id_razas = '$id_razas' ");

        // $consultaFoto->execute();
        $eliminarVeterinario->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;
}






$consultaTipoMascota = $conn->prepare("SELECT * FROM tipo_mascota");
$consultaTipoMascota->execute();
$listaTipoMascota = $consultaTipoMascota->get_result();

$consultaRaza = $conn->prepare("SELECT * FROM razas
INNER JOIN tipo_mascota
ON tipo_mascota.id_tipo_mascota = razas.id_tipo_mascota");
$consultaRaza->execute();
$listaRaza = $consultaRaza->get_result();

//Al final de todas las consultas se cierra la conexion
$conn->close();

?>