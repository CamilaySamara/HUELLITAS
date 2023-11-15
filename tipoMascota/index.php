<?php include 'codeTipoMascota.php'; ?>

<?php include("../paginas/head.php") ?>

<div class="container">
    <div class="row">



        <form action="" method="post">


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tipo de Mascota</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                                <input type="hidden" required class="form-control" name="id_tipo_mascota" id="id_tipo_mascota" value="<?php echo $id_tipo_mascota ?>">



                                <div class="form-group col-md-12">
                                    <label for="Nom_tipo_mascota">Nombre Tipo de mascota </label>
                                    <input type="text" required class="form-control" name="Nom_tipo_mascota" id="Nom_tipo_mascota" value="<?php echo $Nom_tipo_mascota ?>">

                                </div>




                            </div>

                            <!-- Pie/Footer del modal -->
                            <div class="modal-footer">

                                <button value="btnAgregar" class="btn btn-success" type="submit" name="accion">Agregar</button>
                                <button value="btnModificar" class="btn btn-warning" type="submit" name="accion">Modificar</button>
                                <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button>
                                <button value="btnCancelar" class="btn btn-primary" type="submit" name="accion">Cancelar</button>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Tipo de Mascota
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>


                        <th scope="col">Identificador</th>
                        <th scope="col">Nombres Tipo Mascota</th>




                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaVeterinario tiene algun contenido */
                    if ($listaTipoMascota->num_rows > 0) {

                        foreach ($listaTipoMascota as $tipoMascota) {

                    ?>

                            <tr>





                                <td> <?php echo $tipoMascota['id_tipo_mascota']    ?> </td>
                                <td> <?php echo $tipoMascota['Nom_tipo_mascota'] ?> </td>





                                <form action="" method="post">



                                    <input type="hidden" name="id_tipo_mascota" value="<?php echo $tipoMascota['id_tipo_mascota'];  ?>">
                                    <input type="hidden" name="Nom_tipo_mascota" value="<?php echo $tipoMascota['Nom_tipo_mascota'];  ?>">




                                    <td><input type="submit" class="btn btn-info" value="Seleccionar"></td>
                                    <td><button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>

                                </form>


                            </tr>


                    <?php

                        }
                    } else {

                        echo "<h2> No tenemos resultados </h2>";
                    }

                    ?>


                </tbody>
            </table>

        </div>


    </div>
</div>

<?php include("../paginas/footer.php") ?>