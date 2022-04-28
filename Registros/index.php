<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd->query("select * from Activo");
    $sentencia_usuarios = $bd->query("select * from Empleado");
    $sentencia_busqueda = $bd->query("SELECT * FROM Empleado WHERE Usuario LIKE '%$valor'");
    $Activo = $sentencia->fetchAll(PDO::FETCH_OBJ);
    $Empleado = $sentencia_usuarios->fetchAll(PDO::FETCH_OBJ);
    $Busqueda = $sentencia_busqueda->fetchAll(PDO::FETCH_OBJ);

    if(!empty($_POST))
    {
        $valor = $_POST['campo'];
        if(!empty($valor)){
            $sentencia_busqueda;
        }
    }



    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

           

                <form action="" method="POST">
                    <b>Usuario:</b><input type="text" id="campo" name="campo"  />
                    <input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-primary"/>
                    <br> </br>
                </form>


            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de Activos Fijos
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Id Activo</th>
                                <th scope="col">No. Serial</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Fecha Compra</th>
                                <th scope="col">Usuario</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($Activo as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->idActivo; ?></td>
                                <td><?php echo $dato->No_Serial; ?></td>
                                <td><?php echo $dato->Descripcion; ?></td>
                                <td><?php echo $dato->Valor; ?></td>
                                <td><?php echo $dato->FechaCompra; ?></td>
                                <td><?php echo $dato->Usuario; ?></td>
                                <td><a class="text-success" href="editar.php?idActivo=<?php echo $dato->idActivo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?idActivo=<?php echo $dato->idActivo; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar Activos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                <div class="mb-3">
                        <label class="form-label">No Serial: </label>
                        <input type="text" class="form-control" name="txtNo_Serial" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripcion: </label>
                        <input type="text" class="form-control" name="txtDescripcion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valor: </label>
                        <input type="number" class="form-control" name="txtValor" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha Compra: </label>
                        <input type="date" class="form-control" name="txtFechaCompra" autofocus required>
                    </div>
                     <div class="mb-3">
                         <label class ="form-label">Usuario:</label>
                         <select id="usuarios" class="form-control" name="txtUsuarios" autofocus required>
                                <option> -- Seleccionar Usuario -- </option>
                         
                                <?php
                                    $array = json_decode(json_encode($Empleado), true);
                                    foreach($array as $opciones){
                                ?>       
                                    <option><?php echo $opciones['Usuario']; ?></option>
                                <?php } ?>

                         </select>
                     </div>               




                    <!-- <div class="mb-3">
                        <label class="form-label">Usuario: </label>
                        <input type="text" class="form-control" name="txtUsuario" autofocus required>
                    </div>
                    <div class="d-grid"> -->
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>