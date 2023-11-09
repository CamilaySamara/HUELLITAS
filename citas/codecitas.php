<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_citas = (isset($_POST['id_citas'])) ? $_POST['id_citas'] : "";
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
                $insercioncitas = $conn->prepare(
                    "INSERT INTO citas(id_citas,Tipo_doc, Nombre, Apellido, Telefono, Direccion) 
                VALUES ('$id_citas','$Tipo_doc','$Nombre','$Apellido','$Telefono','$Direccion')"
                );



                $insercioncitas->execute();
                $conn->close();
               
             

                

                header('location: index.php');
           




        break;

    case 'btnModificar':

        $editarcitas = $conn->prepare(" UPDATE citas
        SET Tipo_doc = '$Tipo_doc', Nombre= '$Nombre', Apellido = '$Apellido', 
        Telefono= '$Telefono', Direccion = '$Direccion'
        WHERE id_citas= '$id_citas' ");

     


        
        /* 
        $consultaFoto = $conn->prepare(" SELECT foto FROM citas
        WHERE id_citas = 'id_citas' "); */

        $eliminarcitas = $conn->prepare(" DELETE FROM citas
        WHERE id_citas = '$id_citas' ");

        // $consultaFoto->execute();
        $eliminarcitas->execute();
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



/* Consultamos todos los citas */
$consultacitas = $conn->prepare("SELECT * FROM citas");
$consultacitas->execute();
$listacitas = $consultacitas->get_result();
$conn->close();
