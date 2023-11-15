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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Veterinario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">


                                <div class="form-group col-md-12">
                                    <label for="id_veterinario"> Numero de Documento</label>
                                    <input type="text" class="form-control" name="id_veterinario" id="id_veterinario" value="<?php echo $id_veterinario ?>">
                                    <br>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="Nom_veterinario">Nombre Veterinario </label>
                                    <input type="text" class="form-control" name="Nom_veterinario" id="Nom_veterinario" value="<?php echo $Nom_veterinario ?>">

                                </div>


                                <div class="form-group col-md-12">
                                    <label for="Telefono">Telefono Veterinario</label>
                                    <input type="text" class="form-control" name="Telefono" id="Telefono" value="<?php echo $Telefono ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Num_Profesional">Tarjeta Profesional</label>
                                    <input type="text" class="form-control" name="Num_Profesional" id="Num_Profesional" value="<?php echo $Num_Profesional ?>">

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