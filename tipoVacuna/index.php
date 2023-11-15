<?php include 'codeTipoVacuna.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tipos de Alimentos</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">



                                <input type="hidden" name="id_tipo_vacuna" id="id_tipo_vacuna" value="<?php echo $id_tipo_vacuna ?>">



                                <div class="form-group col-md-12">
                                    <label for="Nom_tipo_vacuna">Nombre Tipo Vacuna </label>
                                    <input type="text" class="form-control" name="Nom_tipo_vacuna" id="Nom_tipo_vacuna" value="<?php echo $Nom_tipo_vacuna ?>">

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
                Agregar Tipo Alimentacion
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>


                        <th scope="col">Codigo Tipo Vacuna</th>
                        <th scope="col">Nombre Tipo Vacuna </th>



                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaVeterinario tiene algun contenido */
                    if ($listaTipoVacuna->num_rows > 0) {

                        foreach ($listaTipoVacuna as $tipoVacuna) {

                    ?>

                            <tr>





                                <td> <?php echo $tipoVacuna['id_tipo_vacuna']    ?> </td>
                                <td> <?php echo $tipoVacuna['Nom_tipo_vacuna'] ?> </td>





                                <form action="" method="post">



                                    <input type="hidden" name="id_tipo_vacuna" value="<?php echo $tipoVacuna['id_tipo_vacuna'];  ?>">
                                    <input type="hidden" name="Nom_tipo_vacuna" value="<?php echo $tipoVacuna['Nom_tipo_vacuna'];  ?>">



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