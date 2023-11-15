<?php include 'codeVacuna.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Vacuna</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">



                                <input type="hidden" class="form-control" name="id_vacunas" id="id_vacunas" value="<?php echo $id_vacunas ?>">



                                <!-- Selector de MASCOTA -->

                                <div class="form-group col-md-12">

                                    <label for="id_mascota">Mascota</label>


                                    <select name="id_mascota" id="id_mascota" class="form-control">

                                        <?php

                                        if ($listaMascotas->num_rows > 0) {
                                            foreach ($listaMascotas as $mascota) {
                                                echo " <option value='' hidden > Seleccione el Empleado</option> ";
                                                echo " <option value='{$mascota['id_mascotas']}'> {$mascota['id_mascotas']} {$mascota['Nombre_mascota']}  </option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>

                                <!-- FIN SELECTOR MASCOTA -->



                                <!-- ************************* -->

                                <!-- Selector de TIPO VACUNA -->
                                <div class="form-group col-md-12">

                                    <label for="id_tipo_vacuna">Tipo Vacuna</label>


                                    <select name="id_tipo_vacuna" id="id_tipo_vacuna" class="form-control">

                                        <?php

                                        if ($listaTipoVacunas->num_rows > 0) {
                                            foreach ($listaTipoVacunas as $vacuna) {
                                                echo " <option value='' hidden > Seleccione el Empleado</option> ";
                                                echo " <option value='{$vacuna['id_tipo_vacuna']}'> {$vacuna['id_tipo_vacuna']} {$vacuna['Nom_tipo_vacuna']}  </option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>

                                <!-- FIN SELECTOR TIPO VACUNA -->

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
                Agregar Veterinario
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>


                        <th scope="col">Id Vacuna</th>
                        <th scope="col">Id masCota</th>

                        <th scope="col">Id Tipo De Vacuna</th>


                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaVeterinario tiene algun contenido */
                    if ($listaVacunas->num_rows > 0) {

                        foreach ($listaVacunas as $vacuna) {

                    ?>

                            <tr>





                                <td> <?php echo $vacuna['id_vacunas']    ?> </td>
                                <td> <?php echo $vacuna['id_mascota'],' ', $vacuna['Nombre_mascota'] ?> </td>
                                <td> <?php echo $vacuna['id_tipo_vacuna'], ' ', $vacuna['Nom_tipo_vacuna'] ?> </td>





                                <form action="" method="post">



                                    <input type="hidden" name="id_vacunas" value="<?php echo $vacuna['id_vacunas'];  ?>">
                                    <input type="hidden" name="id_mascota" value="<?php echo $vacuna['id_mascota'];  ?>">

                                    <input type="hidden" name="id_tipo_vacuna" value="<?php echo $vacuna['id_tipo_vacuna'];  ?>">



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