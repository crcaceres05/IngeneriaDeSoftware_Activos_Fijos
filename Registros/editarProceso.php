<?php
    print_r($_POST);
    if(!isset($_POST['idActivo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $idActivo = $_POST['idActivo'];
    $No_Serial = $_POST['txtNo_Serial'];
    $Descripcion = $_POST['txtDescripcion'];
    $Valor = $_POST['txtValor'];
    $FechaCompra = $_POST['txtFechaCompra'];

    $sentencia = $bd->prepare("UPDATE Activo SET  No_Serial = ?, Descripcion = ?, Valor = ?, FechaCompra = ? where idActivo = ?;");
    $resultado = $sentencia->execute([$No_Serial,$Descripcion, $Valor, $FechaCompra, $idActivo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>