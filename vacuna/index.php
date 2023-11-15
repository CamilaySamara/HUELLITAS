<?php include 'codeVeterinario.php'; ?>

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

                                    <label for="id_empleado">Empleado</label>


                                    <select name="id_empleado" id="id_empleado" class="form-control">

                                        <?php

                                        if ($listaEmpleados->num_rows > 0) {
                                            foreach ($listaEmpleados as $empleado) {
                                                echo " <option value='' hidden > Seleccione el Empleado</option> ";
                                                echo " <option value='{$empleado['id']}'> {$empleado['id']} {$empleado['nombre']} {$empleado['apellidoP']} </option> ";
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

                                    <label for="id_empleado">Empleado</label>


                                    <select name="id_empleado" id="id_empleado" class="form-control">

                                        <?php

                                        if ($listaEmpleados->num_rows > 0) {
                                            foreach ($listaEmpleados as $empleado) {
                                                echo " <option value='' hidden > Seleccione el Empleado</option> ";
                                                echo " <option value='{$empleado['id']}'> {$empleado['id']} {$empleado['nombre']} {$empleado['apellidoP']} </option> ";
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


                        <th scope="col">Numero Documento</th>
                        <th scope="col">Nombres</th>

                        <th scope="col">Telefono</th>
                        <th scope="col">Tarjeta Profesional</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaVeterinario tiene algun contenido */
                    if ($listaVeterinario->num_rows > 0) {

                        foreach ($listaVeterinario as $veterinario) {

                    ?>

                            <tr>





                                <td> <?php echo $veterinario['id_veterinario']    ?> </td>
                                <td> <?php echo $veterinario['Nom_veterinario'] ?> </td>
                                <td> <?php echo $veterinario['Telefono'] ?> </td>
                                <td> <?php echo $veterinario['Num_Profesional'] ?> </td>




                                <form action="" method="post">



                                    <input type="hidden" name="id_veterinario" value="<?php echo $veterinario['id_veterinario'];  ?>">
                                    <input type="hidden" name="Nom_veterinario" value="<?php echo $veterinario['Nom_veterinario'];  ?>">

                                    <input type="hidden" name="Telefono" value="<?php echo $veterinario['Telefono'];  ?>">
                                    <input type="hidden" name="Num_Profesional" value="<?php echo $veterinario['Num_Profesional'];  ?>">


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