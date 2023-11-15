<?php include 'codeCitas.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos De La Cita</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">



                                <input type="hidden" class="form-control" name="id_citas" id="id_citas" value="<?php echo $id_citas ?>">


                                <!-- Selector de CLIENTES -->
                                <div class="form-group col-md-12">

                                    <label for="id_cliente">Clientes</label>


                                    <select name="id_cliente" id="id_cliente" class="form-control">

                                        <?php

                                        if ($listaClientes->num_rows > 0) {
                                            foreach ($listaClientes as $cliente) {
                                                echo " <option value='' hidden > Seleccione el Empleado</option> ";
                                                echo " <option value='{$cliente['id_cliente']}'> {$cliente['id_cliente']} {$cliente['Nombre']} {$cliente['Apellido']} </option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>

                                <!-- FIN SELECTOR CLIENTES -->





                                <!-- Selector de MASCOTAS -->
                                <div class="form-group col-md-12">

                                    <label for="id_mascotas">Mascota</label>


                                    <select name="id_mascotas" id="id_mascotas" class="form-control">

                                        <?php

                                        if ($listaMascotas->num_rows > 0) {
                                            foreach ($listaMascotas as $mascotas) {
                                                echo " <option value='' hidden > Seleccione el Empleado</option> ";
                                                echo " <option value='{$mascotas['id_mascotas']}'> {$mascotas['id_mascotas']} {$mascotas['Nombre']}  </option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>

                                <!-- FIN SELECTORMASCOTAS -->




                                <!-- Selector de VETERINARIO -->
                                <div class="form-group col-md-12">

                                    <label for="id_veterinario">Veterinario</label>


                                    <select name="id_veterinario" id="id_veterinario" class="form-control">

                                        <?php

                                        if ($listaVeterinario->num_rows > 0) {
                                            foreach ($listaVeterinario as $veterinario) {
                                                echo " <option value='' hidden > Seleccione el veterinario</option> ";
                                                echo " <option value='{$veterinario['id_veterinario']}'> {$veterinario['id_veterinario']} {$veterinario['Nom_veterinario']} {$veterinario['Telefono']} </option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>

                                <!-- FIN SELECTOR VETERINARIO -->



                                <div class="form-group col-md-12">
                                    <label for="diagnostico"> Diagnostico</label>
                                    <input type="text" class="form-control" name="diagnostico" id="diagnostico" value="<?php echo $diagnostico ?>">

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
                Agregar Citas
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>


                        <th scope="col">Fechas Cita</th>
                        <th scope="col">Numero Cita</th>
                        <th scope="col">Documento Cliente</th>
                        <th scope="col">Id Mascota</th>
                        <th scope="col">Documento Veterinario</th>
                        <th scope="col">Diagnostico</th>



                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaCitas tiene algun contenido */
                    if ($listaCitas->num_rows > 0) {

                        foreach ($listaCitas as $cita) {

                    ?>

                            <tr>





                                <td> <?php echo $cita['Fecha_cita']    ?> </td>
                                <td> <?php echo $cita['id_citas'] ?> </td>
                                <td> <?php echo $cita['id_cliente'] ?> </td>
                                <td> <?php echo $cita['id_mascotas'] ?> </td>
                                <td> <?php echo $cita['id_veterinario'] ?> </td>
                                <td> <?php echo $cita['diagnostico'] ?> </td>




                                <form action="" method="post">



                                    <input type="hidden" name="Fecha_cita" value="<?php echo $cita['Fecha_cita'];  ?>">
                                    <input type="hidden" name="id_citas" value="<?php echo $cita['id_citas'];  ?>">
                                    <input type="hidden" name="id_cliente" value="<?php echo $cita['id_cliente'];  ?>">
                                    <input type="hidden" name="id_mascotas" value="<?php echo $cita['id_mascotas'];  ?>">
                                    <input type="hidden" name="id_veterinario" value="<?php echo $cita['id_veterinario'];  ?>">
                                    <input type="hidden" name="diagnostico" value="<?php echo $cita['diagnostico'];  ?>">


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