<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas

$id_tipo_mascota = (isset($_POST['id_tipo_mascota'])) ? $_POST['id_tipo_mascota'] : "";
$Nom_tipo_mascota = (isset($_POST['Nom_tipo_mascota'])) ? $_POST['Nom_tipo_mascota'] : "";




$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':


        /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
        $insercionTipoMascota = $conn->prepare(
            "INSERT INTO tipo_mascota ( Nom_tipo_mascota) 
                VALUES ('$Nom_tipo_mascota')"
        );


        $insercionTipoMascota->execute();
        $conn->close();


        header('location: index.php');




        break;

    case 'btnModificar':

        $editarTipoMascota = $conn->prepare(" UPDATE tipo_mascota SET Nom_tipo_mascota = '$Nom_tipo_mascota'
        WHERE id_tipo_mascota = '$id_tipo_mascota' ");

        $editarTipoMascota->execute();
        $conn->close();

        header('location: index.php');

        break;



    case 'btnEliminar':

        $eliminarTipoMascota = $conn->prepare(" DELETE FROM tipo_mascota
                                            WHERE id_tipo_mascota = '$id_tipo_mascota' ");

        // $consultaFoto->execute();
        $eliminarTipoMascota->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;
}




/* Consultamos todas las clientes */

$consultaTipoMascota = $conn->prepare("SELECT * FROM tipo_mascota");
$consultaTipoMascota->execute();
$listaTipoMascota = $consultaTipoMascota->get_result();

//Al final de todas las consultas se cierra la conexion
$conn->close();

?>