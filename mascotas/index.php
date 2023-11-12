<?php include 'codemascotas.php'; ?>

<?php include("../paginas/head.php") ?>

<div class="container">
    <div class="row">




            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos de la mascota</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                                <!-- <label for="id_mascotas">Id</label> -->
                                <input type="hidden" require name="id_mascotas" id="id_mascotas" placeholder="" value="<?php echo $id_mascotas ?>">
                                <!-- <br> -->

                                <div class="form-group col-md-12">
                                    <label for="id_clientes">id_clientes</label>
                                    <input type="text" class="form-control" require name="id_clientes" id="id_clientes" placeholder="" value="<?php echo $id_clientes ?>">
                                    <br>
                                </div>                               


                                <div class="form-group col-md-12">
                                    <label for="id_tipo_mascota">id_tipo_mascota </label>
                                    <input type="text" class="form-control" require name="id_tipo_mascota" id="id_tipo_mascota" placeholder="" value="<?php echo $id_tipo_mascota ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="id_raza">id_raza </label>
                                    <input type="text" class="form-control" require name="id_raza" id="id_raza" placeholder="" value="<?php echo $id_raza?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Nombre">Nombre</label>
                                    <input type="text" class="form-control" require name="Nombre" id="Nombre" placeholder="" value="<?php echo $Nombre ?>">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Sexo">Sexo</label>
                                    <input type="text" class="form-control" require name="Sexo" id="Sexo" placeholder="" value="<?php echo $Sexo ?>">
                                    <br>
                                </div>                               


                                <div class="form-group col-md-12">
                                    <label for="Peso">Peso </label>
                                    <input type="text" class="form-control" require name="Peso" id="Peso" placeholder="" value="<?php echo $Peso ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Fecha_nacimiento">Fecha_nacimiento </label>
                                    <input type="text" class="form-control" require name="Fecha_nacimiento" id="Fecha_nacimiento" placeholder="" value="<?php echo $Fecha_nacimiento?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="id_tipo_alimentacion">id_tipo_alimentacion</label>
                                    <input type="text" class="form-control" require name="id_tipo_alimentacion" id="id_tipo_alimentacion" placeholder="" value="<?php echo $id_tipo_alimentacion ?>">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="id_historial_clinico">id_historial_clinico </label>
                                    <input type="text" class="form-control" require name="id_historial_clinico" id="id_historial_clinico" placeholder="" value="<?php echo $id_historial_clinico ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="id_tratamiento">id_tratamiento</label>
                                    <input type="text" class="form-control" require name="id_tratamiento" id="id_tratamiento" placeholder="" value="<?php echo $id_tratamiento ?>">
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
                Agregar mascota
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                        
                        <th scope="col">Nombre</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Peso</th>
                        

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listamascotas tiene algun contenido */
                    if ($listamascotas->num_rows > 0) {

                        foreach ($listamascotas as $mascotas) {

                    ?>

                            <tr>

                               

                                
                                <td> <?php echo $mascotas['Nombre']    ?> </td>
                                <td> <?php echo $mascotas['Sexo'] ?> </td>
                                <td> <?php echo $mascotas['Peso'] ?> </td>
                                



                                <form action="" method="post">

                                   
                                    <input type="hidden" name="Nombre" value="<?php echo $mascotas['Nombre'];  ?>">
                                    <input type="hidden" name="Sexo" value="<?php echo $mascotas['Sexo'];  ?>">
                                    <input type="hidden" name="Peso" value="<?php echo $mascotas['Peso'];  ?>">
                                   

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