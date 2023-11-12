<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_clientes = (isset($_POST['id_clientes'])) ? $_POST['id_clientes'] : "";
$Tipo_doc = (isset($_POST['Tipo_doc'])) ? $_POST['Tipo_doc'] : "";
$Nombre = (isset($_POST['Nombre'])) ? $_POST['Nombre'] : "";
$Apellido = (isset($_POST['Apellido'])) ? $_POST['Apellido'] : "";
$Telefono = (isset($_POST['Telefono'])) ? $_POST['Telefono'] : "";
$Direccion = (isset($_POST['Direccion'])) ? $_POST['Direccion'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':      


               /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionclientes = $conn->prepare(
                    "INSERT INTO clientes(Tipo_doc, Nombre, 
                Apellido, Telefono, Direccion) 
                VALUES ('$Tipo_doc','$Nombre','$Apellido','$Telefono','$Direccion')"
                );

               
                $insercionclientes->execute();
                $conn->close();             
                            

                header('location: index.php');        


             
             
              break;

              case 'btnModificar':
          
        $editarclientes = $conn->prepare(" UPDATE clientes SET Tipo_doc = '$Tipo_doc', Nombre = '$Nombre', Apellido = '$Apellido', Telefono = '$Telefono', Direccion = '$Direccion'
        WHERE id = '$id_clientes' ");

$editarclientes->execute();
$conn->close();

header('location: index.php');

break;



case 'btnEliminar':

$eliminarclientes = $conn->prepare(" DELETE FROM clientes
WHERE id_clientes = '$id_clientes' ");

// $consultaFoto->execute();
$eliminarclientes->execute();
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

       


/* Consultamos todas las clientes */

$consultaclientes = $conn->prepare("SELECT * FROM clientes");
$consultaclientes->execute();
$listaclientes = $consultaclientes->get_result();



//Al final de todas las consultas se cierra la conexion
$conn->close();

?>
