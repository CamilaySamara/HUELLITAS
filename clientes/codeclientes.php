<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_cliente = (isset($_POST['id_cliente'])) ? $_POST['id_cliente'] : "";
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
                    "INSERT INTO clientes(id_cliente,Tipo_doc, Nombre, Apellido, Telefono, Direccion) 
                VALUES ('$id_cliente','$Tipo_doc','$Nombre','$Apellido','$Telefono','$Direccion')"
                );



                $insercionclientes->execute();
                $conn->close();
               
             

                

                header('location: index.php');
           




        break;

    case 'btnModificar':

        $editarclientes = $conn->prepare(" UPDATE clientes 
        SET Tipo_doc = '$Tipo_doc', Nombre= '$Nombre', Apellido = '$Apellido', 
        Telefono= '$Telefono', Direccion = '$Direccion'
        WHERE id_cliente= '$id_cliente' ");

     


        
        /* 
        $consultaFoto = $conn->prepare(" SELECT foto FROM clientes
        WHERE id_cliente = 'id_cliente' "); */

        $eliminarclientes = $conn->prepare(" DELETE FROM clientes
        WHERE id_cliente = '$id_cliente' ");

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



/* Consultamos todos los clientes  */
$consultaclientes = $conn->prepare("SELECT * FROM clientes");
$consultaclientes->execute();
$listaclientes = $consultaclientes->get_result();
$conn->close();
