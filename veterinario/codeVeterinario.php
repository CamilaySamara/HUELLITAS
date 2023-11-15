<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas

$id_veterinario = (isset($_POST['id_veterinario'])) ? $_POST['id_veterinario'] : "";
$Nom_veterinario = (isset($_POST['Nom_veterinario'])) ? $_POST['Nom_veterinario'] : "";
$Telefono = (isset($_POST['Telefono'])) ? $_POST['Telefono'] : "";
$Num_Profesional = (isset($_POST['Num_Profesional'])) ? $_POST['Num_Profesional'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':


        /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
        $insercionVeterinario = $conn->prepare(
            "INSERT INTO veterinario (id_veterinario, Nom_veterinario, Telefono, Num_Profesional) 
                VALUES ('$id_veterinario','$Nom_veterinario','$Telefono','$Num_Profesional')"
        );


        $insercionVeterinario->execute();
        $conn->close();


        header('location: index.php');




        break;

    case 'btnModificar':

        $editarVeterinario = $conn->prepare(" UPDATE veterinario SET Nom_veterinario = '$Nom_veterinario', 
        Telefono = '$Telefono', Num_Profesional = '$Num_Profesional'
        WHERE id_veterinario = '$id_veterinario' ");

        $editarVeterinario->execute();
        $conn->close();

        header('location: index.php');

        break;



    case 'btnEliminar':

        $eliminarVeterinario = $conn->prepare(" DELETE FROM veterinario
                                            WHERE id_veterinario = '$id_veterinario' ");

        // $consultaFoto->execute();
        $eliminarVeterinario->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;
}




/* Consultamos todas las clientes */

$consultaVeterinario = $conn->prepare("SELECT * FROM veterinario");
$consultaVeterinario->execute();
$listaVeterinario = $consultaVeterinario->get_result();

//Al final de todas las consultas se cierra la conexion
$conn->close();

?>