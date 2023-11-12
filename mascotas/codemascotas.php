<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_mascotas = (isset($_POST['id_mascotas'])) ? $_POST['id_mascotas'] : "";
$id_clientes = (isset($_POST['id_clientes'])) ? $_POST['id_clientes'] : "";
$id_tipo_mascota = (isset($_POST['id_tipo_mascota'])) ? $_POST['id_tipo_mascota'] : "";
$id_raza = (isset($_POST['id_raza'])) ? $_POST['id_raza'] : "";
$Nombre = (isset($_POST['Nombre'])) ? $_POST['Nombre'] : "";
$Sexo = (isset($_POST['Sexo'])) ? $_POST['Sexo'] : "";
$Peso = (isset($_POST['Peso'])) ? $_POST['Peso'] : "";
$Fecha_nacimiento = (isset($_POST['Fecha_nacimiento'])) ? $_POST['Fecha_nacimiento'] : "";
$id_tipo_alimentacion = (isset($_POST['id_tipo_alimentacion'])) ? $_POST['id_tipo_alimentacion'] : "";
$id_historial_clinico = (isset($_POST['id_historial_clinico'])) ? $_POST['id_historial_clinico'] : "";
$id_tratamiento = (isset($_POST['id_tratamiento'])) ? $_POST['id_tratamiento'] : "";


$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':      


               /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionmascotas = $conn->prepare(
                    "INSERT INTO mascotas(id_clientes, id_tipo_mascota, 
                id_raza, Nombre, Sexo, Peso, Fecha_nacimiento, id_tipo_alimentacion, id_historial_clinico, id_tratamiento) 
                VALUES ('$id_clientes','$id_tipo_mascota','$id_raza','$Nombre','$Sexo','$Peso','$Fecha_nacimiento','$id_tipo_alimentacion','$id_historial_clinico','$id_tratamiento' )"
                );

               
                $insercionclientes->execute();
                $conn->close();             
                            

                header('location: index.php');        


             
             
              break;

              case 'btnModificar':
          
        $editarmascotas = $conn->prepare(" UPDATE mascotas SET id_clientes = '$id_clientes', id_tipo_mascota = '$id_tipo_mascota', id_raza = '$id_raza', Nombre = '$Nombre', Sexo = '$Sexo', 
       Peso = '$Peso', Fecha_nacimiento = '$Fecha_nacimiento', id_tipo_alimentacion = '$id_tipo_alimentacion', id_historial_clinico = '$id_historial_clinico', id_tratamiento = '$id_tratamiento'
        WHERE id = '$id_mascotas' ");

$editarmascotas->execute();
$conn->close();

header('location: index.php');

break;



case 'btnEliminar':

$eliminarmascotas = $conn->prepare(" DELETE FROM mascotas
WHERE id_mascotas = '$id_mascotas' ");

// $consultaFoto->execute();
$eliminarmascotas->execute();
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

       


/* Consultamos todas las mascotas  */

$consultamascotas = $conn->prepare("SELECT * FROM mascotas");
$consultamascotas->execute();
$listamascotas = $consultamascotas->get_result();



//Al final de todas las consultas se cierra la conexion
$conn->close();

?>
