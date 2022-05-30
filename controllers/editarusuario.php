<?php
    print_r($_POST);
    if(!isset($_POST['codusr'])){
        header('Location: ../index.php?mensaje=error');
    }

    include '../config/conexion.php';
    $codusr = $_POST['codusr'];
    $Descripcion = $_POST['txtDescripcion'];
    $Valor = $_POST['txtValor'];
    $FechaCompra = $_POST['txtFechaCompra'];

    $sentencia = $bd->prepare("UPDATE Activo SET Descripcion = ?, Valor = ?, FechaCompra = ? where codusr = ?;");
    $resultado = $sentencia->execute([$Descripcion, $Valor, $FechaCompra, $codusr]);

    if ($resultado === TRUE) {
        header('Location: ../activos.php?mensaje=editado');
    } else {
        header('Location: ../activos.php?mensaje=error');
        exit();
    }
    
?>