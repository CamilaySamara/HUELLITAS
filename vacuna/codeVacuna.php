<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas

$id_vacunas = (isset($_POST['id_vacunas'])) ? $_POST['id_vacunas'] : "";
$id_mascota = (isset($_POST['id_mascota'])) ? $_POST['id_mascota'] : "";
$id_tipo_vacuna = (isset($_POST['id_tipo_vacuna'])) ? $_POST['id_tipo_vacuna'] : "";




$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':


        /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
        $insercionVacunas = $conn->prepare(
            "INSERT INTO vacunas (id_mascota, id_tipo_vacuna) 
                VALUES ('$id_mascota','$id_tipo_vacuna')"
        );


        $insercionVacunas->execute();
        $conn->close();


        header('location: index.php');




        break;

    case 'btnModificar':

        $editarVacunas = $conn->prepare(" UPDATE vacunas SET id_mascota = '$id_mascota', 
        id_tipo_vacuna = '$id_tipo_vacuna'
        WHERE id_vacunas = '$id_vacunas' ");

        $editarVacunas->execute();
        $conn->close();

        header('location: index.php');

        break;



    case 'btnEliminar':

        $eliminarVacunas = $conn->prepare(" DELETE FROM vacunas
          WHERE id_vacunas = '$id_vacunas' ");

        // $consultaFoto->execute();
        $eliminarVacunas->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;
}




/* Consultamos todas las mascotas */
$consultaMascotas = $conn->prepare("SELECT * FROM mascotas");
$consultaMascotas->execute();
$listaMascotas = $consultaMascotas->get_result();

/* Consultamos todas las TipoVacunas */
$consultaTipoVacunas = $conn->prepare("SELECT * FROM tipo_vacuna");
$consultaTipoVacunas->execute();
$listaTipoVacunas = $consultaTipoVacunas->get_result();

/* Consultamos todas las vacunas */
$consultaVacunas = $conn->prepare("SELECT * FROM vacunas
INNER JOIN mascotas
ON vacunas.id_mascota = mascotas.id_mascotas
INNER JOIN tipo_vacuna
ON vacunas.id_tipo_vacuna = tipo_vacuna.id_tipo_vacuna");
$consultaVacunas->execute();
$listaVacunas = $consultaVacunas->get_result();

//Al final de todas las consultas se cierra la conexion
$conn->close();

?>