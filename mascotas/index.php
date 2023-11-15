<?php include 'codeMascotas.php'; ?>

<?php include("../paginas/head.php") ?>

<div class="container">
    <div class="row">



        <!-- enctype="multipart/form-data" se utiliza para tratar la fotografia -->
        <form action="" method="post" enctype="multipart/form-data">



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos De la Mascota</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">


                                <input type="hidden" require name="id_mascotas" id="id_mascotas"  value="<?php echo $id_mascotas ?>">


                                <!-- Selector de CLIENTES -->
                                <div class="form-group col-md-12">

                                    <label for="id_clientes">Clientes</label>


                                    <select name="id_clientes" id="id_clientes" class="form-control">

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


                                <!-- Selector de RAZAS -->
                                <div class="form-group col-md-12">

                                    <label for="id_raza">Raza</label>


                                    <select name="id_raza" id="id_raza" class="form-control">

                                        <?php

                                        if ($listaRazas->num_rows > 0) {
                                            foreach ($listaRazas as $raza) {
                                                echo " <option value='' hidden > Seleccione el Empleado</option> ";
                                                echo " <option value='{$raza['id_razas']}'> {$raza['id_razas']} {$raza['Nom_razas']} {$raza['id_tipo_mascota']} </option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>

                                <!-- FIN SELECTOR RAZAS -->


                                <div class="form-group col-md-12">
                                    <label for="Nombre">Nombre(Mascota)</label>
                                    <input type="text" class="form-control" require name="Nombre" id="Nombre" placeholder="" value="<?php echo $Nombre ?>">
                                    <br>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="Sexo">Sexo (Mascota) </label>
                                    <input type="text" class="form-control" require name="Sexo" id="Sexo" value="<?php echo $Sexo ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Peso">Peso (Mascota) </label>
                                    <input type="text" class="form-control" require name="Peso" id="Peso" value="<?php echo $Peso ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Fecha_nacimiento">Fecha Nacimiento Mascota</label>
                                    <input type="date" class="form-control" require name="Fecha_nacimiento" id="Fecha_nacimiento" value="<?php echo $Fecha_nacimiento ?>">
                                    <br>
                                </div>



                                <!-- Selector de TIPO ALIMENTO -->
                                <div class="form-group col-md-12">

                                    <label for="id_tipo_alimentacion">Tipo de Alimentacion</label>


                                    <select name="id_tipo_alimentacion" id="id_tipo_alimentacion" class="form-control">

                                        <?php

                                        if ($listaTipoAlimentacion->num_rows > 0) {
                                            foreach ($listaTipoAlimentacion as $alimento) {
                                                echo " <option value='' hidden > Seleccione el Empleado</option> ";
                                                echo " <option value='{$alimento['id_tipo_alimentacion']}'> {$alimento['id_tipo_alimentacion']} {$alimento['Nom_tipo_alim']}  </option> ";
                                            }
                                        } else {

                                            echo "<h2> No tenemos resultados </h2>";
                                        }
                                        ?>
                                    </select>


                                </div>

                                <!-- FIN SELECTOR TIPO ALIMENTO -->


                                <div class="form-group col-md-12">
                                    <label for="foto">foto</label>
                                    <!-- El atributo accept image .... solo acepta formatos de imagen -->
                                    <input type="file" class="form-control" require accept="image/*" name="foto" id="foto" value="<?php echo $foto ?>">
                                    <br>
                                </div>



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

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Mascota
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Id Mascota</th>
                        <th scope="col">Cedula Cliente</th>
                        <th scope="col">Raza</th>
                        <th scope="col">Nombre Mascota</th>
                        <th scope="col">Sexo Mascota</th>
                        <th scope="col">Peso Mascota</th>
                        <th scope="col">Fecha nacimiento (Mascota) </th>
                        <th scope="col">Tipo de Alimentacion </th>


                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaMascotas tiene algun contenido */
                    if ($listaMascotas->num_rows > 0) {

                        foreach ($listaMascotas as $mascota) {

                    ?>

                            <tr>

                                <td>
                                    <img class="img-thumbnail" width="100px" src="../Imagenes/Mascotas/<?php echo $mascota['foto']; ?>" />

                                </td>

                                <td> <?php echo $mascota['id_mascotas']        ?> </td>
                                <td> <?php echo $mascota['id_clientes']    ?> </td>
                                <td> <?php echo $mascota['id_raza'] ?> </td>
                                <td> <?php echo $mascota['Nombre'] ?> </td>
                                <td> <?php echo $mascota['Sexo']    ?> </td>
                                <td> <?php echo $mascota['Peso']    ?> </td>
                                <td> <?php echo $mascota['Fecha_nacimiento']    ?> </td>
                                <td> <?php echo $mascota['id_tipo_alimentacion']    ?> </td>



                                <form action="" method="post">

                                    <input type="hidden" name="id_mascotas" value="<?php echo $mascota['id_mascotas'];  ?>">
                                    <input type="hidden" name="id_clientes" value="<?php echo $mascota['id_clientes'];  ?>">
                                    <input type="hidden" name="id_raza" value="<?php echo $mascota['id_raza'];  ?>">
                                    <input type="hidden" name="Nombre" value="<?php echo $mascota['Nombre'];  ?>">
                                    <input type="hidden" name="Sexo" value="<?php echo $mascota['Sexo'];  ?>">
                                    <input type="hidden" name="Peso" value="<?php echo $mascota['Peso'];  ?>">
                                    <input type="hidden" name="Fecha_nacimiento" value="<?php echo $mascota['Fecha_nacimiento'];  ?>">
                                    <input type="hidden" name="id_tipo_alimentacion" value="<?php echo $mascota['id_tipo_alimentacion'];  ?>">



                                    <input type="hidden" name="foto" value="<?php echo $mascota['foto'];  ?>">

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