<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_mascotas = (isset($_POST['id_mascotas'])) ? $_POST['id_mascotas'] : "";
$id_clientes = (isset($_POST['id_clientes'])) ? $_POST['id_clientes'] : "";
$id_raza = (isset($_POST['id_raza'])) ? $_POST['id_raza'] : "";
$Nombre_mascota = (isset($_POST['Nombre_mascota'])) ? $_POST['Nombre_mascota'] : "";
$Sexo = (isset($_POST['Sexo'])) ? $_POST['Sexo'] : "";
$Peso = (isset($_POST['Peso'])) ? $_POST['Peso'] : "";
$Fecha_nacimiento = (isset($_POST['Fecha_nacimiento'])) ? $_POST['Fecha_nacimiento'] : "";
$id_tipo_alimentacion = (isset($_POST['id_tipo_alimentacion'])) ? $_POST['id_tipo_alimentacion'] : "";

$foto = (isset($_FILES['foto']["name"])) ? $_FILES['foto']["name"] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':



        $fecha = new DateTime();
        //Se crea el nombre de la imagen.... si no tenemos fotos por defecto toma imagen.jpg
        $nombreFoto = ($foto != "") ? $fecha->getTimestamp() . "_" . $_FILES["foto"]["name"] : "imagen.jpg";

        $nombreFoto = $foto;

        //nombre que devuelve PHP de la imagen
        $tmpFoto = $_FILES["foto"]["tmp_name"];

        if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            // Continuar con el proceso de carga y almacenamiento de la imagen.


            if ($tmpFoto != "") {
                /* Movemos el archivo a la carpeta imagenes  */
                move_uploaded_file($tmpFoto, "../Imagenes/Mascotas/" . $nombreFoto);


                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionMascotas = $conn->prepare(
                    "INSERT INTO mascotas(id_clientes, id_raza, Nombre_mascota, Sexo, Peso, Fecha_nacimiento,
                    id_tipo_alimentacion, foto) 
                VALUES ('$id_clientes','$id_raza','$Nombre_mascota','$Sexo','$Peso','$Fecha_nacimiento',
                '$id_tipo_alimentacion','$foto')"
                );



                $insercionMascotas->execute();
                $conn->close();
               
               echo" <script>
                    swal('Mensaje Principal!', 'Mensaje segundario!', 'success');
                    </script>";
                

                header('location: index.php');
            } else {
                echo "Problemas";
            }
        } else {
            // Manejar el error de carga de la imagen.
            echo "Error al cargar la imagen: " . $_FILES['foto']['error'];
        }




        break;

    case 'btnModificar':

        $editarMascotas = $conn->prepare(" UPDATE mascotas SET id_clientes = '$id_clientes' , 
        id_raza = '$id_raza', Nombre_mascota = '$Nombre_mascota', Sexo = '$Sexo', Peso = '$Peso', Fecha_nacimiento = '$Fecha_nacimiento',
        id_tipo_alimentacion = '$id_tipo_alimentacion'
        WHERE id_mascotas = '$id_mascotas' ");

        /* Aca solo esta actualizando la fotografia */
        $editarMascotasFoto = $conn->prepare(" UPDATE mascotas SET  foto = '$foto'
        WHERE id_mascotas = '$id_mascotas' ");


        $fecha = new DateTime();
        //Se crea el nombre de la imagen.... si no tenemos fotos por defecto toma imagen.jpg
        $nombreFoto = ($foto != "") ? $fecha->getTimestamp() . "_" . $_FILES["foto"]["name"] : "imagen.jpg";

        $nombreFoto = $foto;

        //nombre que devuelve PHP de la imagen
        $tmpFoto = $_FILES["foto"]["tmp_name"];



        if ($tmpFoto != "") {
            /* Movemos el archivo a la carpeta imagenes  */
            move_uploaded_file($tmpFoto, "../Imagenes/Mascotas/" . $nombreFoto);

            header('location: index.php');
        } else {
            echo "Problemas con la Foto";
        }

        $editarMascotas->execute();
        $editarMascotasFoto->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        
        $eliminarMascota = $conn->prepare(" DELETE FROM mascotas
        WHERE id_mascotas = '$id_mascotas' ");

        // $consultaFoto->execute();
        $eliminarMascota->execute();
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



/* Consultamos todos las mascotas  */
$consultaMascotas = $conn->prepare("SELECT * FROM mascotas
INNER JOIN clientes
ON mascotas.id_clientes = clientes.id_cliente
INNER JOIN razas
ON mascotas.id_raza = razas.id_razas
INNER JOIN tipo_alimentacion
ON mascotas.id_tipo_alimentacion = tipo_alimentacion.id_tipo_alimentacion");
$consultaMascotas->execute();
$listaMascotas = $consultaMascotas->get_result();

/* Consultamos todos los clientes  */
$consultaClientes = $conn->prepare("SELECT * FROM clientes");
$consultaClientes->execute();
$listaClientes = $consultaClientes->get_result();


/* Consultamos todos las razas   */
$consultaRazas = $conn->prepare("SELECT * FROM razas");
$consultaRazas->execute();
$listaRazas = $consultaRazas->get_result();


/* Consultamos todos los tipos de alimentacion  */
$consultaTipoAlimentacion = $conn->prepare("SELECT * FROM tipo_alimentacion");
$consultaTipoAlimentacion->execute();
$listaTipoAlimentacion = $consultaTipoAlimentacion->get_result();
$conn->close();
