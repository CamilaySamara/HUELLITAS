<?php include 'codeveterinario.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del veterinario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label for="id_veterinario ">id_veterinario</label> 
                                    <input type="text" require name="id_veterinario " id="id_veterinario" placeholder="" value="<?php echo $id_veterinario ?>">
                                    <br>
                                </div>  

                                <div class="form-group col-md-12">
                                    <label for="Nom_veterinario">Nombre(s)</label>
                                    <input type="text" class="form-control" require name="Nom_veterinario" id="Nom_veterinario" placeholder="" value="<?php echo $Nom_veterinario ?>">
                                    <br>
                                </div>                               


                                <div class="form-group col-md-12">
                                    <label for="txtApellidoP">Primer Apellido </label>
                                    <input type="text" class="form-control" require name="txtApellidoP" id="txtApellidoP" placeholder="" value="<?php echo $txtApellidoP ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="txtApellidoM">Segundo Apellido </label>
                                    <input type="text" class="form-control" require name="txtApellidoM" id="txtApellidoM" placeholder="" value="<?php echo $txtApellidoM ?>">

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
                Agregar veterinario
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Identificacion</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Primer Apellido</th>
                        <th scope="col">Segundo Apellido</th>
                        <th scope="col">Correo</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaveterinario tiene algun contenido */
                    if ($listaveterinario->num_rows > 0) {

                        foreach ($listaveterinario as $veterinario) {

                    ?>

                            <tr>

                                <td>
                                    <img class="img-thumbnail" width="100px" src="../Imagenes/veterinario/<?php echo $veterinario['foto']; ?>" />

                                </td>

                                <td> <?php echo $veterinario['id']        ?> </td>
                                <td> <?php echo $veterinario['nombre']    ?> </td>
                                <td> <?php echo $veterinario['apellidoP'] ?> </td>
                                <td> <?php echo $veterinario['apellidoM'] ?> </td>
                                <td> <?php echo $veterinario['correo']    ?> </td>



                                <form action="" method="post">

                                    <input type="hidden" name="txtId" value="<?php echo $veterinario['id'];  ?>">
                                    <input type="hidden" name="txtNombre" value="<?php echo $veterinario['nombre'];  ?>">
                                    <input type="hidden" name="txtApellidoP" value="<?php echo $veterinario['apellidoP'];  ?>">
                                    <input type="hidden" name="txtApellidoM" value="<?php echo $veterinario['apellidoM'];  ?>">
                                    <input type="hidden" name="txtCorreo" value="<?php echo $veterinario['correo'];  ?>">
                                    <input type="hidden" name="foto" value="<?php echo $veterinario['foto'];  ?>">

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