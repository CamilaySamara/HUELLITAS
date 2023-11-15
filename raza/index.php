<?php include 'codeRaza.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos De La Raza</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">



                                <input type="hidden" class="form-control" name="id_razas" id="id_razas" value="<?php echo $id_razas ?>">




                                <div class="form-group col-md-12">
                                    <label for="Nom_razas">Nombre Raza </label>
                                    <input type="text" required class="form-control" name="Nom_razas" id="Nom_razas" value="<?php echo $Nom_razas ?>">

                                </div>

                                <!-- INICIO SELECTOR TIPO DE RAZA -->

                                <div class="form-group col-md-12">

                                    <label for="id_tipo_mascota">Tipo de Mascota</label>


                                    <select name="id_tipo_mascota" id="id_tipo_mascota" required class="form-control">

                                        <?php

                                        if ($listaTipoMascota->num_rows > 0) {
                                            foreach ($listaTipoMascota as $tipoMascota) {
                                                echo " <option value='' hidden > Seleccione el Tipo de Mascota</option> ";
                                                echo " <option value='{$tipoMascota['id_tipo_mascota']}'> {$tipoMascota['id_tipo_mascota']}  {$tipoMascota['Nom_tipo_mascota']}</option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>

                                <!-- FIN SELECTOR TIPO DE RAZA  -->





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
                Agregar Raza
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>



                        <th scope="col">Identificador</th>

                        <th scope="col">Nombre de la Raza</th>
                        <th scope="col">Tipo de Mascota</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaVeterinario tiene algun contenido */
                    if ($listaRaza->num_rows > 0) {

                        foreach ($listaRaza as $raza) {

                    ?>

                            <tr>





                                <td> <?php echo $raza['id_razas']    ?> </td>
                                <td> <?php echo $raza['Nom_razas'] ?> </td>
                                <td> <?php echo $raza['Nom_tipo_mascota'] ?> </td>





                                <form action="" method="post">



                                    <input type="hidden" name="id_razas" value="<?php echo $raza['id_razas'];  ?>">
                                    <input type="hidden" name="Nom_razas" value="<?php echo $raza['Nom_razas'];  ?>">
                                    <input type="hidden" name="id_tipo_mascota" value="<?php echo $raza['id_tipo_mascota'];  ?>">


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