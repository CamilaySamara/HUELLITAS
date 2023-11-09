<?php include 'codehistorial_clinico.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Historial Clinico</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label for="id_historial_clinico">Numero de Identificacion</label> 
                                    <input type="text" require name="id_historial_clinico" id="id_historial_clinico" placeholder="" value="<?php echo $id_historial_clinico ?>">
                                    <br>
                                </div>  

                                <div class="form-group col-md-12">
                                    <label for="id_cliente">Tipo Documento</label>
                                    <input type="text" class="form-control" require name="id_cliente" id="id_cliente" placeholder="" value="<?php echo $id_cliente ?>">
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
                                    <label for="Diagnostico">Diagnostico </label>
                                    <input type="text" class="form-control" require name="Diagnostico" id="Diagnostico" placeholder="" value="<?php echo $Diagnostico ?>">

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
                Agregar historial_clinico
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
                    /* Prefunto que si la variable listahistorial_clinico tiene algun contenido */
                    if ($listahistorial_clinico->num_rows > 0) {

                        foreach ($listahistorial_clinico as $historial_clinico) {

                    ?>

                            <tr>

                              

                                <td> <?php echo $historial_clinico['id_historial_clinico']        ?> </td>
                                <td> <?php echo $historial_clinico['id_cliente']    ?> </td>                               
                                <td> <?php echo $historial_clinico['Nombre'] ?> </td>
                                <td> <?php echo $historial_clinico['Apellido']    ?> </td>
                                <td> <?php echo $historial_clinico['Telefono'] ?> </td>
                                <td> <?php echo $historial_clinico['Direccion'] ?> </td>
                             



                                <form action="" method="post">

                                    <input type="hidden" name="id_historial_clinico" value="<?php echo $historial_clinico['id_historial_clinico'];  ?>">
                                    <input type="hidden" name="id_cliente" value="<?php echo $historial_clinico['id_cliente '];  ?>">
                                    <input type="hidden" name="Nombre" value="<?php echo $historial_clinico['Nombre'];  ?>">
                                    <input type="hidden" name="Apellido" value="<?php echo $historial_clinico['Apellido'];  ?>">
                                    <input type="hidden" name="Telefono" value="<?php echo $historial_clinico['Telefono'];  ?>">
                                    <input type="hidden" name="Direccion" value="<?php echo $historial_clinico['Direccion'];  ?>">
                               

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