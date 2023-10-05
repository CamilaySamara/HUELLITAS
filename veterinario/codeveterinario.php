<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_veterinario = (isset($_POST['txtid_veterinarioId'])) ? $_POST['id_veterinario'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtApellidoP = (isset($_POST['txtApellidoP'])) ? $_POST['txtApellidoP'] : "";
$txtApellidoM = (isset($_POST['txtApellidoM'])) ? $_POST['txtApellidoM'] : "";
$txtCorreo = (isset($_POST['txtCorreo'])) ? $_POST['txtCorreo'] : "";

$foto = (isset($_FILES['foto']["name"])) ? $_FILES['foto']["name"] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':



       


                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionveterinario = $conn->prepare(
                    "INSERT INTO veterinario(id_veterinario, nombre, apellidoP, 
                apellidoM, correo, foto) 
                VALUES ('$txtNombre','$txtApellidoP','$txtApellidoM','$txtCorreo','$foto')"
                );



                $insercionveterinario->execute();
                $conn->close();
               
               echo" <script>
                    swal('Mensaje Principal!', 'Mensaje segundario!', 'success');
                    </script>";
                

                header('location: index.php');
           




        break;

    case 'btnModificar':

        $editarveterinario = $conn->prepare(" UPDATE veterinario SET nombre = '$txtNombre' , 
        apellidoP = '$txtApellidoP', apellidoM = '$txtApellidoM', correo = '$txtCorreo'
        WHERE id = '$txtId' ");

        /* Aca solo esta actualizando la fotografia */
        $editarveterinarioFoto = $conn->prepare(" UPDATE veterinario SET  foto = '$foto'
        WHERE id = '$txtId' ");


        $fecha = new DateTime();
        //Se crea el nombre de la imagen.... si no tenemos fotos por defecto toma imagen.jpg
        $nombreFoto = ($foto != "") ? $fecha->getTimestamp() . "_" . $_FILES["foto"]["name"] : "imagen.jpg";

        $nombreFoto = $foto;

        //nombre que devuelve PHP de la imagen
        $tmpFoto = $_FILES["foto"]["tmp_name"];



        if ($tmpFoto != "") {
            /* Movemos el archivo a la carpeta imagenes  */
            move_uploaded_file($tmpFoto, "../Imagenes/veterinario/" . $nombreFoto);

            header('location: index.php');
        } else {
            echo "Problemas con la Foto";
        }

        $editarveterinario->execute();
        $editarveterinarioFoto->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        /* 
        $consultaFoto = $conn->prepare(" SELECT foto FROM veterinario
        WHERE id = '$txtId' "); */

        $eliminarveterinario = $conn->prepare(" DELETE FROM veterinario
        WHERE id = '$txtId' ");

        // $consultaFoto->execute();
        $eliminarveterinario->execute();
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



/* Consultamos todos los veterinario  */
$consultaveterinario = $conn->prepare("SELECT * FROM veterinario");
$consultaveterinario->execute();
$listaveterinario = $consultaveterinario->get_result();
$conn->close();
