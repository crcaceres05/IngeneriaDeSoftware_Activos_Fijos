<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNo_Serial"]) || empty($_POST["txtDescripcion"]) || empty($_POST["txtValor"]) || empty($_POST["txtFechaCompra"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    //$idActivo = $_POST["txtidActivo"];
    $No_Serial = $_POST["txtNo_Serial"];
    $Descripcion = $_POST["txtDescripcion"];
    $Valor = $_POST["txtValor"];
    $FechaCompra = $_POST["txtFechaCompra"];
    
    $sentencia = $bd->prepare("INSERT INTO Activo(No_Serial,Descripcion,Valor,FechaCompra) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$No_Serial,$Descripcion,$Valor,$FechaCompra]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>