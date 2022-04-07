<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['idActivo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $idActivo = $_GET['idActivo'];

    $sentencia = $bd->prepare("select * from Activo where idActivo = ?;");
    $sentencia_usuarios = $bd->query("select * from Empleado");
    $sentencia->execute([$idActivo]);
    $activo = $sentencia->fetch(PDO::FETCH_OBJ);
    $Empleado = $sentencia_usuarios->fetchAll(PDO::FETCH_OBJ);

    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar Activos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                <div class="mb-3">
                        <label class="form-label">No_Serial: </label>
                        <input type="text" class="form-control" name="txtNo_Serial" autofocus required
                        value="<?php echo $activo->No_Serial; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripcion: </label>
                        <input type="text" class="form-control" name="txtDescripcion" required 
                        value="<?php echo $activo->Descripcion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valor: </label>
                        <input type="number" class="form-control" name="txtValor" autofocus required
                        value="<?php echo $activo->Valor; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha Compra: </label>
                        <input type="text" class="form-control" name="txtFechaCompra" autofocus required
                        value="<?php echo $activo->FechaCompra; ?>">
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
                    <div class="d-grid">
                        <input type="hidden" name="idActivo" value="<?php echo $activo->idActivo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>