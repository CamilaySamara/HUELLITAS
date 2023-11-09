<?php include 'codeClientes.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del cliente</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label for="id_cliente">Numero de Identificacion</label> 
                                    <input type="text" require name="id_cliente " id="id_cliente" placeholder="" value="<?php echo $id_cliente ?>">
                                    <br>
                                </div>  

                                <div class="form-group col-md-12">
                                    <label for="Tipo_doc">Tipo Documento</label>
                                    <input type="text" class="form-control" require name="Tipo_doc" id="Tipo_doc" placeholder="" value="<?php echo $Tipo_doc ?>">
                                    <br>
                                </div>                               


                                <div class="form-group col-md-12">
                                    <label for="Nombre">Nombre </label>
                                    <input type="text" class="form-control" require name="Nombre" id="Nombre" placeholder="" value="<?php echo $Nombre ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Apellido">Apellido</label>
                                    <input type="text" class="form-control" require name="Apellido" id="Apellido" placeholder="" value="<?php echo $Apellido ?>">
                                    <br>
                                </div>                               


                                <div class="form-group col-md-12">
                                    <label for="Telefono">Telefono </label>
                                    <input type="text" class="form-control" require name="Telefono" id="Telefono" placeholder="" value="<?php echo $Telefono ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Direccion">Direccion </label>
                                    <input type="text" class="form-control" require name="Direccion" id="Direccion" placeholder="" value="<?php echo $Direccion ?>">

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
                Agregar cliente
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                    
                        <th scope="col">Identificacion</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaclientes tiene algun contenido */
                    if ($listaclientes->num_rows > 0) {

                        foreach ($listaclientes as $clientes) {

                    ?>

                            <tr>

                              

                                <td> <?php echo $clientes['id_cliente']        ?> </td>
                                <td> <?php echo $clientes['Tipo_doc']    ?> </td>                               
                                <td> <?php echo $clientes['Nombre'] ?> </td>
                                <td> <?php echo $clientes['Apellido']    ?> </td>
                                <td> <?php echo $clientes['Telefono'] ?> </td>
                                <td> <?php echo $clientes['Direccion'] ?> </td>
                             



                                <form action="" method="post">

                                    <input type="hidden" name="id_cliente" value="<?php echo $clientes['id_cliente'];  ?>">
                                    <input type="hidden" name="Tipo_doc" value="<?php echo $clientes['Tipo_doc'];  ?>">
                                    <input type="hidden" name="Nombre" value="<?php echo $clientes['Nombre'];  ?>">
                                    <input type="hidden" name="Apellido" value="<?php echo $clientes['Apellido'];  ?>">
                                    <input type="hidden" name="Telefono" value="<?php echo $clientes['Telefono'];  ?>">
                                    <input type="hidden" name="Direccion" value="<?php echo $clientes['Direccion'];  ?>">
                               

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