<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas

$Fecha_cita = (isset($_POST['Fecha_cita'])) ? $_POST['Fecha_cita'] : "";
$id_citas = (isset($_POST['id_citas'])) ? $_POST['id_citas'] : "";
$id_cliente = (isset($_POST['id_cliente'])) ? $_POST['id_cliente'] : "";
$id_mascotas = (isset($_POST['id_mascotas'])) ? $_POST['id_mascotas'] : "";
$id_veterinario = (isset($_POST['id_veterinario'])) ? $_POST['id_veterinario'] : "";
$diagnostico = (isset($_POST['diagnostico'])) ? $_POST['diagnostico'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':


        /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
        $insercionCitas = $conn->prepare(
            "INSERT INTO citas (id_cliente, id_mascotas, id_veterinario, diagnostico) 
                VALUES ('$id_cliente','$id_mascotas','$id_veterinario','$diagnostico')"
        );


        $insercionCitas->execute();
        $conn->close();


        header('location: index.php');




        break;

    case 'btnModificar':

        $editarCitas = $conn->prepare(" UPDATE citas SET id_cliente = '$id_cliente', 
        id_mascotas = '$id_mascotas', id_veterinario = '$id_veterinario', diagnostico = '$diagnostico'
        WHERE id_citas = '$id_citas' ");

        $editarCitas->execute();
        $conn->close();

        header('location: index.php');

        break;



    case 'btnEliminar':

        $eliminarCitas = $conn->prepare(" DELETE FROM citas
           WHERE id_citas = '$id_citas' ");

        // $consultaFoto->execute();
        $eliminarCitas->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;
}





/* Consultamos todos los clientes  */
$consultaClientes = $conn->prepare("SELECT * FROM clientes");
$consultaClientes->execute();
$listaClientes = $consultaClientes->get_result();

/* Consultamos todos los Mascotas  */
$consultaMascotas = $conn->prepare("SELECT * FROM mascotas");
$consultaMascotas->execute();
$listaMascotas = $consultaMascotas->get_result();

/* Consultamos todas las veterinario */
$consultaVeterinario = $conn->prepare("SELECT * FROM veterinario");
$consultaVeterinario->execute();
$listaVeterinario = $consultaVeterinario->get_result();

/* Consultamos todas las citas */
$consultaCitas = $conn->prepare("SELECT * FROM citas");
$consultaCitas->execute();
$listaCitas = $consultaCitas->get_result();

//Al final de todas las consultas se cierra la conexion
$conn->close();

?>