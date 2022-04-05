<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNo_Serial"]) || empty($_POST["txtDescripcion"]) || empty($_POST["txtValor"]) || empty($_POST["txtFechaCompra"]) || empty($_POST["txtUsuarios"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    //$idActivo = $_POST["txtidActivo"];
    $No_Serial = $_POST["txtNo_Serial"];
    $Descripcion = $_POST["txtDescripcion"];
    $Valor = $_POST["txtValor"];
    $FechaCompra = $_POST["txtFechaCompra"];
    $Usuario = $_POST["txtUsuarios"];
    
    $sentencia = $bd->prepare("INSERT INTO Activo(No_Serial,Descripcion,Valor,FechaCompra,Usuario) VALUES (?,?,?,?,?);");
    $resultado = $sentencia->execute([$No_Serial,$Descripcion,$Valor,$FechaCompra,$Usuario]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>