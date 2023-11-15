<?php include 'codeTipoAlimentacion.php'; ?>

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



                                <input type="hidden"  name="id_tipo_alimentacion" id="id_tipo_alimentacion" value="<?php echo $id_tipo_alimentacion ?>">



                                <div class="form-group col-md-12">
                                    <label for="Nom_tipo_alim">Nombre Alimento </label>
                                    <input type="text" class="form-control" name="Nom_tipo_alim" id="Nom_tipo_alim" value="<?php echo $Nom_tipo_alim ?>">

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


                        <th scope="col">Codigo Alimento</th>
                        <th scope="col">Nombre Alimento</th>



                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaVeterinario tiene algun contenido */
                    if ($listaTipoAlimento->num_rows > 0) {

                        foreach ($listaTipoAlimento as $tipoAlimento) {

                    ?>

                            <tr>





                                <td> <?php echo $tipoAlimento['id_tipo_alimentacion']    ?> </td>
                                <td> <?php echo $tipoAlimento['Nom_tipo_alim'] ?> </td>





                                <form action="" method="post">



                                    <input type="hidden" name="id_tipo_alimentacion" value="<?php echo $tipoAlimento['id_tipo_alimentacion'];  ?>">
                                    <input type="hidden" name="Nom_tipo_alim" value="<?php echo $tipoAlimento['Nom_tipo_alim'];  ?>">



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